<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth ;
use OwenIt\Auditing\AuditingTrait;
class ReportSubContractor extends Model
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
	    protected $table = 'reportSubContractors' ;
	    protected $fillable = [
	       'subContractorName','ABN','businessStructure','IRECertificate','ccaReport','insurance','type','reports_id','created_at','updated_at'
	    ] ;
}
