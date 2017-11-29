<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppPayrollTax ;

class AppPayrollTaxService {

	public function show($id) {
	    return AppPayrollTax::where('applications_idapplication',$id)->get() ;
	}

	public function update($request,$id) {
		$appPayrollTax =  AppPayrollTax::where('applications_idapplication',$id)->first() ;
		
		if ($request->hasFile('payrollTaxCopy')) {
			if ($request->file('payrollTaxCopy')->isValid()) {
			     $FileService = new FileService ;
		        $FileService->uploadFile($request->file('payrollTaxCopy'),Auth::guard('user')->user()->id,'payrollTaxCopy',$id) ;
			    $appPayrollTax->copy = 'payrollTaxCopy'.$id ;
			}
		}
		
		$appPayrollTax->payrollTaxExist = $request->input('payrollTaxExist') ;
		
		$appPayrollTax->save() ;
	}

	public function store($request,$idApplication,$idContractor) {
	    $appPayrollTax = new AppPayrollTax ;
	    if ($request->hasFile('payrollTaxCopy')) {
	    	if ($request->file('payrollTaxCopy')->isValid()) {
	    	    $FileService = new FileService ;
		        $FileService->uploadFile($request->file('payrollTaxCopy'),$idContractor,'payrollTaxCopy',$idApplication) ;
	    	    $appPayrollTax->copy = 'payrollTaxCopy'.$idApplication ;
	    	}
	    }
	    $appPayrollTax->payrollTaxExist = $request->input('payrollTaxExist') ;
	    $appPayrollTax->applications_idapplication =$idApplication ;
	    $appPayrollTax->applications_contractors_idcontractors = $idContractor ;
	    $appPayrollTax->save() ;
	}
}