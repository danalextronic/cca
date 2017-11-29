<h3> Long Service Leave</h3>
<section>
	<h3> Long Service Leave </h3>
	<label class="radio-inline">
	<input type="radio" id="longServiceLeaveExistYes" name="longServiceLeaveExist" value="1" @if($arrays["AppLongServiceLeave"][0]['longServiceLeaveExist'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" id="longServiceLeaveExistNo" name="longServiceLeaveExist" value="0" @if($arrays["AppLongServiceLeave"][0]['longServiceLeaveExist'] == 0) checked @endif>No
	</label>
	<p>
		If yes, please supply a copy of : 
	</p>
	<div class="form-group clearfix">		
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				@if($arrays["AppLongServiceLeave"][0]['certificateOfEmployerRegistration'] !== null )	
				<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
				<a  href= "{{ route('getFile',['filename' =>  'certificateOfEmployerRegistration', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
				</a>
				<br/>
				@endif
			@endif
		@endif		
		<label class="col-lg-6" for="certificateOfEmployerRegistration"> Certificate of employer registration </label>
		<input class="col-lg-6 filestyle " id="certificateOfEmployerRegistration"  name="certificateOfEmployerRegistration"  type="file" data-buttonname="btn-white">	
	</div>
	<div class="form-group clearfix">		
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				@if($arrays["AppLongServiceLeave"][0]['listOfWorkersLSLB'] !== null )	
				<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
				<a  href= "{{ route('getFile',['filename' =>  'listOfWorkersLSLB', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     	</a>
				<br/>
				@endif
			@endif
		@endif
		<label  class="col-lg-6" for="listOfWorkersLSLB"> A list of workers currently registered with LSLB (or comparable scheme) who are engaged by the business. </label>
		<input class="filestyle col-lg-6 "  name="listOfWorkersLSLB"  type="file" data-buttonname="btn-white">	
	</div>
	<div class="form-group clearfix">		
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				@if($arrays["AppLongServiceLeave"][0]['copyLastReturn'] !== null )	
				<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
				<a  href= "{{ route('getFile',['filename' =>  'copyLastReturn', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     	</a>
				<br/>
				@endif
			@endif
		@endif
		<label class="col-lg-6" for="copyLastReturn"> Copy of Last Return </label>
		<input class="filestyle col-lg-6 "  name="copyLastReturn"  type="file" data-buttonname="btn-white">	
	</div>
</section>
