<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class Students extends Model {

    public $jamb_reg_no;
    public $password;
    public $first_name;
    public $surname;
    public $middle_name;
    public $phone_number;
    public $email_address;
    public $gender;
    public $religion;
    public $image;
    public $dob;
    public $nationality;
    public $blood_group;
    public $genotype;
    public $sponsor;
    public $next_of_kin;
    public $origin;
    public $contact_address;
    public $permanent_address;
    public $payment;
    public $active;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->jamb_reg_no = self::stringField(10);
        $field->password = self::passwordField();
        $field->first_name = self::nameField();
        $field->surname = self::nameField();
        $field->middle_name = self::nameField();
        $field->phone_number = self::phoneField();
        $field->email_address = self::emailField();
        $field->gender = self::stringField(6);
        $field->dob = self::dateField();
        $field->nationality = self::stringField(16);
        $field->blood_group = self::stringField(3);
        $field->genotype = self::stringField(2);
        $field->religion = self::stringField(20);
        $field->image = self::stringField(32);
        $field->sponsor = self::intField();
        $field->permanent_address = self::intField();
        $field->next_of_kin = self::intField();
        $field->origin = self::intField();
        $field->contact_address = self::intField();
        $field->payment = self::booleanField();
        $field->active = self::booleanField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}