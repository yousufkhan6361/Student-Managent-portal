@extends('layout.default')

@section('content')
<h1>Branch Details</h1>
<table class="table table-bordered" style="width: 50%">
	<thead>
		<th>Branch Short Name</th>
		<th>Branch Short Name</th>
		<th>Actions</th>
	</thead>
	<tbody>
		@foreach($branches as $branch)
		<tr>
			<td>{{$branch->bshort}}</td>
			<td>{{$branch->bfull}}</td>
			<td>
				<a href="{{route('edit.branch',['id' =>$branch->id ])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				| <a href="{{route('delete.branch',['id' => $branch->id ])}}"><i class="fa fa-trash" aria-hidden="true"></i></a> 
				
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{$branches->links()}}

@endsection