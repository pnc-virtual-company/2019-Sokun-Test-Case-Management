<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campaign;
use App\TestStep;
class TestCase extends Model
{

    // one to many relationship between compaign and and testcase
    public function campaigns(){
        return $this->belongsTo(Campaign::class);
    }
    public function testSteps(){
        return $this->hasMany(TestStep::class);
    }

}
