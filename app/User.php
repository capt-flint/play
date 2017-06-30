<?php

namespace App;

use App\Models\Friend;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Get all
     * @return mixed
     */
    public function getFriends()
    {
        $result = DB::table('friends')
            ->where('status', 1)
            ->where('user_1', $this->id)
            ->orWhere('user_2', $this->id)
            ->get();

        foreach ($result as $friend) {
            if ($friend->user_1 !== $this->id) {
                $friendsIds[] = $friend->user_1;
            } else {
                $friendsIds[] = $friend->user_2;
            }
        }

        return User::whereIn('id', $friendsIds)->get();

    }
}
