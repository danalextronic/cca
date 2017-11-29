<h3> 
	Workers Injury Rehabilitation Management Policy And Plan
</h3>
<section>
	<h3> 
		Workers Injury Rehabilitation Management Policy And Plan
	</h3>
	<p> Do you have a Workers Injury Rehabilitation Management Plan? </p>
	<label class="radio-inline">
	<input type="radio" name="workersInjuryRehabilitation" value="1" @if($arrays["AppWorkersInjury"][0]['workersInjuryRehabilitation'] == 1) checked @endif  >Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="workersInjuryRehabilitation" value="0" @if($arrays["AppWorkersInjury"][0]['workersInjuryRehabilitation'] == 0) checked @endif >No
	</label>
	
	@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)		
		<p class="text-danger">
			<b> If Yes, please supply a copy. </b>
		</p>
		@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
			@if($arrays["AppWorkersInjury"][0]['workersInjuryCopy'] !== null )	
			<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
			<a  href= "{{ route('getFile',['filename' =>  'workersInjuryCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     </a>
			<br/>
			@endif
		@endif
	@endif
	<div class="form-group clearfix">		
		<input  class=" filestyle "  name="workersInjuryCopy"  type="file" data-buttonname="btn-white">	
	</div>
	<p class="text-danger">
		<b> If NO, are you inducted into another Contractors system?</b>
	</p>
	<label class="radio-inline">
	<input type="radio" name="workersInjuryAnotherContractorSystem" value="1" @if($arrays["AppWorkersInjury"][0]['anotherContractorsSystem'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="workersInjuryAnotherContractorSystem" value="0" @if($arrays["AppWorkersInjury"][0]['anotherContractorsSystem'] == 0) checked @endif>No
	</label>
	
	<p> </p>
	<div class="form-group clearfix">
		<label class="col-lg-4 control-label " for="workersInjusryNameContractor"> If YES, Name Contractor</label>
		<div class="col-lg-8">
			<input id="workersInjusryNameContractor" name="workersInjusryNameContractor" value="{{ $arrays["AppWorkersInjury"][0]['contractorName'] }} " type="text" class=" form-control">
		</div>
	</div>
</section>