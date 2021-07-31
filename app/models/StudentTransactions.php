<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class StudentTransactions extends Model {

    public $student;
    public $amount;
    public $purpose;
    public $description;
    public $status;
    public $reference;
    public $source;
    public $source_reference;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->student = self::intField();
        $field->amount = self::intField();
        $field->purpose = self::stringField();
        $field->description = self::stringField();
        $field->status = self::stringField(16);
        $field->reference = self::stringField(16);
        $field->source = self::stringField(16);
        $field->source_reference = self::stringField(64);
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}