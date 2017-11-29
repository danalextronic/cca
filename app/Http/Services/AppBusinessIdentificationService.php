<?php

namespace App\Http\Services ;
use App\AppBusinessIdentification ;

class AppBusinessIdentificationService {
	
	public function update($request,$id) {
		$appBusinessIdentification =  AppBusinessIdentification::where('applications_idapplication',$id)->first() ; // Question 1 
		
		
		
		$appBusinessIdentification->businessName= $request->input('businessName') ;
		$appBusinessIdentification->tradingName=$request->input('tradingName') ;
		$appBusinessIdentification->address = $request->input('address') ;
		$appBusinessIdentification->abn = $request->input('abn') ;
		$appBusinessIdentification->email = $request->input('email') ;
		$appBusinessIdentification->phone = $request->input('phone') ;
		$appBusinessIdentification->mobile = $request->input('mobile') ;
		$appBusinessIdentification->contactPerson = $request->input('contactPerson') ;
		$appBusinessIdentification->trade = $request->input('trade') ;
		$appBusinessIdentification->companyTradeLicence = $request->input('companyTradeLicence') ;
		$appBusinessIdentification->noEmployees = $request->input('noEmployees') ;
		$appBusinessIdentification->noSubContractors = $request->input('noSubContractors') ;
		$appBusinessIdentification->principalContractorName = $request->input('principalContractorName') ;
		$appBusinessIdentification->save() ;
	}
	public function show($id) {
		return AppBusinessIdentification::where('applications_idapplication',$id)->get() ;
	}
	public function storeRenewal($request,$idApplication,$idContractor) {
		$appBusinessIdentification = new AppBusinessIdentification ; 
		$appBusinessIdentification->applications_idapplication = $idApplication ;  
		$appBusinessIdentification->applications_contractors_idcontractors = $idContractor ;
		$appBusinessIdentification->businessName= $request->input('businessName') ;
		$appBusinessIdentification->contactPerson = $request->input('contactPerson') ;
		$appBusinessIdentification->save() ;
	}

	public function updateRenewal($request,$id) {
		$appBusinessIdentification =  AppBusinessIdentification::where('applications_idapplication',$id)->first() ; // Question 1 
		$appBusinessIdentification->businessName= $request->input('businessName') ;
		$appBusinessIdentification->contactPerson = $request->input('contactPerson') ;
		$appBusinessIdentification->save() ;
	}
	public function store($request,$idApplication,$idContractor)  {
	        $appBusinessIdentification = new AppBusinessIdentification ; // Question 1 
	        $appBusinessIdentification->applications_idapplication = $idApplication ;   // assign max id_application to the foreign key of appBusinessIdentification

	        $appBusinessIdentification->applications_contractors_idcontractors = $idContractor ; // assign id of authenticated user who fill up the new application to id_contractor (foreign key in appBusinessIdentification table ). 
	        
	        
	        $appBusinessIdentification->businessName= $request->input('businessName') ;
	        $appBusinessIdentification->tradingName=$request->input('tradingName') ;
	        $appBusinessIdentification->address = $request->input('address') ;
	        $appBusinessIdentification->abn = $request->input('abn') ;
	        $appBusinessIdentification->email = $request->input('email') ;
	        $appBusinessIdentification->phone = $request->input('phone') ;
	        $appBusinessIdentification->mobile = $request->input('mobile') ;
	        $appBusinessIdentification->contactPerson = $request->input('contactPerson') ;
	        $appBusinessIdentification->trade = $request->input('trade') ;
	        $appBusinessIdentification->companyTradeLicence = $request->input('companyTradeLicence') ;
	        $appBusinessIdentification->noEmployees = $request->input('noEmployees') ;
	        $appBusinessIdentification->noSubContractors = $request->input('noSubContractors') ;
	        $appBusinessIdentification->principalContractorName = $request->input('principalContractorName') ;
	        $appBusinessIdentification->save() ;

	    }


	    

}