<?php
namespace App\Http\Services\Reports ;
use Auth ;
use App\ReportEmployeeDetail ; 
class EmployeesDetailsService {

	public function show($id) {
	  return ReportEmployeeDetail::where('reports_id',$id)->get() ; 
	}

	public function update($request , $id) {
		
	}

	public function store($request,$reportId,$i ) {
	    $ReportEmployeeDetail = new ReportEmployeeDetail;
	    $ReportEmployeeDetail->employeeName = $request->input('employee_name_'.$i);
	    $ReportEmployeeDetail->super = $request->input('super_'.$i);
	    $ReportEmployeeDetail->lsbl = $request->input('lsbl_'.$i);
	    $ReportEmployeeDetail->redundancy = $request->input('redundancy_'.$i);
	    $ReportEmployeeDetail->topUpInsurance = $request->input('top_insurance_'.$i);
	    $ReportEmployeeDetail->ohsCard = $request->input('ohs_'.$i);
	    $ReportEmployeeDetail->asbestos = $request->input('asbestos_'.$i);
	    //$ReportEmployeeDetail->proof = $request->input('proof_'.$i);
	    $ReportEmployeeDetail->reports_id = $reportId;
	    $ReportEmployeeDetail->save();
	}
}