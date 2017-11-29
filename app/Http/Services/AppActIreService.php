<?php

namespace App\Http\Services ; 
use App\Http\Services\AppActIreIdentService ;
use App\Http\Services\AppIreFormsService  ;
use App\Http\Services\AppIreWorkersCompensationService  ;
use App\Http\Services\AppIrePublicLiabilityService  ;
use App\Http\Services\AppAtoPortalReceiptService  ;
use App\Http\Services\AppOsrPayrollTaxService ;
use App\Http\Services\AppIreSuperAnnuationService ;
use App\Http\Services\AppIreLongServiceLeaveService ;
use App\Http\Services\AppIreEnterpriseAgreementService ;
class AppActIreService {
	/*public function show($id) {
	    $arrays = array() ;
	    $appActIreIdent = new AppActIreService ;
	    $arrays['AppActIreIdent'] = $appActIreIdent->show($id) ;
	   
	    return $arrays ;
	}*/


	public function store($request,$idApplication,$idContractor) {
		$appActIreIdent = new AppActIreIdentService ;
		$appActIreIdent->store($request,$idApplication,$idContractor) ;
		$appIreAppForms = new AppIreAppFormsService ;
		$appIreAppForms->store($request,$idApplication,$idContractor);
		$appIreWorkersCompensation = new AppIreWorkersCompensationService ;
		$appIreWorkersCompensation->store($request,$idApplication,$idContractor) ;
		$appIrePublicLiability = new AppIrePublicLiabilityService ;
		$appIrePublicLiability->store($request,$idApplication,$idContractor) ;
		$appAtoPortalReceipt = new AppAtoPortalReceiptService ;
		$appAtoPortalReceipt->store($request,$idApplication,$idContractor) ;

		$appOsrPayrollTax = new AppOsrPayrollTaxService ;
		$appOsrPayrollTax->store($request,$idApplication,$idContractor) ;

		$appIreSuperAnnuation = new AppIreSuperAnnuationService ;
		$appIreSuperAnnuation->store($request,$idApplication,$idContractor) ;

		$AppIreLongServiceLeaveService = new AppIreLongServiceLeaveService ;
		$AppIreLongServiceLeaveService->store($request,$idApplication,$idContractor) ;

		$AppIreEnterpriseAgreement = new AppIreEnterpriseAgreementService ;
		$AppIreEnterpriseAgreement->store($request,$idApplication,$idContractor) ;
	}

	public function update($request , $id) {
		$appActIreIdent = new AppActIreIdentService ;
		$appActIreIdent->update($request,$id) ;
		$appIreAppForms = new AppIreAppFormsService ;
		$appIreAppForms->update($request,$id);
		$appIreWorkersCompensation = new AppIreWorkersCompensationService ;
		$appIreWorkersCompensation->update($request,$id) ;
		$appIrePublicLiability = new AppIrePublicLiabilityService ;
		$appIrePublicLiability->update($request,$id) ;
		$appAtoPortalReceipt = new appAtoPortalReceiptService ;
		$appAtoPortalReceipt->update($request,$id) ;
		$appOsrPayrollTax = new AppOsrPayrollTaxService ;
		$appOsrPayrollTax->update($request,$id) ;
		$appIreSuperAnnuation = new AppIreSuperAnnuationService ;
		$appIreSuperAnnuation->update($request,$id) ;
		$AppIreLongServiceLeaveService = new AppIreLongServiceLeaveService ;
		$AppIreLongServiceLeaveService->update($request,$id) ;
		$AppIreEnterpriseAgreement = new AppIreEnterpriseAgreementService ;
		$AppIreEnterpriseAgreement->update($request,$id) ;
	}
}
