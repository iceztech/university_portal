<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class StudentAcademicHistory extends Model {

    public $student;
    public $qualification;
    public $institution;
    public $start_year;
    public $end_year;
    public $type;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->student = self::intField();
        $field->qualification = self::stringField(32);
        $field->institution = self::stringField(255);
        $field->start_year = self::yearField();
        $field->end_year = self::yearField();
        $field->type = self::stringField(32);
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}