<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;
use Carbon\Carbon ; 
use App\AppPublicLiabilityInsurance ;

class AppPublicLiabilityInsuranceService  {
	
	public function store($request,$idApplication,$idContractor) {
	    $publicLiabilityPolicy = new AppPublicLiabilityInsurance ;
	    if($request->hasFile('publicLiabilityPolicyCopy'))	{
			if ($request->file('publicLiabilityPolicyCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('publicLiabilityPolicyCopy'),$idContractor,'publicLiabilityPolicyCopy',$idApplication) ;

			    $publicLiabilityPolicy->copy = 'publicLiabilityPolicyCopy'.$idApplication ;
			}
		}
	    if ($request->input('expiryDate') != null) {
	    	$publicLiabilityPolicy->expiryDate = Carbon::createFromFormat('d/m/Y',$request->input('expiryDate'))->toDateString() ;
	    }
	    $publicLiabilityPolicy->insuranceCompany = $request->input('insuranceCompany') ;
	    $publicLiabilityPolicy->policyNumber = $request->input('policyNumber') ;
	    $publicLiabilityPolicy->coverage = $request->get('coverage') ;
	    $publicLiabilityPolicy->applications_idapplication = $idApplication ;
	    $publicLiabilityPolicy->applications_contractors_idcontractors = $idContractor ;
	    $publicLiabilityPolicy->save() ;
	}

	public function update($request,$id) {
		$publicLiabilityPolicy = AppPublicLiabilityInsurance::where('applications_idapplication',$id)->first() ;
		if($request->hasFile('publicLiabilityPolicyCopy'))	{
			if ($request->file('publicLiabilityPolicyCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('publicLiabilityPolicyCopy'),Auth::guard('user')->user()->id,'publicLiabilityPolicyCopy',$id) ;
			    $publicLiabilityPolicy->copy = 'publicLiabilityPolicyCopy'.$id ;
			}
		}
		if ($request->input('expiryDate') != null) {
			$publicLiabilityPolicy->expiryDate = Carbon::createFromFormat('d/m/Y',$request->input('expiryDate'))->toDateString() ;
		}	
		
		$publicLiabilityPolicy->insuranceCompany = $request->input('insuranceCompany') ;
		$publicLiabilityPolicy->policyNumber = $request->input('policyNumber') ;
		$publicLiabilityPolicy->coverage = $request->get('coverage') ;
		
		$publicLiabilityPolicy->save() ;
	}

	public function show($id) {
		return AppPublicLiabilityInsurance::where('applications_idapplication',$id)->get() ;
	}

	
}