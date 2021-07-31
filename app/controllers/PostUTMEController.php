<?php
namespace Zikzay\Controller;


use Zikzay\Controller\Traits\RenderPUTME;
use Zikzay\Core\Controller;
use Zikzay\core\Session;
use Zikzay\Lib\Util;
use Zikzay\libs\Hash;
use Zikzay\Model\Address;
use Zikzay\Model\Contacts;
use Zikzay\Model\OLevel;
use Zikzay\Model\StudentAcademicHistory;
use Zikzay\Model\Students;
use Zikzay\Model\SubjectGrades;

class PostUTMEController extends Controller
{
    use RenderPUTME;

    public function __construct()
    {
        parent::__construct();
        $this->guide('utme', 'login/putme');
    }

    public function reset()
    {
        self::redirect('postUTME/registration');
    }
    public function savePUTME()
    {
        $student = Students::find($this->utme);
        $student->active = 1;
        $student->save();
        self::redirect('postUTME/dashboard');
    }

    public function submitBioData()
    {
        $image = $this->imageUpload('utme', true);
        $address = new Address();
        $this->request($address, false);
        $address->type = 'origin';

        $student = Students::find($this->utme);
        $student->image = $image;
        if($student->origin == null) {
            $addressId = $address->save();
            $student->origin = $addressId;
            $student->nationality = $address->country;
        } else {
            $address->id = $student->origin;
            $address->save();
            $student->nationality = $address->country;
        }
        $this->request($student, false);
        $student->save();

        self::redirect('postUTME/registration/address');
    }

    public function submitAddress()
    {
        $address = new Address();
        $this->request($address, false, true);
       // dnd( $address);

        for ($i = 0; $i < count($address->address); $i++) {
            $addr = new Address();
            $addr->address = $address->address[$i];
            $addr->town = $address->town[$i];
            $addr->state = $address->state[$i];
            $addr->country = $address->country[$i];

            $student = Students::find($this->utme);
            if($i == 0) {
                $addr->type = 'contact';
                $this->address($student, $addr, 'contact_address');
            } else {
                $addr->type = 'permanent';
                $this->address($student, $addr, 'permanent_address');
            }
        }
        self::redirect('postUTME/registration/next-of-kin');
    }

    public function submitKinDetails()
    {
        //dnd($_POST);
        $contacts = new Contacts();
        $this->request($contacts, false);
        $contacts->type = 'Next Of Kin';
        $student = Students::find($this->utme);

        if ($student->next_of_kin == null) {
            $contactsId = $contacts->save();
            $student->next_of_kin = $contactsId;
        }else{
            $contacts->id =  $student->next_of_kin;
            $contacts->save();
        }

        $student->save();
        self::redirect('postUTME/registration/sponsor');
    }

    public function submitSponsorDetails()
    {
        $contacts = new Contacts();
        $this->request($contacts, false);
        $contacts->type = 'Sponsor';
        $student = Students::find($this->utme);

        if ($student->sponsor == null) {
            $contactsId = $contacts->save();
            $student->sponsor = $contactsId;
        }else{
            $contacts->id = $student->sponsor;
            $contacts->save();
        }
        $student->save();
        self::redirect('postUTME/registration/education');

    }

    public function submitEducationDetails()
    {
        $education = new StudentAcademicHistory();
        $this->request($education, false);



            for ($i = 0; $i<count($education->type); $i++) {
                if ($education->qualification[$i] == null) break;
                $dbEdu = StudentAcademicHistory::where("type = '{$education->type[$i]}' AND student = '{$this->utme}'")::first();
                $edu = new StudentAcademicHistory();
                $edu->student = $this->utme;
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
        self::redirect('postUTME/registration/o-level');
    }

    public function submitOLevel()
    {
        //dnd($_POST);
        $oLevel = new OLevel();
        $this->request($oLevel, false, true);
        $levelId0 = $levelId1 = null;

        for ($i = 0; $i < count($oLevel->name); $i++) {
            if ($oLevel->name[$i] == null) break;
            $sitting = $i + 1;
            $dbOLevel = OLevel::where("student = '{$this->utme}' AND sitting = '{$sitting}'")::first();
            $level = new OLevel();
            $level->student = $this->utme;
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

        self::redirect('postUTME/preview');
    }
    public function logout(){
        Session::destroy();
        self::redirect('login/putme');
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