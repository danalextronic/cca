<?php
namespace App\Http\Services ;
use App\Application ; 
use App\Http\Services\ApplicationService ;
//Only for ACT
use App\Http\Services\AppAsbetosCertificateService ; // 10 question model Only for ACT !!
use App\Http\Services\AppIRECertificateService ; // 22 Only for ACT !!
// END Only for ACT
use Illuminate\Support\Facades\Mail ;

use App\Http\Services\AppBusinessIdentificationService ;
use App\Http\Services\AppBusinessStructureService ;
use App\Http\Services\AppDocumentService ;  
use App\Http\Services\AppPublicLiabilityInsuranceService ;  
use App\Http\Services\AppWorkersInsuranceService ;  
use App\Http\Services\AppIncomeProtectionInsuranceService ;
use App\Http\Services\AppTaxationService ;
use App\Http\Services\AppPayrollTaxService ;
use App\Http\Services\AppVisaWorkerService ;
use App\Http\Services\AppEmployeesDetailService ;
use App\Http\Services\AppIndustrialInstrumentService ;
use App\Http\Services\AppRedundancyService ;
use App\Http\Services\AppInsuranceService ; 
use App\Http\Services\AppLongServiceLeaveService ;
use App\Http\Services\AppSuperAnnuationService ; // 14/15 question
use App\Http\Services\AppPaySlipService ; // 15/16
use App\Http\Services\AppSubContractorsService ; // 17
use App\Http\Services\AppSubContractorEngagementIntentionService ; // 17/18 question 
use App\Http\Services\AppSuperAnnuationSoleTraderService ; // 18/19 question 
use App\Http\Services\AppAbnWorkerService ;  // 19/20
use App\Http\Services\AppFairWorkPrincipalService ; // 20/21
use App\Http\Services\AppDepartmentEmploymentService ; // 21/23
use App\Http\Services\AppOHSWHSService ; // 22/24
use App\Http\Services\AppSafeWorkMethodStatementService ; // 23 /25
use App\Http\Services\AppWorkersInjuryService ; // 24 / 26
use App\Http\Services\AppTrainingAndCompetencyService ; // 25 / 27
use App\Http\Services\Pdf\PdfService ;

/*** Act Ire ****/
use App\Http\Services\AppActIreService ;

use File ;
use View ;
use Auth ; 
use DB ; 
class ApplicationService {
	
	public function listApplications() {
		return Application::orderBy('idapplication','desc')->get() ;
	}

	

	public function update($request,$state,$id) {
		$app = Application::find($id) ;
		$app->updated_at = date('Y-m-d H:i:s') ;
		$app->save() ;
		if ($state == 'actIre') {
			$AppActIre = new AppActIreService ;
			$AppActIre->update($request,$id) ;
		}
		else {
			if ($state != 'renewal') {
			   $AppBusinessIdentification = new AppBusinessIdentificationService ;
			   $AppBusinessIdentification->update($request,$id) ; // 1) Application Business Identification 

			   $AppBusinessStructure = new AppBusinessStructureService ;
			   $AppBusinessStructure->update($request,$id) ; // 2) Application Business Structure       
			   $AppDocument = new AppDocumentService ;
			   $AppDocument->update($request,$id) ; // Checklist -- not common

			   $AppPublicLiabilityInsurance = new AppPublicLiabilityInsuranceService ;
			   $AppPublicLiabilityInsurance->update($request,$id) ; // 3)

			   $AppWorkersInsurance = new AppWorkersInsuranceService ;
			   $AppWorkersInsurance->update($request,$id) ; // 4)

			   $AppIncomeProtectionInsurance = new AppIncomeProtectionInsuranceService ;
			   $AppIncomeProtectionInsurance->update($request,$id) ; // 5 )

			   $AppTaxation = new AppTaxationService ;
			   $AppTaxation->update($request,$id) ; // 6 )

			   $AppPayroll = new AppPayrollTaxService ;
			   $AppPayroll->update($request,$id) ; // 7 )

			   $AppVisaWorker = new AppVisaWorkerService ;
			   $AppVisaWorker->update($request,$id) ; // 8 ) -- not common

			   
			   $AppEmployeesDetail = new AppEmployeesDetailService ;
			   $AppEmployeesDetail->update($request,$id) ; // 9 )
			   
			   if ( $state == 'act' ) {
			       $AppAsbetosCertificate = new AppAsbetosCertificateService ;
			       $AppAsbetosCertificate->update($request,$id) ; // 10 
			       
			       $AppIRECertificate = new AppIRECertificateService ;
			       $AppIRECertificate->update($request,$id); // 22
			   }
			   
			   $AppIndustrialInstrument = new AppIndustrialInstrumentService ;
			   $AppIndustrialInstrument->update($request,$id) ; // 11 )
			   
			   $AppRedundancy = new AppRedundancyService ;
			   $AppRedundancy->update($request,$id) ; // 12 ) 
			   
			   $AppInsurance = new AppInsuranceService ;
			   $AppInsurance->update($request,$id) ; // 13 ) 

			   $AppLongServiceLeave = new AppLongServiceLeaveService ;
			   $AppLongServiceLeave->update($request,$id) ; // 14

			   $AppSuperAnnuationService = new AppSuperAnnuationService ;
			   $AppSuperAnnuationService->update($request,$id) ; // 15

			   $AppPaySlip = new AppPaySlipService ;
			   $AppPaySlip->update($request,$id) ; // 16

			   $AppSubContractors = new AppSubContractorsService ;
			   $AppSubContractors->update($request,$id) ; // 17

			   $AppSubContractorEngagementIntention = new AppSubContractorEngagementIntentionService ;
			   $AppSubContractorEngagementIntention->update($request,$id) ; // 18
			   
			   $AppSuperAnnuationSoleTrader = new AppSuperAnnuationSoleTraderService ;
			   $AppSuperAnnuationSoleTrader->update($request,$id) ;// 19

			   $AppAbnWorker = new AppAbnWorkerService ;
			   $AppAbnWorker->update($request,$id) ; // 20

			   $AppFairWorkPrincipal = new AppFairWorkPrincipalService ;
			   $AppFairWorkPrincipal->update($request,$id) ; // 21

			   $AppDepartementEmployment = new AppDepartmentEmploymentService ;
			   $AppDepartementEmployment->update($request,$id) ; // 23
			   
			   $AppOHSWHS = new AppOHSWHSService ;
			   $AppOHSWHS->update($request,$id) ; // 24

			   $AppSafeWorkMethodStatement = new AppSafeWorkMethodStatementService ;
			   $AppSafeWorkMethodStatement->update($request,$id) ; // 25

			   $AppWorkersInjury = new AppWorkersInjuryService ;
			   $AppWorkersInjury->update($request,$id) ; // 26
			   
			   $AppTrainingAndCompetency = new AppTrainingAndCompetencyService ;
			   $AppTrainingAndCompetency->update($request,$id) ; // 27
			}
			else {
			   $AppBusinessIdentification = new AppBusinessIdentificationService ;
			   $AppBusinessIdentification->updateRenewal($request,$id) ; 
			   $AppDocument = new AppDocumentService ;
			   $AppDocument->update($request,$id) ; 
			   $AppDocument1 = new AppDocumentService ;
			   $AppDocument1->uploadRenewalDocuments($request,$id,Auth::user()->id) ;
			   $AppSubContractors = new AppSubContractorsService ;
			   $AppSubContractors->update($request,$id) ;
			   $AppEmployeesDetail = new AppEmployeesDetailService ;
			   $AppEmployeesDetail->update($request,$id) ;
			}
		}
		$PdfService = new PdfService ;
		$PdfService->uploadAppPdf($id,Auth::guard('user')->user()->id) ;
		/*Mail::send('emails.update-app',["link" => url('/admin/home/view/'.$id)],function($message){
            $message->to('info@contractorcompliance.com.au','CCA Admin')->from('noreply@contractorcompliance.com.au')->subject('Application Updated') ; 
        }); */
	}
	
	public function store($request,$state) {
		$application = new Application ;
		$application->applicationType = $state ; // $state given with get request
		$application->applicationStatus = 1 ; // Status = 1 ( It means new )
		$application->contractors_idcontractors = Auth::user()->id ; // assign authenticated user who fill up the new application to id_contractor (foreign key in application table ). 
		$newIdApp = DB::table('applications')->max('idapplication')+1 ;
		$application->applicationNumber = date('Ymd').''.$newIdApp.'' ; 
		if(strlen($state) < 3) {
			$code = $state.substr($state, -1) ;
		}
		else {
			if (strlen($state) == 3) {
				$code = $state ;
			}
			else if ($state == 'renewal') {
				$code = 'REN' ;
			}
			else if ($state == 'actIre') {
				$code = 'IRE' ;
			}
		}
		$application->ref = strtoupper($code).'-'.$newIdApp.'-'.Auth::guard('user')->user()->contractorCompany ;
		$application->save() ;
		/*Mail::send('emails.store-app',["link" => url('/admin/home/view/'.$newIdApp)],function($message){
		    $message->to('info@contractorcompliance.com.au','CCA Admin')->from('noreply@contractorcompliance.com.au')->subject('New Application Submitted'); }) ; */
		
	}

	public function storeAppDetail($request,$state) {
		$newIdApp = DB::table('applications')->max('idapplication')+1 ;
		$this->store($request,$state) ;
		if ($state == 'actIre') {
			$AppActIre = new AppActIreService ;
			$AppActIre->store($request,$newIdApp,Auth::user()->id) ;
		}
		else {
			if ($state != 'renewal') {

			    $AppBusinessIdentification = new AppBusinessIdentificationService ;
			    $AppBusinessIdentification->store($request,$newIdApp,Auth::user()->id) ; // 1) Application Business Identification 
			    $AppBusinessStructure = new AppBusinessStructureService ;
			    $AppBusinessStructure->store($request,$newIdApp,Auth::user()->id) ; // 2) Application Business Structure       
			    $AppDocument = new AppDocumentService ;
			    $AppDocument->store($request,$newIdApp,Auth::user()->id) ; // Checklist -- not common

			    $AppPublicLiabilityInsurance = new AppPublicLiabilityInsuranceService ;
			    $AppPublicLiabilityInsurance->store($request,$newIdApp,Auth::user()->id) ; // 3)

			    $AppWorkersInsurance = new AppWorkersInsuranceService ;
			    $AppWorkersInsurance->store($request,$newIdApp,Auth::user()->id) ; // 4)

			    $AppIncomeProtectionInsurance = new AppIncomeProtectionInsuranceService ;
			    $AppIncomeProtectionInsurance->store($request,$newIdApp,Auth::user()->id) ; // 5 )

			    $AppTaxation = new AppTaxationService ;
			    $AppTaxation->store($request,$newIdApp,Auth::user()->id) ; // 6 )

			    $AppPayroll = new AppPayrollTaxService ;
			    $AppPayroll->store($request,$newIdApp,Auth::user()->id) ; // 7 )

			    $AppVisaWorker = new AppVisaWorkerService ;
			    $AppVisaWorker->store($request,$newIdApp,Auth::user()->id) ; // 8 ) -- not common

			    $AppEmployeesDetail = new AppEmployeesDetailService ;
			    $AppEmployeesDetail->store($request,$newIdApp,Auth::user()->id) ; // 9 )
			    if ( $state == 'act' ) {
			        $AppAsbetosCertificate = new AppAsbetosCertificateService ;
			        $AppAsbetosCertificate->store($request,$newIdApp,Auth::user()->id) ; // 10 
			        
			        $AppIRECertificate = new AppIRECertificateService ;
			        $AppIRECertificate->store($request,$newIdApp,Auth::user()->id); // 22
			    }

			    $AppIndustrialInstrument = new AppIndustrialInstrumentService ;
			    $AppIndustrialInstrument->store($request,$newIdApp,Auth::user()->id) ; // 11 )

			    $AppRedundancy = new AppRedundancyService ;
			    $AppRedundancy->store($request,$newIdApp,Auth::user()->id) ; // 12 ) 

			    $AppInsurance = new AppInsuranceService ;
			    $AppInsurance->store($request,$newIdApp,Auth::user()->id) ; // 13 ) 

			    $AppLongServiceLeave = new AppLongServiceLeaveService ;
			    $AppLongServiceLeave->store($request,$newIdApp,Auth::user()->id) ; // 14

			    $AppSuperAnnuationService = new AppSuperAnnuationService ;
			    $AppSuperAnnuationService->store($request,$newIdApp,Auth::user()->id) ; // 15

			    $AppPaySlip = new AppPaySlipService ;
			    $AppPaySlip->store($request,$newIdApp,Auth::user()->id) ; // 16

			    $AppSubContractors = new AppSubContractorsService ;
			    $AppSubContractors->store($request,$newIdApp,Auth::user()->id) ; // 17

			    $AppSubContractorEngagementIntention = new AppSubContractorEngagementIntentionService ;
			    $AppSubContractorEngagementIntention->store($request,$newIdApp,Auth::user()->id) ; // 18
			    
			    $AppSuperAnnuationSoleTrader = new AppSuperAnnuationSoleTraderService ;
			    $AppSuperAnnuationSoleTrader->store($request,$newIdApp,Auth::user()->id) ;// 19

			    $AppAbnWorker = new AppAbnWorkerService ;
			    $AppAbnWorker->store($request,$newIdApp,Auth::user()->id) ; // 20

			    $AppFairWorkPrincipal = new AppFairWorkPrincipalService ;
			    $AppFairWorkPrincipal->store($request,$newIdApp,Auth::user()->id) ; // 21

			    $AppDepartementEmployment = new AppDepartmentEmploymentService ;
			    $AppDepartementEmployment->store($request,$newIdApp,Auth::user()->id) ; // 23
			    
			    $AppOHSWHS = new AppOHSWHSService ;
			    $AppOHSWHS->store($request,$newIdApp,Auth::user()->id) ; // 24

			    $AppSafeWorkMethodStatement = new AppSafeWorkMethodStatementService ;
			    $AppSafeWorkMethodStatement->store($request,$newIdApp,Auth::user()->id) ; // 25

			    $AppWorkersInjury = new AppWorkersInjuryService ;
			    $AppWorkersInjury->store($request,$newIdApp,Auth::user()->id) ; // 26
			    
			    $AppTrainingAndCompetency = new AppTrainingAndCompetencyService ;
			    $AppTrainingAndCompetency->store($request,$newIdApp,Auth::user()->id) ; // 27
			}
			else {
			    $AppBusinessIdentification = new AppBusinessIdentificationService ;
			    $AppBusinessIdentification->storeRenewal($request,$newIdApp,Auth::user()->id) ; // 1) 
			    $AppDocument = new AppDocumentService ;
			    $AppDocument->store($request,$newIdApp,Auth::user()->id) ; // Checklist -- not common
			    $AppDocument1 = new AppDocumentService ;
			    $AppDocument1->uploadRenewalDocuments($request,$newIdApp,Auth::user()->id) ;
			    $AppEmployeesDetail = new AppEmployeesDetailService ;
			    $AppEmployeesDetail->store($request,$newIdApp,Auth::user()->id) ; // 9 )
			    $AppSubContractors = new AppSubContractorsService ;
			    $AppSubContractors->store($request,$newIdApp,Auth::user()->id) ; // 17
			}
		}
			
		
		$PdfService = new PdfService ;
		$PdfService->uploadAppPdf($newIdApp,Auth::guard('user')->user()->id) ; 
		/*
		Mail::send('emails.store-app',["link" => url('/home/application/'.$state.'/'.$newIdApp."/view")],function($message){
		    $message->to(Auth::guard('user')->user()->email)->from('noreply@contractorcompliance.com.au','Contractor Compilance')->subject('New Application Submitted'); }) ; 

		Mail::send('emails.store-admin',["link" => url('/admin/home/view/'.$newIdApp)],function($message){
				 $newIdApp = DB::table('applications')->max('idapplication') ;
		   		 $message->to(Auth::guard('user')->user()->email)->from('noreply@contractorcompliance.com.au','Contractor Compilance')->subject('New Application Received');
		   		 $pathPdf = storage_path().'/app/'.Auth::user()->id.'/'.$newIdApp.'/'.date('y-m-d').'/application-submission.pdf' ;
		   		 $files = File::allFiles(storage_path().'/app/'.Auth::user()->id.'/'.$newIdApp.'/'.date('y-m-d')) ;
		   		 foreach ($files as $file) {
		   		 	 $message->attach(storage_path().'/app/'.Auth::user()->id.'/'.$newIdApp.'/'.date('y-m-d').'/'.$file->getFileName()) ;
		   		 }
		   		
		   		 
		}) ; 
		*/

		Mail::send('emails.store-app',["link" => url('/home/application/'.$state.'/'.$newIdApp."/view")],function($message){
		    $message->to(Auth::guard('user')->user()->email)->from('noreply@contractorcompliance.com.au','Contractor Compilance')->subject('New Application Submitted'); }) ; 

		Mail::send('emails.store-admin',["link" => url('/admin/home/view/'.$newIdApp)],function($message){
				 $newIdApp = DB::table('applications')->max('idapplication') ;
		   		 $message->to("info@contractorcompliance.com.au")->from('noreply@contractorcompliance.com.au','Contractor Compilance')->subject('New Application Received');
		   		 $pathPdf = storage_path().'/app/'.Auth::user()->id.'/'.$newIdApp.'/'.date('y-m-d').'/application-submission.pdf' ;
		   		 $files = File::allFiles(storage_path().'/app/'.Auth::user()->id.'/'.$newIdApp.'/'.date('y-m-d')) ;
		   		 foreach ($files as $file) {
		   		 	 $message->attach(storage_path().'/app/'.Auth::user()->id.'/'.$newIdApp.'/'.date('y-m-d').'/'.$file->getFileName()) ;
		   		 }
		   		
		   		 
		}) ; 
	}

	
	public function show($id) {
		return Application::where('idapplication',$id)->first() ;
	}

	public function showAppDetails($state,$id) {
		$arrays = array() ;
		$arrays['application'] = Application::where('idapplication',$id)->get()->toArray() ;
		
		if ($state == 'actIre') {
			$AppActIreIdent = new AppActIreIdentService ;
			$arrays['AppActIreIdent'] = $AppActIreIdent->show($id)->toArray() ;
			$AppIreAppForms = new AppIreAppFormsService ;
			$arrays['AppIreAppForms'] = $AppIreAppForms->show($id)->toArray() ;

			$AppIreWorkersCompensation = new AppIreWorkersCompensationService ;
			$arrays['AppIreWorkersCompensation'] = $AppIreWorkersCompensation->show($id)->toArray() ;

			$AppIrePublicLiability = new AppIrePublicLiabilityService ;
			$arrays['AppIrePublicLiability'] = $AppIrePublicLiability->show($id)->toArray() ;

			$AppAtoPortalReceipt = new AppAtoPortalReceiptService ;
			$arrays['AppAtoPortalReceipt'] = $AppAtoPortalReceipt->show($id)->toArray() ;

			$AppOsrPayrollTax = new AppOsrPayrollTaxService ;
			$arrays['AppOsrPayrollTax'] = $AppOsrPayrollTax->show($id)->toArray() ;

			$AppIreSuperAnnuation = new AppIreSuperAnnuationService ;
			$arrays['AppIreSuperAnnuation'] = $AppIreSuperAnnuation->show($id)->toArray() ;

			$AppIreLongServiceLeave = new AppIreLongServiceLeaveService ;
			$arrays['AppIreLongServiceLeave'] = $AppIreLongServiceLeave->show($id)->toArray() ;

			$AppIreEnterpriseAgreement = new AppIreEnterpriseAgreementService ;
			$arrays['AppIreEnterpriseAgreement'] = $AppIreEnterpriseAgreement->show($id)->toArray() ;
		}
		else {
			$AppDocument = new AppDocumentService ;
			$arrays['AppDocument'] = $AppDocument->show($id)->toArray() ;
			if ($state !='renewal') {
				$AppBusinessIdentification = new AppBusinessIdentificationService() ;
				$arrays['AppBusinessIdentification'] = $AppBusinessIdentification->show($id)->toArray() ;

				$AppBusinessStructure = new AppBusinessStructureService ;
				$arrays['AppBusinessStructure'] = $AppBusinessStructure->show($id)->toArray() ;

				
				$AppPublicLiabilityInsurance = new AppPublicLiabilityInsuranceService ;
				$arrays['AppPublicLiabilityInsurance'] = $AppPublicLiabilityInsurance->show($id)->toArray() ;

				$AppWorkersInsurance = new AppWorkersInsuranceService ;
				$arrays['AppWorkersCompensationInsurance'] = $AppWorkersInsurance->show($id)->toArray() ;

				$AppIncomeProtectionInsurance = new AppIncomeProtectionInsuranceService ;
				$arrays['AppIncomeProtectionInsurance'] = $AppIncomeProtectionInsurance->show($id)->toArray() ;

				$AppTaxation = new AppTaxationService ;
				$arrays['AppTaxation'] = $AppTaxation->show($id)->toArray() ;

				$AppPayrollTax = new AppPayrollTaxService ;
				$arrays['AppPayrollTax'] = $AppPayrollTax->show($id)->toArray() ;

				$AppVisaWorker = new AppVisaWorkerService ;
				$arrays['AppVisaWorker'] = $AppVisaWorker->show($id)->toArray() ;

				$AppEmployeesDetail = new AppEmployeesDetailService ;
				$arrays['AppEmployeesDetails'] = $AppEmployeesDetail->show($id)->toArray() ;

				$AppAsbetosCertificate = new AppAsbetosCertificateService;
				$arrays['AppAsbetosCertificate'] = $AppAsbetosCertificate->show($id)->toArray() ;
				
				$AppIndustrialInstrument = new AppIndustrialInstrumentService ;
				$arrays['AppIndustrialInstrument'] = $AppIndustrialInstrument->show($id)->toArray() ;
				
				$AppRedundancy = new AppRedundancyService ;
				$arrays['AppRedundancy'] = $AppRedundancy->show($id)->toArray() ;

				$AppInsurance24h = new AppInsuranceService ;
				$arrays['AppInsurance24h'] = $AppInsurance24h->show($id)->toArray() ;

				$AppLongServiceLeave = new AppLongServiceLeaveService ;
				$arrays['AppLongServiceLeave'] = $AppLongServiceLeave->show($id)->toArray() ;

				$AppSuperAnnuation = new AppSuperAnnuationService ;
				$arrays['AppSuperAnnuation'] = $AppSuperAnnuation->show($id)->toArray() ;

				$AppPaySlip = new AppPaySlipService ;
				$arrays['AppPaySlip'] = $AppPaySlip->show($id)->toArray() ;

				$AppSubContractorEngagementIntention = new AppSubContractorEngagementIntentionService ;
				$arrays['AppSubContractorEngagementIntention'] = $AppSubContractorEngagementIntention->show($id)->toArray() ;

				$AppSuperAnnuationSoleTrader = new AppSuperAnnuationSoleTraderService ;
				$arrays['AppSuperAnnuationSoleTrader'] = $AppSuperAnnuationSoleTrader->show($id)->toArray() ;
				$AppAbnWorker = new AppAbnWorkerService ;
				$arrays['AppAbnWorker'] = $AppAbnWorker->show($id)->toArray() ;
				
				$AppFairWorkPrincipal = new AppFairWorkPrincipalService ;
				$arrays['AppFairWorkPrincipal'] = $AppFairWorkPrincipal->show($id)->toArray() ;
				
				$AppDepartementEmployment = new AppDepartmentEmploymentService ;
				$arrays['AppDepartementEmployment'] = $AppDepartementEmployment->show($id)->toArray() ;
				
				$AppOHSWHS = new AppOHSWHSService ;
				$arrays['AppOHSWHS'] = $AppOHSWHS->show($id)->toArray() ;

				$AppSafeWorkMethodStatement = new AppSafeWorkMethodStatementService ;
				$arrays['AppSafeWorkMethodStatement'] = $AppSafeWorkMethodStatement->show($id)->toArray() ;

				$AppWorkersInjury = new AppWorkersInjuryService ;
				$arrays['AppWorkersInjury'] = $AppWorkersInjury->show($id)->toArray() ;
				
				$AppTrainingAndCompetency = new AppTrainingAndCompetencyService ;
				$arrays['AppTrainingAndCompetency'] = $AppTrainingAndCompetency->show($id)->toArray() ;

				$AppIRE = new AppIRECertificateService ;
				$arrays['AppIRE'] = $AppIRE->show($id)->toArray() ;
				
				$AppSubContractors = new AppSubContractorsService ;
				$arrays['AppSubContractors'] = $AppSubContractors->show($id)->toArray() ;
			}
			
			
			else {
			    $AppDocument1 = new AppDocumentService ;
			    $arrays['AppRenewalDocuments'] = $AppDocument1->showRenewalDocuments($id)->toArray() ;
			    $AppBusinessIdentification = new AppBusinessIdentificationService() ;
			    $arrays['AppBusinessIdentification'] = $AppBusinessIdentification->show($id)->toArray() ;
			    $AppSubContractors = new AppSubContractorsService ;
			    $arrays['AppSubContractors'] = $AppSubContractors->show($id)->toArray() ;
			    $AppEmployeesDetail = new AppEmployeesDetailService ;
			    $arrays['AppEmployeesDetails'] = $AppEmployeesDetail->show($id)->toArray() ;

			}
		}
		
		return $arrays ;
	}
}