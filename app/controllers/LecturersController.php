<?php
namespace Zikzay\Controller;


use Zikzay\Controller\Traits\RenderLecturers;
use Zikzay\Core\Controller;
use Zikzay\core\Session;
use Zikzay\Lib\Util;
use Zikzay\libs\Hash;
use Zikzay\Model\Lecturers;
use Zikzay\Model\RegisteredCourses;
use Zikzay\Model\Students;

class LecturersController extends Controller
{
    use RenderLecturers;

    public function __construct()
    {
        parent::__construct();
        $this->guide('lecturer', 'login/lecturer');
    }

    public function index () 
    {
        $this->render("index");
    }

    public function details($id)
    {
        $lecturers = Lecturers::find($id);
        $this->render("lecturers.details", ["lecturers"=>$lecturers]);
    }

    public function store()
    {
        $lecturers = new Lecturers();
        $this->request($lecturers);
        $lecturers->save();
        Util::redirect("lecturers/create");
    }
    public function resultUpload()
    {
        $registerCourse = new RegisteredCourses();
        $this->request($registerCourse, false);
       //dnd($registerCourse);
        $i = 0;
        foreach ($registerCourse->student as $student) {
            $dbRegCourse = RegisteredCourses::where("student = '$student' AND departmental_course = '$registerCourse->departmental_course'")::first();
            $dbRegCourse->continuous_assessment_score = $registerCourse->continuous_assessment_score[$i];
            $dbRegCourse->exam_score = $registerCourse->exam_score[$i];
            $dbRegCourse->save();
            $i++;
        }Session::set('submitError', 'Results Uploaded Successfully');
        self::redirect('lecturers/view-uploaded-results');
    }

    public function edit($id)
    {
        $lecturers = Lecturers::find($id);
        $this->render("lecturers.edit", ["lecturers"=>$lecturers]);
    }

    public function update($id)
    {
        $lecturers = (object) Lecturers::find($id);
        $this->request($lecturers, false);
        $lecturers->save();
        Util::redirect("lecturers/edit/$id");
    }

    public function delete($id)
    {
        $lecturers = (object) Lecturers::find($id);
        $lecturers->delete();
        Util::redirect("lecturers");
    }

    public function active($params)
    {
        if(count($params) == 2) {
            $lecturers = (object) Lecturers::find($params[0]);
            $lecturers->active = $params[1];
            $lecturers->save();
        }
        Util::redirect("lecturers");
    }

}