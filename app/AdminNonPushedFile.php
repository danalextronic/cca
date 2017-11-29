<?php

namespace App;
use Auth ;
use Illuminate\Database\Eloquent\Model;

class AdminNonPushedFile extends Model
{
    protected $table = 'adminNonPushedFiles' ;
    protected $fillable = [
        'filename','companyName','applications_idapplication','applications_contractors_idcontractors'
    ];

}
