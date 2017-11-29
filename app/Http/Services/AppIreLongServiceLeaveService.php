<?php

namespace App\Http\Services ; 
use App\AppIreLongServiceLeave ;
use Auth ;
class AppIreLongServiceLeaveService {
	
	public function show($id) {
	    return AppIreLongServiceLeave::where('applications_idapplication',$id)->get() ; 
	}


	public function store($request,$idApplication,$idContractor) {
		$AppIreLongServiceLeave = new AppIreLongServiceLeave ;
		$AppIreLongServiceLeave->ireLongServiceLeaveExist = $request->input('ireLongServiceLeaveExist') ;
		if ($request->hasFile('ireLongServiceLeaveCopy')) {
			if ($request->file('ireLongServiceLeaveCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('ireLongServiceLeaveCopy'),$idContractor,'ireLongServiceLeaveCopy',$idApplication) ;
			    $AppIreLongServiceLeave->copy = 'ireLongServiceLeaveCopy-'.$idApplication ;
			}
		}
		$AppIreLongServiceLeave->applications_idapplication = $idApplication ;
		$AppIreLongServiceLeave->applications_contractors_idcontractors = $idContractor ;
		$AppIreLongServiceLeave->save() ;
	}

	public function update($request , $id) {
		$AppIreLongServiceLeave = AppIreLongServiceLeave::where('applications_idapplication',$id)->first();
		$AppIreLongServiceLeave->ireLongServiceLeaveExist = $request->input('ireLongServiceLeaveExist') ;
		if ($request->hasFile('ireLongServiceLeaveCopy')) {
			if ($request->file('ireLongServiceLeaveCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('ireLongServiceLeaveCopy'),Auth::guard('user')->user()->id,'ireLongServiceLeaveCopy',$id) ;
			    $AppIreLongServiceLeave->copy = 'ireLongServiceLeaveCopy-'.$id ;
			}
		}
		
		$AppIreLongServiceLeave->save() ;
	}	

}