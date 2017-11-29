<?php
namespace App\Http\Services\Reports ;
use Auth ;
use App\ReportFairWork ; 
class ReportFairWorkService {
	public function show($id) {
	     return ReportFairWork::where('reports_id',$id)->first() ;
	}
	public function update($request , $id) {
		$requestData = $request->all();
	    $ReportFairWork = ReportFairWork::where('reports_id',$id)->first();
	    if($ReportFairWork)	
	    	$ReportFairWork->update($requestData);
	}
	public function store($request,$reportId ) {
	    $requestData = array_add($request->all(),'reports_id',$reportId);
	    ReportFairWork::create($requestData);
	}
}