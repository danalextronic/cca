<?php 
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppInsurance24h ;

class AppInsuranceService {
	public function update($request,$id) {
		$appInsurance24h =  AppInsurance24h::where('applications_idapplication',$id)->first() ;
		$appInsurance24h->insurance24hExist = $request->input('insurance24hExist') ;
		if($request->hasFile('lastReceiptPaymentPeriod')) {
			if ($request->file('lastReceiptPaymentPeriod')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('lastReceiptPaymentPeriod'),Auth::guard('user')->user()->id,'lastReceiptPaymentPeriod',$id) ;
			    $appInsurance24h->copy = 'lastReceiptPaymentPeriod'.$id ;
			}
		}
		
		
		$appInsurance24h->save() ;
	}

	public function store($request,$idApplication,$idContractor) {
	    $appInsurance24h = new AppInsurance24h ;
	    $appInsurance24h->insurance24hExist = $request->input('insurance24hExist') ;
	    if($request->hasFile('lastReceiptPaymentPeriod')) {
	    	if ($request->file('lastReceiptPaymentPeriod')->isValid()) {
	    	    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('lastReceiptPaymentPeriod'),$idContractor,'lastReceiptPaymentPeriod',$idApplication) ;

	    	    $appInsurance24h->copy = 'lastReceiptPaymentPeriod'.$idApplication ;
	    	}
	    }
	    $appInsurance24h->applications_idapplication = $idApplication ;
	    $appInsurance24h->applications_contractors_idcontractors  = $idContractor ;
	    $appInsurance24h->save() ;
	}

	

	public function show($id){
	    return AppInsurance24h::where('applications_idapplication',$id)->get() ;  
	} 
}