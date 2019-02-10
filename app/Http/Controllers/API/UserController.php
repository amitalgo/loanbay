<?php

namespace App\Http\Controllers\API;

use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\UserService;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{

    public $successStatus = 200;

    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function login(){
        if(Auth::attempt(['email'=>\request('email'), 'password'=>\request('password')])){
            $user = Auth::user();
            $token = $user->createToken('YehChina')->accessToken;
            return response()->json(['token'=>$token], $this->successStatus);
        }else{
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'firstName' => 'required',
            'email' => 'required | email',
            'password' => 'required | min:6',
            'role' => 'required'
        ]);
        if($validator->fails()){
            return response()->json("Please check the form and submit again.", 400);
        }else {
            $result = $this->userService->saveUser($request);
            if($result){
                return response()->json("Account created successfully.", 200);
            }else{
                return response()->json("Something went wrong.Please try again", 400);
            }
        }
    }

    public function detail(){
        $user = Auth::user();
        if($user){
            return response()->json(new UserResource($user), $this->successStatus);
        }else{
            return response()->json("Something went wrong. Please try again later.", 400);
        }
    }

    public function updateAccount(Request $request){
        $validator = Validator::make($request->all(),[
            'firstName' => 'required'
        ]);
        if($validator->fails()){
            return response()->json("Please check the form and submit again.", 400);
        }else {
            $result = $this->userService->updateUser($request, Auth::user()->getId());
            if($result){
                return response()->json(new UserResource(Auth::user()), 200);
            }else{
                return response()->json("Something went wrong.Please try again", 400);
            }
        }
    }

    public function updateProfilePicture(Request $request){
        $validator = Validator::make($request->all(),[
            'image' => 'required'
        ]);
        if($validator->fails()){
            return response()->json("Please check the form and submit again.", 400);
        }else {
            $result = $this->userService->updateProfilePicture($request, Auth::user()->getId());
            if($result){
                return response()->json(new UserResource(Auth::user()), 200);
            }else{
                return response()->json("Something went wrong.Please try again", 400);
            }
        }
    }

    public function changePassword(Request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'required | min:6'
        ]);
        if($validator->fails()){
            return response()->json("Please check the form and submit again.", 400);
        }else {
            $user = Auth::user();
            $result = $this->userService->updatePassword($request, $user->getId());
            if($result){
                $this->sendMail('email.change-password', [],$user->getEmail());
                return response()->json("Password changed successfully.", 200);
            }else{
                return response()->json("Something went wrong.Please try again", 400);
            }
        }
    }

    public function forgotPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required | email'
        ]);
        if($validator->fails()){
            return response()->json("Please check the form and submit again.", 400);
        }else {
            $data = array(
                'email' => $request->get('email')
            );
            $user = $this->userService->getUserBy($data);
            if($user){
                Mail::to($user->getEmail())->send(new ForgotPassword($user));
                return response()->json("Please check your email.", 200);
            }else{
                return response()->json("Something went wrong.Please try again", 400);
            }
        }
    }

    public function resetPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'required | min:6'
        ]);
        if($validator->fails()){
            return response()->json("Please check the form and submit again.", 400);
        }else {
            $userId = base64_decode($request->get('ref'));
            $result = $this->userService->updatePassword($request, $userId);
            if($result){
                return response()->json("Password changed successfully.", 200);
            }else{
                return response()->json("Something went wrong.Please try again", 400);
            }
        }
    }

    public function checkUser(Request $request){
        $chkUser = $this->userService->getUserBy(array('email'=>$request->get('email')));
        if(!$chkUser){
            return response()->json(['status' => false], 200);   
        }else{
            return response()->json(['status' => true,'userId'=>$chkUser->getId()], 200);   
        }
    }
    
    public function socialLogin(Request $request){
        if($request->get('ftl')=='yes'){
            $result = $this->userService->saveUser($request);
            if(!$result){
                return response()->json(['error' => 'Unauthorized'], 401);
            }   
        }
        $user = $this->userService->getUserBy(array('email'=>$request->get('email')));
        $userId = $user->getId();
        if(Auth::loginUsingId($userId)){
            $user = Auth::user();
            $token = $user->createToken('YehChina')->accessToken;
            return response()->json(['token'=>$token], $this->successStatus);
        }else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    
    public function logout(){
        $token = Auth::user()->token();
        $token->revoke();
        return response()->json('Logged out successfully', $this->successStatus);
    }

    public function unauthorized(){
        return response()->json('Unauthorized', 401);
    }
}
