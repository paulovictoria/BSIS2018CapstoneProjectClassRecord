<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<style>
		.header{
		}
		.header .img{
			position: fixed;
			top: 20;
			left: 60;
		}
		.header .content{
			position: fixed;
			top: 20;
			left: 20;
			text-align: center;
			line-height: 80%;
		}
		hr{
			position: fixed;
			top: 140;
		}
		.main-container{
			position: fixed;
			top: 160; 
			font-size: small;
		}
		.main-container .head .content{
			padding-left: 10; 
			margin-bottom: 20;
		}
		table{
			border-collapse: collapse;
			width: 100%;
		}
		table, td, tr{
			border: 1px solid black;
		}
		td{
			padding: 5px;
		}
		ul{
			list-style: none;
			padding: 0;
		}
		.footer{
			position: fixed;
			bottom: 130;
			height: 130px;
			width: 100%;
			font-size: x-small;
		}
		.footer .review{
			left: 10;
			width: 40%;
		}
		.footer .certify{
			padding: 10;
			text-align: center;
			position: fixed;
			bottom: 200;
			right: 10;
			width: 40%;
		}
	</style>
</head>
<body>

	<div class="header">
		<div class="img">
			<img src="{{ asset('img/bpc-logo.jpg') }}" width="130px" height="130px">
		</div>
		<div class="content">
			<small>Republic of the Philippines</small><br><br>
			<small>Provincial Goverment of Bulacan</small>
			<p><strong>BULACAN POLYTECHNIC COLLEGE</strong></p>
			<small>Bulihan, City of Malolos</small>
			<p><strong>GRADE SHEET</strong></p>
			<small>{{$load->semester->term}}</small>
		</div>
		<hr>
	</div>

	<div class="main-container">
		<table class="head">
			<tr>
				<td>
					Instructor: {{$load->teacher->lname}}, {{$load->teacher->fname}} {{$load->teacher->mname}}
				</td>
				<td>
					Employee ID: {{$load->teacher->teacher_id}}
				</td>
			</tr>
			<tr>
				<td>
					Subject: {{$load->subject->code}} | {{$load->subject->title}}
				</td>
				<td>
					Section: {{$load->section->year}}-{{$load->section->class}}
				</td>
			</tr>
		</table>
		<br>
		<table class="content">
			<tr>
				<td>No.</td>
				<td>Name</td>
				<td>Final Grade</td>
				<td>Remarks</td>
			</tr>
			@php
				$i = 1
			@endphp
			@foreach ($secloads->where('section_id',$load->section_id)->where('semester_id',$load->semester_id)->sortBy('student.lname') as $secload)
				<tr>
					<td>
						{{$i++}}
					</td>
					<td>
						{{$secload->student->lname}}, {{$secload->student->fname}}
					</td>
					<td>
						@if (count($secload->student->finalgrades->where('classload_id', $load->id)) == 1)
							@foreach ($secload->student->finalgrades->where('classload_id', $load->id) as $finalgrade)
								{{$finalgrade->equiv}}
							@endforeach
						@elseif (count($secload->student->finalgrades->where('classload_id', $load->id)) == 0)
							No Grade Yet
						@endif
					</td>
					<td>
						@if (count($secload->student->finalgrades->where('classload_id', $load->id)) == 1)
							@foreach ($secload->student->finalgrades->where('classload_id', $load->id) as $finalgrade)
								{{$finalgrade->remarks}}
							@endforeach
						@elseif (count($secload->student->finalgrades->where('classload_id', $load->id)) == 0)
							---------
						@endif
					</td>
				</tr>
			@endforeach
		</table>
	</div>

</body>
</html> 