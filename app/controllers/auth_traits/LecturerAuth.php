<?php


namespace Zikzay\Controller\Traits;


use Zikzay\core\Session;
use Zikzay\libs\Hash;
use Zikzay\Model\Lecturers;

trait LecturerAuth
{
    public function lecturer ()
    {
        $this->render("lecturers.login", null, false, false, false);
    }

    public function loginLecturer()
    {
        $password = $this->posted('password');
        $username = $this->posted('username');
        $dbLecturers = Lecturers::search('email_address', $username);

        if($dbLecturers != false) {

            if (Hash::validate($password, $dbLecturers->password)) {
                Session::set('lecturer', Hash::encrypt($dbLecturers->id));
                self::redirect('lecturers/dashboard');
            }
        }Session::set('submitError', 'Incorrect Login Details');
        self::redirect('login/lecturer');
    }

}