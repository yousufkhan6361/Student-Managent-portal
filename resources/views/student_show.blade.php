@extends('layout.default')

@section('content')
<style type="text/css">
body{padding-top:30px;}

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
display: block;
line-height: 1.428571429;
color: #999;
}
</style>
<!-- <div style="text-align: center; width:200px;margin-top: 70px">
	<img style="width: 200px;" src="{{url('public/images')}}/{{$student[0]['image']}}">
	<div>
		<p class="sshow">Student Name : {{$student[0]['sname']}}</p>
		<p class="sshow">Father Name : {{$student[0]['fname']}}</p>
		<p class="sshow">Class : {{$student[0]['class']}}</p>
		<p class="sshow">Email : {{$student[0]['email']}}</p>
	</div>
</div> -->


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img style="width: 380px;" src="{{url('public/images')}}/{{$student[0]['image']}}" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            {{$student[0]['sname']}}</h4>
                        <cite title="Father Name">Father Name : {{$student[0]['fname']}}<br> </cite><br>
                        <cite title="Class">Class : {{$student[0]['class']}}<br></cite><br>
                        <cite title="Email">Email : {{$student[0]['email']}}<br></cite><br>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection