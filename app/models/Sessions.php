<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class Sessions extends Model {

    public $session;
    public $start_date;
    public $end_date;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->session = self::stringField(32);
        $field->start_date = self::dateField();
        $field->end_date = self::dateField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}