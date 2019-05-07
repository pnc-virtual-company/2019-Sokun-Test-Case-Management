<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TestCase;
class TestStep extends Model
{
    public $fillable = ['name','action','expected_result','executed_date','test_case_id','status','actual_result'];
    public function testCases(){
        return $this->belongsTo(TestCase::class);
    }
}
