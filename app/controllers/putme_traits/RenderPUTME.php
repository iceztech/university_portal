<?php
namespace Zikzay\Controller\Traits;


use Zikzay\Model\Address;
use Zikzay\Model\Contacts;
use Zikzay\Model\OLevel;
use Zikzay\Model\StudentAcademicHistory;
use Zikzay\Model\Students;
use Zikzay\Model\SubjectGrades;

trait RenderPUTME
{

     public function registration ($form)
    {
        $bioData = ($form == 'bio-data' or $form == null);
        $address = ($form == 'address');
        $kin = ($form == 'next-of-kin');
        $sponsor = ($form == 'sponsor');
        $education = ($form == 'education');
        $oLevel= ($form == 'o-level');

        $student = Students::find($this->utme);
        $sponsorDetails = Contacts::find($student->sponsor);
        $kinDetails = Contacts::find($student->next_of_kin);
        $originDetails = Address::find($student->origin);
        $contactDetails = Address::find($student->contact_address);
        $perAddrDetails = Address::find($student->permanent_address);
        $eduDetails = StudentAcademicHistory::where("student = {$this->utme}")::all();
        $oLevelDetails = OLevel::where("student = {$this->utme}")::all();

        if(isset($oLevelDetails[0])) {
            $oLevelId = displayObjArray($oLevelDetails, 0, 'id');
            $firstSittings = SubjectGrades::where("o_level = '{$oLevelId}'")::all();
            $oLevelDetails[0]->subjects = $firstSittings;
        }
        if(isset($oLevelDetails[1])) {
            $oLevelId = displayObjArray($oLevelDetails, 1, 'id');
            $secondSittings = SubjectGrades::where("o_level = '{$oLevelId}'")::all();
            $oLevelDetails[1]->subjects = $secondSittings;
        }
        //dnd($oLevelDetails[0]->subjects[1 - 1]->subject.' and '.$oLevelDetails[1]->subjects[1 - 1]->subject);
        $data = [
                    'student'=>$student,
                    'sponsorDetails' => $sponsorDetails,
                    'kinDetails' => $kinDetails,
                    'originDetails' => $originDetails,
                    'contactDetails' => $contactDetails,
                    'permanentAddressDetails' => $perAddrDetails,
                    'eduDetails'=>$eduDetails,
                    'oLevelDetails'=>$oLevelDetails,
                    'bioData' => $bioData,
                    'address' => $address,
                    'kin' => $kin,
                    'sponsor' => $sponsor,
                    'education' => $education,
                    'oLevel'=>$oLevel
                ] ;

        $this->render("utme.admit-form", $data);
    }
    public function dashboard ()
    {
        $student = Students::find($this->utme);

        $data = ['student'=>$student ];
        $this->render("utme.dashboard", $data);
    }
     public function payment ()
    {
        $this->render("utme.payment", null, false, false, false);
    }

    public function preview ()
    {
        $student = Students::find($this->utme);
        $sponsor = Contacts::find($student->sponsor);
        $kin = Contacts::find($student->next_of_kin);
        $origin = Address::find($student->origin);
        $contact = Address::find($student->contact_address);
        $perAddr = Address::find($student->permanent_address);
        $edu = StudentAcademicHistory::where("student = {$this->utme}")::all();
        $oLevel = OLevel::where("student = {$this->utme}")::all();
        $firstSittings = SubjectGrades::where("o_level = '{$oLevel[0]->id}'")::all();
        $oLevel[0]->subjects = $firstSittings;
        if(isset($oLevel[1])) {
            $secondSittings = SubjectGrades::where("o_level = '{$oLevel[1]->id}'")::all();
            $oLevel[1]->subjects = $secondSittings;
        }

//      dnd( $oLevel);
//        dnd($oLevel[1]->sujects);
//        dnd($oLevel[1]);
        $data = [
                'student'=>$student,
                'sponsor' => $sponsor,
                'kin' => $kin,
                'origin' => $origin,
                'contact' => $contact,
                'permanentAddress' => $perAddr,
                'edu'=>$edu,
                'oLevel'=>$oLevel
                ];
        $html = 'lll';

        ob_start();
        $this->render("utme.preview", $data, false, false, false);
        $html = ob_get_clean();
        echo $html;
    }
    public function printOut ()
    {
        $student = Students::find($this->utme);
        $sponsor = Contacts::find($student->sponsor);
        $kin = Contacts::find($student->next_of_kin);
        $origin = Address::find($student->origin);
        $contact = Address::find($student->contact_address);
        $perAddr = Address::find($student->permanent_address);
        $edu = StudentAcademicHistory::where("student = {$this->utme}")::all();
        $oLevel = OLevel::where("student = {$this->utme}")::all();
        $firstSittings = SubjectGrades::where("o_level = '{$oLevel[0]->id}'")::all();
        $oLevel[0]->subjects = $firstSittings;
        if(isset($oLevel[1])) {
            $secondSittings = SubjectGrades::where("o_level = '{$oLevel[1]->id}'")::all();
            $oLevel[1]->sujects = $secondSittings;
        }

//      dnd( $oLevel);

        $data = [
                'student'=>$student,
                'sponsor' => $sponsor,
                'kin' => $kin,
                'origin' => $origin,
                'contact' => $contact,
                'permanentAddress' => $perAddr,
                'edu'=>$edu,
                'oLevel'=>$oLevel
                ];
        $html = 'lll';

        ob_start();
        $this->render("utme.print-out", $data, false, false, false);
        $html = ob_get_clean();
        echo $html;


        echo "
            <script>
            $(document).ready(function() {
              window.print();
            });
            </script>";
//        die();
//            let WinPrint = window.open('', '', 'left=0,top=0,width=384,height=900,toolbar=0,scrollbars=0,status=0');
//            WinPrint.document.write('".$html."');
//            WinPrint.document.close();
//            WinPrint.focus();
//        </script>
//        ";


    }
}
//any render method would be in this class