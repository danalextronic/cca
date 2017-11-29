<h3> 
	Department of Employment, Education and Workplace Relations – Building and Construction Code Assessment
</h3>
<section>
	<h3> 
		Department of Employment, Education and Workplace Relations – Building and Construction Code Assessment
	</h3>
	
	<p> As of 18 th May 2016, a DEEWR letter is Not Applicable for organisations that pay their workers in accordance with a modern award.</p>
	<p> As from 18 th May 2016 have you made a New Enterprise Agreement ? </p>
	<label class="radio-inline">
	<input type="radio" name="newEnterpriseAgreement" value="1" @if($arrays["AppDepartementEmployment"][0]['newEnterpriseAgreement'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="newEnterpriseAgreement" value="0" @if($arrays["AppDepartementEmployment"][0]['newEnterpriseAgreement'] == 0) checked @endif>No
	</label>
	<p>
		If YES, Do you have a current letter of compliance from FWBC?
	</p>
	<label class="radio-inline">
	<input type="radio" name="currentLetterFromFWBC" value="1" @if($arrays["AppDepartementEmployment"][0]['currentLetterFromFWBC'] == 1) checked @endif>Yes
	</label>
	<label class="radio-inline">
		<input type="radio" name="currentLetterFromFWBC" value="0" @if($arrays["AppDepartementEmployment"][0]['currentLetterFromFWBC'] == 0) checked @endif>No
	</label>
    <p class="text-danger">
    	<b> Please supply copy  </b>
    </p>
    <div class="form-group clearfix">		
    	@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
    		@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
    			@if($arrays["AppDepartementEmployment"][0]['letterComplianceCopy'] !== null )	
    			<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
    			<a  href= "{{ route('getFile',['filename' =>  'letterComplianceCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
    				 View
    			</a>
    			@endif

    		@endif
    	@endif
    	<input  class=" filestyle "  name="letterComplianceCopy"  type="file" data-buttonname="btn-white">	
    </div>
	<p> To be eligible to tender for Commonwealth work after the 18 th May 2016 you will require a letter of compliance from Fair Work Building Commission. </p>
	<p> For further information: https://www.fwbc.gov.au/</p>
</section>