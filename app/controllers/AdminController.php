<?php
namespace Zikzay\Controller;


use Zikzay\Controller\Traits\RenderAdmin;
use Zikzay\Core\Controller;
use Zikzay\core\Session;
use Zikzay\Lib\Util;
use Zikzay\libs\Hash;
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
use Zikzay\Model\OLevel;
use Zikzay\Model\Payments;
use Zikzay\Model\Semesters;
use Zikzay\Model\Sessions;
use Zikzay\Model\StudentAcademicHistory;
use Zikzay\Model\Students;
use Zikzay\Model\SubjectGrades;

class AdminController extends Controller
{
    use RenderAdmin;

    public function __construct()
    {

        parent::__construct();
        $this->guide('admin', 'login/admin');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            $this->guide('admin', 'login/admin');
    }

    public function details($id)
    {
        $admin = Admin::find($id);
        $this->render("admin.details", ["admin"=>$admin]);
    }

    public function storeFaculty()
    {
        $faculties = new Faculties();
        $this->request($faculties);
        $faculties->save();
        Session::set('submitError', 'Faculty Added Successfully');
        self::redirect("admin/add-faculty");
    }
    public function storeDepartment()
    {
        $departments = new Departments();
        $this->request($departments);
        $departments->save();
        Session::set('submitError', 'Department Added Successfully');
        self::redirect("admin/add-department");
    }
    public function newCourse()
    {
        $course = new Courses();
        $this->request($course);
        $course->save();
        Session::set('submitError', 'Course Added Successfully');
        self::redirect("admin/add-course");
    }
    public function newDepartmentalCourse()
    {
        $deCourse = new DepartmentCourses();
        $this->request($deCourse);
        $deCourse->save();
        Session::set('submitError', 'Course Added Successfully');
        self::redirect("admin/add-departmental-course");
    }
    
    public function updateFaculty($id)
    {
        $faculties = Faculties::find($id);
        $this->request($faculties, false);
        //dnd($faculties);
        $faculties->save();
        Session::set('submitError', 'Faculty Updated Successfully');
        self::redirect("admin/edit-faculty/{$id}");
    }
    public function updateDepartment($id)
    {
        $department = (object) Departments::find($id);
        $this->request($department, false);
        $department->save();
        Session::set('submitError', 'Department Updated Successfully');
        self::redirect("admin/edit-department/{$id}");
    }
    public function updateCourse($id)
    {
        $courses = (object) Courses::find($id);
        $this->request($courses, false);
        $courses->save();
        Session::set('submitError', 'Course Updated Successfully');
        self::redirect("admin/edit-course/{$id}");
    }
    public function updateDepartmentalCourse($id)
    {
        $deCourse = (object) DepartmentCourses::find($id);
        $this->request($deCourse, false);
        $deCourse->save();
        Session::set('submitError', 'Course Field Updated Successfully');
        self::redirect("admin/edit-departmental-course/{$id}");
    }
    
    public function update($id) 
    {        
        $admin = (object) Admin::find($id);
        $this->request($admin, false);
        $admin->save();
        Util::redirect("admin/edit/$id");
    }

    public function delete($id)
    {
        $admin = (object) Admin::find($id);
        $admin->delete();
        Util::redirect("admin");
    }
    public function deleteFaculty($id)
    {
        $faculty = (object) Faculties::find($id);
        $faculty->delete();
        Session::set('submitError', 'Faculty Field Deleted Successfully');
        Util::redirect("admin/view-faculty");
    }
    public function deleteDepartment($id)
    {
        $department = (object) Departments::find($id);
        $department->delete();
        Session::set('submitError', 'Department Field Deleted Successfully');
        Util::redirect("admin/view-department");
    }
    public function deleteCourse($id)
    {
        $courses = (object) Courses::find($id);
        $courses->delete();
        Session::set('submitError', 'Courses Field Successfully Removed');
        Util::redirect("admin/view-course");
    }
    public function deleteDepartmentalCourse($id)
    {
        $deCourse = (object) DepartmentCourses::find($id);
        $deCourse->delete();
        Session::set('submitError', 'Courses Field Successfully Removed');
        Util::redirect("admin/view-departmental-course");
    }

    public function active($params)
    {
        if(count($params) == 2) {
            $admin = (object) Admin::find($params[0]);
            $admin->active = $params[1];
            $admin->save();
        }
        Util::redirect("admin");
    }


    public function facultyAddition()
    {
        $faculties = new Faculties();
        $this->request($faculties);
        $facultiesId = null;
        dnd($faculties->id);
        if ($facultiesId == null) {
            $facultiesId = $faculties->save();
        }else{
            $facultiesId->save();
        }
        self::redirect('admin/add-faculty');
    }


    //Student Registration
    public function submitBioData()
    {
        $image = $this->imageUpload('utme', true);
        $address = new Address();
        $this->request($address, false);
        $address->type = 'origin';

        $addressId = $address->save();
        $student = new Students();
        $this->request($student, false);
        $student->origin = $addressId;
        $student->nationality = $address->country;
        $studentID = $student->save();
        Session::set('registerStudent', $studentID);
        Session::set('submitError', 'Please fill in Address Details');
        self::redirect('admin/add-student/address');
    }

    public function submitAddress()
    {
        $studentID = Session::get('registerStudent');
        $address = new Address();
        $this->request($address, false, true);
        for ($i = 0; $i < count($address->address); $i++) {
            $addr = new Address();
            $addr->address = $address->address[$i];
            $addr->town = $address->town[$i];
            $addr->state = $address->state[$i];
            $addr->country = $address->country[$i];

            $student = Students::find($studentID);
            if($i == 0) {
                $addr->type = 'contact';
                $this->address($student, $addr, 'contact_address');
            } else {
                $addr->type = 'permanent';
                $this->address($student, $addr, 'permanent_address');
            }
        }
        Session::set('submitError', 'Please Enter Next of kin Details');
        self::redirect('admin/add-student/next-of-kin');
    }

    public function submitKinDetails()
    {
        $studentID = Session::get('registerStudent');
        $contacts = new Contacts();
        $this->request($contacts, false);
        $contacts->type = 'Next Of Kin';
        $student = Students::find($studentID);

        if ($student->next_of_kin == null) {
            $contactsId = $contacts->save();
            $student->next_of_kin = $contactsId;
        }else{
            $contacts->id =  $student->next_of_kin;
            $contacts->save();
        }

        $student->save();
        Session::set('submitError', 'Please Enter Sponsor Details');
        self::redirect('admin/add-student/sponsor');
    }

    public function submitSponsorDetails()
    {
        $studentID = Session::get('registerStudent');
        $contacts = new Contacts();
        $this->request($contacts, false);
        $contacts->type = 'Sponsor';
        $student = Students::find($studentID);

        if ($student->sponsor == null) {
            $contactsId = $contacts->save();
            $student->sponsor = $contactsId;
        }else{
            $contacts->id = $student->sponsor;
            $contacts->save();
        }
        $student->save();
        Session::set('submitError', 'Please Enter Educational History');
        self::redirect('admin/add-student/education');

    }

    public function submitEducationDetails()
    {
        $studentID = Session::get('registerStudent');
        $education = new StudentAcademicHistory();
        $this->request($education, false);



        for ($i = 0; $i<count($education->type); $i++) {
            if ($education->qualification[$i] == null) break;
            $dbEdu = StudentAcademicHistory::where("type = '{$education->type[$i]}' AND student = '{$studentID}'")::first();
            $edu = new StudentAcademicHistory();
            $edu->student = $studentID;
            $edu->qualification = $education->qualification[$i];
            $edu->institution = $education->institution[$i];
            $edu->start_year = $education->start_year[$i];
            $edu->end_year = $education->end_year[$i];
            $edu->type = $education->type[$i];

            if ($dbEdu == false) {
                $edu->save();
            } else {
                $edu->id = $dbEdu->id;
                $edu->save();
            }
        }
        Session::set('submitError', 'Please Enter O-Level Results');
        self::redirect('admin/add-student/o-level');
    }

    public function submitOLevel()
    {
        $studentID = Session::get('registerStudent');
        $oLevel = new OLevel();
        $this->request($oLevel, false, true);
        $levelId0 = $levelId1 = null;

        for ($i = 0; $i < count($oLevel->name); $i++) {
            if ($oLevel->name[$i] == null) break;
            $sitting = $i + 1;
            $dbOLevel = OLevel::where("student = '{$studentID}' AND sitting = '{$sitting}'")::first();
            $level = new OLevel();
            $level->student = $studentID;
            $level->name = $oLevel->name[$i];
            $level->certificate = $oLevel->certificate[$i];
            $level->institution = $oLevel->institution[$i];
            $level->exam_number = $oLevel->exam_number[$i];
            $level->exam_year = $oLevel->exam_year[$i];
            $level->sitting = $sitting;
            if($dbOLevel == false) {
                $id = $level->save();
            } else {
                $id = $level->id = $dbOLevel->id;
                $level->save();

            }
            if ($i == 0) {
                $levelId0 = $id;
            } else {
                $levelId1 = $id;
            }
        }


        $grades = new SubjectGrades();
        $this->request($grades, false, true);

        if($grades->o_level == null){
            for ($i = 0; $i < count($grades->subject); $i++) {
                if ($grades->grade[$i] == null) break;
                if($i >= 9) {
                    $levelId = $levelId1;
                } else {
                    $levelId = $levelId0;
                }
                $dbGrade = SubjectGrades::where("o_level = '{$levelId}' AND subject = '{$grades->subject[$i]}'")::first();
                // dnd($dbGrade);

                $grade = new SubjectGrades();
                $grade->o_level = $levelId0;
                $grade->subject = $grades->subject[$i];
                $grade->grade = $grades->grade[$i];
                $grade->o_level = $levelId;

                if($dbGrade == false) {
                    $grade->save();
                } else {
                    $grade->id = $dbGrade->id;
                    $grade->save();
                }
            }
        }
        Session::set('submitError', 'Student data uploaded successfully, click save to update and edit to make changes');
        self::redirect('admin/preview');
    }

    public function storeSession()
    {
        $session = (object) new Sessions();
        $this->request($session);
        $session->save();
        Session::set('submitError', 'Session added successfully');
        self::redirect('admin/add-session');
    }
    public function storeSemester()
    {
        $semester = (object) new Semesters();
        $this->request($semester);
        $semester->save();
        Session::set('submitError', 'Semester added successfully');
        self::redirect('admin/add-semester');
    }
    public function storeActivity()
    {
        $activity = (object) new Calendar();
        $this->request($activity, false);
        $activity->save();
        Session::set('submitError', 'Activity added successfully');
        self::redirect('admin/add-activity');
    }
    public function deleteActivity($id)
    {
        $activity = (object) Calendar::find($id);
        $activity->delete();
        Session::set('submitError', 'Activity Deleted');
        Util::redirect("admin/add-activity");
    }
    public function storeTimetable()
    {
        $timeTable = new ClassTimetable;
        $this->request($timeTable, false);
        $timeRef = $timeTable->save();
        Session::set('submitError','Class timetable row added ');
        self::redirect('admin/add-class-timetable');
    }
    public function storeTimetableLecturer($id)
    {
        dnd($_POST);
        $lecturers = new ClassTimetableLecturers();
        $this->request($lecturers, false);
        foreach ($lecturers->lecturers as $names){
            $lecturer = new ClassTimetableLecturers();
            if($names == '')continue;
            $lecturer->lecturers = $names;
            $lecturer->class_timetable = $id;
            $lecturers->save();
        }
        Session::set('submitError','Lecturer added ');
        self::redirect("admin/add-timetable-lecturer/$id");
    }
    public function updateTimetableLecturer($params)
    {
        if(is_string($params)){
            $id = $params;
        }else{
            $id = $params[0];
            $id2 = $params[1];
        }
        $lecturers = ClassTimetableLecturers::find($id2);
        $this->request($lecturers, false);
        $lecturers->save();
        Session::set('submitError','Lecturer updated ');
        self::redirect("admin/add-timetable-lecturer/$id");
    }

    public function deleteClassTimetable($id)
    {
        $timetable = (object) ClassTimetable::find($id);
        dnd($timetable);
        $timetable->delete();
        Session::set('submitError', 'Row Deleted Successfully Deleted');
        Util::redirect("admin/view-class-timetable");
    }
    public function deleteTimetableLecturer($id)
    {
        $timetable = (object) ClassTimetableLecturers::find($id);
        dnd($timetable);
        $timetable->delete();
        Session::set('submitError', 'Row Deleted Successfully Deleted');
        Util::redirect("admin/view-timetable");
    }
    public function updateClass($id)
    {
        $timetable = (object) ClassTimetable::find($id);
        $this->request($timetable, false);
        $timetable->save();
        Session::set('submitError', 'Timetable Updated Successfully');
        self::redirect("admin/edit-class/{$id}");
    }
    public function storeExam()
    {
        $timeTable = (object) new ExamTimetable();
        $this->request($timeTable, false);
        $timeTable->save();
        Session::set('submitError','Exam timetable added ');
        self::redirect('admin/add-exam-timetable');
    }

    public function storeExamInvigilator($id)
    {
        $invigilators = new ExamTimetableInvigilators();
        $this->request($invigilators, false);
        foreach ($invigilators->invigilators as $names){
            $invigilator = new ExamTimetableInvigilators();
            if($names == '')continue;
            $invigilator->invigilators = $names;
            $invigilator->exam_timetable = $id;
            $invigilators->save();
        }
        Session::set('submitError','Invigilator added ');
        self::redirect("admin/add-invigilator/$id");
    }
    public function deleteExamTimetable($id)
    {
        $timetable = (object) ExamTimetable::find($id);
        dnd($timetable);
        $timetable->delete();
        Session::set('submitError', 'Row Deleted Successfully Deleted');
        Util::redirect("admin/view-exam-timetable");
    }

    public function deleteInvigilator($id)
    {
        $timetable = (object) ExamTimetableInvigilators::find($id);
        dnd($timetable);
        $timetable->delete();
        Session::set('submitError', 'Row Deleted Successfully Deleted');
        Util::redirect("admin/view-exam-timetable");
    }

    public function updateInvigilator($params)
    {
        if(is_string($params)){
            $id = $params;
        }else{
            $id = $params[0];
            $id2 = $params[1];
        }
        $invigilator = ExamTimetableInvigilators::find($id2);
        $this->request($invigilator, false);
        $invigilator->save();
        Session::set('submitError','Invigilator updated ');
        self::redirect("admin/add-invigilator/$id");
    }
    public function updateExam($id)
    {
        $timetable = (object) ExamTimetable::find($id);
        $this->request($timetable, false);
        $timetable->save();
        Session::set('submitError', 'Timetable Updated Successfully');
        self::redirect("admin/edit-exams/{$id}");
    }
    public function storePayment()
    {
        $payment = new Payments();
        $this->request($payment, false);
        Session::set('submitError', 'Payment added successfully');
        self::redirect("admin/add-payment");
    }


    private function address($student, $address, $type) {
        if($student->{$type} == null) {
            $addressId = $address->save();
            $student->{$type} = $addressId;
        } else {
            $address->id = $student->{$type};
            $address->save();
        }
        $student->save();
    }
}