<h3> Payslips </h3>
<section>
	<h3>Payslips </h3>
	<p>
		Please provide copies of pay slips, for the last four weeks, for employees listed.
	</p>
	
	
	<div class="form-group clearfix">		
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				@if($arrays["AppPaySlip"][0]['payslipsCopy'] !== null )	
				<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
				<a  href= "{{ route('getFile',['filename' =>  'payslipsCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     	</a>
				<br/>
				@endif
			@endif
		@endif
		<input class="filestyle "  name="payslipsCopy"  type="file" data-buttonname="btn-white">	
	</div>
	<p>
		In accordance with Fair Work Act pay slips should include the following:
	</p>	
	<ul>
		<li>Name and ABN of the business employing the employee</li>
		<li>The basis on which the employee is engage – Full time/ Casual/Part time</li>
		<li></li>
		<li>Classification of the employee under the Award they are engaged</li>
		<li>Rate of pay – expressed as an hourly rate</li>
		<li>PAYG and Superannuation</li>
		<li>Details of industry allowances, living away from home allowances and other
entitlements</li>
		<li>Period of which the pay relates</li>
		<li>The date on which the employee was paid</li>
		<li>Total remuneration received during that period including gross and net amounts</li>
	</ul>
</section>