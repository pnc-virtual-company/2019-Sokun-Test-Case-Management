<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TestCase;
class Campaign extends Model
{
    public $fillable = ['name','start_date','end_date','description','status'];
    // one to many relationship between compaign and and testcase
    public function testCases(){
        return $this->hasMany(TestCase::class);
    }
}
