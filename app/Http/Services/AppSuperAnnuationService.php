<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppSuperAnnuation ; 

class AppSuperAnnuationService {

	public function show($id) {
	    return AppSuperAnnuation::where('applications_idapplication',$id)->get() ;  
	}

	public function update($request,$id) {
		$appSuperAnnuation =  AppSuperAnnuation::where('applications_idapplication',$id)->first() ;
		$appSuperAnnuation->superAnnuationExist =$request->input('superAnnuationExist');
		if ($request->hasFile('CBUS')) {

		    if ($request->file('CBUS')->isValid()) {
		        
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('CBUS'),Auth::guard('user')->user()->id,'CBUS',$id) ;
		        $appSuperAnnuation->CBUS = 'CBUS'.$id ;
		    }
		}
		if ($request->hasFile('evidencePayement')) {

		    if ($request->file('evidencePayement')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('evidencePayement'),Auth::guard('user')->user()->id,'evidencePayement',$id) ;
		        $appSuperAnnuation->evidencePayement = 'evidencePayement'.$id ;
		    }
		}
		
		$appSuperAnnuation->save() ;
	}

	public function store($request,$idApplication,$idContractor) {
	    $appSuperAnnuation = new AppSuperAnnuation ;
	    $appSuperAnnuation->superAnnuationExist =$request->input('superAnnuationExist');
	    if ($request->hasFile('CBUS')) {

	        if ($request->file('CBUS')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('CBUS'),$idContractor,'CBUS',$idApplication) ;
	            $appSuperAnnuation->CBUS = 'CBUS'.$idApplication ;
	        }
	    }
	    if ($request->hasFile('evidencePayement')) {

	        if ($request->file('evidencePayement')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('evidencePayement'),$idContractor,'evidencePayement',$idApplication) ;
	            $appSuperAnnuation->evidencePayement = 'evidencePayement-'.$idApplication ;
	        }
	    }
	    $appSuperAnnuation->applications_idapplication = $idApplication ;
	    $appSuperAnnuation->applications_contractors_idcontractors  = $idContractor ;
	    $appSuperAnnuation->save() ;

	}
}