@extends('layouts.app')

@section('content')
<br>
<div class="container">
	
	<!-- Vertical Steps Example -->
	<div class="row">
		<div class="col-sm-12  "> 
			<div class="card-box">
				@include('pdf.header')
				<h4 class="m-t-0 header-title"><b>ACT IRE Applications</b></h4> <small> Please ensure that you read each section thoroughly and have provided all required
information and documentation relevant to your business structure. This will ensure that the compliance assessment can be conducted accurately and efficiently.
<strong> Please supply copies of all relevant documentation. </strong></small> <br/><br/>
				@if(Auth::guard('admin')->user())
					@include('admin.app.application-detail')
				@endif
				<form id="wizard-vertical" enctype="multipart/form-data" method="POST">
					@if(strpos($_SERVER['REQUEST_URI'], 'update'))
						{{method_field('PUT')}}
					@endif
					
					<!-- Csrf token -->
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<h3> Business Identification </h3>
					<section>
						<h3> Business Identification </h3>
						<div class="form-group clearfix">
							<label class="col-lg-2 control-label " for="companyName"> Company Name </label>
							<div class="col-lg-10">
								<input class="form-control " id="companyName" name="companyName" type="text"  value="{{ $arrays["AppActIreIdent"][0]['companyName'] }}  ">
							</div>
						</div>
						<div class="form-group clearfix">
							<label class="col-lg-2 control-label " for="address"> Address </label>
							<div class="col-lg-10">
								<input id="address" name="address" type="text"  value="{{ $arrays["AppActIreIdent"][0]['address'] }} " class=" form-control">
							</div>
						</div>

						<div class="form-group clearfix">
							<label class="col-lg-2 control-label " for="phone"> Phone </label>
							<div class="col-lg-10">
								<input id="phone" name="phone" type="text"  value="{{ $arrays["AppActIreIdent"][0]['phone'] }}"  class=" form-control">
							</div>
						</div>
						
						<div class="form-group clearfix">
							<label class="col-lg-2 control-label " for="email"> Email </label>
							<div class="col-lg-10">
								<input id="email" name="email" value="{{ $arrays["AppActIreIdent"][0]['email'] }}" type="email" class=" form-control">
							</div>
						</div>

						<div class="form-group clearfix">
							<label class="col-lg-2 control-label " for="ABN"> ABN </label>
							<div class="col-lg-10">
								<input id="ABN" name="abn" type="text"  value="{{ $arrays["AppActIreIdent"][0]['ABN'] }}"  class=" form-control">
							</div>
						</div>


						<div class="form-group clearfix">
							<label class="col-lg-2 control-label " for="contactPerson"> Contact Person </label>
							<div class="col-lg-10">
								<input id="contactPerson" name="contactPerson" type="text"  value="{{ $arrays["AppActIreIdent"][0]['contactPerson'] }} " class=" form-control">
							</div>
						</div>
						
						<div class="form-group clearfix">
							<label class="col-lg-2 control-label " for="ireCertificateNumber"> IRE Certificate number (if renewal) </label>
							<div class="col-lg-10">
								<input id="ireCertificateNumber" name="ireCertificateNumber" type="text"  value="{{ $arrays["AppActIreIdent"][0]['ireCertificateNumber'] }} " class=" form-control">
							</div>
						</div>
						<p> 
							To download the ACT IRE compliance application forms: <a href="http://www.procurement.act.gov.au/prequalification/industrial_relations_and_employment_obligations"> http://www.procurement.act.gov.au/prequalification/industrial_relations_and_employment_obligations </a>

						</p>
					</section>

					<h3> IRE Application Forms & Statutory declaration </h3>
					<section>
						<h3> IRE Application Forms & Statutory declaration </h3>
						
						
						<div class="form-group clearfix">	
								
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false  )
									@if($arrays["AppIreAppForms"][0]['copy'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'ireAppFormsCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     	</a>
									@endif
								@endif
							@endif
							<input class="filestyle " id="ireAppFormsCopy"  name="ireAppFormsCopy"  type="file" data-buttonname="btn-white">	
						</div>
					</section>
					<h3> Workers Compensation Insurance Policy </h3>
					<section>
						<h3> Workers Compensation Insurance Policy </h3>

						<br/>
						<label class="radio-inline">
						<input type="radio"  name="ireWorkersCompensationExist" value="1" @if($arrays["AppIreWorkersCompensation"][0]['ireWorkersCompensationExist'] == 1) checked @endif>Yes
						</label>
						<label class="radio-inline">
							<input type="radio"  name="ireWorkersCompensationExist" value="0"  @if($arrays["AppIreWorkersCompensation"][0]['ireWorkersCompensationExist'] == 0) checked @endif>No
						</label>
						<p> If Yes , <strong class="text-danger"> please supply document </strong>  </p>
						<div class="form-group clearfix">		
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
									@if($arrays["AppIreWorkersCompensation"][0]['copy'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'ireWorkersCompensationCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     	</a>
									 <br/>
									@endif
								@endif
							@endif	
							<input id="ireWorkersCompensationCopy" class="filestyle "  name="ireWorkersCompensationCopy"  type="file" data-buttonname="btn-white">	
						</div>
					</section>

					<h3> Public Liability Insurance Policy </h3>
					<section>
						<h3> Public Liability Insurance Policy </h3>

						<br/>
						<label class="radio-inline">
						<input type="radio"  name="irePublicLiabilityExist" value="1" @if($arrays["AppIrePublicLiability"][0]['irePublicLiabilityExist'] == 1) checked @endif>Yes
						</label>
						<label class="radio-inline">
							<input type="radio"  name="irePublicLiabilityExist" value="0"  @if($arrays["AppIrePublicLiability"][0]['irePublicLiabilityExist'] == 0) checked @endif>No
						</label>
						<p> If Yes , <strong class="text-danger"> please supply document </strong>  </p>
						<div class="form-group clearfix">		
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
									@if($arrays["AppIrePublicLiability"][0]['copy'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'irePublicLiabilityCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     	</a>
									 <br/>
									@endif
								@endif
							@endif	
							<input id="irePublicLiabilityCopy" class="filestyle"  name="irePublicLiabilityCopy"  type="file" data-buttonname="btn-white">	
						</div>
					</section>

					<h3> ATO Portal receipt or Last BAS/GST return and evidence of payment </h3>
					<section>
						<h3> ATO Portal receipt or Last BAS/GST return and evidence of payment </h3>

						<br/>
						<label class="radio-inline">
						<input type="radio"  name="atoPortalReceiptExist" value="1" @if($arrays["AppAtoPortalReceipt"][0]['atoPortalReceiptExist'] == 1) checked @endif>Yes
						</label>
						<label class="radio-inline">
							<input type="radio"  name="atoPortalReceiptExist" value="0"  @if($arrays["AppAtoPortalReceipt"][0]['atoPortalReceiptExist'] == 0) checked @endif>No
						</label>
						<p> If Yes , <strong class="text-danger"> please supply document </strong>  </p>
						<div class="form-group clearfix">		
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
									@if($arrays["AppAtoPortalReceipt"][0]['copy'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'atoPortalReceiptCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     	</a>
									 <br/>
									@endif
								@endif
							@endif	
							<input id="atoPortalReceiptCopy" class="filestyle"  name="atoPortalReceiptCopy"  type="file" data-buttonname="btn-white">	
						</div>
					</section>

					

					<h3> OSR Payroll Tax report and Evidence of payment </h3>
					<section>
						<h3> OSR Payroll Tax report and Evidence of payment </h3>

						<br/>
						<label class="radio-inline">
						<input type="radio"  name="osrPayrollTaxExist" value="1" @if($arrays["AppOsrPayrollTax"][0]['osrPayrollTaxExist'] == 1) checked @endif>Yes
						</label>
						<label class="radio-inline">
							<input type="radio"  name="osrPayrollTaxExist" value="0"  @if($arrays["AppOsrPayrollTax"][0]['osrPayrollTaxExist'] == 0) checked @endif>No
						</label>
						<p> If Yes , <strong class="text-danger"> please supply document </strong>  </p>
						<div class="form-group clearfix">		
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
									@if($arrays["AppOsrPayrollTax"][0]['copy'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'osrPayrollTaxCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     	</a>
									 <br/>
									@endif
								@endif
							@endif	
							<input id="osrPayrollTaxCopy" class="filestyle"  name="osrPayrollTaxCopy"  type="file" data-buttonname="btn-white">	
						</div>
					</section>

					<h3> Superannuation report and Evidence of payment </h3>
					<section>
						<h3> Superannuation report and Evidence of payment</h3>

						<br/>
						<label class="radio-inline">
						<input type="radio"  name="superAnnuationExist" value="1" @if($arrays["AppIreSuperAnnuation"][0]['ireSuperAnnuationExist'] == 1) checked @endif>Yes
						</label>
						<label class="radio-inline">
							<input type="radio"  name="superAnnuationExist" value="0"  @if($arrays["AppIreSuperAnnuation"][0]['ireSuperAnnuationExist'] == 0) checked @endif>No
						</label>
						<p> If Yes , <strong class="text-danger"> please supply document </strong>  </p>
						<div class="form-group clearfix">		
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
									@if($arrays["AppIreSuperAnnuation"][0]['copy'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'superAnnuationCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     	</a>
									 <br/>
									@endif
								@endif
							@endif	
							<input id="superAnnuationCopy" class="filestyle"  name="superAnnuationCopy"  type="file" data-buttonname="btn-white">	
						</div>
					</section>

					

					<h3> Long Service Leave report </h3>
					<section>
						<h3> Long Service Leave report</h3>

						<br/>
						<label class="radio-inline">
						<input type="radio"  name="ireLongServiceLeaveExist" value="1" @if($arrays["AppIreLongServiceLeave"][0]['ireLongServiceLeaveExist'] == 1) checked @endif>Yes
						</label>
						<label class="radio-inline">
							<input type="radio"  name="ireLongServiceLeaveExist" value="0"  @if($arrays["AppIreLongServiceLeave"][0]['ireLongServiceLeaveExist'] == 0) checked @endif>No
						</label>
						<p> If Yes , <strong class="text-danger"> please supply document </strong>  </p>
						<div class="form-group clearfix">		
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
									@if($arrays["AppIreLongServiceLeave"][0]['copy'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'ireLongServiceLeaveCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     	</a>
									 <br/>
									@endif
								@endif
							@endif	
							<input id="ireLongServiceLeaveCopy" class="filestyle"  name="ireLongServiceLeaveCopy"  type="file" data-buttonname="btn-white">	
						</div>
					</section>

					<h3> Enterprise Agreement </h3>
					<section>
						<h3> Enterprise Agreement </h3>

						<br/>
						<label class="radio-inline">
						<input type="radio"  name="ireEnterpriseAgreementExist" value="1" @if($arrays["AppIreEnterpriseAgreement"][0]['ireEnterpriseAgreementExist'] == 1) checked @endif>Yes
						</label>
						<label class="radio-inline">
							<input type="radio"  name="ireEnterpriseAgreementExist" value="0"  @if($arrays["AppIreEnterpriseAgreement"][0]['ireEnterpriseAgreementExist'] == 0) checked @endif>No
						</label>
						<p> If Yes , <strong class="text-danger"> please supply document </strong>  </p>
						<div class="form-group clearfix">		
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
									@if($arrays["AppIreEnterpriseAgreement"][0]['copy'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'ireEnterpriseAgreementCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     	</a>
									 <br/>
									@endif
								@endif
							@endif	
							<input id="ireEnterpriseAgreementCopy" class="filestyle"  name="ireEnterpriseAgreementCopy"  type="file" data-buttonname="btn-white">	
						</div>
					</section>
				
					@if(strpos($_SERVER['REQUEST_URI'] , 'view') == false)
						<h3> Declaration </h3>
						<section>
							<h3> Declaration </h3>
							<p>
								I confirm that the information supplied on behalf of this business entity  is true and correct.
							</p>
							<p>
								All of the workers listed in this application have a legal right to work in Australia.
							</p>
							<p>
								I have completed this Audit Questionnaire having undertaken all relevant enquiries.
							</p>
							<p>
								 I confirm that, where it and its related entities are, or have been, required to comply with the National Code of Practice for the Construction Industry (National Code) and the Australian Government Implementation Guidelines for the National Code of Practice for the Construction Industry as amended from time to time including the Building Code 2013 (National Guidelines), they have done so
							</p>
							
							<label class="radio-inline">
							<input type="radio" name="conditions" class="required" >I understand that a person who intentionally makes a false statement in a statutory declaration is guilty of an offence under section 11 of the Statutory Declarations Act 1959, and I believe that the statements in this declaration are true in every particular.

							</label>
							
						</section>
					@endif
					@include('pdf.footer')

				</form>
				<!-- End #wizard-vertical -->    
			</div>
		</div>
	</div>	
</div>
 
@endsection
