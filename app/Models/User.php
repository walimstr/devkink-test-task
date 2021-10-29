<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'email',
        'password',
    ];

    protected $appends = ['username'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserNameAttribute()
    {
        $username = $this->first_name.' '.$this->last_name;
        return $username;
    }

    public static function updateUserProfile($request) {
        try {
            if($request['password']) {
                if($request['password'] === $request['password_confirmation']) {
                    self::where('id', '=', Auth::user()->id)->update([
                        'password' => Hash::make($request['password'])
                    ]);
                } else {
                    return collect([
                        'status' => false,
                        'message' => 'password and confirm password not match'
                    ]);
                }
            }
            self::where('id','=',Auth::user()->id)->update([
                'first_name' => isset($request['first_name']) ? $request['first_name'] : Auth::user()->first_name,
                'last_name' => isset($request['last_name']) ? $request['last_name'] : Auth::user()->last_name,
                'dob' => isset($request['dob']) ? $request['dob'] : Auth::user()->dob,
                'email' => isset($request['email']) ? $request['email'] : Auth::user()->email
            ]);
            return collect([
                'status' => true,
                'message' => 'profile update successfully'
            ]);
        } catch (\Exception $e) {
            return collect([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
