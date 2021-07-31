<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class Lecturers extends Model {

    public $password;
    public $first_name;
    public $surname;
    public $middle_name;
    public $phone_number;
    public $email_address;
    public $image;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->password = self::passwordField();
        $field->first_name = self::nameField();
        $field->surname = self::nameField();
        $field->middle_name = self::nameField();
        $field->phone_number = self::phoneField();
        $field->email_address = self::emailField();
        $field->image = self::stringField(32);
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}