<h3> Immigration/Visa Check </h3>
<section>
	<h3> Immigration/Visa Check </h3>
	<p> <b> Do you have workers on Visas? </b> </p>
	<br/>
	<label class="radio-inline">
	<input type="radio" name="visaWorkersExist" id="visaWorkersExistYes" value="1" @if($arrays["AppVisaWorker"][0]['visaWorkersExist'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="visaWorkersExist" id="visaWorkersExistNo" value="0" @if($arrays["AppVisaWorker"][0]['visaWorkersExist'] == 0) checked @endif>No
	</label>
	@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
		<p> If Yes , <strong class="text-danger"> If Yes, please supply copies of all visa documents. </strong>  </p>
		<div class="form-group clearfix">		
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				@if($arrays["AppTaxation"][0]['taxationCopy'] !== null )	
				<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
				<a  href= "{{ route('getFile',['filename' =>  'visaWorkersCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     	</a>
				@endif
			@endif
			<input class="filestyle " id="visaWorkersCopy"  name="visaWorkersCopy"  type="file" data-buttonname="btn-white">	
		</div>
	@endif		

	<p> 
		It is a criminal offence under the Migration Act 1958 to knowingly or recklessly allow
		workers to work, or refer workers to work, where those workers are from overseas and
		either illegally in Australia or working in breach of their visa conditions.
		For more information about the legislation visit:http://www,immi.gov.au/employer-
		obligations
	</p>
	<h5> Who Can Work in Australia?  </h5>
	<ul>	
		<li>Australian Citizens </li>
		<li>Australian Permanent residents </li>
		<li> New Zealand citizens who entered Australia on a current New Zealand passport and
	were granted a visa with work entitlements on arrival</li>
		<li> Non-Australian citizens holding a valid visa with work entitlements</li>
	</ul>
	<ul>
		<li>An Australian passport</li>
		<li>And Australian citizenship certificate</li>
		<li>A certificate of evidence of Australian citizenship</li>
		<li>A valid visa with permission to work (checked through VEVO)</li>
		<li>A full Australian birth certificate for a person born before 20 August 1986</li>
		<li>A full Australian birth certificate for a person born on or after 20 August 1986, showing that at least one parent was born in Australia.</li>
	</ul>
</section>