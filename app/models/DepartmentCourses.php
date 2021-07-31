<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class DepartmentCourses extends Model {

    public $course;
    public $level;
    public $department;
    public $credit_load;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->course = self::intField();
        $field->level = self::intField();
        $field->department = self::intField();
        $field->credit_load = self::intField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}