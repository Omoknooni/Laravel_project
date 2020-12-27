@extends('layouts.app')

@section('style')
<style>
	table{
		border : 1px solid black;
		margin : 10px;
	}
	th, td{
		padding : 5px 50px;
	}
</style>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h2>Meetings</h2>
		@if(auth()->check())
		<input type="button" value="Create Meeting" onclick="location.href='{{ route('create') }}'">
		@endif
	</div>
	<div class="card-body">
		<table>
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Opening Date</th>
				<th>Views</th>
			</tr>
			@foreach($meetings as $meeting)
			<tr>
				<td><a href="{{route('show', $meeting->id)}}"><b>{{ $meeting->title }}</b></a></td>	
				<td>{{ $meeting->author }}</td>	
				<td>{{ $meeting->created_at }}</td>
				<td>{{ $meeting->v_count }}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection
