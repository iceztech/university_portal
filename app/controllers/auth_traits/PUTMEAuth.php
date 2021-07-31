<?php


namespace Zikzay\Controller\Traits;


use Zikzay\core\Session;
use Zikzay\libs\Hash;
use Zikzay\Model\Students;

trait PUTMEAuth
{
    public function loginPUTME()
    {
        $password = $this->posted('password');
        $username = $this->posted('username');
        $dbStudent = Students::search('jamb_reg_no', $username);


        if($dbStudent == false) $dbStudent = Students::search('email_address', $username);
        if($dbStudent == false) $dbStudent = Students::search('phone_number', $username);


        if($dbStudent != false) {

            if (Hash::validate($password, $dbStudent->password)) {
                if ($dbStudent->payment != null) {

                    Session::set('utme', Hash::encrypt($dbStudent->id));
                    if($dbStudent->active == null){
                        Session::set('submitError', 'Please Complete Registration and Hit the Save Button');
                        self::redirect('postUTME/registration');
                    }
                    self::redirect('postUTME/dashboard');

                } else {
                    Session::set('submitError', 'Kindly make payment to activate account');
                    self::redirect('postUTME/payment');
                }
            }
        }
        Session::set('submitError', 'Incorrect Login Details');
        self::redirect('login/putme');



    }

    public function PUTME ()
    {
        $this->render("utme.login", null, false, false, false);
    }

}