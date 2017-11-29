<h3> 
	Safe Work Method Statements
</h3>
<section>
	<h3> 
		Safe Work Method Statements
	</h3>
	<p> Do you have a Safe Work Method Statement? </p>
	<label class="radio-inline">
	<input type="radio" name="safeWorkMethodStatementExist" value="1" @if($arrays["AppSafeWorkMethodStatement"][0]['safeWorkMethodStatementExist'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="safeWorkMethodStatementExist" value="0" @if($arrays["AppSafeWorkMethodStatement"][0]['safeWorkMethodStatementExist'] == 0) checked @endif> No
	</label>
	<p class="text-danger">
		<b> If Yes, please supply a copy. </b>
	</p>
	
	<div class="form-group clearfix">		
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				<button class="btn btn-primary btn-xs" id="addScntBis"><i class="fa fa-plus-square"> </i> Add More</button>
				<div id="p_scentsBis">
				<input type="hidden" id="numFilesSWMS" name="numFilesSWMS" value="{{$arrays["AppOHSWHS"][0]['numberFiles']}}">
				@for($i=0;$i<$arrays["AppSafeWorkMethodStatement"][0]['numberFiles'];$i++)
					
						<p>
							File {{$i+1}} :  <a  href="{{ route('getFile',['filename' =>  'SWMSCopy_'.$i, 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" >View </a>
							
							
							    
							Update File {{$i+1}} :
							   <input type="file" class="filestyle" id="p_scntBis" size="20" name="SWMSCopy_{{$i}}" data-buttonname="btn-white" value=""  />
							        
							    
							
						</p>
				@endfor
				</div>
			@else
			<button type="button"  class="btn btn-primary btn-xs" id="addScntBis"><i class="fa fa-plus-square"> </i> Add More</button>
			<div id="p_scentsBis">
			    <input type="hidden" id="numFilesSWMS" name="numFilesSWMS" value="1">
			    <p>
			        <input type="file" class="filestyle" id="p_scntBis" size="20" name="SWMSCopy_0" data-buttonname="btn-white" value=""  />
			    </p>
			</div>
			@endif
		@endif	
			
	</div>
	<p class="text-danger">
		<b> If NO, are you inducted into another Contractors system?</b>
	</p>
	<label class="radio-inline">
	<input type="radio" name="safeAnotherContractorsSystem" value="1" @if($arrays["AppSafeWorkMethodStatement"][0]['anotherContractorsSystem'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="safeAnotherContractorsSystem" value="0" @if($arrays["AppSafeWorkMethodStatement"][0]['anotherContractorsSystem'] == 0) checked @endif>No
	</label>
	<div class="form-group clearfix">
		<label class="col-lg-4 control-label " for="safeNameContractor"> If YES, Name Contractor</label>
		<div class="col-lg-8">
			<input id="safeNameContractor" name="safeNameContractor" type="text" value="{{ $arrays["AppSafeWorkMethodStatement"][0]['nameContractor'] }} "  class=" form-control">
		</div>
	</div>
</section>