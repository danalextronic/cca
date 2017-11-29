<?php

namespace App\Http\Services ; 
use App\AppIreAppForms ;
use Auth ;
class AppIreAppFormsService {
	
	public function show($id) {
	    return AppIreAppForms::where('applications_idapplication',$id)->get() ; 
	}


	public function store($request,$idApplication,$idContractor) {
		$appIreAppForms = new AppIreAppForms ;
		if ($request->hasFile('ireAppFormsCopy')) {
			if ($request->file('ireAppFormsCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('ireAppFormsCopy'),$idContractor,'ireAppFormsCopy',$idApplication) ;
			    $appIreAppForms->copy = 'appIreAppForms-'.$idApplication ;
			}
		}
		$appIreAppForms->applications_idapplication = $idApplication ;
		$appIreAppForms->applications_contractors_idcontractors = $idContractor ;
		$appIreAppForms->save() ;
	}

	public function update($request , $id) {
		$appIreAppForms = AppIreAppForms::where('applications_idapplication',$id)->first();
		if ($request->hasFile('ireAppFormsCopy')) {
			if ($request->file('ireAppFormsCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('ireAppFormsCopy'),Auth::guard('user')->user()->id,'ireAppFormsCopy',$id) ;
			    $appIreAppForms->copy = 'appIreAppForms-'.$id ;
			}
		}
		$appIreAppForms->save() ;

	}	

}