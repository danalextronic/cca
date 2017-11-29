<h3> Redundancy </h3>
<section>
	<h3>Redundancy </h3>
	<p>
		Does your business currently contribute to a redundancy trust fund? e.g. ACIRT, MERT,BERT.
	</p>
	<label class="radio-inline">
	<input type="radio" id="redundancyExistYes" name="redundancyExist" value="1"  @if($arrays["AppRedundancy"][0]['redundancyContribution'] == 1) checked @endif >Yes
	</label>
	<label class="radio-inline">
		<input type="radio" id="redundancyExistNo" name="redundancyExist" value="0"  @if($arrays["AppRedundancy"][0]['redundancyContribution'] == 0) checked @endif >No
	</label>
	<br>
	<div class="form-group clearfix">
		
		<div class="col-lg-12">
			<label class="col-lg-3 control-label " for="fundName"> Fund Name </label>
			<div class="col-lg-9">
				<input id="fundName" name="fundName" type="text" value="{{ $arrays["AppRedundancy"][0]['fundName'] }} " class=" form-control">
			</div>
		</div>
	</div>
	<p>
		If you have answered YES to this questions, please provide returns and receipts for the last payment period.
	</p>
	<div class="form-group clearfix">		
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				@if($arrays["AppRedundancy"][0]['copy'] !== null )	
				<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
				<a  href= "{{ route('getFile',['filename' =>  'receiptLastPayement', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     	</a>		
				@endif
			@endif
		@endif
		<input class="filestyle "  name="receiptLastPayement"  type="file" data-buttonname="btn-white">	
	</div>
	<p>
		Please ensure that your statement specifies the level of contribution made on behalf of each employee identified who is intended to work on the Project.
	</p>	
</section>