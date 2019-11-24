@extends('welcome')

@section('content')


 <main role="main" class="container">
  @if(session('status'))

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{session('status')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
   <div class="jumbotron">

   		<div class="job_list">
        <form>
		     <h1>{{$job_info->job_title}}</h1>
		     <p class="lead">{{$job_info->employeer->business_name}}</p>
         <br>
         <h5>Description</h5>
         <br>
         <p>{{$job_info->job_description}}</p>
         <br>
         <h5>Salary : {{$job_info->salary}}</h5>

		     <p class="lead">Address: {{$job_info->location}}</p>
		     <p class="lead">{{$job_info->country}}</p>
         @if($appliedJob == '')
		     <a href="{{ url('apply-job/'.$job_info->id) }}"  type="button" class="btn btn-primary text-center">Apply Job</a>
         @else
          <button disabled="" type="button" class="btn btn-success text-center">Already Applied</button>
         @endif
       </form>
	    </div>

	    <br>

   </div>

 </main>


@endsection