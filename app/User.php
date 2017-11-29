<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\AuditingTrait;
use Auth ;
// Contractor
class User extends Authenticatable
{
    use AuditingTrait;
    
    // Override Auditing Trait function
    protected function getLoggedInUserId()
    {
        try {
            if (Auth::guard('user')->check()) {
                return Auth::guard('user')->user()->getAuthIdentifier();
            }

            else if (Auth::guard('admin')->check()) {
                return Auth::guard('admin')->user()->getAuthIdentifier();
            }
        } catch (\Exception $e) {
            return;
        }
    } // actions to audit
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
    protected $fillable = [
        'name', 'email', 'password','contractorFirstname','contractorLastname','contractorCompany','contractorContactNumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    
    protected $hidden = [
        'password', 'remember_token',
    ];

   
}
