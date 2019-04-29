<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestStep extends Model
{
    protected $fillable = [
        'Name', 'Action','Exspected_Result','Execute_Date','Status','Actual_Result'
    ];
    public function testCases(){
        return $this->belongsTo(TestCase::class);
    }
}
