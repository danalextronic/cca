<h3> 
	OHS/WHS Management Plan
</h3>
<section>
	<h3> 
		OHS/WHS Management Plan
	</h3>
	<p> Do you have an OHS/WHS Management Plan ? </p>
	<label class="radio-inline">
	<input type="radio" name="OHSWHSPlanExist" value="1"  @if($arrays["AppOHSWHS"][0]['OHSWHSPlanExist'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="OHSWHSPlanExist" value="0" @if($arrays["AppOHSWHS"][0]['OHSWHSPlanExist'] == 0) checked @endif>No
	</label>
	<p class="text-danger">
		<b> Date Management Plan last Reviewed for current legislative requirements </b>
	</p>
	<div class="form-group clearfix">
		<label class="col-lg-3 control-label " for="dateManagementPlan"> Date Management </label>
		<div class="col-lg-9">
			<input type="hidden" id="dateManagement"  value="{{ $arrays["AppOHSWHS"][0]['dateManagementPlan'] }}">
			@if(strpos($_SERVER['REQUEST_URI'], 'pdf') !== false )
				<input type="text" @if($arrays["AppOHSWHS"][0]['dateManagementPlan']) value="{{ date('d/m/Y', strtotime($arrays["AppOHSWHS"][0]['dateManagementPlan'])) }}" @endif>
			@else
			
			<div class="row">
                <div class='col-md-12'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker4'>
                            <input type='text' placeholder="dd/mm/yyyy" name="dateManagementPlan"  class="form-control" />
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
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				<button class="btn btn-primary btn-xs" id="addScnt"><i class="fa fa-plus-square"> </i> Add More</button>
				<div id="p_scents">
				<input type="hidden" id="numFilesOhs" name="numFilesOhs" value="{{$arrays["AppOHSWHS"][0]['numberFiles']}}">
				@for($i=0;$i<$arrays["AppOHSWHS"][0]['numberFiles'];$i++)
					
						<p>
							 File {{$i+1}} :  <a  href="{{ route('getFile',['filename' =>  'OHSWHScopy_'.$i, 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" >View </a>
							
							
							    
							    Update File {{$i+1}} :
							   <input type="file" class="filestyle" id="p_scnt" size="20" name="OHSWHScopy_{{$i}}" data-buttonname="btn-white" value=""  />
							        
							    
							
						</p>
				@endfor
				</div>
				
				
			@else
			<p class="text-danger">
				<b> If Yes, please supply a copy. </b>
			</p>
			<button type="button" class="btn btn-primary btn-xs" id="addScnt"><i class="fa fa-plus-square"> </i> Add More</button>
			<div id="p_scents">
			    <input type="hidden" id="numFilesOhs" name="numFilesOhs" value="1">
			    <p>
			        <input type="file" class="filestyle" id="p_scnt" size="20" name="OHSWHScopy_0" data-buttonname="btn-white" value=""  />
			    </p>
			</div>
			@endif
			
			
		@endif	
		
	</div>
	<p class="text-danger">
		<b> If NO, are you inducted into another Contractors system?</b>
	</p>
	<label class="radio-inline">
	<input type="radio" name="anotherContractorsSystem" value="1"   @if($arrays["AppOHSWHS"][0]['anotherContractorsSystem'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="anotherContractorsSystem" value="0" @if($arrays["AppOHSWHS"][0]['anotherContractorsSystem'] == 0) checked @endif>No
	</label>
	
	<p> </p>
	<div class="form-group clearfix">
		<label class="col-lg-4 control-label " for="nameContractor"> If YES, Name Contractor</label>
		<div class="col-lg-8">
			<input id="nameContractor" name="nameContractor" value="{{ $arrays["AppOHSWHS"][0]['nameContractor'] }} " type="text" class="form-control">
		</div>
	</div>
</section>