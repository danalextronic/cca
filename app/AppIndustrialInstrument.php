<?php

namespace App;
use Auth ;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class AppIndustrialInstrument extends Model
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
    protected $table = 'appIndustrialInstrument' ;
    protected $primaryKey = 'idindustrialInstrument' ;
    protected $fillable = [
    	'industrialInstrumentNameAgreement','industrialInstrumentCopy','application_idapplication','applications_contractors_idcontractors','created_at','updated_at',
    ];
}
