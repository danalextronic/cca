<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppTaxation ;

class AppTaxationService {

	public function show($id) {
	    return AppTaxation::where('applications_idapplication',$id)->get() ;
	}

	public function update($request,$id) {
		$appTaxation =  AppTaxation::where('applications_idapplication',$id)->first() ;
		if ($request->hasFile('taxationCopy')) {
			if ($request->file('taxationCopy')->isValid()) {
			    $FileService = new FileService ;
                $FileService->uploadFile($request->file('taxationCopy'),Auth::guard('user')->user()->id,'taxationCopy',$id) ;
			    $appTaxation->taxationCopy = 'taxationCopy'.$id ;
			}
		}		
		$appTaxation->save() ;
	}
	public function store($request,$idApplication,$idContractor) {
	    $appTaxation = new AppTaxation ;
	    if ($request->hasFile('taxationCopy')) {
	    	if ($request->file('taxationCopy')->isValid()) {
	    	    $FileService = new FileService ;
                $FileService->uploadFile($request->file('taxationCopy'),$idContractor,'taxationCopy',$idApplication) ;
	    	    $appTaxation->taxationCopy = 'taxationCopy'.$idApplication ;
	    	}
	    }
	    $appTaxation->applications_idapplication = $idApplication ;
	    $appTaxation->applications_contractors_idcontractors = $idContractor ;
	    $appTaxation->save() ;
	}

	
}