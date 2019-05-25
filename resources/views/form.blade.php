<!-- resources/views/form.blade.php -->
<div class="containerform">
    <form class="form-signin" id="adduserform">
    
  <div class="text-center mb-4">
  
    <p></p>
  </div>
  <div class='alert-danger'></div>
 <div class="form-label-group">
   <input type="text" id="first_name" name='first_name' class="form-control" placeholder="First Name" required autofocus>
    <label for="inputEmail">Firs Name</label>
  </div>
  
  <div class="form-label-group">
    <input type="text" id="last_name" name='last_name' class="form-control" placeholder="Last Name" required autofocus>
    <label for="inputEmail">Last Name</label>
  </div>
  
  <div class="form-label-group">
    <input type="email" id="email" name='email' class="form-control" placeholder="Email address" required autofocus>
    <label for="inputEmail">Email address</label>
  </div>


  <div class="form-label-group">
    <input type="password" id="password" name='password' class="form-control" placeholder="Password" required>
    <label for="inputPassword">Password</label>
  </div>

  <button class="btn btn-lg btn-primary btn-block" type="button" id="insertuser" >add User</button>
    <button class="btn btn-lg btn-primary btn-block" type="button" id="cancel">Cancel</button>
</div>