<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
// use BeyondCode\EmailConfirmation\Traits\RegistersUsers;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Exception;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'string', 'min:8', 'unique:users']
        ]);
        $code = mt_rand(1000, 9999);
        // $phone_number = $this->checkPhoneNumber('8618624401353')['phone'];
        $phone_number = $this->checkPhoneNumber($data['phone'])['phone'];
        Redis::set($phone_number, $code);
        if (User::where('phone',  $phone_number)->count() == 0) {
            // $data = $this->getData($request);
            if ($this->checkPhoneNumber($phone_number)['check']) {
                $api_id = env('SMS_API_KEY');
                try {
                    $body = file_get_contents("https://sms.ru/sms/send?api_id=$api_id&to=$phone_number&msg=" . urlencode(iconv("windows-1251", "utf-8", "$code")) . "&json=1"); # Если приходят крякозябры, то уберите iconv и оставьте только urlencode("Привет!")
                    $json = json_decode($body);
                    Redis::set($phone_number, $code);
                    if ($json) { // Получен ответ от сервера
                        if ($json->status == "OK") { // Запрос выполнился
                            foreach ($json->sms as $phone => $data_sms) { // Перебираем массив СМС сообщений
                                if ($data_sms->status == "OK") { // Сообщение отправлено
                                    $user = User::create([
                                        'email' => $data['email'],
                                        'phone' => $phone_number,
                                        'password' => Hash::make($data['password']),
                                        'email_verification_token' => Str::random(32)
                                    ]);
                                    $user->role()->sync([4]);
                                    // Mail::to($user->email)->send(new VerificationEmail($user));
                                    return response()->json(['state' => 'success', 'code' => $code]);
                                } else { // Ошибка в отправке
                                    echo trans('message.invalid_phone_number');
                                }
                            }
                        } else { // Запрос не выполнился (возможно ошибка авторизации, параметрах, итд...)
                            echo trans('message.sms_server_fail');
                        }
                    } else {
                        echo trans('message.sms_fail');
                    }
                } catch (Exception $exception) {

                    // echo $exception;
                }
            } else {
                echo trans('message.invalid_phone_number');
            }
        } else {
            echo trans('message.existing_phone_number');
        }
    }
    protected function checkPhoneNumber($phone, $all = true)
    {
        //очистка от лишнего мусора
        $phoneFormat = '+' . preg_replace("/[^0-9A-Za-z]/", "", $phone);

        //проверка номера мир
        $pattern_world = "/^\+?([87](?!95[4-79]|99[08]|907|94[^0]|336)([348]\d|9[0-6789]|7[0247])\d{8}|[1246]\d{9,13}|68\d{7}|5[1-46-9]\d{8,12}|55[1-9]\d{9}|55[12]19\d{8}|500[56]\d{4}|5016\d{6}|5068\d{7}|502[45]\d{7}|5037\d{7}|50[4567]\d{8}|50855\d{4}|509[34]\d{7}|376\d{6}|855\d{8}|856\d{10}|85[0-4789]\d{8,10}|8[68]\d{10,11}|8[14]\d{10}|82\d{9,10}|852\d{8}|90\d{10}|96(0[79]|17[01]|13)\d{6}|96[23]\d{9}|964\d{10}|96(5[69]|89)\d{7}|96(65|77)\d{8}|92[023]\d{9}|91[1879]\d{9}|9[34]7\d{8}|959\d{7}|989\d{9}|97\d{8,12}|99[^4568]\d{7,11}|994\d{9}|9955\d{8}|996[57]\d{8}|9989\d{8}|380[3-79]\d{8}|381\d{9}|385\d{8,9}|375[234]\d{8}|372\d{7,8}|37[0-4]\d{8}|37[6-9]\d{7,11}|30[69]\d{9}|34[67]\d{8}|3[12359]\d{8,12}|36\d{9}|38[1679]\d{8}|382\d{8,9}|46719\d{10})$/";
        //проверка номера снг
        $pattern_sng = "/^((\+?7|8)(?!95[4-79]|99[08]|907|94[^0]|336)([348]\d|9[0-6789]|7[0247])\d{8}|\+?(99[^4568]\d{7,11}|994\d{9}|9955\d{8}|996[57]\d{8}|9989\d{8}|380[34569]\d{8}|375[234]\d{8}|372\d{7,8}|37[0-4]\d{8}))$/";

        if ($all) {
            $patt = $pattern_world;
        } else {
            $patt = $pattern_sng;
        }

        if (!preg_match($patt, $phoneFormat)) {
            return array('phone' => $phoneFormat, 'check' => false);
        }

        return array('phone' => $phoneFormat, 'check' => true);
    }
}
