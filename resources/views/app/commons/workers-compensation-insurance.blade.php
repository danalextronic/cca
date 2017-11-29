<h3> Drug and Alcohol Policy </h3>

<section>
	<h3> Drug and Alcohol Policy </h3>
	<p> <b> Do you have a Drug and Alcohol Policy? </b> </p>
	<br/>
	<label class="radio-inline">
	<input type="radio" id="workersCompensationInsuranceExistYes" name="workersCompensationInsuranceExist" value="1" @if($arrays["AppWorkersCompensationInsurance"][0]['workersInsuranceExist'] == 1) checked @endif   >Yes
	</label>
	<label class="radio-inline">
		<input type="radio" id="workersCompensationInsuranceExistNo" name="workersCompensationInsuranceExist" value="0"  @if($arrays["AppWorkersCompensationInsurance"][0]['workersInsuranceExist'] == 0) checked @endif >No
	</label>
	@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)		
		@if(strpos($_SERVER['REQUEST_URI'] , 'new') !== false)
			<strong class="text-danger"> If Yes, please supply a Full copy of your Workers Compensation Policy  </strong>
		@else
			@if($arrays["AppWorkersCompensationInsurance"][0]['copy'] == null )
				<strong class="text-danger"> If Yes, please supply a Full copy of your Workers Compensation Policy  </strong>
			
			@else
				<strong class="text-danger"> Already uploaded  </strong>
				<a  href= "{{ route('getFile',['filename' =>  'workersCompensationPolicyCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     	</a>
			@endif
		@endif
	@endif
	
	<div class="form-group clearfix">		
		
		<input class="filestyle " id="workersCompensationPolicyCopy"  name="workersCompensationPolicyCopy"  type="file" data-buttonname="btn-white">	
	</div>
	<p> 
		You are required to hold a Workers Compensation Policy if you engage workers.
	</p>
	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="workersInsurancePolicyNumber"> Policy Number </label>
		<div class="col-lg-9">
			<input id="policyNumber" name="workersInsurancePolicyNumber" type="text" value="{{ $arrays["AppWorkersCompensationInsurance"][0]['workersInsurancePolicyNumber'] }} "  class=" form-control">
		</div>
	</div>
	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="workersInsuranceExpiryDate"> Expiry Date </label>
		<div class="col-lg-9">
			<input type="hidden" id="dateExpiryWorkers"  value="{{ $arrays["AppWorkersCompensationInsurance"][0]['workersInsuranceExpiryDate'] }}">
			@if(strpos($_SERVER['REQUEST_URI'], 'pdf') !== false )
				<input type="text" @if($arrays["AppWorkersCompensationInsurance"][0]['workersInsuranceExpiryDate'] ) value="{{ date('d/m/Y', strtotime($arrays["AppWorkersCompensationInsurance"][0]['workersInsuranceExpiryDate'])) }}" @endif>
			@else
			
			<div class="row">
                <div class='col-md-12'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker2'>
                            <input type='text' placeholder="dd/mm/yyyy" name="workersInsuranceExpiryDate"  class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
               
            </div>
					 
			@endif
		</div>
	</div>
	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="workersInsuranceEstimatedWages"> Estimated Wages </label>
		<div class="col-lg-9">
			<input id="workersInsuranceEstimatedWages" name="workersInsuranceEstimatedWages" value="{{ $arrays["AppWorkersCompensationInsurance"][0]['workersInsuranceEstimatedWages'] }} "   type="text" class=" form-control">
		</div>
	</div>
	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="workersInsuranceNumberWorkers"> Number of Workers </label>
		<div class="col-lg-9">
			<input id="workersInsuranceNumberWorkers" name="workersInsuranceNumberWorkers" value="{{ $arrays["AppWorkersCompensationInsurance"][0]['workersInsuranceNumberWorkers'] }} " type="text" class=" form-control">
		</div>
	</div>
</section>