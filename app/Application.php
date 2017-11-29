<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;
use Auth ;
class Application extends Model
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
    protected $fillable = [
    	'applicationNumber','applicationType','applicationStatus','contractors_idcontractors','created_at','updated_at'
    ];
    protected $primaryKey = 'idapplication' ;

}
