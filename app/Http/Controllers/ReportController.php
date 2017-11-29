<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Services\Reports\ReportService;

use App\Report;
use App\ReportSection;
use App\ReportApplication;
use View;
use Yajra\Datatables\Datatables;


class ReportController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }



    public function index() {
       $reportsLinkedToApplication = Report::join('applications_has_report','reports.id','=','applications_has_report.report_id')
       ->leftJoin('reportsBusinessIdentif','reportsBusinessIdentif.reports_id','=','applications_has_report.report_id')->
       select(['reports.id','applications_has_report.applications_idapplication','reportsBusinessIdentif.businessName']);
       $reportsNotLinkedToApplication = Report::where('reports.isApplication','=',0)
       ->join('reportsBusinessIdentif','reportsBusinessIdentif.reports_id','=','reports.id')->
       select(['reports.id','reports.isApplication','reportsBusinessIdentif.businessName']);

       $reports = $reportsLinkedToApplication->union($reportsNotLinkedToApplication);
       return Datatables::of($reportsLinkedToApplication)->addColumn('action',function($report){
           if($report->applications_idapplication != 0) {
            
            return '<a href="/admin/report/view/'.$report->id.'" class="btn btn-xs btn-primary"> <i class="fa fa-search-plus"></i> View</a> 
               <a href="/admin/report/update/'.$report->id.'" class="btn btn-xs btn-success"> <i class="fa fa-pencil"></i> Edit</a>  <a href="/admin/home/view/'.$report->applications_idapplication.'" class="btn btn-xs btn-info"> <i class="fa fa-pencil"></i> View Application</a>' ; 
           }
           return '<a href="/admin/report/view/'.$report->id.'" class="btn btn-xs btn-primary"> <i class="fa fa-search-plus"></i> View</a> <a href="/admin/report/update/'.$report->id.'" class="btn btn-xs btn-success"> <i class="fa fa-pencil"></i> Edit</a>' ;
              
               
       })->
       make(true);
    }

    public function getReportForm($idApplication=null){
        $sections = ReportSection::get();
        $businessIdentification = array();
        $sectionStatus = array();
        $reportFairWork = array();
        $employeesDetails = array();
        $businessIdentification = null;
        $sectionStatus = null;
        $sectionValue = null;
        $reportFairWork = null;
        $employeesDetails = null;
        $businessStructure = null;
        $ReportComplianceFinding = null;
        $sections = ReportSection::get();
        if($idApplication != null) {
            $reportApplication = ReportApplication::where('applications_idapplication',$idApplication)->first();
            if (!$reportApplication)
               return View::make('admin.reports.form',compact('businessStructure','idApplication','sections','businessIdentification','reportFairWork','employeesDetails','sectionStatus','sectionValue','ReportComplianceFinding'));
            return redirect('/admin/report/update/'.$reportApplication->report_id);
        }
        
        return View::make('admin.reports.form',compact('businessStructure','idApplication','sections','businessIdentification','reportFairWork','employeesDetails','sectionStatus','sectionValue','ReportComplianceFinding'));
    }

    public function store(Request $request,$idApplication=null) {
        $ReportService = new ReportService;
        $ReportService->store($request,$idApplication);
     
       return redirect('/admin/reports');
    }

    public function update(Request $request , $id) {
        $ReportService = new ReportService;
        $ReportService->update($request,$id);
        return redirect('/admin/reports');
    }

    public function show($id){
        $ReportService = new ReportService;
        return $ReportService->show($id); 
    }
      
}
