<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;
use Carbon\Carbon ;
use App\AppIncomeProtectionInsurance ;

class AppIncomeProtectionInsuranceService {
	
	public function show($id) {
	    return AppIncomeProtectionInsurance::where('applications_idapplication',$id)->get() ;
	}

	public function update($request,$id) {
		$appIncomeProtectionInsurance =  AppIncomeProtectionInsurance::where('applications_idapplication',$id)->first() ;
		if ($request->hasFile('incomeProtectionInsuranceCopy')) {
			if ($request->file('incomeProtectionInsuranceCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('incomeProtectionInsuranceCopy'),Auth::guard('user')->user()->id,'incomeProtectionInsuranceCopy',$id) ;
			    $appIncomeProtectionInsurance->copy = 'incomeProtectionInsuranceCopy-'.$id ;
			}
		}

		$appIncomeProtectionInsurance->incomeProtectionInsuranceExist = $request->input('incomeProtectionInsuranceExist') ;
		$appIncomeProtectionInsurance->insuranceCompany = $request->input('protectionInsuranceCompany') ;
		$appIncomeProtectionInsurance->namePersonCovered = $request->input('protectionInsuranceNamePersonCovered') ;
		$appIncomeProtectionInsurance->policyNumber = $request->input('protectionInsurancePolicyNumber') ;
		if ($request->input('protectionInsuranceExpiryDate')) {
		 $appIncomeProtectionInsurance->expiryDate = Carbon::createFromFormat('d/m/Y',$request->input('protectionInsuranceExpiryDate'))->toDateString() ;
		}
		


		$appIncomeProtectionInsurance->save() ;
	}

	
	public function store($request,$idApplication,$idContractor) {
	    $appIncomeProtectionInsurance = new AppIncomeProtectionInsurance ;
	    if ($request->hasFile('incomeProtectionInsuranceCopy')) {
			if ($request->file('incomeProtectionInsuranceCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('incomeProtectionInsuranceCopy'),$idContractor,'incomeProtectionInsuranceCopy',$idApplication) ;
			    $appIncomeProtectionInsurance->copy = 'incomeProtectionInsuranceCopy'.$idApplication ;
			}
		}


	    $appIncomeProtectionInsurance->incomeProtectionInsuranceExist = $request->input('incomeProtectionInsuranceExist') ;
	    $appIncomeProtectionInsurance->insuranceCompany = $request->input('protectionInsuranceCompany') ;
	    $appIncomeProtectionInsurance->namePersonCovered = $request->input('protectionInsuranceNamePersonCovered') ;
	    $appIncomeProtectionInsurance->policyNumber = $request->input('protectionInsurancePolicyNumber') ;
	   
	    if ($request->input('protectionInsuranceExpiryDate')) {
	     $appIncomeProtectionInsurance->expiryDate = Carbon::createFromFormat('d/m/Y',$request->input('protectionInsuranceExpiryDate'))->toDateString() ;
	    }

	    $appIncomeProtectionInsurance->applications_idapplication = $idApplication ;
	    $appIncomeProtectionInsurance->applications_contractors_idcontractors = $idContractor ;


	    $appIncomeProtectionInsurance->save() ;
	}
}