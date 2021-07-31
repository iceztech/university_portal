<?php
namespace Zikzay\Controller;


use Zikzay\Controller\Traits\AdminAuth;
use Zikzay\Controller\Traits\LecturerAuth;
use Zikzay\Controller\Traits\PUTMEAuth;
use Zikzay\Controller\Traits\StudentAuth;
use Zikzay\Core\Controller;
use Zikzay\Lib\Util;
use Zikzay\Model\Login;

class LoginController extends Controller
{
    use AdminAuth;
    use LecturerAuth;
    use StudentAuth;
    use PUTMEAuth;

    public function __construct()
    {
        parent::__construct();
    }
}