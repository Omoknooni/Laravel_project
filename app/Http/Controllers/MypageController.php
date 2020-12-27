<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Meeting;
use App\Apply;

class MypageController extends Controller
{
	public function index(){
		$name=Auth::user()->name;
		$query=Meeting::where('author', $name)->get();
		$query2=Apply::where('member_name', $name)->get();

		$list_query=Meeting::where('author', $name)->pluck('id');
		$list_query2=Apply::where('met_id', $list_query)->get();
		return view('mypage', ['meetings'=>$query, 'applicants'=>$list_query2, 'applies'=>$query2]);
	}

	public function cancel(){
		return redirect()->action("MypageController@index");
	}
}
