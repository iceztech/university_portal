<?php
namespace Zikzay\Controller;
use Zikzay\Controller\Traits\AdminCreateAuth;
use Zikzay\Controller\Traits\LecturerCreateAuth;
use Zikzay\Controller\Traits\PUTMECreateAuth;
use Zikzay\Controller\Traits\StudentCreateAuth;
use Zikzay\Core\Controller;
use Zikzay\Lib\Util;
use Zikzay\Model\Register;

class RegisterController extends Controller
{
    use AdminCreateAuth;
    use LecturerCreateAuth;
    use StudentCreateAuth;
    use PUTMECreateAuth;

    public function __construct()
    {
        parent::__construct();
    }

}