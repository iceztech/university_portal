<?php
namespace Zikzay\Controller\Traits;


use Zikzay\Model\Address;
use Zikzay\Model\Admin;
use Zikzay\Model\Calendar;
use Zikzay\Model\ClassTimetable;
use Zikzay\Model\ClassTimetableLecturers;
use Zikzay\Model\Contacts;
use Zikzay\Model\Courses;
use Zikzay\Model\DepartmentCourses;
use Zikzay\Model\Departments;
use Zikzay\Model\ExamTimetable;
use Zikzay\Model\OLevel;
use Zikzay\Model\RegisteredCourses;
use Zikzay\Model\Semesters;
use Zikzay\Model\Sessions;
use Zikzay\Model\StudentAcademicHistory;
use Zikzay\Model\Students;
use Zikzay\Model\SubjectGrades;

trait RenderStudents
{

    public function dashboard ()
    { $student = Students::find($this->student);

        $data = ['student'=>$student ];
        $this->render("students.dashboard", $data);
    }
    public function registerCourses ()
    {
        $deCourses = DepartmentCourses::manyRelatedToMe(['course'=>Courses::class ,'department'=> Departments::class]);
        $data = [
            'deCourses'=>$deCourses
        ];
        $this->render("students.register-course", $data);
    }
    public function viewRegisteredCourses ()
    {
        $courses = DepartmentCourses::where("student = '{$this->student}'")::relatedToMix([
            'departmental_course' => RegisteredCourses::class,
            '-course' => Courses::class,
            '-department' => Departments::class
        ]);
        $data = ['courses'=> $courses];
        $this->render("students.view-registered-course", $data);
    }
    public function viewResults ()
    {
        $courses = DepartmentCourses::where("student = '{$this->student}'")::relatedToMix([
            'departmental_course' => RegisteredCourses::class,
            '-course' => Courses::class,
            '-department' => Departments::class
        ]);
        $i = 0;
        foreach ($courses as $course) {
            $courses[$i]->student = new \stdClass();
            if($course->rc_continuous_assessment_score !== NULL or $course->rc_exam_score !== NULL){
                $caScore = is_numeric($course->rc_continuous_assessment_score) ? $course->rc_continuous_assessment_score : 0;
                $examScore = is_numeric($course->rc_exam_score) ? $course->rc_exam_score : 0;
                $totalScore = $caScore + $examScore;
            }else{
                $totalScore = null;
            }

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
            if($totalScore === null ){
                $grade = 'PENDING';
            }elseif ($totalScore == 0){
                $grade  = 'MISSING SCRIPT';
            }
            $courses[$i++]->student->grade = $grade ;
        }
        $data = ['courses'=> $courses];
        $this->render("students.view-results", $data);
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
            $courses[$i++]->student->grade = $grade ;
        }
        $data = ['courses' => $courses];
        $this->render("lecturers.view-uploaded-results", $data);
    }
    public function editRegisteredCourses ()
    {
        $courses = DepartmentCourses::relatedToMix([
            '-course' => Courses::class,
            '-department' => Departments::class,
            'departmental_course' => RegisteredCourses::class
        ]);
        $student = $this->student;
        $data = ['courses'=> $courses, 'student'=>$student];
        $this->render("students.edit-registered-course", $data);
    }
    public function studentProfile ()
    {
        $student = Students::find($this->student);
        $student->sponsor = Contacts::find($student->sponsor);
        $student->next_of_kin = Contacts::find($student->next_of_kin);
        $student->origin = Address::find($student->origin);
        $student->contact_address = Address::find($student->contact_address);
        $student->permanent_address = Address::find($student->permanent_address);

        $data = ['student'=>$student];
        $this->render("students.student-profile", $data);
    }
    public function educationHistory ()
    {
        $student = Students::find($this->student);
        $edu = StudentAcademicHistory::where("student = {$this->student}")::all();
        $oLevel = OLevel::where("student = {$this->student}")::all();
        $firstSittings = SubjectGrades::where("o_level = '{$oLevel[0]->id}'")::all();
        $oLevel[0]->subjects = $firstSittings;
        if(isset($oLevel[1])) {
            $secondSittings = SubjectGrades::where("o_level = '{$oLevel[1]->id}'")::all();
            $oLevel[1]->subjects = $secondSittings;
        }

        $data = [
            'student'=>$student,
            'edu'=>$edu
        ];
        $this->render("students.education-history", $data);
    }
    public function oLevel ()
    {
        $student = Students::find($this->student);
        $oLevel = OLevel::where("student = {$this->student}")::all();
        $firstSittings = SubjectGrades::where("o_level = '{$oLevel[0]->id}'")::all();
        $oLevel[0]->subjects = $firstSittings;
        if(isset($oLevel[1])) {
            $secondSittings = SubjectGrades::where("o_level = '{$oLevel[1]->id}'")::all();
            $oLevel[1]->subjects = $secondSittings;
        }
        $data = [
            'student'=>$student,
            'oLevel'=>$oLevel
        ];
        $this->render("students.o-level-results", $data);
    }
    public function viewCalendar ()
    {
        $semesters = Semesters::where("uni_semesters.session = '2'")::relatedToMe(Sessions::class);
        $firstSemester = Calendar::where("uni_semesters.semester = '1st'")::relatedToMe(Semesters::class) ;
        $secondSemester = Calendar::where("uni_semesters.semester = '2nd'")::relatedToMe(Semesters::class) ;
        $data = [
            'semesters' => $semesters,
            'firstSemesters'=> $firstSemester,
            'secondSemesters'=> $secondSemester
        ];
        $this->render("students.view-calendar", $data);
    }
    public function viewClassTimetable()
    {
        $timetableFirsts = DepartmentCourses
            ::where("level = '100' and uni_courses.semester='1' and uni_department_courses.department = '7' ")
            ::order(false, 'day, start_time')::relatedToMix([
                '-department' => Departments::class,
                '-course' => Courses::class,
                'departmental_course' => ClassTimetable::class
            ]);
        $timetableSeconds = DepartmentCourses::where("level = '100' and uni_courses.semester='2' and uni_department_courses.department = '7' ")
            ::order(false, 'day, start_time')::relatedToMix([
                '-department' => Departments::class,
                '-course' => Courses::class,
                'departmental_course' => ClassTimetable::class
            ]);
        $firstSemester = Semesters::order(true)::limitTo(1)::search('semester', '1st')->id;
        $secondSemester = Semesters::order(true)::limitTo(1)::search('semester', '2nd')->id;
        foreach ($timetableFirsts as $key => $timetableFirst) {
            $lecturers = ClassTimetableLecturers::where("class_timetable = '{$timetableFirst->ct_id}'")::limitTo(null)::all();

            if($lecturers == false) continue;

            $lecturerString = '';
            foreach ($lecturers as $lecturer) {
                $lecturerString .= $lecturer->lecturers . ', ';
            }
            $timetableFirsts[$key]->lecturer = rtrim($lecturerString, ', ');
        }
        foreach ($timetableSeconds as $key => $timetableSecond) {
            $lecturers = ClassTimetableLecturers::where("class_timetable = '{$timetableSecond->ct_id}'")::limitTo(null)::all();

            if($lecturers == false) continue;

            $lecturerString = '';
            foreach ($lecturers as $lecturer) {
                $lecturerString .= $lecturer->lecturers . ', ';
            }
            $timetableSeconds[$key]->lecturer = rtrim($lecturerString, ', ');
        }

//        dnd($timetableSecond);
        $data = [
            'firstSemester' => $firstSemester,
            'secondSemester' => $secondSemester,
            'timetableFirsts' => $timetableFirsts,
            'timetableSeconds' => $timetableSeconds
        ];
        $this->render("students.view-timetable", $data);
    }

    public function viewExamTimetable()
    {
        $timetableFirst = DepartmentCourses
            ::where("level = '100' and uni_courses.semester='1' and uni_department_courses.department = '7' ")
            ::order(false, 'date, start_time')::relatedToMix([
                '-department' => Departments::class,
                '-course' => Courses::class,
                'departmental_courses' => ExamTimetable::class
            ]);
        $timetableSecond = DepartmentCourses::where("level = '100' and uni_courses.semester='2' and uni_department_courses.department = '7' ")
            ::order(false, 'date, start_time')::relatedToMix([
                '-department' => Departments::class,
                '-course' => Courses::class,
                'departmental_courses' => ExamTimetable::class
            ]);

        $firstSemester = Semesters::order(true)::limitTo(1)::search('semester', '1st')->id;
        $secondSemester = Semesters::order(true)::limitTo(1)::search('semester', '2nd')->id;

        //dnd($timetableSecond);
        $data = [
            'firstSemester' => $firstSemester,
            'secondSemester' => $secondSemester,
            'timetableFirsts' => $timetableFirst,
            'timetableSeconds' => $timetableSecond
        ];
        $this->render('students.view-exam', $data);
    }
    public function makePayment()
    {
        $this->render('students.make-payment');
    }
}