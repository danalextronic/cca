<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppLongServiceLeave ;

class AppLongServiceLeaveService {

	public function store($request,$idApplication,$idContractor) {
	    $appLongServiceLeave = new AppLongServiceLeave ;
	    $appLongServiceLeave->longServiceLeaveExist =$request->input('longServiceLeaveExist');
	    if ($request->hasFile('certificateOfEmployerRegistration') ) {

	        if ($request->file('certificateOfEmployerRegistration')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('certificateOfEmployerRegistration'),$idContractor,'certificateOfEmployerRegistration',$idApplication) ;
	            $appLongServiceLeave->certificateOfEmployerRegistration = 'certificateOfEmployerRegistration'.$idApplication ;
	        }
	    }
	    if ($request->hasFile('listOfWorkersLSLB') ) {

	        if ($request->file('listOfWorkersLSLB')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('listOfWorkersLSLB'),$idContractor,'listOfWorkersLSLB',$idApplication) ;
	            $appLongServiceLeave->listOfWorkersLSLB = 'listOfWorkersLSLB'.$idApplication ;
	        }
	    }
	    if ($request->hasFile('copyLastReturn') ) {

	        if ($request->file('copyLastReturn')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('copyLastReturn'),$idContractor,'copyLastReturn',$idApplication) ;
	            $appLongServiceLeave->copyLastReturn = 'copyLastReturn'.$idApplication ;
	        }
	    }
	    $appLongServiceLeave->applications_idapplication = $idApplication ;
	    $appLongServiceLeave->applications_contractors_idcontractors  = $idContractor ;
	    $appLongServiceLeave->save() ;
	}

	public function update($request,$id) {
		$appLongServiceLeave =  AppLongServiceLeave::where('applications_idapplication',$id)->first() ;
		$appLongServiceLeave->longServiceLeaveExist =$request->input('longServiceLeaveExist');
		if ($request->hasFile('certificateOfEmployerRegistration') ) {

		    if ($request->file('certificateOfEmployerRegistration')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('certificateOfEmployerRegistration'),Auth::guard('user')->user()->id,'certificateOfEmployerRegistration',$id) ;
		        $appLongServiceLeave->certificateOfEmployerRegistration = 'certificateOfEmployerRegistration'.$id ;
		    }
		}
		if ($request->hasFile('listOfWorkersLSLB') ) {

		    if ($request->file('listOfWorkersLSLB')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('listOfWorkersLSLB'),Auth::guard('user')->user()->id,'listOfWorkersLSLB',$id) ;
		        $appLongServiceLeave->certificateOfEmployerRegistration = 'listOfWorkersLSLB'.$id ;
		    }
		}
		if ($request->hasFile('copyLastReturn') ) {

		    if ($request->file('copyLastReturn')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('copyLastReturn'),Auth::guard('user')->user()->id,'copyLastReturn',$id) ;
		        $appLongServiceLeave->certificateOfEmployerRegistration = 'copyLastReturn'.$id ;
		    }
		}
	
		$appLongServiceLeave->save() ;
	}
	public function show($id) {
		return AppLongServiceLeave::where('applications_idapplication',$id)->get() ;
	}
}