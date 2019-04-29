<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TestCase;
class TestStep extends Model
{
    public function testCases(){
        return $this->belongsTo(TestCase::class);
    }
}
