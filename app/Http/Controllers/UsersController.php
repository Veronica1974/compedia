<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    
    public function readUserData(){
        $data = \App\Users::all();
       
        return view('showdata', ['users' => $data]);
       
    }
    
        
    public function addUser(Request $request){
       
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|min:1|max:45',
            'last_name' => 'required|min:1|max:45',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:20|',
         
        ]);
        
        
        if ($validator->passes()) {
            $user_model = new Users();
            $user_model->first_name= $request['first_name'];
            $user_model->last_name= $request['last_name'];
           
            $user_model->email =  $request['email'];
            $user_model->password =  $request['password'];
            $user_model->save();
            $data = \App\Users::where('email', $request['email'])->get();
            
            return response()->json(['success'=>'Added new records.',
                'data' => $data
                
            ]);
           
        }
         
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    
    public function editUserInfo(Request $request){
        
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|min:1|max:45',
            'last_name' => 'required|min:1|max:45',
            'email' => 'required|email|unique:user,email, '. $request['id'] . ',id',
            'password' => 'required|min:8|max:20'
        ]);
        
        
        if ($validator->passes()) {
            $user_model = new Users();
            $user_model->exists = true;
            $user_model->first_name= $request['first_name'];
            $user_model->last_name= $request['last_name'];
            $user_model->email =  $request['email'];
            $user_model->password =  md5($request['password']);
            $user_model->id =  $request['id'];
            $user_model->save();
            return response()->json(['success'=>'Updated this records.', 'data' => $request->all()]);
            
        }
        
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    
    public function deleteUser(Request $request){
        $res = Users::where('id',$request['id'])->delete();
        if ($res){
            $data=[ 'status'=>'1','msg'=>'success','id' => $request['id'] ];
        }else{
            $data=['status'=>'0', 'msg'=>'fail'
            ];
            return response()->json($data);
        }
    }
    
    public function getUserInfo(Request $request){
        $data = \App\Users::where('id', $request['id'])->get();
     //   return Response::json(array('data' => $data));
        return response()->json(['data' => $data]);
    }
   
}