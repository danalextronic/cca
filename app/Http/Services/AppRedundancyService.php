<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppRedundancy ;

class AppRedundancyService {

	public function show($id) {
	  return AppRedundancy::where('applications_idapplication',$id)->get() ;  
	}

	public function update($request,$id) {
		$appRedundancy =  AppRedundancy::where('applications_idapplication',$id)->first() ;
		$appRedundancy->redundancyContribution = $request->get('redundancyExist') ;
		$appRedundancy->fundName = $request->input('fundName') ;
		if ($request->hasFile('receiptLastPayement')) {
			if ($request->file('receiptLastPayement')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('receiptLastPayement'),Auth::guard('user')->user()->id,'receiptLastPayement',$id) ;
			    $appRedundancy->copy = 'receiptLastPayement'.$id ;
			}
		}
		
		
		$appRedundancy->save() ;
	}

	public function store($request,$idApplication,$idContractor) {
	    $appRedundancy = new AppRedundancy ;
	    $appRedundancy->redundancyContribution = $request->get('redundancyExist') ;
	    $appRedundancy->fundName = $request->input('fundName') ;
	    if ($request->hasFile('receiptLastPayement')) {
			if ($request->file('receiptLastPayement')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('receiptLastPayement'),$idContractor,'receiptLastPayement',$idApplication) ;
			    $appRedundancy->copy = 'receiptLastPayement'.$idApplication ;
			}
		}
	    $appRedundancy->applications_idapplication = $idApplication ;
	    $appRedundancy->applications_contractors_idcontractors  = $idContractor ;
	    $appRedundancy->save() ;
	}
}