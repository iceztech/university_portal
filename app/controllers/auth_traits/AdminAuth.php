<?php


namespace Zikzay\Controller\Traits;


use Zikzay\core\Session;
use Zikzay\libs\Hash;
use Zikzay\Model\Admin;

trait AdminAuth
{

    public function admin()
    {
        $this->render("admin.login", null, false, false, false);
    }

    public function loginAdmin()
    {
        $password = $this->posted('password');
        $username = $this->posted('username');
        $dbAdmin = Admin::search('email_address', $username);

        if($dbAdmin != false) {

            if (Hash::validate($password, $dbAdmin->password)) {
                Session::set('admin', Hash::encrypt($dbAdmin->id));
                self::redirect('admin/dashboard');
            }
        }Session::set('submitError', 'Incorrect Login Details');
        self::redirect('login/admin');
    }
}