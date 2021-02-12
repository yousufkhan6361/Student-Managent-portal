@extends('layout.default');

@section('content')

<h1>Regstration Page</h1>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>Form Design <small>different form elements</small></h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Settings 1</a>
          </li>
          <li><a href="#">Settings 2</a>
          </li>
        </ul>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />
    <form id="demo-form2" method="post" action="{{url('studentstore')}}" class="form-horizontal form-label-left" enctype= multipart/form-data>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        	@csrf
          <input type="text" id="first-name" name="sname" required="required" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Father's Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="last-name" name="fname" required="required" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Student Class</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="class" required="required">
        </div>
      </div>
      
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="birthday" name="phnum" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student Email <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="birthday" name="email" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control branches" name="branch_id">
            <option value="">-- Select Branch --</option>
            @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->bfull}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control courses" name="course_id">
            <option value="">-- Select Course --</option>
            
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Image <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="file" id="image" name="image" class="form-control">
        </div>
      </div>

      <div class="form-group" style="width: 48%;margin-left: 286px;">
       
        </label>
         @if(Session::has('addMsg'))
	          <div class="alert alert-info" role="alert">
	            {{session('addMsg')}}
	          </div>
          @endif
      </div>
     



      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <!-- <button class="btn btn-primary" type="button">Cancel</button>
		  <button class="btn btn-primary" type="reset">Reset</button> -->
          <button type="submit" class="btn btn-success">Submit</button>
         
        </div>
      </div>


    </form>
  </div>
</div>
</div>
</div>

@endsection

 @push('footer-scripts')
 <script type="text/javascript">
   $(document).on('change','.branches',function(){
      var branch_id = $(this).val();
      $.ajax({
          url:'student/courses',
          dataType:'json',
          data: { "id": branch_id,"_token": "{{ csrf_token() }}"},
          method:'post',
          success: function(data){
            var courses = '<option>-- Select Course --</option>';
            var arr = data.courses.length;
            var ac = data.courses;
            for(var i=0; i<arr; i++){
              courses += '<option value="'+ac[i].id+'">'+ac[i].cname+'</option>';
            }
            $(".courses").html(courses);
          }

      });
   });
 </script>

 @endpush