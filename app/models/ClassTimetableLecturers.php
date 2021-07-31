<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class ClassTimetableLecturers extends Model {

    public $class_timetable;
    public $lecturers;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->class_timetable = self::intField();
        $field->lecturers = self::stringField(32);
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}