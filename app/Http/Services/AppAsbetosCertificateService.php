<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;
use App\AppAsbetosCertificate ; 

class AppAsbetosCertificateService {

	public function  show($id) {
	    return AppAsbetosCertificate::where('applications_idapplication',$id)->get() ;
	}
	
	public function update($request,$id) {
		$appAsbestosAwarenessCertificate =  AppAsbetosCertificate::where('applications_idapplication',$id)->first() ;
		if($request->hasFile('asbestosAwarenessCertificateCopy')) {
			if ($request->file('asbestosAwarenessCertificateCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('asbestosAwarenessCertificateCopy'),Auth::guard('user')->user()->id,'asbestosAwarenessCertificateCopy',$id) ;
			    $appAsbestosAwarenessCertificate->copy = 'asbestosAwarenessCertificateCopy'.$id ;
			}
		}

		$appAsbestosAwarenessCertificate->save() ;
	}
	public function  store($request,$idApplication,$idContractor)
	{
	    $appAsbestosAwarenessCertificate = new AppAsbetosCertificate ;
	    if($request->hasFile('asbestosAwarenessCertificateCopy')) {
	    	if ($request->file('asbestosAwarenessCertificateCopy')->isValid()) {
	    	    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('asbestosAwarenessCertificateCopy'),$idContractor,'asbestosAwarenessCertificateCopy',$idApplication) ;
	    	    $appAsbestosAwarenessCertificate->copy = 'asbestosAwarenessCertificateCopy'.$idApplication ;
	    	}
	    }
	    $appAsbestosAwarenessCertificate->applications_idapplication = $idApplication ;
	    $appAsbestosAwarenessCertificate->applications_contractors_idcontractors  = $idContractor ;
	    $appAsbestosAwarenessCertificate->save() ;
	}

}