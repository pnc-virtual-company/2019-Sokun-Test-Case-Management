<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    
    // one to many relationship between compaign and and testcase
    public function testCases(){
        return $this->hasMany(testCase::class);
    }
}
