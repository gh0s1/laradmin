<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
        //

     use Notifiable;
    protected $table = "admin";

    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password',
    ];

}
