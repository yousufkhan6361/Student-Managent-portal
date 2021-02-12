@foreach($students as $student)
		<tr>
			<td>{{$student->sname}}</td>
			<td>{{$student->fname}}</td>
			<td>{{$student->class}}</td>
			<td>{{$student->phnum}}</td>
			<td>{{$student->email}}</td>
			
			<td><a href="{{route('single.student',['id' => $student->id])}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
			<td><a href="{{route('student.fee', ['id' => $student->id])}}"> Fee </a></td>
			<td>
				<a href="{{route('student.edit',['id' => $student->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				| <a href="{{route('student.delete',['id' => $student->id])}}"><i class="fa fa-trash" aria-hidden="true"></i></a> 
				<!-- | <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a> -->
			</td>
		</tr>
@endforeach

<tr class="pag_link"><td colspan="7">{{$students->links()}}</td></tr>