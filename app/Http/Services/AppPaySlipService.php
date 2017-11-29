<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppPaySlip ; 

class AppPaySlipService {

	
	public function show($id){
	    return AppPaySlip::where('applications_idapplication',$id)->get() ; 
	}

	public function update($request,$id) {
		$appPaySlips =  AppPaySlip::where('applications_idapplication',$id)->first() ;
		if ($request->hasFile('payslipsCopy')) {

		    if ($request->file('payslipsCopy')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('payslipsCopy'),Auth::guard('user')->user()->id,'payslipsCopy',$id) ;
		        $appPaySlips->payslipsCopy = 'payslipsCopy'.$id ;
		    }
		}
		$appPaySlips->save() ;
	}


	public function store($request,$idApplication,$idContractor) {
	    $appPaySlips = new AppPaySlip ;
	    if ($request->hasFile('payslipsCopy')) {

	        if ($request->file('payslipsCopy')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('payslipsCopy'),$idContractor,'payslipsCopy',$idApplication) ;
	            $appPaySlips->payslipsCopy = 'payslipsCopy'.$idApplication ;
	        }
	    }
	    $appPaySlips->applications_idapplication = $idApplication ;
	    $appPaySlips->applications_contractors_idcontractors  = $idContractor ;
	    $appPaySlips->save() ;
	}
}