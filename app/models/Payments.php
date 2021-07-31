<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class Payments extends Model {

    public $purpose;
    public $amount;
    public $late_payment;
    public $late_payment_amount;
    public $level;
    public $faculty;
    public $department;
    public $active;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->purpose = self::stringField(55);
        $field->amount = self::intField();
        $field->late_payment = self::dateField();
        $field->late_payment_amount = self::intField();
        $field->level = self::intField();
        $field->faculty = self::intField();
        $field->department = self::intField();
        $field->active = self::intField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}