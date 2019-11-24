@extends('employeer.home')

@section('content')


 <main role="main" class="container">

   <div class="jumbotron">

   		<div class="row">
			<div class="col-md-4">
		     	<h1>{{$employee->first_name}} {{$employee->last_name}}</h1>
		     	<p class="lead">{{$employee->email}}</p>
     			<br>
         		<h5>Skills:</h5>
				@foreach($employee->skills as $skill)
				<span class="badge badge-pill badge-info">{{$skill->skill}}</span>

				@endforeach

			</div>
			<div class="col-md-8">

				<embed type="application/pdf" src="{{ asset('user_cv/'.$employee->cv) }} " height="800px" width="100%;" alt="CV"></embed>
			</div>
	    </div>


	    <br>

   </div>

 </main>

@endsection