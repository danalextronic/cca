<h3> Intention To Engage Subcontractors</h3>
<section>
	<h3> Intention To Engage Subcontractors </h3>
	
	<div class="form-group clearfix">
		
		<div class="col-lg-12">
			
			<label class="col-lg-3 control-label " for="copyAgreement"> Copy of Sub Contractor Agreement Required  </label>
			@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
				@if(strpos($_SERVER['REQUEST_URI'] , '/new') == false)
					@if($arrays["AppSubContractorEngagementIntention"][0]['copyAgreement'] !== null )	
					<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
					<a  href= "{{ route('getFile',['filename' =>  'copyAgreement', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
						 View
					</a><br>
					@endif
				@endif
			@endif	
			<div class="col-lg-9">
				<input class="filestyle " id="copyAgreement"  name="copyAgreement"  type="file" data-buttonname="btn-white">
			</div>
		</div>
	</div>
	<label class="radio-inline">
	<input type="radio" name="subcontractosEngagementIntentionSupplying" @if($arrays["AppSubContractorEngagementIntention"][0]['subcontractosEngagementIntentionSupplying'] == "plantOnly") checked @endif value="plantOnly">Plant/Equipment only
	</label>
	<label class="radio-inline">
		<input type="radio" name="subcontractosEngagementIntentionSupplying"  @if($arrays["AppSubContractorEngagementIntention"][0]['subcontractosEngagementIntentionSupplying'] == "plantAndLabour") checked @endif value="plantAndLabour">Plant/Equipment and Labour
	</label>
	<label class="radio-inline">
		<input type="radio" name="subcontractosEngagementIntentionSupplying" @if($arrays["AppSubContractorEngagementIntention"][0]['subcontractosEngagementIntentionSupplying'] == "labourOnly") checked @endif value="labourOnly"> Labour only
	</label>
	
</section>