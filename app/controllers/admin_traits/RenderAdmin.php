<?php


namespace Zikzay\Controller\Traits;


use Zikzay\core\Session;
use Zikzay\Lib\Model;
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
use Zikzay\Model\ExamTimetableInvigilators;
use Zikzay\Model\Faculties;
use Zikzay\Model\Lecturers;
use Zikzay\Model\OLevel;
use Zikzay\Model\RegisteredCourses;
use Zikzay\Model\Semesters;
use Zikzay\Model\Sessions;
use Zikzay\Model\StudentAcademicHistory;
use Zikzay\Model\Students;
use Zikzay\Model\SubjectGrades;

trait RenderAdmin
{

    public function dashboard()
    {
        $admin = Admin::find($this->admin);
        $data = ['admin'=>$admin];
        $this->render("admin.dashboard", $data);
    }

    public function addPayment()
    {
        $departments = Departments::all();
        $faculties = Faculties::all();
        $data = [
            'departments'=>$departments,
            'faculties'=>$faculties
        ];
        $this->render('admin/add-payment', $data);
    }

    public function addStudent($form)
    {
        $bioData = ($form == 'bio-data' or $form == null);
        $address = ($form == 'address');
        $kin = ($form == 'next-of-kin');
        $sponsor = ($form == 'sponsor');
        $education = ($form == 'education');
        $oLevel = ($form == 'o-level');
        $data = [
            'bioData' => $bioData,
            'address' => $address,
            'kin' => $kin,
            'sponsor' => $sponsor,
            'education' => $education,
            'oLevel' => $oLevel
        ];
        $this->render("admin.add-student", $data);
    }

    public function preview()
    {
        $studentID = Session::get('registerStudent');
        $student = Students::find($studentID);
        $sponsor = Contacts::find($student->sponsor);
        $kin = Contacts::find($student->next_of_kin);
        $origin = Address::find($student->origin);
        $contact = Address::find($student->contact_address);
        $perAddr = Address::find($student->permanent_address);
        $edu = StudentAcademicHistory::where("student = {$studentID}")::all();
        $oLevel = OLevel::where("student = {$studentID}")::all();
        $firstSittings = SubjectGrades::where("o_level = '{$oLevel[0]->id}'")::all();
        $oLevel[0]->subjects = $firstSittings;
        if (isset($oLevel[1])) {
            $secondSittings = SubjectGrades::where("o_level = '{$oLevel[1]->id}'")::all();
            $oLevel[1]->subjects = $secondSittings;
        }

//      dnd( $oLevel);
//        dnd($oLevel[1]->sujects);
//        dnd($oLevel[1]);
        $data = [
            'student' => $student,
            'sponsor' => $sponsor,
            'kin' => $kin,
            'origin' => $origin,
            'contact' => $contact,
            'permanentAddress' => $perAddr,
            'edu' => $edu,
            'oLevel' => $oLevel
        ];
        $html = 'lll';

        ob_start();
        $this->render("admin.preview", $data, false, false, false);
        $html = ob_get_clean();
        echo $html;
    }

    public function addFaculty()
    {
        $this->render("admin.add-faculty");
    }

    public function viewFaculty()
    {
        $faculty = Faculties::all();
        $data = [
            'faculties' => $faculty
        ];
        $this->render("admin.faculty", $data);
    }

    public function editFaculty($params)
    {
        $facultyId = $params;
        $faculty = Faculties::find($facultyId);
        $data = [
            'faculty' => $faculty,
        ];
        $this->render("admin.edit-faculty", $data);
    }

    public function addDepartment()
    {
        $faculty = Faculties::all();
        $data = [
            'faculty' => $faculty,
        ];
        $this->render("admin.add-depart", $data);
    }

    public function viewDepartment()
    {
        $departments = Departments::all();

        foreach ($departments as $key => $department) {
            $departments[$key]->facultyName = Faculties::find($department->faculty)->name;
        }
        $data = [
            'departments' => $departments,
        ];
        $this->render("admin.depart", $data);
    }

    public function editDepartment($id)
    {
        $department = Departments::find($id);
        $faculties = Faculties::all();

        $data = ['department' => $department, 'faculties' => $faculties];
        $this->render("admin.edit-depart", $data);
    }

    public function addDepartmentalCourse()
    {
        $departments = Departments::all();
        $courses = Courses::all();
        $data = ['departments' => $departments, 'courses' => $courses];
        $this->render("admin.add-decourse", $data);
    }

    public function editDepartmentalCourse($id)
    {
        $deCourse = DepartmentCourses::find($id);
        $departments = Departments::all();
        $courses = Courses::all();
        $data = [
            'deCourses' => $deCourse,
            'departments' => $departments,
            'courses' => $courses
        ];
        $this->render("admin.edit-decourse", $data);
    }

    public function viewDepartmentalCourse()
    {
        $deCourses = DepartmentCourses::manyRelatedToMe(['course' => Courses::class, 'department' => Departments::class]);
        $data = [
            'deCourses' => $deCourses
        ];

        $this->render("admin.decourse", $data);
    }

    public function addCourse()
    {
        $this->render("admin.add-course");
    }

    public function editCourse($id)
    {
        $course = Courses::find($id);
        $data = ['course' => $course];
        $this->render("admin.edit-course", $data);
    }

    public function viewCourse()
    {
        $courses = Courses::all();
        $data = ['courses' => $courses];
        $this->render("admin.course", $data);
    }

    public function addSession()
    {
        $this->render("admin.add-session");
    }

    public function addActivity()
    {
        $semesters = Semesters::where("uni_semesters.session = '2'")::relatedToMe(Sessions::class);
        $firstSemester = Calendar::where("uni_semesters.semester = '1st'")::relatedToMe(Semesters::class);
        $secondSemester = Calendar::where("uni_semesters.semester = '2nd'")::relatedToMe(Semesters::class);
        //dnd($firstSemester);
        $data = [
            'semesters' => $semesters,
            'firstSemesters' => $firstSemester,
            'secondSemesters' => $secondSemester
        ];
        $this->render("admin.add-calendar-activity", $data);
    }

    public function editActivity($id)
    {
        $activity = Calendar::find($id);
        $semesters = Semesters::where("uni_semesters.session = '2'")::all();
        $data = [
            'activity' => $activity,
            'semesters' => $semesters
        ];
        $this->render("admin.edit-calendar-activity", $data);
    }

    public function addSemester()
    {
        $sessions = Sessions::all();
        $data = ['sessions' => $sessions];
        //dnd($data);
        $this->render("admin.add-semester", $data);
    }

    public function addClassTimetable()
    {
        $timetableFirst = DepartmentCourses
            ::where("level = '100' and uni_courses.semester='1' and uni_department_courses.department = '7' ")
            ::order(false, 'day, start_time')::relatedToMix([
                '-department' => Departments::class,
                '-course' => Courses::class,
                'departmental_course' => ClassTimetable::class
            ]);
        $timetableSecond = DepartmentCourses::where("level = '100' and uni_courses.semester='2' and uni_department_courses.department = '7' ")
            ::order(false, 'day, start_time')::relatedToMix([
                '-department' => Departments::class,
                '-course' => Courses::class,
                'departmental_course' => ClassTimetable::class
            ]);

        $deCoursesFirst = DepartmentCourses::where("level = '100' and semester='1' and department = '7' ")::order(null)::relatedToMix([
            '-department' => Departments::class,
            '-course' => Courses::class
        ]);
        $deCoursesSecond = DepartmentCourses::where("level = '100' and semester='2' and department = '7' ")::relatedToMix([
            '-department' => Departments::class,
            '-course' => Courses::class
        ]);

        $firstSemester = Semesters::order(true)::limitTo(1)::search('semester', '1st')->id;
        $secondSemester = Semesters::order(true)::limitTo(1)::search('semester', '2nd')->id;


//        dnd($timetableSecond);
        $data = [
            'deCoursesFirst' => $deCoursesFirst,
            'deCoursesSecond' => $deCoursesSecond,
            'firstSemester' => $firstSemester,
            'secondSemester' => $secondSemester,
            'timetableFirsts' => $timetableFirst,
            'timetableSeconds' => $timetableSecond
        ];
        $this->render("admin.add-timetable", $data);
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


        $data = [
            'firstSemester' => $firstSemester,
            'secondSemester' => $secondSemester,
            'timetableFirsts' => $timetableFirsts,
            'timetableSeconds' => $timetableSeconds,
        ];
        $this->render("admin.view-timetable", $data);
    }

    public function editClassTimetable($id)
    {
        $timetable = ClassTimetable::find($id);
        $deCourses = DepartmentCourses::manyRelatedToMe([
            'department'  => Departments::class,
            'course'  => Courses::class
        ]);
        $firstSemester = Semesters::order(true)::limitTo(1)::search('semester', '1st')->id;
        $secondSemester = Semesters::order(true)::limitTo(1)::search('semester', '2nd')->id;

        $data = [
            'timetable'=>$timetable,
            'deCourses'=>$deCourses,
            'firstSemester'=>$firstSemester,
            'secondSemester'=>$secondSemester
        ];
        $this->render('admin.edit-class', $data);
    }
    public function addTimetableLecturer($id)
    {
        $timetable = ClassTimetable::find($id);
        $deCourses = DepartmentCourses::manyRelatedToMe([
            'department'  => Departments::class,
            'course'  => Courses::class
        ]);
        $lecturers = ClassTimetableLecturers::where("class_timetable = $id")::all();
        $firstSemester = Semesters::order(true)::limitTo(1)::search('semester', '1st')->id;
        $secondSemester = Semesters::order(true)::limitTo(1)::search('semester', '2nd')->id;

        $data = [
            'timetable'=>$timetable,
            'deCourses'=>$deCourses,
            'firstSemester'=>$firstSemester,
            'secondSemester'=>$secondSemester,
            'lecturers'=>$lecturers,
        ];
        $this->render('admin.add-timetable-lecturer', $data);
    }
    public function editTimetableLecturer($params)
    {
        if(is_string($params)) {
            $id = $params;
        }else {
            $id = $params[0];
            $id2 = $params[1];
        }
        $timetable = ClassTimetable::find($id);
        $deCourses = DepartmentCourses::manyRelatedToMe([
            'department'  => Departments::class,
            'course'  => Courses::class
        ]);
        $lecturers = ClassTimetableLecturers::where("class_timetable = $id")::find($id2);
        $firstSemester = Semesters::order(true)::limitTo(1)::search('semester', '1st')->id;
        $secondSemester = Semesters::order(true)::limitTo(1)::search('semester', '2nd')->id;

        $data = [
            'timetable'=>$timetable,
            'deCourses'=>$deCourses,
            'firstSemester'=>$firstSemester,
            'secondSemester'=>$secondSemester,
            'lecturers'=>$lecturers,
        ];
        $this->render('admin.edit-timetable-lecturer', $data);
    }


    public function addExamTimetable()
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

        $deCoursesFirst = DepartmentCourses::where("level = '100' and semester='1' and department = '7' ")::order(null)::relatedToMix([
            '-department' => Departments::class,
            '-course' => Courses::class
        ]);
        $deCoursesSecond = DepartmentCourses::where("level = '100' and semester='2' and department = '7' ")::relatedToMix([
            '-department' => Departments::class,
            '-course' => Courses::class
        ]);

        $firstSemester = Semesters::order(true)::limitTo(1)::search('semester', '1st')->id;
        $secondSemester = Semesters::order(true)::limitTo(1)::search('semester', '2nd')->id;

        //dnd($timetableSecond);
        $data = [
            'deCoursesFirst' => $deCoursesFirst,
            'deCoursesSecond' => $deCoursesSecond,
            'firstSemester' => $firstSemester,
            'secondSemester' => $secondSemester,
            'timetableFirsts' => $timetableFirst,
            'timetableSeconds' => $timetableSecond
        ];
        $this->render('admin.add-exam', $data);
    }
    public function viewExamTimetableOLd()
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

        $data = [
            'firstSemester' => $firstSemester,
            'secondSemester' => $secondSemester,
            'timetableFirsts' => $timetableFirst,
            'timetableSeconds' => $timetableSecond
        ];
        $this->render('admin.view-exam', $data);
    }

    public function editExamTimetable($id)
    {
        $timetable = ExamTimetable::find($id);
        $deCourses = DepartmentCourses::manyRelatedToMe([
            'department'  => Departments::class,
            'course'  => Courses::class
        ]);
        $firstSemester = Semesters::order(true)::limitTo(1)::search('semester', '1st')->id;
        $secondSemester = Semesters::order(true)::limitTo(1)::search('semester', '2nd')->id;

        $data = [
            'timetable'=>$timetable,
            'deCourses'=>$deCourses,
            'firstSemester'=>$firstSemester,
            'secondSemester'=>$secondSemester
        ];
        $this->render('admin.edit-exams', $data);
    }
    public function addInvigilator($id)
    {
        $timetable = ExamTimetable::find($id);
        $deCourses = DepartmentCourses::manyRelatedToMe([
            'department'  => Departments::class,
            'course'  => Courses::class
        ]);
        $invigilators = ExamTimetableInvigilators::where("exam_timetable = $id")::all();
        $firstSemester = Semesters::order(true)::limitTo(1)::search('semester', '1st')->id;
        $secondSemester = Semesters::order(true)::limitTo(1)::search('semester', '2nd')->id;

        $data = [
            'timetable'=>$timetable,
            'deCourses'=>$deCourses,
            'firstSemester'=>$firstSemester,
            'secondSemester'=>$secondSemester,
            'invigilators'=>$invigilators,
        ];
        $this->render('admin.add-exam-invigilator', $data);
    }
    public function editInvigilator($params)
    {
        if(is_string($params)) {
            $id = $params;
        }else {
            $id = $params[0];
            $id2 = $params[1];
        }
        $timetable = ExamTimetable::find($id);
        $deCourses = DepartmentCourses::manyRelatedToMe([
            'department'  => Departments::class,
            'course'  => Courses::class
        ]);
        $invigilators = ExamTimetableInvigilators::where("exam_timetable = $id")::find($id2);
        $firstSemester = Semesters::order(true)::limitTo(1)::search('semester', '1st')->id;
        $secondSemester = Semesters::order(true)::limitTo(1)::search('semester', '2nd')->id;

        $data = [
            'timetable'=>$timetable,
            'deCourses'=>$deCourses,
            'firstSemester'=>$firstSemester,
            'secondSemester'=>$secondSemester,
            'invigilators'=>$invigilators,
        ];
        $this->render('admin.edit-invigilator', $data);
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

        foreach ($timetableFirst as $key => $timeFirst) {
            $invigilators = ExamTimetableInvigilators::where("exam_timetable = '{$timeFirst->et_id}'")::limitTo(null)::all();
            if($invigilators == false) continue;

            $invigilatorString = '';
            foreach ($invigilators as $invigilator) {
                $invigilatorString .= $invigilator->invigilators . ', ';
            }
            $timetableFirst[$key]->lecturer = rtrim($invigilatorString, ', ');
        }
        foreach ($timetableSecond as $key => $timeSecond) {
            $invigilators = ExamTimetableInvigilators::where("exam_timetable = '{$timeSecond->et_id}'")::limitTo(null)::all();

            if($invigilators == false) continue;

            $invigilatorString = '';
            foreach ($invigilators as $invigilator) {
                $invigilatorString .= $invigilator->invigilators . ', ';
            }
            $timetableSecond[$key]->lecturer = rtrim($invigilatorString, ', ');
        }

        $data = [
            'firstSemester' => $firstSemester,
            'secondSemester' => $secondSemester,
            'timetableFirsts' => $timetableFirst,
            'timetableSeconds' => $timetableSecond
        ];
        $this->render('admin.view-exam', $data);
    }
}