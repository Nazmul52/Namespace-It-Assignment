@extends('employeer.home')

@section('content')

<div class="container">
	<h3>Candidate List</h3>
	<br>
	<table id="myTable" class="table table-striped table-bordered display">
	    <thead>
	        <tr>
	            <th>Title</th>
	            <th>Candidate Name</th>
	            <th>Candidate Email</th>
	        {{--     <th>Location</th>
	            <th>Country</th> --}}
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach($appliedJobs as $appliedJob)
	        <tr>
	            <td>{{$appliedJob->job_title}}</td>
	            <td><a href="{{ url('/employeer/getCandidateInfo/'.$appliedJob->user_id) }}">{{$appliedJob->first_name}} {{$appliedJob->last_name}}</a></td>
	             <td>{{$appliedJob->email}}</td>

	        </tr>
			@endforeach
	    </tbody>
	</table>
</div>




@endsection