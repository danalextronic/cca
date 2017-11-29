<?php

namespace App\Http\Services ; 
use App\AppActIreIdent ;
class AppActIreIdentService {
	
	public function show($id) {
	    return AppActIreIdent::where('applications_idapplication',$id)->get() ; 
	}


	public function store($request,$idApplication,$idContractor) {
		$appActIreIdent = new AppActIreIdent ;
		$appActIreIdent->companyName = $request->input('companyName') ;
		$appActIreIdent->address = $request->input('address') ;
		$appActIreIdent->phone = $request->input('phone') ;
		$appActIreIdent->email = $request->input('email') ;
		$appActIreIdent->companyName = $request->input('companyName') ;
		$appActIreIdent->ABN= $request->input('abn') ;
		$appActIreIdent->contactPerson = $request->input('contactPerson') ;
		$appActIreIdent->ireCertificateNumber = $request->input('ireCertificateNumber') ;
		$appActIreIdent->applications_idapplication = $idApplication ;
		$appActIreIdent->applications_contractors_idcontractors = $idContractor ;
		$appActIreIdent->save() ;
	}

	public function update($request , $id) {
		$appActIreIdent = AppActIreIdent::where('applications_idapplication',$id)->first();
		$appActIreIdent->companyName = $request->input('companyName') ;
		$appActIreIdent->address = $request->input('address') ;
		$appActIreIdent->phone = $request->input('phone') ;
		$appActIreIdent->companyName = $request->input('companyName') ;
		$appActIreIdent->ABN= $request->input('abn') ;
		$appActIreIdent->contactPerson = $request->input('contactPerson') ;
		$appActIreIdent->ireCertificateNumber = $request->input('ireCertificateNumber') ;
		$appActIreIdent->save() ;
	}
}
