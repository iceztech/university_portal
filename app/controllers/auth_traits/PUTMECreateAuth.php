<?php


namespace Zikzay\Controller\Traits;


use Zikzay\core\Session;
use Zikzay\libs\Hash;
use Zikzay\Model\Students;

trait PUTMECreateAuth
{
    public function createPUTME ()
    {

        $dbStudent = Students::search('jamb_reg_no', $this->posted('jamb_reg_no'));
        $id = null;
        $student = new Students();
        $this->request($student, false);
        if($student->jamb_reg_no != null and $student->jamb_reg_no != '') {
            if($dbStudent == false) {
                $id = $student->save();
            }  else if(isset($dbStudent->id)) {
                if($dbStudent->first_name != null){

                    Session::set('submitError', 'Account Already Created, Please Login');
                    self::redirect('postUTME/jamb-verification');
                    exit();
                }



                $id = $dbStudent->id;
            }

            if ($id != false and $id != null) {
                Session::set('tmp_utme', Hash::encrypt($id));
                self::redirect('register/putme');
            }

        }
        Session::set('submitError', 'Invalid Credentials');
        self::redirect('register/jamb-verification');

    }

    public function createAccountPUTME ()
    {
        $student = Students::find(Hash::decrypt(Session::get('tmp_utme')));
        //dnd(Session::get('tmp_utme'));
        if($student != false ) {
            $this->request($student);
            $student->password= Hash::password($student->password);
            $student->save();//updating
            Session::set('utme', Session::get('tmp_utme'));
            Session::unset('tmp_utme');
            self::redirect('postUTME/payment');
            exit();
        }
        Session::set('submitError', 'Invalid Data');
        self::redirect('register/putme');
    }

    public function PUTME ()
    {
        $this->render("utme.register",null, false, false, false);
    }

    public function jambVerification ()
    {
        $this->render("utme.jamb_verification", null, false, false, false);
    }
}