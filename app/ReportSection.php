<?php

namespace App;
use Auth ;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;


class ReportSection extends Model
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
	    protected $table = 'reportSections' ;
	    protected $fillable = [
	       'sectionName'
	    ] ;

}
