<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class Paystack extends Model {

    public $reference;
    public $amount;
    public $confirm;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->reference = self::stringField(16);
        $field->amount = self::intField();
        $field->confirm = self::booleanField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}