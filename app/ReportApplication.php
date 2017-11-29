<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth ;
use OwenIt\Auditing\AuditingTrait;

class ReportApplication extends Model
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
        } 
        protected $table = 'applications_has_report';
        protected $fillable = [
           'applications_idapplication','report_id','created_at','updated_at'
        ] ;
}
