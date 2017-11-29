<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth ;
use OwenIt\Auditing\AuditingTrait;
class Report extends Model
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
        protected $table = 'reports' ;
        protected $fillable = [
           'isApplication','signature','created_at','updated_at'
        ] ;
}
