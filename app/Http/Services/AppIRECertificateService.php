<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppIRECertificate ; 

class AppIRECertificateService {

	public function show($id) {
	    return AppIRECertificate::where('applications_idapplication',$id)->get() ; 
	}


	public function update($request,$id) {
		$appIRECertificate =  AppIRECertificate::where('applications_idapplication',$id)->first() ;
		$appIRECertificate->IRECertificateExist =$request->input('IRECertificateExist');
		if ($request->hasFile('copyIRE')) {
			if ($request->file('copyIRE')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('copyIRE'),Auth::guard('user')->user()->id,'copyIRE',$id) ;
			    $appIRECertificate->copyIRE = 'copyIRE'.$id ;
			}
		}
		
		
		$appIRECertificate->save() ; 
	}

	public function store($request,$idApplication,$idContractor) {
	    $appIRECertificate = new AppIRECertificate ;
	    $appIRECertificate->IRECertificateExist =$request->input('IRECertificateExist');
	    if ($request->hasFile('copyIRE')) {
	    	if ($request->file('copyIRE')->isValid()) {
	    	    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('copyIRE'),$idContractor,'copyIRE',$idApplication) ;
	    	    $appIRECertificate->copyIRE = 'copyIRE'.$idApplication ;
	    	}
	    }
	    $appIRECertificate->applications_idapplication = $idApplication ;
	    $appIRECertificate->applications_contractors_idcontractors  = $idContractor ;
	    $appIRECertificate->save() ; 


	}
}