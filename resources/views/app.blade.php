<!-- resources/views/welcome.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="{{URL::asset('js/jquery-password-generator-plugin.js')}}"></script>
    </head>
    <body>
    <div class="container">
      @yield('content')     
    </div>
 <script>
 $(document).ready(function(){
	  $("#adduser").click(function(){
		  var password = $.passGen({
              // Number of characters
              'length' : 10,
              // Use numbers (0, 1, 2, etc...)
              'numeric' : true,
              // Use lowercase letters (a, b, c, etc...)
              'lowercase' : true,
              // Use uppercase letters (A, B, C, etc...)
              'uppercase' : true,
              // Use special characters (!, @, #, $, etc...)
              'special'   : false
            });
		 
		    $('#password').val(password);
		    console.log(password);
		    console.log("lll");
	    $(".containerform").toggle();
	  });

	  $("#cancel").click(function(){
		  $("#adduserform")[0].reset();
		  $(".containerform").hide();
	  });


	  $("#insertuser").click(function(){
		 // e.preventDefault();
		 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
		  $.ajax({
              url: "{{ url('/api/addUser') }}",
              method: 'post',
              data: {
            	  first_name: $('#first_name').val(),
            	  last_name:  $('#last_name').val(),
            	  email:      $('#email').val(),
            	  password:   $('#password').val(),
              },
              success: function(data){
            	 
            	  if(data.error){
                	  $.each(data.error, function(key, value){
                    	  $('.alert-danger').show();
                    	  $('.alert-danger').append('<p>'+value+'</p>');
                		});
            	  }else{
            		 
            		  $('.alert-danger').hide();
            		  var result = data.data[0];
            		  var newrow = '<tr class="clickable-row" id="'+result.id+'"><th scope="row">'+result.id+'</th><td>'+result.first_name+'</td><td>'+result.last_name+'</td><td>'+result.email+'</tr>';
            		  var newrowformtropen = '<tr id="edit'+result.id+'" class="trdisplaynone"><td colspan="4">';
            		  var formtagopen = '<div class="containereditform"><form class="form-signin" id="editform_{{$user->id}}">';
            		  var tophtml = ' <div class="text-center mb-4"><p></p></div><div class="alert-danger"></div>';
            		  var formtagfirstname = '<div class="form-label-group">'+
            		   '<input type="text" id="first_name_'+result.id+'" name="first_name" class="form-control" value="'+result.first_name+'" required autofocus>'+
            		    '<label for="inputEmail">Firs Name</label></div>';
            		   var formtaglastname = ' <div class="form-label-group">'+
            			    '<input type="text" id="last_name_'+result.id+'" name="last_name" class="form-control"  value="'+result.last_name+'" required autofocus>'+
            		    '<label for="inputEmail">Last Name</label></div>';
            		    var formtagemail = ' <div class="form-label-group">'+
            		        '<input type="email" id="email_'+result.id+'" name="email" class="form-control"  value="'+result.email+'" required autofocus>'+
            		    '<label for="inputEmail">Email address</label></div>';
            		    var formtapassword = ' <div class="form-label-group">'+
            		        '<input type="password" id="password_'+result.id+'" name="password" class="form-control" value="'+result.password+'" required>'+
            		    '<label for="inputPassword">Password</label></div>';
            		    var formtagid = ' <input type="hidden" id="custid_'+result.id+'" name="custid"   value="'+result.id+'">';   
            		    var formbuttontag = ' <button type="button" class="btn btn-primary edituser" id="edituser_'+result.id+'">Edit user</button>  '+
            		        '<button type="button" class="btn btn-primary deleteuser" id="deleteuser_'+result.id+'">Delete user</button>';
            		    var formclosetag = ' </form></div>';
                        var newrowformclose = '</td></tr>';
            		    
            		 // $("#usertable tbody").append(newrow);
            		  $("#usertable tbody").append(newrow+newrowformtropen+formtagopen+tophtml+formtagfirstname+formtaglastname+formtagemail+formtapassword+formtagid+formbuttontag+formclosetag+newrowformclose);
            		  $("#adduserform")[0].reset();
            		  $(".containerform").hide();
                	  }
            	},
            	error: function(data){
              	  console.log(data);
            		
          	}
                
              });
	  });

	  $(document).on("click", ".clickable-row" , function() {
		  if($("#edit"+this.id).attr('class') == 'trdisplaynone'){
			  $("#edit"+this.id).attr('class', 'trdisplay');
			  
		   }else{
			$("#edit"+this.id).attr('class', 'trdisplaynone');
		    }
		});

		
	  $(".edituser").click(function(){
			 var idarr = $(this).attr('id').split('_');
			 console.log(idarr);
			 console.log($('#first_name_'+idarr[1]).val());
			 $.ajaxSetup({
            	  headers: {
            	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            	  }
	          });
			  $.ajax({
	              url: "{{ url('/api/editUserInfo') }}",
	              method: 'post',
	              data: {
	            	  first_name: $('#first_name_'+idarr[1]).val(),
	            	  last_name:  $('#last_name_'+idarr[1]).val(),
	            	  email:      $('#email_'+idarr[1]).val(),
	            	  password:   $('#password_'+idarr[1]).val(),
	            	  id:         $('#custid_'+idarr[1]).val(),
	              },
	              success: function(data){
	            	  console.log(data);
	            	  if(data.error){
	                	  $.each(data.error, function(key, value){
	                    	  $('.alert-danger').show();
	                    	  $('.alert-danger').append('<p>'+value+'</p>');
	                		});
	            	  }else{
        	            		  var result = data.data;
        		            	  $('#'+result.id+'> .fname').html(result.first_name);
        		            	  $('#'+result.id+'> .lname').html(result.last_name);
        		            	  $('#'+result.id+'> .email').html(result.email);
        		            	  $("#edit"+result.id).attr('class', 'trdisplaynone');
	                	  }
	            	},
	            	error: function(data){
	              	  console.log(data);
	            		
	          	}
	                
	          });
		  });

	  $(".deleteuser").click(function(){
		  var idarr = $(this).attr('id').split('_');
		  $.ajaxSetup({
        	  headers: {
        	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	  }
          });

		  $.ajax({
              url: "{{ url('/api/delete') }}",
              method: 'post',
              data: {
            	  id:         $('#custid_'+idarr[1]).val(),
              },
              success: function(data){
            	  console.log(data);
            	  if(data.error){
                	  $.each(data.error, function(key, value){
                    	  $('.alert-danger').show();
                    	  $('.alert-danger').append('<p>'+value+'</p>');
                		});
            	  }else{
            		  $("#edit"+result.id).attr('class', 'trdisplaynone');
            		  $('#'+data.id).remove();
            		  $('#edit'+data.id).remove();
                	  }
            	},
            	error: function(data){
              	  console.log(data);
            		
          	}
                
          });
          
		 
		});
	});
 </script>
  </body>
</html>
    