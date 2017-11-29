<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;
use Carbon\Carbon ;
use App\AppWorkersInsurance ;

class AppWorkersInsuranceService {

	public function show($id) {
		return AppWorkersInsurance::where('applications_idapplication',$id)->get() ;
	}
	
	public function store($request,$idApplication,$idContractor) 
	{
	    $appWorkersInsurance = new AppWorkersInsurance ;
	    if($request->hasFile('workersCompensationPolicyCopy')) {
	    	if ($request->file('workersCompensationPolicyCopy')->isValid()) {
	    	    $FileService = new FileService ;
                $FileService->uploadFile($request->file('workersCompensationPolicyCopy'),$idContractor,'workersCompensationPolicyCopy',$idApplication) ;

	    	    
	    	    $appWorkersInsurance->copy = 'workersCompensationPolicyCopy'.$idApplication ;
	    	}
	    }

	    $appWorkersInsurance->workersInsuranceExist = $request->get('workersCompensationInsuranceExist') ;
	    $appWorkersInsurance->workersInsurancePolicyNumber = $request->input('workersInsurancePolicyNumber') ;
	    if ($request->input('workersInsuranceExpiryDate')) {
	     $appWorkersInsurance->workersInsuranceExpiryDate = Carbon::createFromFormat('d/m/Y',$request->input('workersInsuranceExpiryDate'))->toDateString() ;
	    }
	    
	    $appWorkersInsurance->workersInsuranceEstimatedWages = $request->get('workersInsuranceEstimatedWages') ;
	    $appWorkersInsurance->workersInsuranceNumberWorkers = $request->get('workersInsuranceNumberWorkers') ;
	    $appWorkersInsurance->applications_idapplication = $idApplication ;
	    $appWorkersInsurance->applications_contractors_idcontractors = $idContractor ;
	    $appWorkersInsurance->save() ;
	}

	public function update($request,$id) {
		$appWorkersInsurance =  AppWorkersInsurance::where('applications_idapplication',$id)->first() ;
		if($request->hasFile('workersCompensationPolicyCopy')) {
			if ($request->file('workersCompensationPolicyCopy')->isValid()) {
			    $FileService = new FileService ;
                $FileService->uploadFile($request->file('workersCompensationPolicyCopy'),Auth::guard('user')->user()->id,'workersCompensationPolicyCopy',$id) ;
			    
			    $appWorkersInsurance->copy = 'workersCompensationPolicyCopy'.$id ;
			}
		}
		

		$appWorkersInsurance->workersInsuranceExist = $request->get('workersCompensationInsuranceExist') ;
		$appWorkersInsurance->workersInsurancePolicyNumber = $request->input('workersInsurancePolicyNumber') ;
		if ($request->input('workersInsuranceExpiryDate')) {
	     $appWorkersInsurance->workersInsuranceExpiryDate = Carbon::createFromFormat('d/m/Y',$request->input('workersInsuranceExpiryDate'))->toDateString() ;
	    }
		$appWorkersInsurance->workersInsuranceEstimatedWages = $request->get('workersInsuranceEstimatedWages') ;
		$appWorkersInsurance->workersInsuranceNumberWorkers = $request->get('workersInsuranceNumberWorkers') ;
		
		$appWorkersInsurance->save() ;
	}
	
}
