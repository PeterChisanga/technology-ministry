<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    /**
     * Get the messages sent by this user.
     */
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    /**
     * Get the messages received by this user.
     */
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }

    /**
     * Get the conversations where this user is a participant.
     */
    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'messages', 'sender_id', 'recipient_id')
            ->orWhere(function ($query) {
                $query->where('recipient_id', $this->id)
                    ->where('sender_id', $this->id);
            })
            ->withTimestamps();
    }

    public function boards(){
        return $this->hasMany(Board::class);
    }

    public function hrs(){
        return $this->hasMany(Hr::class);
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
