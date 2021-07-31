<?php
/**
 *Description: ...
 *Created by: Isaac
 *Date: 7/23/2020
 *Time: 11:15 AM
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
define('ROOT', dirname( __DIR__));
//define('SR',  dirname($_SERVER['SERVER_NAME']));
//define('SR',  $_SERVER['HTTP_HOST']);
//define('SR',  '');
if(!isset($_SERVER['HTTP_HOST'])) {
    define('SR',  '');
} else {
    define('SR', 'http://' . $_SERVER['HTTP_HOST'] . '/university');
}
//echo SR;
//echo ROOT;
//die();
define('VERSION',  $_SERVER['VERSION']);
define('DEBUG',  $_SERVER['DEBUG']);
const


EL = PHP_EOL ,


DS = DIRECTORY_SEPARATOR,
PUBLIC_PATH = ROOT . DS . 'public',

UTME_CSS = SR .'/public/themes/utme/css/utme-app.css',
UTME_JS_CUSTOM = SR .'/public/themes/utme/js/utme-app.js',
USER_ASSET_PATH = SR .'/public/assets/user/',
UTME_ASSET_PATH = SR .'/public/assets/utme/',
UTME_IMG = SR .'/public/assets/utme/img/',
UTME_JS = SR .'/public/assets/utme/js/',

USER_THEMES_PATH = SR .'/public/themes/user/',
FRONT_ASSET_PATH = SR .'/public/assets/front/',

//    Lecturers Path
ADMIN_CSS = SR .'/public/themes/admin/css/app.css',
ADMIN_JS_CUSTOM = SR .'/public/themes/admin/css/app.js',
ADMIN_ASSET_PATH = SR .'/public/assets/utme/',
ADMIN_JS = SR .'/public/assets/utme/js/',
//End Lecturers path

THEMES_PATH = SR .'/public/themes/',
//ADMIN_JS = SR .'/public/assets/admin/js/',
ADMIN_PLUGINS = SR .'/public/assets/admin/plugins/',
ADMIN_IMG = SR .'/public/assets/admin/img/',

ADMIN_CSS_APP = SR .'/public/themes/css/admin-app.css',
ADMIN_JS_APP = SR .'/public/themes/js/admin-app.js',


FRONT_JS = SR .'/public/assets/user/js/',
FRONT_PLUGINS = SR .'/public/assets/user/plugins/',
FRONT_STATIC_IMG = SR .'/public/assets/user/images/',
FRONT_CSS = SR .'/public/themes/css/app.css',


IMG_PATH = SR .'/public/res/img/',
IMG_UPLOAD_PATH = PUBLIC_PATH . DS .'res' . DS . 'img' .DS,
IMG_PLACEHOLDER = SR .'/public/assets/admin/img/placeholder.jpg',
IMG_PLACEHOLDER_USER = SR .'/public/assets/admin/img/user.jpg',
CSS_PATH = PUBLIC_PATH . DS. 'themes' . DS . 'css' . DS . 'app.css',
VIDEO_PATH = PUBLIC_PATH . DS .'res' . DS . 'video',


MODELS_PATH = ROOT . DS . 'app' . DS .'models',
VIEWS_PATH = ROOT . DS . 'app' . DS .'views',
FORM_ERROR = VIEWS_PATH . DS .'templates' . DS . 'util' . DS . 'form-error.php',
CONTROLLERS_PATH = ROOT . DS . 'app' . DS .'controllers',
MIGRATIONS_PATH = ROOT.DS.'app'.DS.'src'.DS.'database'.DS.'migrations',



DEFAULT_METHOD = 'index',
DEFAULT_CONTROLLER = 'Home',
DEFAULT_LAYOUT = 'default',

MOBILE_NETWORKS = ['MTN' => 1, 'AIRTEL' => 2, 'GLO' => 3, '9MOBILE' => 4],

    NAIRA = '₦',

SITE_TITLE = 'ZIKZAY Framework',
MENU_BRAND = 'ZIKZAY',



REMEMBER_ME_COOKIE_EXPIRY = 2592000,
COOKIE_LIFETIME = 36*5,
SESSION_LIFETIME = 3600 * 24,
SESSION_PREFIX = 'zik_',
COOKIE_PREFIX = 'zik_',

HASH_KEY = '$2y$10$hxsezYF6/nLrqzO7NXQLiOnbSFe16jgJaBoQpERY5ZdTTwlt0RHlu',
PAYSTACK_PRIVATE_KEY = "Wakn4imczQAPLAMNaOEQukYGiyx+qoiM3xkge+h3Up/+cxIzhfhiRID6DaQydaVqANhz0D/OzWTWdnXMXoMlM+ZagnJRPrCsvrnQY0Y/9u6SD2awZF132Kp9fU01en4h",

AIMTOGET_PRIVATE_KEY = "+Mr5lPjNTCu1CxeRK26GV9hHE3TfIbM/NwTMQ56P68VjiTZx7wmuyiX2Lvz/fCmnicKe/Nx9/ciq0Md0tx76/nDRrT1xLiPlV1RB8uc8pK3rnKUbU2le5nFLTso3JEEv",
AIMTOGET_PUBLIC_KEY = "qIkNjaXRjzG/PpQAdiD8T1GxMqqfKKuZV3LiGRIbZ1y37SO0RAWW+f3nukhFO3DHBZopuKn4NO0e+Ck/PmqGPl/qtJQ2ytCyoeihqgAZ70w=",
AIMTOGET_WALLET_PIN = "x4hLqLvNForxBCJL5o7wQWb7Ab6QozKAKOd+OVbWcTM=",

FLUTTER_WAVE_PUBLIC_KEY = "pxhNbAJcebz6JQ9P83k+EAFGeKxuS5KK2n9aL7ggLKOcPlobu7S0ICAYlMU+lZVoIPMBQYjjPANBIevJ1HE/Gg==",
FLUTTER_WAVE_SECRET_KEY = "ycayXueyUiPadxp8UDTDJ7e+VybrriUf0cT1pEW3J1AVGN1hZHCM+OKpeL7d+6Nw3CEjqGOIzLl9wU7LWyyODA==",
FLUTTER_WAVE_ENCRYPTED_KEY = "DnnSCxoUAoQn86XEtMqo8UTd4v8FOCCCyheuibUJ5pAHbmc9XrPOxVsYfHe8umNF",

    //MONIFY_API_KEY = "krrZkbKtbcBi85BIGbZ8j+hvc/wgc+r0WLqUZSjOrSt0mYZmZRTJAEvk9PFPsvcj",
MONIFY_API_KEY = "P004EpgstdcH+KrTF2JCpGjbcbCMRCTwQtrlvbSFDNJSw+uu8eCjM3tg4BpArSzC",
    //MONIFY_SECRET_KEY = "kgCO0gqDX343vM7212fLBTZVBCofATPx0aLEz9yR3GVzGcPqh9B1RUK9USuTHMYmasT0xMVwZao80JJquyozhg==",
MONIFY_SECRET_KEY = "AwwSISRoDPr9133RuWfc5ZsvSeoLNqqUkkBWjdV2Nh3iIgSzmxtJpaGV1BJBxvLMvSy4b2HafobQ/hjLKWG5pw==",
MONIFY_BASE_URL = "FtLnjdYHgFHotD1f/jAAaBHpyiJVNzj74BfMPImselaDJU8Wcub0erA5LUdijT+g",
    //MONIFY_CONTRACT_CODE = "4GDqMYoPEMpevyBsW9e+XPwtRAZcg989oyvWlpq3rPw=",
MONIFY_CONTRACT_CODE = "MfOBYurfH2vwx0Q5R2xiD9OUhzg+9k8f90h8LNc8/Us=",

VTPASS_USERNAME = "UboiNUKU9XTtouDfj70kxba9gxeunc+0HFDZdZTpCyv3HWp7pbnEzMIErl2lYift",
VTPASS_PASSWORD = "oTALmu9gDCEKtn/mUlQJNPV+ESLZMIJabp4JU3ShTmh+9L8/IL6ep5dBaXijZs/i",

SMART_SMS_TOKEN  = "cyRS9QMPHOl1RYQMszEgozcuS9KhUhsdVhFNzDaLjxYTVGOFg5L+N9vgUV2nwF6H/nYXI2zHahLz13ruRdTCofkIUbI+yl2sRsyHCn0nOWQ9NCs7oH273oj7mlQa6vQ2KJ2X07qQG65CGk3o/BdYWeWCGXKevxYh3r+5XbhHpGA=", //Zikzay's Token

//EMAIL_ID  = "XLiQrvUexB2irvqJKkjcsZUZKdtG4jQxmPFMbXNRc46VEJk92MwmP52eN03hRuZu",
//EMAIL_PASSWORD  = "c2tr1vg8x+8UM/ycPN9MsCeds9X/zlfh74Ew6hVftc8=",
EMAIL_ID  = "CuI5PbNSOZvxw7U4rCMUTAiJPSMlaThEQRc654l4tw8=",
EMAIL_PASSWORD  = "G0JjZXWkmEwtiVxijkndRJG0XmcKYcXTGXNbHyqTflaqLBxQJ95B3NXNOsIDkyXh",

USER_PAY_CARD_TRANSACTION_CHARGE = false;









if (!function_exists('is_countable')) {
    function is_countable($var) { return is_array($var) || $var instanceof Countable || $var instanceof ResourceBundle || $var instanceof SimpleXmlElement; }
}
if (!function_exists('array_key_first')) {
    function array_key_first(array $array) { foreach ($array as $key => $value) { return $key; } }
}
if (!function_exists('array_key_last')) {
    function array_key_last(array $array) { end($array); return key($array); }
}
function dnd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function display($value1, $value2 = '') {
    if(isset($value1)) {
        if(!empty($value1)) {
            return $value1;
        }
    }
    return $value2;
}
function displayObj($object, $property) {
    return isset($object->$property) ? $object->$property : '';
}
function displayObjArray($object, $index, $property) {
    return isset($object[$index]->$property) ? $object[$index]->$property : '';
}
function displayObjProp($object, $property, $sub_property) {
    return isset($object->$property->$sub_property) ? $object->$property->$sub_property : '';
}
function displayArrayObj($object, $index, $property) {
    return isset($object->$property[$index]) ? $object->$property[$index] : '';
}
function convertDate ($date){
   $newDate = date('d/m/Y', strtotime($date));
   return $newDate;
}
function convertTime ($time){
   $newTime = date('d/m/Y', strtotime($time));
   return $newTime;
}

require_once ROOT . DS .'config' . DS . 'lang.php';



$user_first_name = null;
$user_surname = null;
$user_email_address = null;
$user_phone_number = null;
$show_bank_account = false;

