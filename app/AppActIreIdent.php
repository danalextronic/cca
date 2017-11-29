<?php

namespace App;
use Auth ;

use OwenIt\Auditing\AuditingTrait;

use Illuminate\Database\Eloquent\Model;

class AppActIreIdent extends Model
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
    protected $auditableTypes = ['created', 'saved', 'updated'];
    protected $table = 'appActIreIdent' ;
    protected $fillable = [
    	'companyName','address','phone','email','ABN','contactPerson','ireCertificateNumber','application_idapplication','applications_contractors_idcontractors','created_at','updated_at',
    ];
}
