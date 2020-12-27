<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Meeting;
use App\Group;
use App\Apply;
use App\Http\Controllers\GroupController;

class MeetingController extends Controller
{
	public function index(){
		//종료되지않은 meeting만 가져오기 (서브쿼리)
		$meetings=Meeting::orderBy('total', 'desc')
				->orderBy('v_count', 'desc')
				->orderBy('created_at', 'desc') 
				->get();		//신청자수->조회수->최신 순
		return view('index', ['meetings' => $meetings]);
	}

	public function create(){
		return view('create');
	}

	public function store(Request $request){
		$id=Auth::user()->name;

		$meeting=Meeting::create([
			'author'=> $id,
			'title'=>$request->input('title'),
			'contents'=>$request->input('content')
		]);
		return view('g_create', ['meeting'=>$meeting]);	
	}

	public function show(Meeting $meeting){
		$user=Auth::user()->name;
		$id=$meeting->id;
		Meeting::where('id',$id)->increment('v_count');
		$groups=Group::where('meetid', $id)->get();
		$applies=Apply::where('met_id', $id)->get();
		return view('view', ['meeting'=>$meeting, 'groups'=>$groups, 'applies'=>$applies, 'name'=>$user]);
	}

	public function __construct(){
		return $this->middleware('auth');
	}

}
