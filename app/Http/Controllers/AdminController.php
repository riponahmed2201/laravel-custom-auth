<?php

namespace App\Http\Controllers;


use App\register_users;
use http\Env\Request;
use Illuminate\Support\Str;
use Input;
use Validator;
use Redirect;
use Mail;
use Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function store(){

        $data = Input::except(array('_token'));


        $rule =array(

            'name' =>'required',
            'email' =>'required|email:unique',
            'password' =>'required|min:6',
            'confirm_password' =>'required|same:password',
            'verifyToken' =>Str::random(40),

        );

        $message = array(

            'confirm_password.required'=>'The confirm password is required',
            'confirm_password.min'=>'The confirm password must be at list 8 characters',

            'confirm_password.same'=>'The password and confirm password does not match'

        );

        $validator = validator::make($data,$rule,$message);


        if ($validator->fails()) {

            return Redirect::to('register')->withErrors($validator);
        }

        else

            register_users::formstore(Input::except(array('_token', 'confirm_password')));
        return Redirect::to('register')->with('success','Successfully registered!');
    }


    public function login(){

        $data = Input::except(array('_token'));


        $rule =array(
            'email' =>'required',
            'password' =>'required',
        );

        $validator = validator::make($data,$rule);


        if ($validator->fails()) {

            return Redirect::to('signin')->withErrors($validator);
        }

        else
        {
            $data=Input::except(array('_token'));
            var_dump($data);
//            $userdata = array(
//
//                'email'=>Input::get('email'),
//                'password'=>Input::get('password')
//            );
//
//            if (Auth::attempt($data)) {
//                return Redirect::to('dashboard');
//
//            }
//
//            else{
//                return Redirect::to('login');
//
//            }
        }

    }

//    public function sendEmail($thisUser){
//Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
//
//    }
//public function verfyEmailFirst(){
//        return view('mails.verfyEmailFirst');
//}





























//
//protected function  register(Request $request){
//        $input =$request->all();
//        $vali =$this->validator($input);
//
//        if ($vali->passes()){
//            $d = $this->create($input)->toArray();
//            $d['status'] = str_random(25);
//
//            $user = User::find($d['id']);
//            $user->token =$d['token'];
//            $user->save();
//
//            Mail::send('mails.confirmation',$d, function ($message) use($d){
//                $message->to($d['email']);
//                $message->subject('Registration Confirmation');
//            });
//            return redirect(route('login'))->with('status','Confirmation email has been send.please check your email.');
//        }
//}
//
//public function confirmation($token){
//        $user =User::where('token',$token)->first();
//        if (is_null($user)){
//            $user->confirmed=1;
////            $user->token = '';
//            $user->save();
//            return redirect(route('login'))->with('satus','Your activation is completed');
//        }
//        return redirect(route('login'))->with('satus', 'Somthing went wrong.');
//}
//
//
//






















































//    public function showRegisterForm(){
//        return view('auth.register');
//    }
//
//    public function processRegister(Request $request){
//
//        $this->validate($request,[
//
//            'name'  => 'required',
//            'email'  => 'required|email|unique:admin_table,email',
//            'phone_number' => 'required|min:6|max:13|unique:admin_table,phone_number',
//            'password' => 'required|min:6|confirmed',
//        ]);
//
//
//
//        $admin = new admin_table;
//        $admin->name= $request->name;
//        $admin->email= $request->email;
//        $admin->phone_number= $request->phone_number;
//        $admin->password = Hash::make($request->password);
//
//        $admin->save();
//
//        session()->flash('message','User account created');
//        session()->flash('type','success');
//        return redirect()->route('login');
//
//
//
////        $data = [
////
////            'name' => $request->input('name'),
////            'email' => strtolower($request->input('email')),
////            'phone_number'=>$request->input('phone_number'),
////            'password'=>  bcrypt($request->input('password')),
////        ];
////
////        try{
////            User::create($data);
////
////            session()->flash('message','User account created');
////            session()->flash('type','success');
////
//////            $this->setSuccessMessage('User account created');
////            return redirect()->route('login');
////        }
////        catch(Exception $e){
//////            $this->setErrorMessage($e->getMessage());
////
////            session()->flash('message',$e->getMessage());
////            session()->flash('type','danger');
////            return redirect()->back();
////        }
//
//
//}
//
//
//    public function showLoginForm(){
//        return view('auth.login');
//    }
//
//    public function processLogin(Request $request){
//        $this->validate($request,[
//
//
//            'email'  => 'required|email|',
//
//            'password' => 'required|min:6',
//        ]);
//        $credentials = $request->except(['_token']);
//        if (auth()->attempt($credentials)) {
//            return redirect()->route('dashboard');
//        }
//        session()->flash('message','Invalid credentials');
//        session()->flash('type','danger');
////        $this->setErrorMessage('Invalid credentials');
//        return redirect()->back();
//    }
//
//    public function logout(){
//        auth()->logout();
//        return redirect()->route('login');
//    }


}



