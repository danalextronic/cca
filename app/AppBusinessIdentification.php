<?php

namespace App;
use Auth ;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class AppBusinessIdentification extends Model
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
     protected $table = 'appBusinessIdentifications' ;
     protected $primaryKey='idbusinessIdentifications';
     protected $fillable = [
    	'businessName','tradingName','address','abn','email','phone','mobile','contactPerson','trade','companyTradeLicence','noEmployees','noSubcontractors','principalContractorName','applications_idapplication','applications_contractors_idcontractors','created_at','updated_at ',
    ];
}
