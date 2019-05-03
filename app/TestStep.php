<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TestCase;
class TestStep extends Model
{
    public $fillable = ['name','action','expected_result','test_case_id'];
    public function testCases(){
        return $this->belongsTo(TestCase::class);
    }
}
