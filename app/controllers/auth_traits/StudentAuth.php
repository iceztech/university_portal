<?php


namespace Zikzay\Controller\Traits;


use Zikzay\core\Session;
use Zikzay\libs\Hash;
use Zikzay\Model\Students;

trait StudentAuth
{
    public function student ()
    {
        $this->render("students.login", null, false, false, false);
    }

    public function loginStudent()
    {
        $username = $this->posted('username');
        $password = $this->posted('password');
        $dbStudents = Students::search('jamb_reg_no', $username);
        if($dbStudents == false) $dbStudents = Students::search('email_address', $username);
        if($dbStudents == false) $dbStudents = Students::search('phone_number', $username);



        if($dbStudents != false) {

            if (Hash::validate($password, $dbStudents->password)) {
                Session::set('student', Hash::encrypt($dbStudents->id));
                self::redirect('students/dashboard');
            }
        }Session::set('submitError', 'Incorrect Login Details');
        self::redirect('login/student');
    }

}