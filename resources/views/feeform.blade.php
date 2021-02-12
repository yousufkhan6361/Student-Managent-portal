@extends('layout.default');

@section('content')

<h1>Add Fee</h1>
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
    <h3>Fee Deposite</h3>

    <form id="demo-form2" method="post" action="{{url('fee-add')}}" class="form-horizontal form-label-left" enctype= multipart/form-data>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fee Amount <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          @csrf
          <input type="text" id="first-name" name="fee" required="required" class="form-control col-md-7 col-xs-12">
          <input type="hidden" value="{{$id}}" id="first-name" name="student_id" required="required" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <div class="form-group" style="width: 48%;margin-left: 286px;">
       
        </label>
         @if(Session::has('msg'))
            <div class="alert alert-info" role="alert">
              {{session('msg')}}
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
    
            <table class="table table-bordered" style="width: 50%;" width="50%">
              <thead>
                <tr>
                  
                  <th scope="col">Fees</th>
                  <th scope="col">Date</th>
                  
                </tr>
              </thead>
            <tbody>
            @foreach ($fees as $key => $fee)
            <?  $originalDate = $fee->created_at;
                $newDate = date("d M Y", strtotime($originalDate));
            ?>
              <tr>
                <td>{{$fee->fee}}</td>
                <td>{{$newDate}}</td>
                
              </tr>
            @endforeach
            <tr>
            </tbody>
            </table>
            
    <br />
    
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