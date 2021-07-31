<?php
namespace Zikzay\Controller;


use Zikzay\Controller\Traits\RenderStudents;
use Zikzay\Core\Controller;
use Zikzay\core\Session;
use Zikzay\Lib\Util;
use Zikzay\libs\Hash;
use Zikzay\Model\RegisteredCourses;
use Zikzay\Model\Students;

class StudentsController extends Controller
{
    use RenderStudents;

    public function __construct()
    {
        parent::__construct();
        $this->guide('student');
    }

    public function courseRegistration()
    {
        $courses = (object) new RegisteredCourses();
        $this->request($courses);

        foreach ($courses->departmental_course as $course) {
            $has = RegisteredCourses::count("student = '{$this->student}' AND departmental_course = '{$course}'");
            if($has > 0) continue;
            $regCourse = new RegisteredCourses();
            $regCourse->departmental_course = $course;
            $regCourse->student = $this->student;
            $regCourse->semester = in_array("{$course}-1", $courses->semester) ? '1' : '2';

            $regCourse->save();
        }
        Session::set('submitError', 'Course registered proceed to view registration');
        Util::redirect("students/register-courses");
    }

    public function update($id) 
    {        
        $students = (object) Students::find($id);
        $this->request($students, false);
        $students->save();
        Util::redirect("students/edit/$id");
    }

    public function deleteCourse($id)
    {
        $students = (object) RegisteredCourses::find($id);
        $students->delete();
        Session::set('submitError', 'Course field has been deleted');
        Util::redirect("students/view-registered-courses");
    }

    public function logout(){
        Session::destroy();
        self::redirect('login/student');
    }
}