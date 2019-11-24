@extends('welcome')

@section('content')



<div id="exTab1" class="container">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#resume" role="tab" aria-controls="profile" aria-selected="false">Upload Resume</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#skill" role="tab" aria-controls="contact" aria-selected="false">Skills</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="home-tab" data-toggle="tab" href="#profilePicture" role="tab" aria-controls="home" aria-selected="true">Profile Picture</a>
      </li>


  </ul>
<div class="tab-content" id="myTabContent">

{{-- start resume section --}}
    <div class="tab-pane fade show active" id="resume" role="tabpanel" aria-labelledby="profile-tab">
            <h3>Upload Your CV</h3>
            <br/>

            @if(session('message'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong> {{session('message')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <form method="post" action="{{ route('user.cv') }}" enctype="multipart/form-data">
               @csrf

                <div class="row">
                     <div class="col-md-6">
                             <div class="form-group">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">

                                        <input type="file" class="cv" name="cv" accept="application/pdf" required="">

                                     </div>


                              </div>

                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary " >Upload</button>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                             <embed type="application/pdf" src="user_cv/{{Auth::user()->cv}}" height="700px" width="100%;" alt="CV"></embed>
                        </div>
                    </div>


                </div>

          </form>


    </div>

  {{-- end resume section --}}

  {{-- start skill section --}}
      <div class="tab-pane fade" id="skill" role="tabpanel" aria-labelledby="contact-tab">
                    <h3>Add your skill</h3>
                    <br/>
                    <div class="msg-div" >
                    </div>

                    <form>
                     <input type="hidden" name="" value="{{csrf_token()}}" id="token">

                    <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                  <input type="text" class="form-control skill" name="skill"  required="">
                             </div>
                       </div>

                             <div class="form-group ">
                                    <button type="button" onclick="addSkill()" class="btn btn-primary " >Add</button>
                             </div>
                    </div>
                              <br>
                  <div class="row">
                        <div class="col-md-6">
                                <table  class="table table-striped table-bordered display myTable">
                                    <thead>
                                        <tr>
                                            <th>Skill</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($skills as $skill)
                                        <tr>
                                            <td>{{$skill->skill}}</td>

                                            <td>
                                   <a id="delete_skill" onclick="deleteSkill({{ $skill->id }})" ><i class="fa fa-trash"></i> </a>
                                 </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                      </div>
                </div>
            </form>
      </div>
      {{-- end skill section --}}

      {{-- start profile picture section --}}
      <div class="tab-pane fade  " id="profilePicture" role="tabpanel" aria-labelledby="home-tab">
      		<h3>Upload Profile Picture</h3>
      		<br/>

      		@if(session('status'))

      		<div class="alert alert-success alert-dismissible fade show" role="alert">
      		  <strong> {{session('status')}}</strong>
      		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      		    <span aria-hidden="true">&times;</span>
      		  </button>
      		</div>
      		@endif
      		<form method="post" action="{{ route('profile.picture') }}" enctype="multipart/form-data">
    		      @csrf

    			<div class="row">
    				<div class="col-md-6">
    	                 <div class="form-group">
    		                      <div class="fileinput fileinput-new" data-provides="fileinput">
    		                            <div class="fileinput-new thumbnail" style="width: 250px; height: 250px;" data-trigger="fileinput">
    		                              <img src=" {{asset('')}} user_picture/{{Auth::user()->profile_picture}}" alt="...">
    		                            </div>
    		                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 250px"></div>
    		                            <div>
    			                              <span class="btn btn-white btn-file">
    			                                <span class="fileinput-new">Change Photo</span>
    			                                <span class="fileinput-exists">Change</span>
    			                                <input type="file" class="profile_picture" name="profile_picture" accept="image/*" required="">
    			                              </span>
    		                              		<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
    		                            </div>
    		                       </div>


    	                  </div>

                      	<div class="form-group fileinput-exists">
                      		<button type="submit" class="btn btn-primary " >Upload</button>
                      	</div>
                      </div>
                      <div class="form-group">
                        <img src="{{asset('user_picture/'.Auth::user()->profile_picture)}}" alt="hello"> 
                      </div>



    			 </div>

    		</form>
      </div>

{{-- end profile picture section --}}




  </div>
</div>







@endsection