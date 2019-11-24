@extends('welcome')

@section('content')


 <main role="main" class="container">
   <div class="jumbotron">
    

   	@foreach($job_infos as $job_info)
     
   		<div class="job_list">
		     <h1>{{$job_info->job_title}}</h1>
		     <p class="lead">{{$job_info->employeer->business_name}}</p>
		     <p class="lead">{{$job_info->location}}</p>
		     <p class="lead">{{$job_info->country}}</p>
		     <a href="{{ url('getJobDetails/'.$job_info->id) }}" class="btn btn-lg btn-primary"   role="button">View Details</a>
	    </div>
	    <br>
     
	   @endforeach
     
   </div>

 </main>


 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Job Details</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        	<div class="row">
              <div class="col-md-12">
                  	<h1 class="title"></h1>
                  	<h5 class="company_name"></h5>
                  	<p class="description"></p>
                     <br>
                     <h6 >Salary : <span class="salary"></span></h6>
                     <h6 >Address: <span class="location"></span></h6>
                     <h6 class="country"></h6>
              </div>
			   </div>
			<br>


       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </div>
     </div>
   </div>
 </div>
@endsection