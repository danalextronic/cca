<h3> Public Liability Insurance </h3>
<section>
	<h3> Public Liability Insurance </h3>

	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="publicLiabilityPolicyCopy">Mandatory for all Contractors/Sub-Contractors. </label>
		
		<div class="col-lg-9">
			@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
				@if(strpos($_SERVER['REQUEST_URI'] , 'new') !== false)
					<strong class="text-danger"> please supply a Full copy of Public Liability Policy  </strong>
				@else
					@if($arrays["AppPublicLiabilityInsurance"][0]['copy'] == null )
						<strong class="text-danger"> please supply a Full copy of Public Liability Policy  </strong>
					
					@else
						<strong class="text-danger"> Already uploaded </strong>
						<a  href= "{{ route('getFile',['filename' =>  'publicLiabilityPolicyCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
							 View
						</a>
					@endif
				@endif
			@endif	

			<input class="filestyle " id="publicLiabilityPolicyCopy"  name="publicLiabilityPolicyCopy"  type="file" data-buttonname="btn-white">
		</div>
	</div>
	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="insuranceCompany"> Insurance Company</label>
		<div class="col-lg-9">
			<input id="insuranceCompany" name="insuranceCompany" type="text" value="{{ $arrays["AppPublicLiabilityInsurance"][0]['insuranceCompany'] }}"  class=" form-control">
		</div>
	</div>

	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="policyNumber"> Policy Number </label>
		<div class="col-lg-9">
			<input id="policyNumber" name="policyNumber" type="text" value="{{ $arrays["AppPublicLiabilityInsurance"][0]['policyNumber'] }} "  class=" form-control">
		</div>
	</div>

	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="expiryDate"> Expiry Date </label>
		<div class="col-lg-9">
			<input type="hidden" id="dateExpiry"  value="{{ $arrays["AppPublicLiabilityInsurance"][0]['expiryDate'] }}">
			@if(strpos($_SERVER['REQUEST_URI'], 'pdf') !== false )
				<input type="text" @if($arrays["AppPublicLiabilityInsurance"][0]['expiryDate']) value="{{ date('d/m/Y', strtotime($arrays["AppPublicLiabilityInsurance"][0]['expiryDate']))  }}" @endif>
			@else
			
			<div class="row">
                <div class='col-md-12'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' placeholder="dd/mm/yyyy" name="expiryDate"  class="form-control" />
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
	<br/>
	<p> <b> Coverage ( Minimum coverage $9million, $5mill, domestic Sole Traders) </b> </p>
	<label class="radio-inline">
	<input type="radio" @if($arrays["AppPublicLiabilityInsurance"][0]['coverage'] == 5) checked @endif name="coverage" value="5" >$5 million
	</label>
	<label class="radio-inline">
		<input type="radio" @if($arrays["AppPublicLiabilityInsurance"][0]['coverage'] == 10) checked @endif name="coverage" value="10">$10 million
	</label>
	<label class="radio-inline">
		<input type="radio" @if($arrays["AppPublicLiabilityInsurance"][0]['coverage'] == 20) checked @endif name="coverage" value="20">$20 million
	</label>
	<label class="radio-inline">
		<input type="radio" @if($arrays["AppPublicLiabilityInsurance"][0]['coverage'] == 50) checked @endif name="coverage" value="50">$50 million
	</label>
	
	<p> <em> All Sub Contractors must be noted on your Public Liability Policy </em> </p>
</section>
