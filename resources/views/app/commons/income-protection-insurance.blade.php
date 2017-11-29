<h3> Income Protection Insurance </h3>
<section>
	<p> <b> INCOME PROTECTION INSURANCE ? </b> </p>
	<br/>
	<label class="radio-inline">
	<input type="radio" id="incomeProtectionInsuranceExistYes" name="incomeProtectionInsuranceExist" value="1" @if($arrays["AppIncomeProtectionInsurance"][0]['incomeProtectionInsuranceExist'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" id="incomeProtectionInsuranceExistNo" name="incomeProtectionInsuranceExist" value="0" @if($arrays["AppIncomeProtectionInsurance"][0]['incomeProtectionInsuranceExist'] == 0) checked @endif>No
	</label>
	<div class="form-group">
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') !== false)
				<strong class="text-danger">If Yes , please supply a Full copy  </strong>
			@else
				@if($arrays["AppIncomeProtectionInsurance"][0]['copy'] == null )
					<strong class="text-danger"> please supply a Full copy  </strong>
				
				@else
					<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
					<a  href= "{{ route('getFile',['filename' =>  'incomeProtectionInsuranceCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
				   </a>
				@endif
			@endif
		@endif
		<input class="filestyle " id="incomeProtectionInsuranceCopy"  name="incomeProtectionInsuranceCopy"  type="file" data-buttonname="btn-white">
	</div>
	
	
	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="protectionInsuranceCompany"> Insurance Company </label>
		<div class="col-lg-9">
			<input id="protectionInsuranceCompany" name="protectionInsuranceCompany"  type="text" value="{{ $arrays["AppIncomeProtectionInsurance"][0]['insuranceCompany'] }}"  class=" form-control">
		</div>
	</div>
	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="protectionInsuranceNamePersonCovered"> Name of person covered </label>
		<div class="col-lg-9">
			<input id="protectionInsuranceNamePersonCovered" name="protectionInsuranceNamePersonCovered" type="text" value="{{ $arrays["AppIncomeProtectionInsurance"][0]['namePersonCovered'] }} "  class=" form-control">
		</div>
	</div>
	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="protectionInsurancePolicyNumber"> Policy Number </label>
		<div class="col-lg-9">
			<input id="protectionInsurancePolicyNumber" name="protectionInsurancePolicyNumber" type="text" value="{{ $arrays["AppIncomeProtectionInsurance"][0]['policyNumber'] }}" class=" form-control">
		</div>
	</div>
	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="incomeProtectionInsuranceExpiryDate"> Expiry Date </label>
		<div class="col-lg-9">
			<input type="hidden" id="dateExpiryProtectionInsurance"  value="{{ $arrays["AppIncomeProtectionInsurance"][0]['expiryDate'] }}">
			@if(strpos($_SERVER['REQUEST_URI'], 'pdf') !== false )
				<div class="form-group">
					<input type="text" @if( $arrays["AppIncomeProtectionInsurance"][0]['expiryDate'] != null ) value="{{ date('d/m/Y', strtotime($arrays["AppIncomeProtectionInsurance"][0]['expiryDate'])) }} " @endif>
				</div>
			@else
			
			<div class="row">
                <div class='col-md-12'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker3'>
                            <input type='text' placeholder="dd/mm/yyyy" name="protectionInsuranceExpiryDate"  class="form-control" />
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
</section>