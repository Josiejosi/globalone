<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'name', 
        'surname', 
        'phone', 
        'country', 
        'is_active', 
        'is_blocked', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
      return $this->belongsToMany( Role::class ) ;
    }

    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles) {

        if (is_array($roles)) {
            return $this->hasAnyRole( $roles ) || abort( 401, 'This action is unauthorized.' ) ;
        }

        return $this->hasRole($roles) || abort( 401, 'This action is unauthorized.' ) ;
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles) {

        return null !== $this->roles()->whereIn( 'name', $roles )->first() ;

    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role) {

        return null !== $this->roles()->where( 'name', $role)->first() ;
        
    }
    /**
    * User Proof of payment.
    */
    public function proof() {

        return $this->hasOne( ProofOfActivation::class ) ;

    }
    /**
    * User's account.
    */
    public function account() {

        return $this->hasOne( Account::class ) ;

    }
    /**
    * User's btc account.
    */
    public function btc() {

        return $this->hasOne( Btc::class ) ;

    }
    /**
    * Users's level.
    */
    public function level() {

        return $this->hasOne( Level::class ) ;

    }

}
