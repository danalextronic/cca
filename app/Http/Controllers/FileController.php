<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Services\FileService ;

use Auth ;

use URL ;
class FileController extends Controller
{
    /*public function __construct() {
    	$this->middleware('admin') ;
    }*/

    public function getFile($idContractor,$idApplication,$date,$filename) {
    	if (Auth::guard('admin')->user() || Auth::guard('user')->user()->id == $idContractor ) {
    		$fileService = new FileService ;
    		return $fileService->getFile($idContractor,$idApplication,$date,$filename) ;
    	}

    	else {
    		redirect(URL::previous()) ;
    	}
    	
    }
    
}
