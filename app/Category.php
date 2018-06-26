<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

	protected $table = 'category';

	public $timestamps = false;

	protected $fillable = ['parentid','type','catid','catname','dirname','created_at','updated_at'];
}
