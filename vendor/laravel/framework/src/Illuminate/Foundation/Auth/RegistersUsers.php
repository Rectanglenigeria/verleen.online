<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;


use EbulkSMS\Authentication\Initialize;
use EbulkSMS\Response\Response;
use EbulkSMS\Request\SendSMS;

use App\Testimony;
use App\Config;
use App\ReferalBonus;
use App\User;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm($phone=null)
    {
        $testimonies=Testimony::orderBy('id','desc')->limit('6')->get();

        $config=Config::where('id', 1)->first();

        if($phone==null){

            return view('auth.register',['testimonies'=>$testimonies, 'config'=>$config]);

        }else{

            $referal=User::where('phone', $phone)->first();

            return view('auth.register',['testimonies'=>$testimonies, 'config'=>$config,'referal'=>$referal]);
        }

        
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));



        //populate referrer table

        if(isset($request->referal_name)){

        $user1=User::where('email', $request->email)->first();

        if(!empty($user1)){

            $user_id=$user1->id;

            $user2=User::where('phone',$request->referal_phone)->first();

            $user2_id=$user2->id;

            $referal= new ReferalBonus;

            $referal->referal_id=$user2_id;

            $referal->referee_id= $user_id;

            $referal->remember_token=$request->_token;

            $referal->save();

        }

    }



   //populate referrer table
       


        $code=mt_rand(1000, 100000);

        $referal_link='https:://www.verleen.online/ref/'.$request->phone;

        User::where('email', $request->email)->update(['verification_code'=>$code, 'referal_link'=>$referal_link,'phone'=>$request->phone]);

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


       // $this->guard()->login($user);

       // return $this->registered($request, $user)
                       // ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

        //return true;
    }
}
