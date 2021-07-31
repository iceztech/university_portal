<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class Contacts extends Model {

    public $name;
    public $phone_number;
    public $email_address;
    public $address;
    public $relationship;
    public $type;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->name = self::nameField(300);
        $field->phone_number = self::phoneField();
        $field->email_address = self::emailField();
        $field->address = self::textField();
        $field->relationship = self::stringField(24);
        $field->type = self::stringField(16);
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}