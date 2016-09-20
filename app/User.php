<?php

namespace MyTailor;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laracasts\Commander\Events\EventGenerator;
use MyTailor\Modules\Users\Registration\Events\UserRegistered;
class User extends Authenticatable
{
    use EventGenerator;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $dates = ['last_login_at'];

    // hidden Attributes
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Each user has one profile.
     *
     * @return mixed
     */
    public function profile()
    {
        return $this->hasOne(Profile::class, 'id', 'profile_id')
                    ->select(['id','username','avatar']); //Profile is your profile model
    }

    /**
     * A shot may be published by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shots() {

        return $this->morphMany(Shot::class, 'publishable');
    }

    /**
     * A user may have many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Working with Roles
    |--------------------------------------------------------------------------
    |
    */

    /**
     * does our user have role of $name or not
     *
     * @param $name
     * @return bool
     */
    public function hasRole($name = [])
    {
        foreach($this->roles as $role){

            if(in_array($role->name, $name)) return true;
        }

        return false;
    }

    /**
     * @param $role
     */
    public function assignRole($role){
        return $this->roles()->attach($role);
    }

    /**
     * @param $role
     * @return int
     */
    public function revokeRole($role){
        return $this->roles()->detach($role);
    }

    /*
    |--------------------------------------------------------------------------
    | CRUD Actions
    |--------------------------------------------------------------------------
    |
    */

    /**
     * registers the user and raise event.
     *
     * @param $userData
     * @param $role
     * @return User
     */
    public static function register($userData, $role)
    {
        $profile = new Profile();
        $profile->avatar = $userData->avatar;
        $profile->username = $userData->username;
        $profile->save();

        $user = new User();
        $user->email = $userData->email;
        $user->password = bcrypt($userData->password);
        $user->profile_id = $profile->id;
        $user->save();
        $user->assignRole(4);


        $user->raise(new UserRegistered($user));

        return $user;
    }



}
