<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\Meeting;
use App\Apply;

class SubmitController extends Controller
{
	public function create(Group $group){
		return view('submit',['group'=>$group]);
	}

	public function store(Request $request, Group $group){
		//apply에 추가, meeting 신청자  수 증가
		$member_name=Auth::user()->name;
		$member_email=Auth::user()->email;
		$met_id=request()->input('met_id');
		$group_name=request()->input('g_name');
		$reason=request()->input('reason');
		
		Apply::create([
			'met_id'=>$met_id,
			'group_name'=>$group_name,
			'member_name'=>$member_name,
			'member_email'=>$member_email,
			'reason'=>$reason
		]);

		Meeting::where('id', $met_id)->increment('total');
		Group::where('meetid', $met_id)->where('g_name', $group_name)
			->increment('current');
		return redirect()->action('MeetingController@index');
	}

	public function __construct(){
		return $this->middleware('auth');
	}
}
