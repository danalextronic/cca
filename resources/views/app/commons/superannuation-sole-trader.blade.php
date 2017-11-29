<h3> Super Annuation- Sole Trader </h3>
<section>
	<h3> Super Annuation- Sole Trader </h3>
	<label class="radio-inline">
	<input type="radio" name="superAnnuationSoleTraderExist" value="1" @if($arrays["AppSuperAnnuationSoleTrader"][0]['superAnnuationSoleTraderExist'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="superAnnuationSoleTraderExist" value="0" @if($arrays["AppSuperAnnuationSoleTrader"][0]['superAnnuationSoleTraderExist'] == 0) checked @endif>No
	</label>
	<p class="text-danger">
		
		<b>
			If yes, please provide CBUS (or equivalent fund) returns for the last pay period and evidence of
			payment 
		</b>
	</p>
	<div class="form-group clearfix">		
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				@if($arrays["AppSuperAnnuationSoleTrader"][0]['CBUS'] !== null )	
				<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
				<a  href= "{{ route('getFile',['filename' =>  'superAnnuationSoleTraderCBUS', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     	</a>
				<br/>
				@endif
			@endif
		@endif	

		<input class="col-lg-6 filestyle "  name="superAnnuationSoleTraderCBUS"  type="file" data-buttonname="btn-white">	
	</div>
	
</section>