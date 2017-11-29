<?php

namespace App\Http\Services ; 
use App\AppIreSuperAnnuation ;
use Auth ;
class AppIreSuperAnnuationService {
	
	public function show($id) {
	    return AppIreSuperAnnuation::where('applications_idapplication',$id)->get() ; 
	}


	public function store($request,$idApplication,$idContractor) {
		$AppIreSuperAnnuation = new AppIreSuperAnnuation ;
		$AppIreSuperAnnuation->ireSuperAnnuationExist = $request->input('superAnnuationExist') ;
		if ($request->hasFile('superAnnuationCopy')) {
			if ($request->file('superAnnuationCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('superAnnuationCopy'),$idContractor,'superAnnuationCopy',$idApplication) ;
			    $AppIreSuperAnnuation->copy = 'superAnnuationCopy-'.$idApplication ;
			}
		}
		$AppIreSuperAnnuation->applications_idapplication = $idApplication ;
		$AppIreSuperAnnuation->applications_contractors_idcontractors = $idContractor ;
		$AppIreSuperAnnuation->save() ;
	}

	public function update($request , $id) {
		$AppIreSuperAnnuation = AppIreSuperAnnuation::where('applications_idapplication',$id)->first();
		$AppIreSuperAnnuation->ireSuperAnnuationExist = $request->input('superAnnuationExist') ;
		if ($request->hasFile('superAnnuationCopy')) {
			if ($request->file('superAnnuationCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('superAnnuationCopy'),Auth::guard('user')->user()->id,'superAnnuationCopy',$id) ;
			    $AppIreSuperAnnuation->copy = 'superAnnuationCopy-'.$id ;
			}
		}

		$AppIreSuperAnnuation->save() ;
	}	

}