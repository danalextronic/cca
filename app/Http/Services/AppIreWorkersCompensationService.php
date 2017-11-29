<?php

namespace App\Http\Services ; 
use App\AppIreWorkersCompensation ;
use Auth ;
class AppIreWorkersCompensationService {
	
	public function show($id) {
	    return AppIreWorkersCompensation::where('applications_idapplication',$id)->get() ; 
	}


	public function store($request,$idApplication,$idContractor) {
		$appIreWorkersCompensation = new AppIreWorkersCompensation ;
		$appIreWorkersCompensation->ireWorkersCompensationExist = $request->input('ireWorkersCompensationExist') ;
		if ($request->hasFile('ireWorkersCompensationCopy')) {
			if ($request->file('ireWorkersCompensationCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('ireWorkersCompensationCopy'),$idContractor,'ireWorkersCompensationCopy',$idApplication) ;
			    $appIreWorkersCompensation->copy = 'ireWorkersCompensationCopy-'.$idApplication ;
			}
		}
		$appIreWorkersCompensation->applications_idapplication = $idApplication ;
		$appIreWorkersCompensation->applications_contractors_idcontractors = $idContractor ;
		$appIreWorkersCompensation->save() ;
	}

	public function update($request , $id) {
		$appIreWorkersCompensation = AppIreWorkersCompensation::where('applications_idapplication',$id)->first();
		$appIreWorkersCompensation->ireWorkersCompensationExist = $request->input('ireWorkersCompensationExist') ;
		if ($request->hasFile('ireWorkersCompensationCopy')) {
			if ($request->file('ireWorkersCompensationCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('ireWorkersCompensationCopy'),Auth::guard('user')->user()->id,'ireWorkersCompensationCopy',$id) ;
			    $appIreWorkersCompensation->copy = 'ireWorkersCompensationCopy-'.$id ;
			}
		}
		$appIreWorkersCompensation->save() ;

	}	

}