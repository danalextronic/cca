<h3> Abn Workers </h3>
<section>
	<h3>  Abn Workers  </h3>
	<p>
		Do you engage independent contractors, who are individual workers, on a subcontract/ ABN
		basis?
	</p>

	<label class="radio-inline">
	<input type="radio" name="independentContractorsEngagement" value="1" @if($arrays["AppAbnWorker"][0]['independentContractorsEngagement'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="independentContractorsEngagement" value="0" @if($arrays["AppAbnWorker"][0]['independentContractorsEngagement'] == 0) checked @endif>No
	</label>
	<p>
		If, YES, please provide the sub contractor agreement documentation used to engage such
workers. If no agreement exists or the workers are engaged on an hourly rate basis you may be
required to undergo an Independent Contractor Assessment.
	</p>
	
	<p>
		Do you pay superannuation for your ABN workers?
	</p>

	<label class="radio-inline">
	<input type="radio" name="superAnnuationPayement" value="1" @if($arrays["AppAbnWorker"][0]['superAnnuationPayement'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="superAnnuationPayement" value="0" @if($arrays["AppAbnWorker"][0]['superAnnuationPayement'] == 0) checked @endif>No
	</label>
	<div class="form-group clearfix">		
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				@if($arrays["AppAbnWorker"][0]['superAnnuationCopy'] !== null )	
				<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
				<a  href= "{{ route('getFile',['filename' =>  'superAnnuationCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
				</a><br>
				@endif
			@endif
		@endif	
		<input  class=" filestyle "  name="superAnnuationCopy"  type="file" data-buttonname="btn-white">	
		
	</div>
</section>