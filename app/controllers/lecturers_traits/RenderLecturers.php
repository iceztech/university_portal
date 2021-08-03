<?php
namespace Zikzay\Controller\Traits;


use Zikzay\Model\Courses;
use Zikzay\Model\DepartmentCourses;
use Zikzay\Model\Departments;
use Zikzay\Model\RegisteredCourses;
use Zikzay\Model\Students;

trait RenderLecturers
{

    public function dashboard ()
    {
        $this->render("lecturers.dashboard");
    }
    public function uploadResults ()
    {
        $courses = DepartmentCourses::relatedToMix([
            'departmental_course' => RegisteredCourses::class,
            '-course' => Courses::class,
            '-department' => Departments::class
        ]);
        $i = 0;
        foreach ($courses as $course) {
            $student = Students::find($course->rc_student);
            if($student == false) continue;
            $courses[$i]->student = new \stdClass();
            $courses[$i]->student->name =  $student->surname.' '.$student->first_name.' '.$student->middle_name;
            $courses[$i++]->student->reg_no = $student->jamb_reg_no;

        }
        $data = ['courses' => $courses];
        $this->render("lecturers.upload-results", $data);
    }
    public function viewUploadedResults ()
    {
        $courses = DepartmentCourses::where("departmental_course = '4'")::relatedToMix([
            'departmental_course' => RegisteredCourses::class,
            '-course' => Courses::class,
            '-department' => Departments::class
        ]);
        $i = 0;
        foreach ($courses as $course) {
            $student = Students::find($course->rc_student);
            if($student == false) continue;
            $courses[$i]->student = new \stdClass();
            $courses[$i]->student->name =  $student->surname.' '.$student->first_name.' '.$student->middle_name;
            $courses[$i]->student->reg_no =  $student->jamb_reg_no  ;
            $caScore = is_numeric($course->rc_continuous_assessment_score) ? $course->rc_continuous_assessment_score : 0;
            $examScore = is_numeric($course->rc_exam_score) ? $course->rc_exam_score : 0;
            $totalScore = $caScore + $examScore;
            $courses[$i]->student->total_score = $totalScore ;
            switch ($totalScore) {
                case ($totalScore >= 70):
                    $grade = 'A';
                    break;
                case ($totalScore >= 60):
                    $grade = 'B';
                    break;
                case ($totalScore >= 50):
                    $grade = 'C';
                    break;
                case ($totalScore >= 45):
                    $grade = 'D';
                    break;
                case ($totalScore >= 40):
                    $grade = 'E';
                    break;
                default:
                    $grade = 'F';
            }
            if($totalScore == 0){
                $grade = 'EMPTY';
            }
            $courses[$i++]->student->grade = $grade ;
        }
        $data = ['courses' => $courses];
        $this->render("lecturers.view-uploaded-results", $data);
    }
    public function editUploadedResults ()
    {
        $courses = DepartmentCourses::where("departmental_course = '4'")::relatedToMix([
            'departmental_course' => RegisteredCourses::class,
            '-course' => Courses::class,
            '-department' => Departments::class
        ]);
        $i = 0;
        foreach ($courses as $course) {
            $student = Students::find($course->rc_student);
            if($student == false) continue;
            $courses[$i]->student = new \stdClass();
            $courses[$i]->student->name =  $student->surname.' '.$student->first_name.' '.$student->middle_name;
            $courses[$i]->student->reg_no =  $student->jamb_reg_no  ;
            $caScore = is_numeric($course->rc_continuous_assessment_score) ? $course->rc_continuous_assessment_score : 0;
            $examScore = is_numeric($course->rc_exam_score) ? $course->rc_exam_score : 0;
            $totalScore = $caScore + $examScore;
            $courses[$i]->student->total_score = $totalScore ;
            switch ($totalScore) {
                case ($totalScore >= 70):
                    $grade = 'A';
                    break;
                case ($totalScore >= 60):
                    $grade = 'B';
                    break;
                case ($totalScore >= 50):
                    $grade = 'C';
                    break;
                case ($totalScore >= 45):
                    $grade = 'D';
                    break;
                case ($totalScore >= 40):
                    $grade = 'E';
                    break;
                default:
                    $grade = 'F';
            }
            $courses[$i++]->student->grade = $grade ;
        }
        $data = ['courses' => $courses];
        $this->render("lecturers.edit-uploaded-results", $data);
    }
}
//any render method would be in this class