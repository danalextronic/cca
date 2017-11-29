<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppSubContractorEngagementIntention ; 

class AppSubContractorEngagementIntentionService {

	public function show($id) {
	    return AppSubContractorEngagementIntention::where('applications_idapplication',$id)->get() ; 
	}

	public function update($request,$id) {
		$appSubContractorEngagementIntention =  AppSubContractorEngagementIntention::where('applications_idapplication',$id)->first() ;
		if ($request->hasFile('copyAgreement')) {

		    if ($request->file('copyAgreement')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('copyAgreement'),Auth::guard('user')->user()->id,'copyAgreement',$id) ;
		        $appSubContractorEngagementIntention->copyAgreement = 'copyAgreement'.$id ;
		    }
		}
		$appSubContractorEngagementIntention->subcontractosEngagementIntentionSupplying = $request->input('subcontractosEngagementIntentionSupplying') ;
		
		$appSubContractorEngagementIntention->save() ;
	}

	public function store($request,$idApplication,$idContractor) {
	    $appSubContractorEngagementIntention = new AppSubContractorEngagementIntention ;
	    if ($request->hasFile('copyAgreement')) {

	        if ($request->file('copyAgreement')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('copyAgreement'),$idContractor,'copyAgreement',$idApplication) ;
	            $appSubContractorEngagementIntention->copyAgreement = 'copyAgreement'.$idApplication ;
	        }
	    }
	    $appSubContractorEngagementIntention->subcontractosEngagementIntentionSupplying = $request->input('subcontractosEngagementIntentionSupplying') ;
	    $appSubContractorEngagementIntention->applications_idapplication = $idApplication ;
	    $appSubContractorEngagementIntention->applications_contractors_idcontractors  = $idContractor ;
	    $appSubContractorEngagementIntention->save() ;
	}

}