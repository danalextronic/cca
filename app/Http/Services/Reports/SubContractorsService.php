<?php
namespace App\Http\Services\Reports ;
use Auth ;
use App\ReportSubContractor ; 
class SubContractorsService {

	public function show($id) {
	    return ReportSubContractor::where('reports_id',$id)->get() ; 
	}

	

	public function store($request,$reportId,$i) {
	   
		$ReportSubContractor = new ReportSubContractor;
	    $ReportSubContractor->subContractorName = $request->input('subcontractor_name_'.$i);
	    $ReportSubContractor->ABN = $request->input('subcontractor_abn_'.$i);
	    $ReportSubContractor->businessStructure = $request->input('subcontractor_businessStructure_'.$i);
	    $ReportSubContractor->IRECertificate = $request->input('subcontractor_IRECertificate_'.$i);
	    $ReportSubContractor->ccaReport = $request->input('ccaReport_'.$i);
	    $ReportSubContractor->insurance = $request->input('insurance_'.$i);
	    $ReportSubContractor->type = $request->get('type_'.$i);
	    $ReportSubContractor->reports_id = $reportId;
	    $ReportSubContractor->save();
	}
}