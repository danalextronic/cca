<?php

namespace App\Http\Services ; 
use App\AppIrePublicLiability ;
use Auth ;
class AppIrePublicLiabilityService {
	
	public function show($id) {
	    return AppIrePublicLiability::where('applications_idapplication',$id)->get() ; 
	}


	public function store($request,$idApplication,$idContractor) {
		$AppIrePublicLiability = new AppIrePublicLiability ;
		$AppIrePublicLiability->irePublicLiabilityExist = $request->input('irePublicLiabilityExist') ;
		if ($request->hasFile('irePublicLiabilityCopy')) {
			if ($request->file('irePublicLiabilityCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('irePublicLiabilityCopy'),$idContractor,'irePublicLiabilityCopy',$idApplication) ;
			    $AppIrePublicLiability->copy = 'irePublicLiabilityCopy-'.$idApplication ;
			}
		}
		$AppIrePublicLiability->applications_idapplication = $idApplication ;
		$AppIrePublicLiability->applications_contractors_idcontractors = $idContractor ;
		$AppIrePublicLiability->save() ;
	}

	public function update($request , $id) {
		$AppIrePublicLiability = AppIrePublicLiability::where('applications_idapplication',$id)->first();
		$AppIrePublicLiability->irePublicLiabilityExist = $request->input('irePublicLiabilityExist') ;
		if ($request->hasFile('irePublicLiabilityCopy')) {
			if ($request->file('irePublicLiabilityCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('irePublicLiabilityCopy'),Auth::guard('user')->user()->id,'irePublicLiabilityCopy',$id) ;
			    $AppIrePublicLiability->copy = 'irePublicLiabilityCopy-'.$id ;
			}
		}
		
		$AppIrePublicLiability->save() ;
	}	

}