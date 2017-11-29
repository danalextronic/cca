<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\User ;

class UserService {

	public function getAllUsers() {
		return User::orderBy('id','desc')->get() ;
	}
} 