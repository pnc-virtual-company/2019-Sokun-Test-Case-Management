<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Compaign;
use App\testStep;
class TestCase extends Model
{
    protected $fillable = [
        'Name', 'Creator','Description','status'
    ];

    
    // one to many relationship between compaign and and testcase
    public function campaigns(){
        return $this->belongsTo(Campaign::class);
    }
    public function testSteps(){
        return $this->hasMany(testStep::class);
    }

}
