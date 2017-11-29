<?php
namespace App\Http\Services\Reports ;
use App\ReportSection;
use App\Http\Services\Reports\BusinessIdentificationService;
use App\Http\Services\Reports\SectionStatusService;
use App\Http\Services\Reports\ReportFairWorkService;
use App\Http\Services\Reports\EmployeesDetailsService;
use App\Http\Services\Reports\ReportHasClientService;
use App\Http\Services\Reports\SubContractorsService;
use App\Http\Services\Reports\ReportComplianceFindingService;
use App\Http\Services\Pdf\PdfService;
use App\Report;
use App\ReportApplication;
use App\ReportEmployeeDetail;
use App\ReportSubContractor;
use View;
class ReportService {

	public function show($id){
	    $Report = Report::find($id);
	   $businessStructure = $Report->entityType;
	    $BusinessIdentificationService = new BusinessIdentificationService;
	    $businessIdentification = $BusinessIdentificationService->show($id);
	    $sectionStatus = array();
	    for($i=1;$i<=23;$i++){
	       $SectionStatusService = new SectionStatusService;
	       $sectionStatus[$i] = $SectionStatusService->show($id,$i);
	       $SectionStatusService = new SectionStatusService;
	       $sectionValue[$i] = $SectionStatusService->showValue($id,$i); 
	    }  
	    $ReportFairWorkService = new ReportFairWorkService;
	    $reportFairWork = $ReportFairWorkService->show($id);
	    $EmployeesDetailsService = new EmployeesDetailsService;
	    $employeesDetails = $EmployeesDetailsService->show($id);
	    $SubContractorsService = new SubContractorsService;
	    $subcontractors = $SubContractorsService->show($id);
	    $ReportApplication = ReportApplication::where('report_id',$id)->first();
	    if ($ReportApplication)
	      $idApplication = $ReportApplication->applications_idapplication;
	    else {
	      $idApplication = null;
	    }
	    $sections = ReportSection::get();
	    $ReportHasClientService = new ReportHasClientService;
	    $clients = $ReportHasClientService->show($id);
	    $ReportHasClientService = new ReportHasClientService;
	    $numClients = $ReportHasClientService->count($id);
	    $ReportComplianceFindingService = new ReportComplianceFindingService;
	    $ReportComplianceFinding = $ReportComplianceFindingService->show($id);
	    return View::make('admin.reports.form',compact('Report','businessStructure','idApplication','employeesDetails','sections','reportFairWork','sectionStatus','sectionValue','businessIdentification','clients','numClients','subcontractors','ReportComplianceFinding'));
	}

	

	

	public function store($request,$idApplication=null) {
	    $report = new Report;
	    $report->entityType = $request->input('businessStructure');
	    $report->signature = $request->input('signature');
	    if(!$idApplication) {
	        $report->isApplication=0;
	        $report->save();
	    } 
	        
	    else {
	        $report->isApplication=1;
	        $report->save();
	        $ReportApplication = new ReportApplication;
	        $ReportApplication->applications_idapplication = $idApplication;
	        $ReportApplication->report_id = $report->id;
	        $ReportApplication->save();
	    }
	       

	    
	    $id = $report->id;
	    $BusinessIdentificationService = new BusinessIdentificationService;
	    $BusinessIdentificationService->store($request,$id);
	    for($i=1;$i<=23;$i++){
	       $SectionStatusService = new SectionStatusService;
	       $SectionStatusService->store($request,$id,$i); 
	    }   
	    $ReportFairWorkService = new ReportFairWorkService;
	    $ReportFairWorkService->store($request,$id);

	    for($i=0;$i<$request->input('numberRows');$i++) {
	        $EmployeesDetailsService = new EmployeesDetailsService;
	        $EmployeesDetailsService->store($request,$id,$i);
	    }

	    for($i=0;$i<$request->input('numberRowsSub');$i++) {
	        $SubContractorsService = new SubContractorsService;
	        $SubContractorsService->store($request,$id,$i);
	    }

	    for($i=0;$i<$request->input('numClient');$i++) {
	       $j = $i+1;
	       if($request->input('client_'.$j)) {
	          $ReportHasClientService = new ReportHasClientService;
	          $ReportHasClientService->store($id,$request->input('client_'.$j));
	       }
	      
	     
	    }
	    $ReportComplianceFindingService = new ReportComplianceFindingService;
	    $ReportComplianceFindingService->store($request,$id);
	    if($idApplication) {
	      $PdfService = new PdfService;
	      $PdfService->uploadReportPdf($idApplication);
	    }
	 
	   //return redirect()->back();
	}

	 public function update($request , $id) {
        $report = Report::find($id);
        $report->entityType = $request->input('businessStructure');
        $BusinessIdentificationService = new BusinessIdentificationService;
        $BusinessIdentificationService->update($request,$id);
        for($i=1;$i<=23;$i++){
           $SectionStatusService = new SectionStatusService;
           $SectionStatusService->update($request,$id,$i); 
        }   
        $ReportFairWorkService = new ReportFairWorkService;
        $ReportFairWorkService->update($request,$id);
        ReportEmployeeDetail::where('reports_id',$id)->delete() ;
        for($i=0;$i<$request->input('numberRows');$i++) {
            $EmployeesDetailsService = new EmployeesDetailsService;
            $EmployeesDetailsService->store($request,$id,$i);
        }
        ReportSubContractor::where('reports_id',$id)->delete();
        for($i=0;$i<$request->input('numberRowsSub');$i++) {
            $SubContractorsService = new SubContractorsService;
            $SubContractorsService->store($request,$id,$i);
        }
        $numClientInitial = $request->input('numClientInitial');
        $numClient = $request->input('numClient');
        if ($numClient > $numClientInitial) {
          for($i=$numClientInitial+1 ; $i < $numClient +1 ; $i++) {
            $ReportHasClientService = new ReportHasClientService;
            $ReportHasClientService->store($id,$request->input('client_'.$i));
          }
        }
        $countReportApplication = ReportApplication::where('report_id',$id)->count();
        if ($countReportApplication == 1) {
        	$idApplication = ReportApplication::where('report_id',$id)->first()->applications_idapplication;
        	$PdfService = new PdfService;
        	$PdfService->uploadReportPdf($idApplication);
        }
        $ReportComplianceFindingService = new ReportComplianceFindingService;
        $ReportComplianceFindingService->update($request,$id);
      // return redirect()->back();
    }
	
}