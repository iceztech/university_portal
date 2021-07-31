<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class Semesters extends Model {

    public $session;
    public $semester;
    public $start_date;
    public $end_date;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->session = self::intField();
        $field->semester = self::stringField(34);
        $field->start_date = self::dateField();
        $field->end_date = self::dateField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}