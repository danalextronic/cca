<h3> Fair Work Principals </h3>
<section>
	<h3>Fair Work Principals </h3>
	<p>
		Has the Contractor had any adverse court or tribunal decision for breach of workplace relations
		law, occupational health and safety laws, or worker’s compensation in the last two years?
	</p>
	<label class="radio-inline">
	<input type="radio" name="tribunalDecision" value="1" @if($arrays["AppFairWorkPrincipal"][0]['tribunalDecision'] == 1) checked @endif >Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="tribunalDecision" value="0" @if($arrays["AppFairWorkPrincipal"][0]['tribunalDecision'] == 0) checked @endif >No
	</label>
	<br>

	<div class="form-group clearfix">
		
		<div class="col-lg-12">
			<label class="col-lg-3 control-label " for="detailsTribunalDecision"> If Yes , please provide details</label>
			<div class="col-lg-9">
				<input id="fundName" name="detailsTribunalDecision" type="text" value="{{ $arrays["AppFairWorkPrincipal"][0]['detailsTribunalDecision'] }}" class=" form-control">
			</div>
		</div>
	</div>
	<p>
		Is the Contractor fully complying with the court or tribunal decision?
	</p>
	<label class="radio-inline">
	<input type="radio" name="fullComply" value="1" @if($arrays["AppFairWorkPrincipal"][0]['fullComply'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="fullComply" value="0" @if($arrays["AppFairWorkPrincipal"][0]['fullComply'] == 0) checked @endif>No
	</label>
	<br>

	<div class="form-group clearfix">
		
		<div class="col-lg-12">
			<label class="col-lg-3 control-label " for="fullComplyDetails"> If Yes , please provide details</label>
			<div class="col-lg-9">
				<input id="fullComplyDetails" name="fullComplyDetails"  value="{{ $arrays["AppFairWorkPrincipal"][0]['fullComplyDetails'] }}" type="text" class=" form-control">
			</div>
		</div>
	</div>
	<p>
		Does your organisation have any outstanding judgments against them, which remain
		unpaid?
	</p>
	<label class="radio-inline">
	<input type="radio" name="organisationJudgements" value="1" @if($arrays["AppFairWorkPrincipal"][0]['organisationJudgements'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="organisationJudgements" value="0" @if($arrays["AppFairWorkPrincipal"][0]['organisationJudgements'] == 0) checked @endif>No
	</label>
	<br>

	<div class="form-group clearfix">
		
		<div class="col-lg-12">
			<label class="col-lg-3 control-label " for="organisationJudgementsDetails"> If Yes , please provide details</label>
			<div class="col-lg-9">
				<input id="organisationJudgementsDetails"  value="{{ $arrays["AppFairWorkPrincipal"][0]['fullComplyDetails'] }}"  name="organisationJudgementsDetails" type="text" class=" form-control" >
			</div>
		</div>
	</div>

	<p>
		Have any of the Contractor’s subcontractors had any adverse court or tribunal decision for breach
		of workplace relations law, occupational health and safety laws, or worker’s compensation in the
		last two years?
	</p>
	<label class="radio-inline">
	<input type="radio" name="subContractorTribunalDecision" value="1" @if($arrays["AppFairWorkPrincipal"][0]['subContractorTribunalDecision'] == 0) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="subContractorTribunalDecision" value="0" @if($arrays["AppFairWorkPrincipal"][0]['subContractorTribunalDecision'] == 0) checked @endif>No
	</label>
	<br>

	<div class="form-group clearfix">
		
		<div class="col-lg-12">
			<label class="col-lg-3 control-label " for="subContractorTribunalDecisionDetails"> If Yes , please provide details</label>
			<div class="col-lg-9">
				<input id="subContractorTribunalDecisionDetails" name="subContractorTribunalDecisionDetails" type="text" value="{{ $arrays["AppFairWorkPrincipal"][0]['subContractorTribunalDecisionDetails'] }}"  class=" form-control">
			</div>
		</div>
	</div>

	<p>
		Do you undertake that you will only engage sub contractors who do not have any outstanding
		judgments against them, which remain unpaid?
	</p>
	<label class="radio-inline">
	<input type="radio" name="subContractorEngagementOnlyNoJudgement" value="1" @if($arrays["AppFairWorkPrincipal"][0]['subContractorEngagementOnlyNoJudgement'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="subContractorEngagementOnlyNoJudgement" value="0" @if($arrays["AppFairWorkPrincipal"][0]['subContractorEngagementOnlyNoJudgement'] == 0) checked @endif>No
	</label>
	<br>

	<div class="form-group clearfix">
		
		<div class="col-lg-12">
			<label class="col-lg-3 control-label " for="subContractorEngagementOnlyNoJudgementDetails"> If Yes , please provide details</label>
			<div class="col-lg-9">
				<input id="subContractorEngagementOnlyNoJudgementDetails" name="subContractorEngagementOnlyNoJudgementDetails" type="text" value="{{ $arrays["AppFairWorkPrincipal"][0]['subContractorEngagementOnlyNoJudgementDetails'] }}"  class=" form-control">
			</div>
		</div>
	</div>
		

</section>