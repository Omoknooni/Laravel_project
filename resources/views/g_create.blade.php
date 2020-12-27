@extends('layouts.app')
@section('script')
<script type="text/javascript">
	var cnt=0;
	function get_today(){
		var today=new Date();
		var year=today.getFullYear();
		var month=new String(today.getMonth()+1);
		var day=new String(today.getDate());

		if(month.length==1){
			month="0"+month;
		}
		if(day.length==1){
			day="0"+day;
		}	
		return year+"-"+month+"-"+day;
	}
	
	function add_group(){
		if(cnt<10){
			var group_div=document.getElementById("group_div");
			var str="";
			str+="<br>그룹 이름 #"+cnt+" <input type='text' name='gname"+cnt+"'>";
			str+="<br>마감기간 #"+cnt+"<input type='date' min='"+get_today()+"' name='endtime"+cnt+"'>";	//기간 제한 설정하기
			str+="<br>최대인원 # "+cnt+"<input type='number' min='1' name='max"+cnt+"'><br>";

			var formarea=document.createElement("div");
			formarea.id="group_"+cnt;
			formarea.innerHTML=str;
			group_div.appendChild(formarea);

			cnt++;
			document.group_form.cnt.value=cnt;
		}
		else{
			alert('최대 생성가능한 그룹은 10개입니다.');
		}
	}	

	function rm_group(){
		var group_div=document.getElementById("group_div");
		if(cnt>1){
			var formarea=document.getElementById("group_"+(--cnt));
			group_div.removeChild(formarea);
		}	
		else{
			document.group_form.reset();
		}
	}
</script>
@endsection

@section('content')
<div class="card" onload>
	<div class="card-header"><h2>#2. Create Groups</h2></div>
	<div class="card-body">
		<form method="post" name="group_form" action="{{ route('g_store') }}">
		@csrf
			<input type="hidden" name="mid" value="{{$meeting->id}}">
			<input type="hidden" name="cnt" value="0">
			<input type="button" value="그룹 추가" onclick="add_group()">
			<input type="button" value="그룹 삭제" onclick="rm_group()">
			<input type="submit" value="생성 완료">
			<div id="group_div" ></div><br>
		</form>
	</div>
</div>
@endsection
