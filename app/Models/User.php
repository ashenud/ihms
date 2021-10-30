<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctor() {
        return $this->belongsTo('App\Models\Doctor\Doctor','user_id','doctor_id');
    }

    public function sister() {
        return $this->belongsTo('App\Models\Sister\Sister','user_id','sister_id');
    }

    public function midwife() {
        return $this->belongsTo('App\Models\Midwife\Midwife','user_id','midwife_id');
    }

    public function mother() {
        return $this->belongsTo('App\Models\Mother\Mother','user_id','mother_nic');
    }

}
