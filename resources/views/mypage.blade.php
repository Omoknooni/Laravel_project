@extends('layouts.app')
@section('style')
<style>
	table{
		border: 1px solid black;
		margin: 10px;
	}

	th,td{
		padding: 5px 50px;
	}
</style>
@endsection
@section('content')
<div class="card">
	<div class="card-header"><h2>MyPage</h2></div>
	<div class="card-body">
		<h3>Meeting List</h3>
		<table>
			<tr>
				<th>Title</th>
				<th>Opening Date</th>
				<th>Views</th>
			</tr>
			@foreach($meetings as $meeting)
			<tr>
				<td>{{$meeting->title}}</td>
				<td>{{$meeting->created_at}}</td>
				<td>{{$meeting->v_count}}</td>
			</tr>
			@foreach($applicants as $applicant)
			<tr>
				<td>{{$applicant->group_name}}</td>
				<td>{{$applicant->member_name}}</td>
				<td><input type="button" value="승인"></td>
			</tr>
			@endforeach
			@endforeach
		</table><br>
		<h3>Submitted Meeting</h3>
		<table>
			<tr>
				<td>Group name</td>
				<td>Status</td>	
				<td> </td>
			</tr>
			@foreach($applies as $apply)
			<tr>
				<td>{{$apply->group_name}}</td>
				<td> O </td>
				<td><input type="button" value="취소"></td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection
