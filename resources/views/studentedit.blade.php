@extends('layout.default')
@section('content')
	<h1>Student Update</h1>
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
    <form id="demo-form2" method="post" action="{{route('student.update',['id' => $students->id])}}" class="form-horizontal form-label-left">

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        	@csrf
          <input type="text" id="first-name" name="sname" value="{{$students->sname}}" required="required" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Father's Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="last-name" value="{{$students->fname}}" name="fname" required="required" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Student Class</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="middle-name" value="{{$students->class}}" class="form-control col-md-7 col-xs-12" type="text" name="class" required="required">
        </div>
      </div>
      
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="birthday" value="{{$students->phnum}}" name="phnum" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student Email <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="birthday" value="{{$students->email}}" name="email" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
        </div>


      </div>
      <div class="form-group">
       
        </label>
         @if(Session::has('addMsg'))
	          <div class="alert alert-success" role="alert">
	            {{session('addMsg')}}
	          </div>
          @endif
      </div>


      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <!-- <button class="btn btn-primary" type="button">Cancel</button>
		  <button class="btn btn-primary" type="reset">Reset</button> -->
		  
		  	<button class="btn btn-info"><a href="{{route('student.detail')}}"> Back </a></button>
		  
          <button type="submit" class="btn btn-success">Submit</button>
         
        </div>
      </div>


    </form>
  </div>
</div>
</div>
</div>


@endsection