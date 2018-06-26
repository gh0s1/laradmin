<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
	public function info(Request $request,$item=null,$action=null)
	{
		if($request->isMethod("POST"))
		{
			//首先判断是第一次插入数据还是更新数据
			$infos = DB::table('site_info')->select($action)->first();

			$data[$action] = $request->input("info")[$action];
			$data['updated_at'] = time();
			
			if(!empty($infos))
			{

				$affectedRows = $this->update($action,$data);

			}
			else
			{
				$data['created_at'] = time();

				$affectedRows = $this->add($action,$data);
			}

			if($affectedRows > 0)
			{
				return back();
			}

		}

		$data = DB::table('site_info')->get();
		if($item == 'info')
		{
			return view("admin.info.info",['data'=>$data[0]]);
		}
		elseif($item == 'seo')
		{
			return view("admin.info.seo",['data'=>$data[0]]);
		}
	}

	/*
	public function seo()
	{

		return view("info.seo");
	}

	*/
	public function add($action,$data)
	{
		$data['created_at'] = time();
		//$sql  = "insert into site_info(".implode(",",array_keys($data)).") values(".implode(",",$data).")";
		$affectedRows = DB::insert("insert into site_info ($action, created_at , updated_at) values (?, ?,?)", [$data[$action],$data['created_at'],$data['updated_at']]);

		return $affectedRows;

	}

	public function update($action,$data)
	{
		$affectedRows = DB::update(
			"update site_info set $action = ?, updated_at = ? where id = ?",
			 [$data[$action],$data['updated_at'],1]
		);

		return $affectedRows;
	}

}

?>