<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Testimony;
use App\Config;
use App\ReferalBonus;


use EbulkSMS\Authentication\Initialize;
use EbulkSMS\Response\Response;
use EbulkSMS\Request\SendSMS;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone' => 'required|string|max:13|min:9',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'has_verified'=>0,
        ]);
    }




    public function showActivationForm($id)
    {
        $testimonies=Testimony::orderBy('id','desc')->limit('6')->get();

        $config=Config::where('id', 1)->first();

        return view('auth.activation_form',['user_id'=>$id,'testimonies'=>$testimonies, 'config'=>$config]);
    }

    public function activateUser(Request $request)
    {
        $formData=$request->all();

        $rule=array(
            'code'=>'required|numeric',
            'user_id'=>'required'
            );

        $message=array(
            'code.required'=>'verification code is required.',
            'user_id.required'=>'user ID is required'
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::to(route('activate.user', ['id'=>$user_id]))->withErrors($validator);

        }else{
            //compare code
            $user=User::Where('id',$request->user_id)->first();
            if($user->verification_code==$request->code){
                $user->has_verified=1;
                $user->save();
                return Redirect::to(route('login'))->with('notification','Your account has been verified. Login below.');
            }else{
                return Redirect::to(route('activate.user', ['id'=>$user_id]))->with('notification','Incorrect verification code. Click "resend code" button');
            }

           
        }
    }



    public function reVerify($id){

        $user=User::Where('id',$id)->first();
        $code=mt_rand(1000, 100000);

        User::where('id', $user->id)->update(['verification_code'=>$code]);



         //SMS API

        //sendSMS section
        $Initialize=new Initialize([
                'Key'=>'7aaaa6e48995cd2e89bf6b7c9f876e78bcb7e055',
                'Username'=>'verleenplatform@gmail.com']);

         //send sms
        SendSMS::sendWithJSON(['SenderName'=>'Verleen',
            'Recipients'=>$request->phone,
            'Message'=>$code." is your verleen verification code",
        ]);

        if( Response::$getResposeCode ==200){

            $user_id=User::where('phone', $request->phone)->first()->id;

                   return Redirect::to(route('activate.user', ['id'=>$user_id])); 
                   //return Redirect::to('activate_user/'.$user_id);
        }
        //SMS API
        

    }



}
