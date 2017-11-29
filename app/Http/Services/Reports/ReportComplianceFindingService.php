<?php
namespace App\Http\Services\Reports ;
use App\ReportComplianceFinding ; 

class ReportComplianceFindingService {

	public function show($id) {
	    return ReportComplianceFinding::where('reports_id',$id)->first() ;
	}

	public function update($request , $id) {
		$requestData = array_add($request->all(),'reports_id',$id);
	    $ReportComplianceFinding = ReportComplianceFinding::where('reports_id',$id)->first();
	    if($ReportComplianceFinding)
	    	$ReportComplianceFinding->update($requestData);
	   

	}

	public function store($request,$reportId) {
	    $requestData = array_add($request->all(),'reports_id',$reportId);
	    ReportComplianceFinding::create($requestData);

	}
}