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
			<p><strong>MASTER LIST</strong></p>
			<small>{{$semester->term}}</small>
		</div>
		<hr>
	</div>

	<div class="main-container">
		<table class="head">
			<tr>
				<td>
					Course: {{$section->department->name}}
				</td>
				<td>
					Year & Section: {{$section->year}}-{{$section->class}}
				</td>
			</tr>
		</table>
		<br>
		<table class="content">
			<tr>
				<td>No.</td>
				<td>Name</td>
				<td>Student ID</td>
			</tr>
			@php
				$i = 1
			@endphp
			@foreach ($section->students->sortBy('lname') as $student)
				<tr>
					<td>
						{{$i++}}
					</td>
					<td>
						{{$student->lname}} {{$student->fname}}
					</td>
					<td>
						{{$student->student_id}}
					</td>
				</tr>
			@endforeach
		</table>
	</div>

</body>
</html> 