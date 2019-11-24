@extends('employeer.home')

@section('content')

<div class="container">
	<table id="myTable" class="table table-striped table-bordered display">
	    <thead>
	        <tr>
	            <th>Title</th>
	            <th>Description</th>
	            <th>Salary</th>
	            <th>Location</th>
	            <th>Country</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach($job_infos as $job_info)
	        <tr>
	            <td>{{$job_info->job_title}}</td>
	            <td>{{$job_info->job_description}}</td>
	            <td>{{$job_info->salary}}</td>
	            <td>{{$job_info->location}}</td>
	            <td>{{$job_info->country}}</td>
	        </tr>
			@endforeach
	    </tbody>
	</table>
</div>


@endsection