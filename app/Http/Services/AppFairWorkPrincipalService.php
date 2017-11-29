<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppFairWorkPrincipal ; 

class AppFairWorkPrincipalService {

	public function show($id) {
	    return AppFairWorkPrincipal::where('applications_idapplication',$id)->get() ; 
	}

	public function update($request,$id) {
		$appFairWorkPrincipal =  AppFairWorkPrincipal::where('applications_idapplication',$id)->first() ;
		$appFairWorkPrincipal->tribunalDecision =$request->input('tribunalDecision');
		$appFairWorkPrincipal->detailsTribunalDecision =$request->input('detailsTribunalDecision');
		$appFairWorkPrincipal->fullComply =$request->input('fullComply');
		$appFairWorkPrincipal->fullComplyDetails =$request->input('fullComplyDetails');
		$appFairWorkPrincipal->organisationJudgements =$request->input('organisationJudgements');
		$appFairWorkPrincipal->organisationJudgementsDetails =$request->input('organisationJudgementsDetails');
		$appFairWorkPrincipal->subContractorTribunalDecision =$request->input('subContractorTribunalDecision');
		$appFairWorkPrincipal->subContractorEngagementOnlyNoJudgement =$request->input('subContractorEngagementOnlyNoJudgement');
		$appFairWorkPrincipal->subContractorTribunalDecisionDetails =$request->input('subContractorTribunalDecisionDetails');
		$appFairWorkPrincipal->subContractorEngagementOnlyNoJudgementDetails =$request->input('subContractorEngagementOnlyNoJudgementDetails');

		$appFairWorkPrincipal->save() ;
	}

	public function store($request,$idApplication,$idContractor) {
	    $appFairWorkPrincipal = new AppFairWorkPrincipal ;
	    $appFairWorkPrincipal->tribunalDecision =$request->input('tribunalDecision');
	    $appFairWorkPrincipal->detailsTribunalDecision =$request->input('detailsTribunalDecision');
	    $appFairWorkPrincipal->fullComply =$request->input('fullComply');
	    $appFairWorkPrincipal->fullComplyDetails =$request->input('fullComplyDetails');
	    $appFairWorkPrincipal->organisationJudgements =$request->input('organisationJudgements');
	    $appFairWorkPrincipal->organisationJudgementsDetails =$request->input('organisationJudgementsDetails');
	    $appFairWorkPrincipal->subContractorTribunalDecision =$request->input('subContractorTribunalDecision');
	    $appFairWorkPrincipal->subContractorEngagementOnlyNoJudgement =$request->input('subContractorEngagementOnlyNoJudgement');
	    $appFairWorkPrincipal->subContractorTribunalDecisionDetails =$request->input('subContractorTribunalDecisionDetails');
	    $appFairWorkPrincipal->subContractorEngagementOnlyNoJudgementDetails =$request->input('subContractorEngagementOnlyNoJudgementDetails');
	    $appFairWorkPrincipal->applications_idapplication = $idApplication ;
	    $appFairWorkPrincipal->applications_contractors_idcontractors  = $idContractor ;
	    $appFairWorkPrincipal->save() ;
	}
}