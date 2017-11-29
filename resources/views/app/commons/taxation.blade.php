<h3> Taxation </h3>
<section>
	<h3> Taxation </h3>
	@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
		<p> <b> Please provide a copy of which is the most appropriate for assessment of BAS and PAYG taxation for your organisation.</b> </p>
		<li> Business Activity Statement  </li>
		<li> Installment Activity Statement and payment of receipt OR  </li>
		<li> Installment Activity Statement and payment of receipt </li>
		<br/>
		@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)	
			@if($arrays["AppTaxation"][0]['taxationCopy'] !== null )	
				<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
				<a  href= "{{ route('getFile',['filename' =>  'taxationCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     	</a>
			@endif
		@endif		

	@endif
	<div class="form-group clearfix">		
		<input class="filestyle "   name="taxationCopy"  type="file" data-buttonname="btn-white">	
	</div>
</section>