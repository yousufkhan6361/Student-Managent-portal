@extends('layout.default')

@section('content')
<h1>Course Details</h1>
<table class="table table-bordered" style="width: 50%">
	<thead>
		<th>Branch Name</th>
		<th>Course Name</th>
		<th>Actions</th>
	</thead>
	<tbody>
		@foreach($courses as $course)
		<tr>
			<td>{{$course->bfull}}</td>
			<td>{{$course->cname}}</td>
			<td>

				<a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				| <a href=""><i class="fa fa-trash" aria-hidden="true"></i></a> 
				
				
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection