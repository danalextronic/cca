<?php

namespace App;
use Auth ;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class AppBusinessStructure extends Model
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
    protected $table = 'appBusinessStructure' ;
    protected $primaryKey='idbusinessStructureApplication';
    protected $fillable = [
    	'structureName','applications_idapplication','applications_contractors_idcontractors','created_at','updated_at',
    ];
}
