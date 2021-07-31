<?php
/**
 *Description: ...
 *Created by: Isaac
 *Date: 7/23/2020
 *Time: 8:11 PM
 */

namespace Zikzay\Core;

use Zikzay\core\Session;
use Zikzay\http\Request;
use Zikzay\Lib\Util;
use Zikzay\core\FileUpload;
use Zikzay\core\Cookie;
use Zikzay\libs\Hash;
use Zikzay\Model\Users;

class Controller
{
    protected $controller, $method;
    public $view;
    protected $request;
    protected $utme;
    protected $student;
    protected $admin;
    protected $lecturer;
    public static $mobileApiCall;



    public function __construct()
    {
        $this->utme = Session::has('utme') ? Hash::decrypt(Session::get('utme')) : $this->posted('utme');
        $this->student = Session::has('student') ? Hash::decrypt(Session::get('student')) : $this->posted('student');
        $this->admin = Session::has('admin') ? Hash::decrypt(Session::get('admin')) : $this->posted('admin');
        $this->lecturer = Session::has('lecturer') ? Hash::decrypt(Session::get('lecturer')) : $this->posted('lecturer');
    }

    protected function guide(...$users) {

        $access = false;
        $guest = false;
        foreach ($users as $user) {
            if(Session::has($user)){
                $access = true;
            }
            if($user == 'guest'){
                $guest = true;
                break;
            }
        }

        if(!$access and !$guest) {
            Session::set('submitError','Please Login');
            $page = $users[array_key_last($users)];

            if(count($users) == 1) $page = 'login/student';

            self::redirect($page);
            exit();
        }

    }

    protected function load_model($model) {
        if(class_exists($model)) {
            $this->{$model.'Model'} = new $model(strtolower($model));
        }
    }

    protected function render($page, $params = null, $sideNav = true, $header = true, $footer = true) {
        Cookie::set('mobileApiCall', 'yes');
        $page = str_replace('.', '/', $page);
        View::render($page, $params, $sideNav, $header, $footer);
        Session::unset('submitError');
    }

    public function request($model, $unique = true, $array = true) : array
    {
        $this->request = Request::request($model, $unique, $array);
        return $this->request;
    }

    protected function apiModel($model, $message = 'Success')
    {
        Util::$status = true;
        Util::$message = $message;
        Util::object_result($model);
    }

    protected function apiData($data, $message = 'Success')
    {
        Util::$status = true;
        Util::$message = $message;
        Util::$data = $data;
        Util::process_result();
    }
    protected function apiFailed($message = 'Failed', $data = null)
    {
        Util::$message = $message;
        Util::$data = $data;
        Util::process_result();
    }

    protected function imageUpload($folder, $optional = false)
    {
        $images = [];
        foreach ($_FILES as $key => $value) {
            $data = FileUpload::image($key, IMG_UPLOAD_PATH.$folder);
            if(is_array($data)) {
                if(!$optional) {
                    if ($data[0] === false) {
                        $error = isset($data[1]) ? $data[1] : 'Error in image upload';
                        Session::set('formIdsError', [$key => $error]);
                        Util::$data = Session::get('formError');
                        //            Util::$message = 'Failed';
                        //            Util::process_result();

                        ?>
                        <script>
                            window.location.href = document.referrer
                        </script><?php

                        exit();
                    }
                }
                $images += $data;
            } else {

                $images = $data;
            }
        }
        return $images;
    }

    protected static function redirect($page) {
        Util::redirect($page);
        exit();
    }

    protected function posted($name) {
        return (isset($_POST[$name]) and !empty($_POST[$name])) ? $_POST[$name] : null;
    }

    protected function get($name) {
        return (isset($_GET[$name]) and !empty($_GET[$name])) ? $_GET[$name] : null;
    }
    protected function decryptUrl($param) {

        return is_array($param)
            ?  Hash::decrypt(implode('/', str_replace(' ', '+', $param)))
            :  Hash::decrypt(str_replace('`', '/', str_replace(' ', '+', $param)));
    }
}



