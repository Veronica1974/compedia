<!-- resources/views/formedit.blade.php -->
<div class="containereditform">
    <form class="form-signin" id="editform_{{$user->id}}">
    
  <div class="text-center mb-4">
  
    <p></p>
  </div>
  <div class='alert-danger'></div>
 <div class="form-label-group">
   <input type="text" id="first_name_{{$user->id}}" name='first_name' class="form-control" value="{{$user->first_name}}" required autofocus>
    <label for="inputEmail">Firs Name</label>
  </div>
  
  <div class="form-label-group">
    <input type="text" id="last_name_{{$user->id}}" name='last_name' class="form-control"  value="{{$user->last_name}}" required autofocus>
    <label for="inputEmail">Last Name</label>
  </div>
  
  <div class="form-label-group">
    <input type="email" id="email_{{$user->id}}" name='email' class="form-control"  value="{{$user->email}}" required autofocus>
    <label for="inputEmail">Email address</label>
  </div>

 
    <div class="form-label-group">
    <input type="password" id="password_{{$user->id}}" name='password' class="form-control" value="{{$user->password}}" required>
    <label for="inputPassword">Password</label>
  </div>

    <input type="hidden" id="custid_{{$user->id}}" name='custid'   value="{{$user->id}}">
    <button type="button" class="btn btn-primary edituser" id="edituser_{{$user->id}}">Edit user</button>
    <button type="button" class="btn btn-primary deleteuser" id="deleteuser_{{$user->id}}">Delete user</button>
  </form>
</div>