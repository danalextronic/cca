<?php

namespace App;
use Auth ;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class GoogleDriveFile extends Model
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
    protected $table = 'googleDriveFile' ;
    protected $fillable = [
    'idAdmin','idFile','nameFile','idFolderContractor','idFolderApplication','idFolderDate','created_at','updated_at'
    ] ;

}
