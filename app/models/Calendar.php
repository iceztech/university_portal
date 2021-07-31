<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class Calendar extends Model {

    public $semester;
    public $date;
    public $activity;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->semester = self::intField();
        $field->date = self::dateField();
        $field->activity = self::stringField(55);
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}