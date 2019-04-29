<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'Name', 'start_Date', 'End_Date','Description','Status'
    ];

    
    // one to many relationship between compaign and and testcase
    public function testCases(){
        return $this->hasMany(testCase::class);
    }
}
