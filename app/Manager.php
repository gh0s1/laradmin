<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    //
    protected $table = "managers";

    public $timestamps = false;


    protected $fillable = ['username','email','password'];
}
