<?php
namespace App\Http\Services\Reports ;
use Auth ;
use App\ReportBusinessIdentification ; 
use Carbon\Carbon;
class BusinessIdentificationService {

	public function show($id) {
	    return ReportBusinessIdentification::where('reports_id',$id)->first() ;
	}

	public function update($request , $id) {
		$requestData = array_add($request->all(),'reports_id',$id);
	    if($request->input('expiryDate')){
	    	$requestData['expiryDate'] = Carbon::createFromFormat('d/m/Y',$request->input('expiryDate'))->toDateString() ;
	    }
	    if($request->input('assessmentDate')) {
	    	$requestData['assessmentDate'] = Carbon::createFromFormat('d/m/Y',$request->input('assessmentDate'))->toDateString() ;
	    }
	    $ReportBusinessIdentification = ReportBusinessIdentification::where('reports_id',$id)->first();
	    if($ReportBusinessIdentification)
	    	$ReportBusinessIdentification->update($requestData);
	}

	public function store($request,$reportId) {
	    $requestData = array_add($request->all(),'reports_id',$reportId);
	    $requestData['expiryDate'] = null;
	    $requestData['assessmentDate'] = null;
	    $requestData['autoreminder'] = 0;
	    if($request->input('expiryDate')){
	    	$requestData['expiryDate'] = Carbon::createFromFormat('d/m/Y',$request->input('expiryDate'))->toDateString() ;
	    }
	    if($request->input('assessmentDate')) {
	    	echo "a" ;
	    	$requestData['assessmentDate'] = Carbon::createFromFormat('d/m/Y',$request->input('assessmentDate'))->toDateString() ;
	    }
	    
	    ReportBusinessIdentification::create($requestData);

	}
}