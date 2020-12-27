@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<h2>Submit</h2>
	</div>	
	<div class="card-body">
		<p>{{$group->g_name}}</p>
		<p>{{$group->endtime}}</p>
		<p>{{$group->maximum}}</p>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<h3>신청사유</h3>
	</div>
	<div class="card-body">
		<form method="post" action="{{route('submit_store', $group->g_id)}}">
		@csrf
			<input type="hidden" name="g_name" value="{{$group->g_name}}">
			<input type="hidden" name="met_id" value="{{$group->meetid}}">
			<textarea name="reason" rows="5" cols="60"></textarea>
			<input type="submit" value="신청하기">
		</form>
	</div>
</div>
@endsection
