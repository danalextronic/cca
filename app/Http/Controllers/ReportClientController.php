<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Services\Reports\BusinessIdentificationService;
use App\Http\Services\Reports\SectionStatusService;
use App\Http\Services\Reports\ReportFairWorkService;
use App\Http\Services\Reports\EmployeesDetailsService;
use App\Http\Services\Reports\SubContractorsService;
use App\Http\Services\Reports\ReportHasClientService;
use App\Http\Services\Reports\ReportComplianceFindingService;

use App\Report;
use App\ReportApplication;
use App\ReportEmployeeDetail;
use App\ReportHasClient;
use App\ReportSection;
use App\ReportSectionStatus;
use Auth;
use View;
use PDF;

class ReportClientController extends Controller
{
   /* public function __construct() {
         $this->middleware('client');
    }*/



    public function index() {
       $idClient = Auth::guard('client')->user()->id;
       $reports = Report::join('reports_has_clients','reports.id','=','reports_has_clients.report_id')->where('reports_has_clients.clients_id','=',$idClient)
       ->join('reportsBusinessIdentif','reportsBusinessIdentif.reports_id','=','reports_has_clients.report_id')->select(['reports.id','reportsBusinessIdentif.businessName','reports.entityType','reportsBusinessIdentif.assessmentDate','reportsBusinessIdentif.expiryDate','reportsBusinessIdentif.abn','reportsBusinessIdentif.employeeAgreementType'])
       ->get();

      $sections = ReportSection::get();
      $sectionStatus = array();
      foreach ($reports as $report) {
        $sectionStatus[] =  ReportSectionStatus::where('reports_id',$report->id)->orderBy('reportSections_id','asc')->get();
      }

      return View::make('client.report.full-report',compact('reports','sections','sectionStatus'));
     //  return $reports;
    }

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
        return View::make('client.report.form',compact('id','businessStructure','idApplication','employeesDetails','sections','reportFairWork','sectionStatus','sectionValue','businessIdentification','clients','numClients','subcontractors','ReportComplianceFinding'));
    }


    public function generatePdf($client,$id=null) {
        if($id) {
          return PDF::loadFile(url('client/report/pdf/url/'.$id))->setOption('page-height','139.7')->stream() ;
        }
        else {
          return PDF::loadFile(url('client/full-report/pdf/'.Auth::guard('client')->user()->id))->setPaper('a0')->stream();
        }
    }
      
}
