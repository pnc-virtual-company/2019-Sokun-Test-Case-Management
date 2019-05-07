<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campaign;
use App\TestCase;
class TestCase extends Model
{
    protected $table="test_cases";
    protected $fillable=['name','creator','description','campaign_id'];
    // one to many relationship between compaign and and testcase
    public function campaigns(){
        return $this->belongsTo(Campaign::class);
    }
    public function testSteps(){
        return $this->hasMany(TestStep::class);
    }

}
