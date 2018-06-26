<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $table = 'content';
    protected $primaryKey = "id";


    protected $fillable = ['author','catid','type','title','description','content'];

    public $timestamps = true;
   	//设置时间戳自动更新的格式
	protected function getDateFormat()
	{
		return time();
	}
}
