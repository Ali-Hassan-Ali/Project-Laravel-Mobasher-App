<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class UserAuthController extends Controller
{

   //https://www.tutsmake.com/laravel-8-how-to-send-sms-notification-to-mobile-phone/


    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 2; // Default is 1

   public function NewAcount(RegisterRequest $request){
    $city = $request->only('city');

        $apartments = Apartment::where('city' , 'like', "%$city%")->get();

        return response()->api($apartments);
    $checkphone =User::where('phone', '=', $request->only("phone"))->first();
    $checkemail =User::where("Email", '=',$request->only("Email"))->first();

     if($checkphone)
        {
            return response(
            [
            'message' => 'phone number is not available',
            'error' =>true ,
            ],205);
        }
     else if ($checkemail)
      {
        return response(
            [
            'message' => 'Email  is not available',
            'error' =>true ,
            ],205);

      }
   else {

    $user = User::create($request->only("f_name","l_name","phone", "Email", "image")+
    [
    "password" => bcrypt($request->input('password') ),
   ]);

 //   if ($request->photo) {

 //     $path = $request->file('image')->store('images');
 //     $image->url = $path;
 //    }
   $otp = rand(1000,9999);
   $user->OTP =  $otp;
   $user->save();
 //  \Mail::to($request->email)->send(new sendEmail($mail_details));
 //  SendSMS($otp);

  return response([
       'message' => 'ok',
       'error' =>false ,
        'user'=>$user,
        'subject' => 'OTP sent  successfully tp youer phone number',
        'body' => ' OTP  '. $otp
       ],201);
    }





  }


  function login(Request $request)
{

  $creadentials =$request->only('phone','password');
    if(!\Auth::attempt($creadentials)){
        return response([
            'message' => 'Unauthorized',
            'error' =>true
        ],206);
    }
    $user = \Auth::user();

//     if(!$user->Phone_verified_at ){

//     $otp = rand(1000,9999);
//     $user->OTP = $otp;
//     $user->save();
// //    \Mail::to($request->email)->send(new sendEmail($mail_details));
//     //  SendSMS($otp);

//     // $jwt=$user->createToken('token',['admin'])->plainTextToken;

//     $jwt=$user->createToken('token')->plainTextToken;
//     $cookie= cookie('jwt',$jwt,60*24);

//    return response(
//     [
//     'message' => 'You must validet you number',
//     'error' =>false ,
//      'jwt'=>$jwt,
//      'subject' => 'OTP sent  successfully tp youer phone number',
//      'body' => 'Your OTP is : '. $otp
//     ],200);

//     }


    $jwt=$user->createToken('token')->plainTextToken;
    // $jwt=$user->createToken('token',['admin'])->plainTextToken;
    $cookie= cookie('jwt',$jwt,60*24);
    return
    response(
        [
        'message' => 'success',
        'error' =>false ,
         'jwt'=>$jwt,
         'user'=>$user
        ],202)
        ->withCookie($cookie);
  }

  public function user(Request $request){
    // return $request->user();
        //  return response()->json(UserResource::collection(auth()->user()));
        return response()->json(auth()->user());
  }
  public function logout()
  {
      $cookie=\Cookie::forget('jwt');
      return
      response(
          [
          'message' => 'success'
          ],202)
          ->withCookie($cookie);

        }

        public function updateInfo(updateInfoRequest $request){

            $user =$request->user();
            $user->update($request->only('first_name','last_name','email'));
            return response($user,202);
        }
        public function upadtePassword(upadtePasswordRequest $request){

            $user =$request->user();
            $user->update(
                [
             "password" => bcrypt($request->input('password') )
                ]);
            return response($user,202);
        }



        public function verifyOtp(Request $request){
            $user = \Auth::user();

            $user = User::where([['phone','=',$request->phone],['otp','=',$request->otp]])->first();
            if($user){
                auth()->login($user, true);

                $user->Phone_verified_at = date('Y-m-d H:i:s');
                $user->save();

                $jwt=$user->createToken('token',['admin'])->plainTextToken;
                $accessToken= cookie('jwt',$jwt,60*24);

                return response(["status" => 200, "message" => "Success", 'user' => \Auth::user(), 'access_token' => $accessToken]);
            }
            else{
                return response(["status" => 401, 'message' => 'Invalid']);
            }
        }

        public function SendSMS(int $Otp){
        $basic  = new \Nexmo\Client\Credentials\Basic('key', 'secret');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '9181600*****',
            'from' => 'Nexmo',
            'text' => 'AYou OTP number is :'. $otp
        ]);


        }



}
