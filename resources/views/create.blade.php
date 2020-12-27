@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<h2>#1. Create Meeting</h2>
	</div>
	<div class="card-body">
		<form method="post" action="{{ route('store') }}">
		@csrf	
			<p><label for="title">Meeting Name : </label>
			<input type="text" id="title" name="title" required placeholder="모임 이름"></p>
			<p><label for="mt_content">Content</label>
			<textarea name="content" rows="5" cols="80"></textarea></p>
			<input type="submit" value="제출">
		</form>
	</div>
</div>
@endsection
