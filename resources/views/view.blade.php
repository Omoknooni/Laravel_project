@extends('layouts.app')
@section('style')
<style>
	table{
		text-align: center;
	}
	
	td {
		width: 200px;
	}
</style>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
		<span><h2>{{ $meeting->title }}</h2></span> <span><h4>Created at {{$meeting->created_at}}</h4></span>
	</div>
	<div class="card-body">{{ $meeting->contents }}</div>
</div>
<div class="card">
	<div class="card-header">
		<h2>GROUP List</h2>
	</div>
	<div class="card-body">
		<table class="g_list">
			<tr>
				<td>Group name</td>
				<td>Endtime</td>
				<td>Current</td>
				<td>Maximum</td>
				<td> </td>
			</tr>
			@foreach($groups as $group)
			<tr>
				<td>{{$group->g_name}}</td>
				<td>{{$group->endtime}}</td>
				<td>{{$group->current}}</td>
				<td>{{$group->maximum}}</td>
				<td>
				@foreach($applies as $apply)
					@if($apply->group_name == $group->g_name)
						@if($apply->member_name == $name)
						<input type="button" value="신청됨" disabled>
						@endif
					@endif
				@endforeach
				<input type="button" value="신청" onclick="location.href='{{route('submit_create', $group->g_id)}}'">
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection
