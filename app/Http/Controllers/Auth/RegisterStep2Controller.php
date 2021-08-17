<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
// use BeyondCode\EmailConfirmation\Traits\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use Session;


class RegisterStep2Controller extends Controller
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
    // protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function postForm(Request $request)
    {
        // auth()->user()->update($request->only(['biography', 'country_id']));
        $verification_code = $request['verification_code'];
        $phone = '+' . preg_replace("/[^0-9A-Za-z]/", "", $request['phone']);
        if ($verification_code == Redis::get("$phone")) {
            $user = User::where('phone', $phone)->first();
            $user->update(['isVerified' => true]);
            /* Authenticate user */
            Auth::login($user);
            // Auth::login($user->first());
            // return redirect()->route('profile')->with(['message' => 'Phone number verified']);
            return response()->json(['state' => 'success']);
        }
        return response()->json(['error' => 'Invalid verification code entered!']);
    }

    public function sendSms(Request $request)
    {
        // auth()->user()->update($request->only(['biography', 'country_id']));
        $code = mt_rand(1000, 9999);
        $phone_number =  '+' . preg_replace("/[^0-9A-Za-z]/", "", $request['phone']);
        // $api_id = setting('sms_api_key');
        $api_id = env('SMS_API_KEY');
        Redis::set($phone_number, $code);
        $body = file_get_contents("https://sms.ru/sms/send?api_id=$api_id&to=$phone_number&msg=" . urlencode(iconv("windows-1251", "utf-8", "$code")) . "&json=1"); # Если приходят крякозябры, то уберите iconv и оставьте только urlencode("Привет!")
        $json = json_decode($body);
        if ($json) { // Получен ответ от сервера
            if ($json->status == "OK") { // Запрос выполнился
                foreach ($json->sms as $phone => $data_sms) { // Перебираем массив СМС сообщений
                    if ($data_sms->status == "OK") { // Сообщение отправлено
                        return response()->json(['state' => 'success', 'code' => $code]);
                    } else { // Ошибка в отправке
                        echo "Номер телефона неверный";
                    }
                }
                echo "";
            } else { // Запрос не выполнился (возможно ошибка авторизации, параметрах, итд...)
                echo trans('message.sms_fail');
            }
        } else {

            echo "Запрос не выполнился. Не удалось установить связь с сервером. ";
        }
    }
}