<?php

namespace App;
use Auth ;
use OwenIt\Auditing\AuditingTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Client extends Authenticatable
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
            else if (Auth::guard('client')->check()) {
                return Auth::guard('client')->user()->getAuthIdentifier();
            }
        } catch (\Exception $e) {
            return;
        }
    } // actions to audit
    protected $table = 'clients' ;
    protected $fillable = [
    'companyName','username','password','admins_id','created_at','updated_at'
    ] ;
    protected $hidden = [
        'password', 'remember_token',
    ];
}
