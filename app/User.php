<?php

namespace MyTailor;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
use MyTailor\Modules\Users\Registration\Events\UserRegistered;
class User extends Authenticatable
{
    use EventGenerator, PresentableTrait;

    /**
     * Attributes that can be massed assigned.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name', 'email', 'password'];

    protected $dates = ['last_login_at'];
    /**
     * Attributes that are hidden from the model.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Path to Users Presenter Class.
     *
     * @var string
     */
    protected $presenter = 'MyTailor\Presenters\Users\UsersPresenter';

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
        return $this->hasOne(Profile::class, 'id', 'profile_id');
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
     * A shot can be owned by a Designer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topShots() {

        return $this->morphMany(Shot::class, 'publishable')
            ->select(\DB::raw( '((views - 1) / (TIMESTAMPDIFF(MINUTE, updated_at, NOW()) + 2)^1.5) as Popularity, shots.*'))
            ->orderBy('Popularity', 'desc')
            ->where('published', '=', 1)
            ->groupBy('id')
            ->limit(6);
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
    | Appends
    |--------------------------------------------------------------------------
    |
    */



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
     * @return User
     */
    public static function register($userData)
    {

        $profile = new Profile();
        $profile->display_name = $userData->first_name. ' ' . $userData->last_name;
        //$profile->username = $userData->username;
        $profile->save();

        $user = new User();
        $user->first_name = $userData->first_name;
        $user->last_name = $userData->last_name;
        $user->email = $userData->email;
        $user->password = bcrypt($userData->password);
        $user->profile_id = $profile->id;
        $user->save();
        $user->assignRole($userData->roleID);


        $user->raise(new UserRegistered($user));

        return $user;
    }



}
