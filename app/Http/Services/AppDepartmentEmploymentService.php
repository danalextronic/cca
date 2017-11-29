<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppDepartmentEmployment ; 

class AppDepartmentEmploymentService {

	public function show($id) {
	    return AppDepartmentEmployment::where('applications_idapplication',$id)->get() ; 
	}

	public function update($request,$id) {
		$appDepartmentEmployment =  AppDepartmentEmployment::where('applications_idapplication',$id)->first() ;
		$appDepartmentEmployment->newEnterpriseAgreement = $request->input('newEnterpriseAgreement');
		$appDepartmentEmployment->currentLetterFromFWBC  = $request->input('currentLetterFromFWBC ');
		if ($request->hasFile('letterComplianceCopy')) {

	        if ($request->file('letterComplianceCopy')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('letterComplianceCopy'),Auth::guard('user')->user()->id,'letterComplianceCopy',$id) ;
	            $appDepartmentEmployment->letterComplianceCopy = 'letterComplianceCopy'.$id ;
	        }
	    }
		
		$appDepartmentEmployment->save() ;
	}

	public function store($request,$idApplication,$idContractor) {
	    $appDepartmentEmployment = new AppDepartmentEmployment ;
	    $appDepartmentEmployment->newEnterpriseAgreement = $request->input('newEnterpriseAgreement');
	    $appDepartmentEmployment->currentLetterFromFWBC  = $request->input('currentLetterFromFWBC');
	    if ($request->hasFile('letterComplianceCopy')) {

	        if ($request->file('letterComplianceCopy')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('letterComplianceCopy'),$idContractor,'letterComplianceCopy',$idApplication) ;
	            $appDepartmentEmployment->letterComplianceCopy = 'letterComplianceCopy'.$idApplication ;
	        }
	    }
	    $appDepartmentEmployment->applications_idapplication = $idApplication ;
	    $appDepartmentEmployment->applications_contractors_idcontractors  = $idContractor ;
	    $appDepartmentEmployment->save() ;
	}
}