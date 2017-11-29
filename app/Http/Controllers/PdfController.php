<?php

namespace App\Http\Controllers;
use App\Http\Services\PdfService ;
use Illuminate\Http\Request;
use PDF ;
use Illuminate\Support\Facades\Storage ;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Application ;
use App\Http\Services\ApplicationService ;
use App\Http\Services\Reports\ReportService;
use App\ReportHasClient;
use App\ReportSection;
use App\ReportSectionStatus;

use App\Report;
use View ;
use Auth;
class PdfController extends Controller
{
    
	public function testPdf() {
		return PDF::loadFile(url('/DKFBYYROVEWJaEZtaQoRluEdXg6lB66E6pTmKsr4/pdf/2'))->stream() ;
	}
    
    public function routePdfReport($id) {
        $ReportService = new ReportService;
        return $ReportService->show($id);
    }

    public function routePdfFullReport($idClient) {
         $reports = Report::join('reports_has_clients','reports.id','=','reports_has_clients.report_id')->where('reports_has_clients.clients_id','=',$idClient)
         ->join('reportsBusinessIdentif','reportsBusinessIdentif.reports_id','=','reports_has_clients.report_id')->select(['reports.id','reportsBusinessIdentif.businessName','reports.entityType','reportsBusinessIdentif.abn'])
         ->get();

        $sections = ReportSection::get();
        $sectionStatus = array();
        foreach ($reports as $report) {
          $sectionStatus[] =  ReportSectionStatus::where('reports_id',$report->id)->orderBy('reportSections_id','asc')->get();
        }

        return View::make('client.report.full-report',compact('reports','sections','sectionStatus'));
    }

    public function routePdfReportClient($id) {
        if(Auth::guard('user')->user()->id == ReportHasClient::where('report_id',$id)->first()->clients_id) {
            $ReportService = new ReportService;
            return $ReportService->show($id);
        }
        
    }

    public function routePdfApplication($id) {
    	$app = Application::find($id) ;
    	$state = $app->applicationType ;
    	$application = new ApplicationService ;
    	$arrays = $application->showAppDetails($state,$id) ;
    	$applications = Application::join('users','applications.contractors_idcontractors','=','users.id')->select(['applications.idapplication','applications.applicationNumber','applications.applicationType','applications.applicationStatus','applications.created_at','applications.updated_at','users.name','users.email'])->where('idapplication',$id)->get()->toArray();
    	return View::make('app.'.$state,compact('applications','arrays')) ; 
    }
}
