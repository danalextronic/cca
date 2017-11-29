<?php

namespace App\Http\Services ; 
use App\AppIreEnterpriseAgreement ;
use Auth ;
class AppIreEnterpriseAgreementService {
	
	public function show($id) {
	    return AppIreEnterpriseAgreement::where('applications_idapplication',$id)->get() ; 
	}


	public function store($request,$idApplication,$idContractor) {
		$AppIreEnterpriseAgreement = new AppIreEnterpriseAgreement ;
		$AppIreEnterpriseAgreement->ireEnterpriseAgreementExist = $request->input('ireEnterpriseAgreementExist') ;
		if ($request->hasFile('ireEnterpriseAgreementCopy')) {
			if ($request->file('ireEnterpriseAgreementCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('ireEnterpriseAgreementCopy'),$idContractor,'ireEnterpriseAgreementCopy',$idApplication) ;
			    $AppIreEnterpriseAgreement->copy = 'ireEnterpriseAgreementCopy-'.$idApplication ;
			}
		}
		$AppIreEnterpriseAgreement->applications_idapplication = $idApplication ;
		$AppIreEnterpriseAgreement->applications_contractors_idcontractors = $idContractor ;
		$AppIreEnterpriseAgreement->save() ;
	}

	public function update($request , $id) {
		$AppIreEnterpriseAgreement = AppIreEnterpriseAgreement::where('applications_idapplication',$id)->first();
		$AppIreEnterpriseAgreement->ireEnterpriseAgreementExist = $request->input('ireEnterpriseAgreementExist') ;
		if ($request->hasFile('ireEnterpriseAgreementCopy')) {
			if ($request->file('ireEnterpriseAgreementCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('ireEnterpriseAgreementCopy'),Auth::guard('user')->user()->id,'ireEnterpriseAgreementCopy',$id) ;
			    $AppIreEnterpriseAgreement->copy = 'ireEnterpriseAgreementCopy-'.$id ;
			}
		}
		
		$AppIreEnterpriseAgreement->save() ;
	}	

}