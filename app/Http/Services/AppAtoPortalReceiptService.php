<?php

namespace App\Http\Services ; 
use App\AppAtoPortalReceipt ;
use Auth ;
class AppAtoPortalReceiptService {
	
	public function show($id) {
	    return AppAtoPortalReceipt::where('applications_idapplication',$id)->get() ; 
	}


	public function store($request,$idApplication,$idContractor) {
		$AppAtoPortalReceipt = new AppAtoPortalReceipt ;
		$AppAtoPortalReceipt->atoPortalReceiptExist = $request->input('atoPortalReceiptExist') ;
		if ($request->hasFile('atoPortalReceiptCopy')) {
			if ($request->file('atoPortalReceiptCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('atoPortalReceiptCopy'),$idContractor,'atoPortalReceiptCopy',$idApplication) ;
			    $AppAtoPortalReceipt->copy = 'atoPortalReceiptCopy-'.$idApplication ;
			}
		}
		$AppAtoPortalReceipt->applications_idapplication = $idApplication ;
		$AppAtoPortalReceipt->applications_contractors_idcontractors = $idContractor ;
		$AppAtoPortalReceipt->save() ;
	}

	public function update($request , $id) {
		$AppAtoPortalReceipt = AppAtoPortalReceipt::where('applications_idapplication',$id)->first();
		$AppAtoPortalReceipt->atoPortalReceiptExist = $request->input('atoPortalReceiptExist') ;
		if ($request->hasFile('atoPortalReceiptCopy')) {
			if ($request->file('atoPortalReceiptCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('atoPortalReceiptCopy'),Auth::guard('user')->user()->id,'atoPortalReceiptCopy',$id) ;
			    $AppAtoPortalReceipt->copy = 'atoPortalReceiptCopy-'.$id ;
			}
		}
		
		$AppAtoPortalReceipt->save() ;
	}	

}