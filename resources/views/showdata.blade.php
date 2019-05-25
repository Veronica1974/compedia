<!-- resources/views/showdata.blade.php -->
@extends('app')
@section('content')
<div class="container">
      <table class="table table-striped" id="usertable">
       <thead>
               <tr>
                       <th scope="col">#</th>
                       <th scope="col">User Full Name</th>
                       <th scope="col">Email</th>
                      
               </tr>
       </thead>
       <tbody>
       @if ($users)
       @foreach($users as $user)
				 <tr class='clickable-row' id="{{$user->id}}">
				  <th scope="row">{{$user->id}}</th>
				  <td class ="fname">{{$user->first_name}} {{$user->last_name}}</td>
				  <td class = "email">{{$user->email}}</td>
				  
				  </tr>
				  <tr id="edit{{$user->id}}" class="trdisplaynone"><td colspan="4">@include('formedit')</td></tr>
		@endforeach
		 @endif
       </tbody>
</table>
 <button type="submit" class="btn btn-primary adduser" id="adduser">Add Nwe User</button>
@include('form')
    
</div>
@endsection