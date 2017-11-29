<?php
namespace App\Http\Services\Reports ;
use Auth ;
use App\ReportSectionStatus ; 
class SectionStatusService {

	public function show($id,$i) {
	     $ReportSectionStatus = ReportSectionStatus::where('reports_id',$id)->where('reportSections_id',$i)->first() ;
	     return $ReportSectionStatus['status'];
	}

	public function showValue($id,$i) {
		$ReportSectionStatus = ReportSectionStatus::where('reports_id',$id)->where('reportSections_id',$i)->first() ;
		return $ReportSectionStatus['value'];
	}

	public function update($request , $id,$reportSectionsId ) {

	    $reportSectionStatus = ReportSectionStatus::where('reports_id',$id)->where('reportSections_id',$reportSectionsId)->first();
	    if($reportSectionStatus){
	    	$reportSectionStatus->status = $request->input('sectionStatus_'.$reportSectionsId) ;
	    	$reportSectionStatus->value = $request->input('sectionValue_'.$reportSectionsId) ;
	    	$reportSectionStatus->save();
	    }
	    
	}

	public function store($request,$reportId,$reportSectionsId ) {
	    $requestData = array_add($request->all(),'reports_id',$reportId);
	    $requestData = array_add($requestData,'reportSections_id',$reportSectionsId);
	    $requestData = array_add($requestData,'status',$request->input('sectionStatus_'.$reportSectionsId));
	    $requestData = array_add($requestData,'value',$request->input('sectionValue_'.$reportSectionsId));
	    ReportSectionStatus::create($requestData);

	}
}