<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class ExamTimetableInvigilators extends Model {

    public $exam_timetable;
    public $invigilators;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->exam_timetable = self::intField();
        $field->invigilators = self::stringField(55);
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}