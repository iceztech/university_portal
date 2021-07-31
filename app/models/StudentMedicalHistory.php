<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class StudentMedicalHistory extends Model {

    public $student;
    public $medical_problem;
    public $comment;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->student = self::intField();
        $field->medical_problem = self::intField();
        $field->comment = self::textField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}