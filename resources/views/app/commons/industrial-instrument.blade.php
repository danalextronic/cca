<h3> Industrial Instrument - Award, Fair Work Agreement, EBA</h3>
<section>
	<h3>Industrial Instrument - Award, Fair Work Agreement, EBA</h3>
	<p>
		Please identify the name of the Modern Award/Agreement applicable to the employees you will be engaging on site
	</p>
	<div class="form-group clearfix">
		
		<div class="col-lg-12">
			<textarea class="form-control "  name="industrialInstrumentNameAgreement" type="text" >{{ $arrays["AppIndustrialInstrument"][0]['industrialInstrumentNameAgreement'] }} </textarea> 
		</div>
	</div>
	<p>
		Note: If you have identified and Agreement, please provide evidence that the Agreement(s) has
		been approved by Fair Work Australia or other relevant Tribunal or Agency
	</p>
	@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
		@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
			@if($arrays["AppIndustrialInstrument"][0]['copy'] !== null )	
			<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
			<a  href= "{{ route('getFile',['filename' =>  'industrialInstrumentCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     </a>
			<br/>
			@endif
		@endif
	@endif
	<input class="filestyle " id="industrialInstrumentCopy"  name="industrialInstrumentCopy"  type="file" data-buttonname="btn-white">	
</section>