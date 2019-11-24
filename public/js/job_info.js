
function viewJobInfo(id){
	$.ajax({
		url: 'getJobDetails',
		type: 'GET',
		dataType: 'json',
		data: {id: id},
		success:function(data){

			$('.title').text(data[0]["job_title"]);
     		$('.company_name').text(data[0]["business_name"]);
     		$('.description').text(data[0]["job_description"]);
			$('.salary').text(data[0]["salary"]);
			$('.location').text(data[0]["location"]);
			$('.country').text(data[0]["country"]);
		
			
		}
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
};

function addSkill(){

	var skill = $('.skill').val();
 	var token = $("#token").val();
	$.ajax({
		url: '/user_skill',
		type: 'POST',
		dataType: 'json',
		data: 'skill='+ skill +'&_token='+ token,
		success:function(data){
			$(".skill").val('');
			$(".myTable").load(window.location + " .myTable");
		
		}
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
};


	// $("#delete_skill").on("click", function(e){
function deleteSkill(id){

   
    if(!confirm("Do you want to delete !")){
    
  		return false;
	}else{
 
    $.ajax({
      url: 'delete_skill',
      type: 'GET',
      data: {id: id},
      success:function(data){
         $('.myTable').load(location.href + ' .myTable'); 
        
      }
    })

    
   }

};


function uploadPicture(){

	var picture = $('.profile_picture').val();

	$.ajax({
      url: 'uploadPicture',
      type: 'POST',
      dataType: 'json',
      data: {picture: picture},
      success:function(data){
      	console.log(data);
        
      }
    })


}



