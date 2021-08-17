<?php

namespace App;
use App\Models\Message;
use App\Models\Reviews;
use App\Models\Cars;
use App\Models\Info;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'name',
        'phone',
        'password',
        'isVerified',
        'avatar',
        'invited_id',
        'balance',
        'series',
        'surname',
        'sex',
        'birthday',
        'profile',
        'google_id',
        'vk_id',
        'facebook_id',
        'email_verified_at',
        'email_verification_token',
        'active',
        'last_login_at',
        'last_login_ip',
        'notification_id',
        'middle_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsToMany('App\Models\Roles', 'role_user');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function supportMessages()
    {
        return $this->hasMany(SupportMessage::class);
    }

    public function cars()
    {
        // return $this->belongsToMany(Cars::class)
        //     ->using(CarUser::class);
        return $this->hasMany ('App\Models\Cars', 'user_id')->where('bus', false);

    }

    public function passport()
    {
        return $this->hasOne ('App\Models\Passport', 'user_id');
    }

    public function license()
    {
        return $this->hasOne ('App\Models\DriverLisence', 'user_id');
    }

    public function buses()
    {
        // return $this->belongsToMany(Cars::class)
        //     ->using(CarUser::class);
        return $this->hasMany('App\Models\Cars', 'user_id')->where('bus', true);
    }

    public function trucks()
    {
        // return $this->belongsToMany(Cars::class)
        //     ->using(CarUser::class);
        return $this->hasMany('App\Models\Trucks', 'user_id');
    }

    public function preference()
    {
        // return $this->belongsToMany(Cars::class)
        //     ->using(CarUser::class);
        return $this->hasOne('App\Models\Preferences', 'user_id');
    }

    public function info()
    {
        return $this->hasOne(Info::class, 'user_id');
    }

    public function left_reviews()
    {
        return $this->hasMany ('App\Models\Reviews', 'writer_id');
    }

    public function reviews()
    {
        return $this->hasMany ('App\Models\Reviews', 'receiver_id');
    }

    public function notifications()
    {
        return $this->hasOne('App\Models\Notifications', 'id');
    }

    public function transactions()
    {
        // return $this->belongsToMany(Cars::class)
        //     ->using(CarUser::class);
        return $this->hasMany('App\Models\Transactions', 'user_id');
    }

    public function marks(){
        $total = Reviews::where('receiver_id', $this->id)->sum('score');
        $counts = Reviews::where('receiver_id', $this->id)->get()->count();

        // return $total;
        // return $counts;

        if($counts != null && $counts != 0){
            return round($total/$counts, 2);
        }
        else{
            return 0;
        }
    }

}
