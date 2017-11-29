<?php

namespace App\Http\Services ; 
use App\AppOsrPayrollTax ;
use Auth ;
class AppOsrPayrollTaxService {
	
	public function show($id) {
	    return AppOsrPayrollTax::where('applications_idapplication',$id)->get() ; 
	}


	public function store($request,$idApplication,$idContractor) {
		$AppOsrPayrollTax = new AppOsrPayrollTax ;
		$AppOsrPayrollTax->osrPayrollTaxExist = $request->input('osrPayrollTaxExist') ;
		if ($request->hasFile('osrPayrollTaxCopy')) {
			if ($request->file('osrPayrollTaxCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('osrPayrollTaxCopy'),$idContractor,'osrPayrollTaxCopy',$idApplication) ;
			    $AppOsrPayrollTax->copy = 'osrPayrollTaxCopy-'.$idApplication ;
			}
		}
		$AppOsrPayrollTax->applications_idapplication = $idApplication ;
		$AppOsrPayrollTax->applications_contractors_idcontractors = $idContractor ;
		$AppOsrPayrollTax->save() ;
	}

	public function update($request , $id) {
		$AppOsrPayrollTax = AppOsrPayrollTax::where('applications_idapplication',$id)->first();
		$AppOsrPayrollTax->osrPayrollTaxExist = $request->input('osrPayrollTaxExist') ;
		if ($request->hasFile('osrPayrollTaxCopy')) {
			if ($request->file('osrPayrollTaxCopy')->isValid()) {
			    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('osrPayrollTaxCopy'),Auth::guard('user')->user()->id,'osrPayrollTaxCopy',$id) ;
			    $AppOsrPayrollTax->copy = 'osrPayrollTaxCopy-'.$id ;
			}
		}
		$AppOsrPayrollTax->save() ;
	}	

}