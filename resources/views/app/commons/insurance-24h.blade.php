<h3> Top Up Insurance and 24 Hour Income Protection Insurance for employees </h3>
<section>
	<h3> Top Up Insurance and 24 Hour Income Protection Insurance for employees </h3>
	<p> <b> Is your business obliged to provide 24 hour income protection insurance and/or Top-up Insurance pursuant to an Agreement?</b> </p>
	<br/>
	<label class="radio-inline">
	<input type="radio" id="insurance24hExistYes" name="insurance24hExist" value="1" @if($arrays["AppInsurance24h"][0]['insurance24hExist'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" id="insurance24hExistNo" name="insurance24hExist" value="0"  @if($arrays["AppInsurance24h"][0]['insurance24hExist'] == 0) checked @endif>No
	</label>
	<p> If Yes , <strong class="text-danger"> please provide the relevant return and receipts for the last payment period. </strong>  </p>
	<div class="form-group clearfix">		
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				@if($arrays["AppInsurance24h"][0]['copy'] !== null )	
				<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
				<a  href= "{{ route('getFile',['filename' =>  'lastReceiptPaymentPeriod', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     	</a>
				 <br/>
				@endif
			@endif
		@endif	
		<input id="lastReceiptPaymentPeriod" class="filestyle "  name="lastReceiptPaymentPeriod"  type="file" data-buttonname="btn-white">	
	</div>
	<p> 
		Please ensure that your statement specifies the level of contribution made on behalf of each
		employee identified.
	</p>
</section>