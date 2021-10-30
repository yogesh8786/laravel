<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
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

    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin()
    {
        return $this->role_id == Role::ADMIN;
    }

    /**
     * Check user role is Admin
     *
     * @return boolean
     */
    public function isUser()
    {
        return $this->role_id == Role::USER;
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getProfilePhotoUrlAttribute()
    {
        if (preg_match('(https://|http://)', $this->profile_photo) === 1) {
            return $this->profile_photo;
        }
        return !empty($this->profile_photo) ? asset("assets/img/user-img/$this->profile_photo") : asset('assets/img/user-icon.png');
    }

    public function unseenMessage()
    {
        return Chat::where(['receiver_id' => Auth::id(), 'sender_id' => $this->id, 'seen_status' => 0])->count();
    }

    public function lastMessageTime()
    {
        $relation = ChatRelation::where(function($q){
            $q->where([
                'sender_id'      => Auth::id(),
                'receiver_id'    => $this->id,
            ]);
          })->orWhere(function($q){
            $q->where([
                'sender_id'      => $this->id,
                'receiver_id'    => Auth::id(),
            ]);
        })->first();

        if($relation)
        {
            return Chat::where('chat_relation_id', $relation->id)->latest()->first();
        }
        else
        {
            return 0;
        }
    }
}
