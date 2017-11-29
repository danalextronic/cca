<?php
namespace App\Http\Services ;

use App\AppDocument ; // CheckList
use App\AppRenewalDocument ;
use Illuminate\Http\Response ;
use Auth ;
use Illuminate\Support\Facades\Storage ;
use Illuminate\Support\Facades\File;
use App\Http\Services\FileService ;
class AppDocumentService  {
	
	public function store($request,$idApplication,$idContractor) {

	 for ($i=1;$i<29;$i++) {
	     $appDocument = new AppDocument ;
	     $appDocument->item = $request->input('item'.''.$i.'');
	     $appDocument->itemid = $i ;
	     $appDocument->supplied = $request->input(''.$i.'');
	     $appDocument->applications_idapplication = $idApplication ;
	     $appDocument->applications_contractors_idcontractors = $idContractor ;  // assign id of authenticated user who fill up the new application to id_contractor (foreign key in appBusinessStructure table ).

	     $appDocument->save() ;

		}
	}
	public function update($request,$id) {
		for ($i=1;$i<29;$i++) {
		     $appDocument =  AppDocument::where('applications_idapplication',$id)->where('itemid',$i)->first() ;		     
		     $appDocument->supplied = $request->input(''.$i.'');
		     $appDocument->save() ;

		}
		

	}
	// Upload documents for Renewal Application Type 
	public function uploadRenewalDocuments($request,$idApplication,$idContractor) {
		
		if ($request->hasFile('workersCompensationInsuranceCopy')) {
			$appRenewalDocument = new AppRenewalDocument ;
		    if ($request->file('workersCompensationInsuranceCopy')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('workersCompensationInsuranceCopy'),$idContractor,'workersCompensationInsuranceCopy',$idApplication) ;
		        /*Storage::disk('local')->put('workersCompensationInsuranceCopy',File::get($request->file('workersCompensationInsuranceCopy'))) ;*/
		        
		        $appRenewalDocument->copy = 'workersCompensationInsuranceCopy-'.$idApplication ;
		        $appRenewalDocument->applications_idapplication = $idApplication ;
		        $appRenewalDocument->applications_contractors_idcontractors = $idContractor ;
		        $appRenewalDocument->save() ;
		    }
		}
		if ($request->hasFile('publicLiabilityInsuranceCopy')) {
			$appRenewalDocument = new AppRenewalDocument ;
		    if ($request->file('publicLiabilityInsuranceCopy')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('publicLiabilityInsuranceCopy'),$idContractor,'publicLiabilityInsuranceCopy',$idApplication) ;
		        $appRenewalDocument->copy = 'publicLiabilityInsuranceCopy-'.$idApplication ;
		        $appRenewalDocument->applications_idapplication = $idApplication ;
		        $appRenewalDocument->applications_contractors_idcontractors = $idContractor ;
		        $appRenewalDocument->save() ;
		    }
		}
		if ($request->hasFile('taxationCopy')) {
			$appRenewalDocument = new AppRenewalDocument ;
		    if ($request->file('taxationCopy')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('taxationCopy'),$idContractor,'taxationCopy',$idApplication) ;
		        $appRenewalDocument->copy = 'taxationCopy-'.$idApplication ;
		        $appRenewalDocument->applications_idapplication = $idApplication ;
		        $appRenewalDocument->applications_contractors_idcontractors = $idContractor ;
		        $appRenewalDocument->save() ;
		    }
		}
		if ($request->hasFile('payrollTaxCopy')) {
			$appRenewalDocument = new AppRenewalDocument ;
		    if ($request->file('payrollTaxCopy')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('payrollTaxCopy'),$idContractor,'payrollTaxCopy',$idApplication) ;
		        $appRenewalDocument->copy = 'payrollTaxCopy-'.$idApplication ;
		        $appRenewalDocument->applications_idapplication = $idApplication ;
		        $appRenewalDocument->applications_contractors_idcontractors = $idContractor ;
		        $appRenewalDocument->save() ;
		    }
		}

		if ($request->hasFile('payslipsCopy')) {
			$appRenewalDocument = new AppRenewalDocument ;
		    if ($request->file('payslipsCopy')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('payslipsCopy'),$idContractor,'payslipsCopy',$idApplication) ;
		        $appRenewalDocument->copy = 'payslipsCopy-'.$idApplication ;
		        $appRenewalDocument->applications_idapplication = $idApplication ;
		        $appRenewalDocument->applications_contractors_idcontractors = $idContractor ;
		        $appRenewalDocument->save() ;
		    }
		}

		if ($request->hasFile('redundancyCopy')) {
			$appRenewalDocument = new AppRenewalDocument ;
		    if ($request->file('redundancyCopy')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('redundancyCopy'),$idContractor,'redundancyCopy',$idApplication) ;
		        $appRenewalDocument->copy = 'redundancyCopy-'.$idApplication ;
		        $appRenewalDocument->applications_idapplication = $idApplication ;
		        $appRenewalDocument->applications_contractors_idcontractors = $idContractor ;
		        $appRenewalDocument->save() ;
		    }
		}
		if ($request->hasFile('incomeProtectionInsuranceCopy')) {
			$appRenewalDocument = new AppRenewalDocument ;
		    if ($request->file('incomeProtectionInsuranceCopy')->isValid()) {
		        $FileService->uploadFile($request->file('incomeProtectionInsuranceCopy'),$idContractor,'incomeProtectionInsuranceCopy',$idApplication) ;
		        $appRenewalDocument->copy = 'incomeProtectionInsuranceCopy-'.$idApplication ;
		        $appRenewalDocument->applications_idapplication = $idApplication ;
		        $appRenewalDocument->applications_contractors_idcontractors = $idContractor ;
		        $appRenewalDocument->save() ;
		    }
		}

		if ($request->hasFile('superannuationCopy')) {
			$appRenewalDocument = new AppRenewalDocument ;
		    if ($request->file('superannuationCopy')->isValid()) {
		        $FileService->uploadFile($request->file('superannuationCopy'),$idContractor,'superannuationCopy',$idApplication) ;
		        $appRenewalDocument->copy = 'superannuationCopy-'.$idApplication ;
		        $appRenewalDocument->applications_idapplication = $idApplication ;
		        $appRenewalDocument->applications_contractors_idcontractors = $idContractor ;
		        $appRenewalDocument->save() ;
		    }
		}

		if ($request->hasFile('longServiceLeaveCopy')) {
			$appRenewalDocument = new AppRenewalDocument ;
		    if ($request->file('longServiceLeaveCopy')->isValid()) {
		        $FileService->uploadFile($request->file('longServiceLeaveCopy'),$idContractor,'longServiceLeaveCopy',$idApplication) ;
		        $appRenewalDocument->copy = 'longServiceLeaveCopy-'.$idApplication ;
		        $appRenewalDocument->applications_idapplication = $idApplication ;
		        $appRenewalDocument->applications_contractors_idcontractors = $idContractor ;
		        $appRenewalDocument->save() ;
		    }
		}

	}
	
	

	public function showRenewalDocuments($id) {
		return AppRenewalDocument::where('applications_idapplication',$id)->get() ;
	}

	public function show($id) {
	    return AppDocument::where('applications_idapplication',$id)->get() ;
	}
	
}
