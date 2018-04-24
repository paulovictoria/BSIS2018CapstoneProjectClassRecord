<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<style>
		.header{
			margin-top:80;
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
			<p><strong>OFFICIAL GRADE SLIP</strong></p>
			<small>{{$semester->term}}</small>
		</div>
		<hr>
	</div>

	<div class="main-container">
		<table class="head">
			<tr>
				<td>
					Name: {{$student->lname}}, {{$student->fname}} {{$student->mname}}
				</td>
				<td>
					Student ID: {{$student->student_id}}
				</td>
			</tr>
			<tr>
				<td>
					Course: {{$student->section->department->name}}
				</td>
				<td>
					Section: {{$student->section->year}}-{{$student->section->class}}
				</td>
			</tr>
		</table>
		<br>
		<table class="content">
			<tr>
				<td>Subject Code</td>
				<td>Descriptive Title</td>
				<td>Final Grade</td>
				<td>Remarks</td>
			</tr>
			@foreach ($student->section->classloads->where('semester_id', $semester->id) as $load)
				<tr>
					<td>
						{{$load->subject->code}}
					</td>
					<td>
						{{$load->subject->title}}
					</td>
					<td>
						@if (count($student->finalgrades->where('classload_id', $load->id)) == 1)
							@foreach ($student->finalgrades->where('classload_id', $load->id) as $finalgrade)
								{{$finalgrade->equiv}}
							@endforeach
						@elseif (count($student->finalgrades->where('classload_id', $load->id)) == 0)
							No Grade Yet
						@endif
					</td>
					<td>
						@if (count($student->finalgrades->where('classload_id', $load->id)) == 1)
							@foreach ($student->finalgrades->where('classload_id', $load->id) as $finalgrade)
								{{$finalgrade->remarks}}
							@endforeach
						@elseif (count($student->finalgrades->where('classload_id', $load->id)) == 0)
							---------
						@endif
					</td>
				</tr>
			@endforeach
		</table>
	</div>

	<div class="footer">
		<div class="review">
			<p>Grading System</p>
			<table>
				<tr>
					<td>Numeric Equivalent</td>
					<td>% Equivalent</td>
					<td>Other Marks</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li>1.00</li>
							<li>1.25</li>
							<li>1.50</li>
							<li>1.75</li>
							<li>2.00</li>
							<li>2.25</li>
							<li>2.50</li>
							<li>2.75</li>
							<li>3.00</li>
							<li>5.00</li>
						</ul>
					</td>
					<td>
						<ul>
							<li>98-100</li>
							<li>95-97</li>
							<li>92-94</li>
							<li>89-91</li>
							<li>86-88</li>
							<li>83-85</li>
							<li>80-82</li>
							<li>77-79</li>
							<li>75-76</li>
							<li>74-and below</li>
						</ul>
					</td>
					<td>
						<ul>
							<li>INC Incomplete</li>
							<li>D Dropped</li>
							<li>N.A. Non-Apperance</li>
							<li>F.A. Failure Due to Absence</li>
							<li>N.F.E. No Final Examination</li>
							<li>U.D. Unofficially Dropped</li>
						</ul>
					</td>
				</tr>
			</table>
			<p><strong>NOT VALID WITHOUT OFFICIAL SEAL</strong></p>
		</div>
		<div class="certify">
			<p>Certification</p>
			<p>This is to certify that the foregoing records <strong>{{$student->fname}} {{$student->lname}}</strong> have been verified by me and that true copies substantiating the same are kept in the file of our college</p>
			<br>
			<br>
			<p><strong> {{$registrar->fname}} {{$registrar->lname}} </strong></p>
			<small>Registrar III</small>
		</div>
	</div>

</body>
</html> 