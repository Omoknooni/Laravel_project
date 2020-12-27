<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Meeting;
class GroupController extends Controller
{
	public static function create(){
		return view('g_create');
	}

	public function store(Request $request,Meeting $meeting){
		$input=$request->all();
		$group_list=[];
		$cnt=$request->input('cnt');
		$meetid=$request->input('mid');

		for($i=0;$i<$cnt;$i++){
			$group=[];
			$name=$request->input('gname'.$i);
			$endtime=$request->input('endtime'.$i);
			$max=$request->input('max'.$i);
			array_push($group, $name, $endtime, $max);
			array_push($group_list, $group);
			DB::table('g_list')->insert(
				['meetid'=> $meetid, 'g_name'=>$name, 'endtime'=>$endtime, 'current'=>'0', 'maximum'=>$max]);
		}	
		return redirect()->action('MeetingController@index');
	}
}
