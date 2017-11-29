@extends('layouts.app')
@section('content')

<br>
<div class="container">
	<!-- Vertical Steps Example -->
	<div class="row">
		<div class="col-sm-12  "> 
			<div class="card-box">
				@include('pdf.header')
				<h4 class="m-t-0 header-title"><b> CCA Business Compliance Assessment Renewal</b></h4> <br/><br/>

				@if(Auth::guard('admin')->user())
					@include('admin.app.application-detail')
				@endif
				<form id="wizard-vertical"  enctype="multipart/form-data" method="POST">
					@if(strpos($_SERVER['REQUEST_URI'], 'update'))
						{{method_field('PUT')}}
					@endif
					
					<!-- Csrf token -->
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<h3> Business Identification </h3>
					<section>
						<h3> Business Identification </h3>
						<div class="form-group clearfix">
							<label class="col-lg-2 control-label " for="businessName"> Business Name </label>
							<div class="col-lg-10">
								<input class="form-control " id="businessName" name="businessName" type="text"  value="{{ $arrays["AppBusinessIdentification"][0]['businessName'] }}  ">
							</div>
						</div>
						

						<div class="form-group clearfix">
							<label class="col-lg-2 control-label " for="contactPerson"> Contact Person </label>
							<div class="col-lg-10">
								<input id="contactPerson" name="contactPerson" type="text"  value="{{ $arrays["AppBusinessIdentification"][0]['contactPerson'] }} " class=" form-control">
							</div>
						</div>
					</section>
					
					<h3> 
						Sub Contractors
					</h3>
					<section>
						<h3> 
							Sub Contractors
						</h3>
						
						<p>Do you engage sub-contractors? <b class="text-danger">(All sub contractors may be required to undergo this business assessment questionnaire.) </b> </p>
						@if(empty($arrays["AppSubContractors"]))
							<label class="radio-inline">
								<input type="radio" name="subContractorsExist"  value="1">Yes
							</label>
							<label class="radio-inline">
								<input type="radio" name="subContractorsExist" checked value="0">No
							</label>
						@else
						<label class="radio-inline">
							<input type="radio" name="subContractorsExist" @if($arrays["AppSubContractors"][0]['subContractorsExist'] == 1) checked @endif value="1">Yes
						</label>
						<label class="radio-inline">
							<input type="radio" name="subContractorsExist" @if($arrays["AppSubContractors"][0]['subContractorsExist'] == 0) checked @endif value="0">No
						</label>
						@endif
						@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') !== false)
						<?php $i = 1 ; ?>
						@foreach($arrays['AppSubContractors'] as $array)
						<div class="row">
							<div class="panel panel-default">
								<!-- Default panel contents -->
								<div class="panel-heading">
									<h3 class="panel-title">Subcontractor no {{ $i }}</h3>
									

									<!-- List group -->
									<ul class="list-group">
										<li class="list-group-item">
											Subcontractor Detail : {{ $array['subcontractorDetail'] }}
										</li>
										<li class="list-group-item">
											Contact Name : {{ $array['contactName'] }}
										</li>
										
										<li class="list-group-item">
											ABN :  {{ $array['ABN'] }}
										</li>
										<li class="list-group-item">
											Email Adress {{ $array['emailAdress'] }}
										</li>
										<li class="list-group-item">
											Phone Number: {{ $array['phoneNumber'] }}
										</li>
									</ul>
								</div>
							</div>
						</div>
						<?php $i++ ; ?>
						@endforeach
						@else	
						<div id="controlButtons">
							<button class="btn btn-primary btn-xs" type="button" onclick="addRowSubRenewal();"> <i class="fa fa-plus-square"> </i> Add more</button>
						</div><br/>
						<div class="inputs-table" style="overflow-x:scroll">	
							<input type="hidden" name="numberRowsSub" id="numberRowsSub" >
							<table  class="table-hover" id="myTableSub">
								<thead >
									<tr >
										<th>Subcontractor details</th>
										<th> Contact Name </th>
										<th>ABN </th>
										<th>Email Address</th>
										<th> Phone Number </th>
									</tr>
								</thead>
								<?php /* Passing number of employees to javascript employees details to initialize count to the real number of employees instead of 0 , go public/js/employees-details for more informations */$countSub = 0 ?>
								<tbody >
									@if(strpos($_SERVER['REQUEST_URI'] , '/new') == false)
									@foreach($arrays['AppSubContractors'] as $array)

									<tr>
										<td>
											<input type="text" name="subcontractor_details_{{ $countSub}}" value="{{ $array['subcontractorDetail'] }}" >
										</td>
										<td>
											<input type="text" name="contact_name_{{ $countSub}}" value="{{ $array['contactName'] }}" >
										</td>
										
										<td>
											<input type="text" name="abn_{{ $countSub}}" value="{{ $array['ABN'] }}">
										</td>
										<td>
											<input type="text" name="email_adress_{{ $countSub}}" value="{{ $array['emailAdress'] }}">
										</td>
										<td>
											<input type="text" name="phone_number_{{ $countSub}}" value="{{ $array['phoneNumber'] }}" >
										</td>



									</tr>
									<?php $countSub++ ; ?>
									@endforeach
									@endif	
									<?php $numberRowsSubContractors = $countSub ; ?>
									<script>
									    var countSub = <?php echo json_encode($numberRowsSubContractors); ?>;
									</script>
								</tbody>
							</table>
						</div>
						@endif
					</section>
					@include('app.commons.employees-details')		

					@if(strpos($_SERVER['REQUEST_URI'] , 'new/renewal') !== false)
					
					<!-- Renewal CHECKLIST STORE -->
					<h3> Checklist – Please supply documents relevant to your business structure. </h3>
					<section >	
						<table  class="table  table-striped">
						    <thead>
						        <tr>
						            <th>Name</th>
						            <th >Condition</th>
						            <th >Yes </th>
						            <th > No</th>
						            <th> Upload </th>				  
						        </tr>
						    </thead>
						    <tbody>
						       <tr>
						           <td >Workers Compensation Insurance</td>
						           <td> If expired in the past 3 months</td>
						           <input type="hidden" name="item4" value="Workers Compensation Insurance">
						           <td> <input type="radio" name="4" value="yes" ></td>
						           <td> <input type="radio" name="4"  value="no"></td>
						           <td> <input class="filestyle " id="workersCompensationInsuranceCopy"  name="workersCompensationInsuranceCopy"  type="file" data-buttonname="btn-white"></td>
						       </tr>
						        
						        <tr>
						            <td >Public Liability Insurance</td>
						            <td> If expired in the past 3 Months</td>
						            <input type="hidden" name="item3" value="Public Liability Insurance">
						            <td> <input type="radio" name="3" value="yes" ></td>
						            <td> <input type="radio" name="3"  value="no"></td>
						            <td><input class="filestyle " id="publicLiabilityInsuranceCopy"  name="publicLiabilityInsuranceCopy"  type="file" data-buttonname="btn-white"></td>
						        </tr>
						       <tr>
						           <td >Taxation</td>
						           <td> ATO Portal Receipt or Last BAS Report </td>
						           <input type="hidden" name="item6" value="Taxation">
						           <td> <input type="radio" name="6" value="yes" ></td>
						           <td> <input type="radio" name="6"  value="no"></td>
						           <td><input class="filestyle " id="taxationCopy"  name="taxationCopy"  type="file" data-buttonname="btn-white"></td>
						       </tr>
						       <tr>
						           <td > Payroll Tax </td>
						           <td> Last quarter - If applicable </td>
						           <input type="hidden" name="item7" value="Payroll Tax">
						           <td> <input type="radio" name="7" value="yes" ></td>
						           <td> <input type="radio" name="7"  value="no"></td>
						           <td><input class="filestyle " id="payrollTaxCopy"  name="payrollTaxCopy"  type="file" data-buttonname="btn-white"></td>
						       </tr>
						        
						        
						        
						        
						            <td > Employee Details </td>
						            <td> List any changes to employee list </td>
						            <input type="hidden" name="item9" value="Employee Details">
						            <td> <input type="radio" name="9" value="yes" ></td>
						            <td> <input type="radio" name="9"  value="no"></td>
						            <td></td>
						        </tr>
						        <tr>
						            <td > Payslips </td>
						            <td> Last 4 weeks of employees payslips </td>
						            <input type="hidden" name="item16" value="Payslips" >
						            <td> <input type="radio" name="16" value="yes" ></td>
						            <td> <input type="radio" name="16"  value="no"></td>
						            <td><input class="filestyle " id="payslipsCopy"  name="payslipsCopy"  type="file" data-buttonname="btn-white"></td>
						        </tr>
						        <tr>
						            <td > EBA entitlements </td>
						            <td> ACIRT - Redundancy (for Previous 3 Months)</td>
						            <input type="hidden" name="item12" value="Redundancy" >
						            <td> <input type="radio" name="12" value="yes" ></td>
						            <td> <input type="radio" name="12"  value="no"></td>
						            <td><input class="filestyle " id="redundancyCopy"  name="redundancyCopy"  type="file" data-buttonname="btn-white"></td>
						        </tr>
						        <tr>
						            <td >Income Protection Insurance</td>
						            <td>Uplus/ Built Income Protection ( for Previous 3 months) </td>
						            <input type="hidden" name="item5" value="Income Protection Insurance">
						            <td> <input type="radio" name="5" value="yes" ></td>
						            <td> <input type="radio" name="5"  value="no"></td>
						            <td><input class="filestyle " id="incomeProtectionInsuranceCopy"  name="incomeProtectionInsuranceCopy"  type="file" data-buttonname="btn-white"></td>
						        </tr>
						       

						        <tr>
						            <td > Superannuation – Employee </td>
						            <td>Supply Lastest Lodgement (for Previous 3 Months)</td>
						            <input type="hidden" name="item15" value="Superannuation – Employee" >
						            <td> <input type="radio" name="15" value="yes" ></td>
						            <td> <input type="radio" name="15"  value="no"></td>
						            <td><input class="filestyle " id="superannuationCopy"  name="superAnnuationCopy"  type="file" data-buttonname="btn-white"> </td>
						        </tr>
						        <tr>
						            <td > Long Service Leave </td>
						            <td> Supply copy of last report </td>
						            <input type="hidden" name="item14" value="Long Service Leave" >
						            <td> <input type="radio" name="14" value="yes" ></td>
						            <td> <input type="radio" name="14"  value="no"></td>
						            <td><input class="filestyle " id="longServiceLeaveCopy"  name="longServiceLeaveCopy"  type="file" data-buttonname="btn-white"></td>
						        </tr>
						        <tr>
						            <td > Subcontractor Details </td>
						            <td>List any changes to contractor List</td>
						            <input type="hidden" name="item17" value="Subcontractor Details" >
						            <td> <input type="radio" name="17" value="yes" ></td>
						            <td> <input type="radio" name="17"  value="no"></td>
						            <td></td>
						        </tr>
						        
						        
						    </tbody>
						</table>
					</section>
					<!-- END Renewal CHECKLIST -->
					@endif
					@if(strpos($_SERVER['REQUEST_URI'] , 'new/renewal') == false )
					<!-- Renewal CHECKLIST STORE -->
					<h3> Checklist – Please supply documents relevant to your business structure. </h3>
					<section class="element-that-contains-table">	
						<table  class="table  table-striped">
						    <thead>
						        <tr>
						            <th>Name</th>
						            <th >Condition</th>
						            <th >Yes </th>
						            <th > No</th>	
						            <th> View </th>
						            <th> Re-Upload </th>			  
						        </tr>
						    </thead>
						    <tbody>
						       <tr>
						           <td >Workers Compensation Insurance</td>
						           <td> If expired in the past 3 months</td>
						           <input type="hidden" name="item4" value="Workers Compensation Insurance">
						           <td> <input type="radio" name="4" value="yes" @if($arrays['AppDocument'][3]['supplied'] == "yes") checked @endif ></td>
						           <td> <input type="radio" name="4" @if($arrays['AppDocument'][3]['supplied'] == "no") checked @endif value="no"></td>
						           <td> 
							           	<a class="btn btn-primary btn-xs pull-center" href= "{{ route('getFile',['filename' =>  'workersCompensationInsuranceCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
							           		<i class="fa fa-search-plus" aria-hidden="true"></i> View
							           	</a>
						           	</td>
						           <td> 
						           		<input class="filestyle " id="workersCompensationInsuranceCopy"  name="workersCompensationInsuranceCopy"  type="file" data-buttonname="btn-white">
										
						           	</td>
									

						       </tr>
						        
						        <tr>
						            <td >Public Liability Insurance</td>
						            <td> If expired in the past 3 Months</td>
						            <input type="hidden" name="item3" value="Public Liability Insurance">
						            <td> <input type="radio" name="3" value="yes" @if($arrays['AppDocument'][2]['supplied'] == "yes") checked @endif ></td>
						            <td> <input type="radio" name="3"  value="no" @if($arrays['AppDocument'][2]['supplied'] == "no") checked @endif></td>
							        <td>    
							            <a class="btn btn-primary btn-xs pull-center"  href= "{{ route('getFile',['filename' =>  'publicLiabilityInsuranceCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
							            	<i class="fa fa-search-plus" aria-hidden="true"></i> View
							            </a>
						           	</td>
						           <td> 
						           		<input class="filestyle " id="publicLiabilityInsuranceCopy"  name="publicLiabilityInsuranceCopy"  type="file" data-buttonname="btn-white">
										
						           	</td>
						        </tr>
						       <tr>
						           <td >Taxation</td>
						           <td> ATO Portal Receipt or Last BAS Report </td>
						           <input type="hidden" name="item6" value="Taxation">
						           <td> <input type="radio" name="6" value="yes" @if($arrays['AppDocument'][5]['supplied'] == "yes") checked @endif></td>
						           <td> <input type="radio" name="6"  value="no" @if($arrays['AppDocument'][5]['supplied'] == "no") checked @endif></td>
						            <td>    
							            <a class="btn btn-primary btn-xs pull-center" href= "{{ route('getFile',['filename' =>  'taxationCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
							            	<i class="fa fa-search-plus" aria-hidden="true"></i> View
							            </a>
						           	</td> 
						           <td> 
						           		<input class="filestyle " id="taxationCopy"  name="taxationCopy"  type="file" data-buttonname="btn-white">
						           
						           	</td>
						       </tr>
						       <tr>
						           <td > Payroll Tax </td>
						           <td> Last quarter - If applicable </td>
						           <input type="hidden" name="item7" value="Payroll Tax">
						           <td> <input type="radio" name="7" value="yes" @if($arrays['AppDocument'][6]['supplied'] == "yes") checked @endif></td>
						           <td> <input type="radio" name="7"  value="no" @if($arrays['AppDocument'][6]['supplied'] == "no") checked @endif></td>
						            <td>    
							            <a class="btn btn-primary btn-xs pull-center" href= "{{ route('getFile',['filename' =>  'payrollTaxCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
							            	<i class="fa fa-search-plus" aria-hidden="true"></i> View
							            </a>
						           	</td> 
						           <td> 
						           		<input class="filestyle " id="payrollTaxCopy"  name="payrollTaxCopy"  type="file" data-buttonname="btn-white">
						           
						           	</td>
						       </tr>
						        
						        
						        <tr>
						        
						            <td > Employee Details </td>
						            <td> List any changes to employee list </td>
						            <input type="hidden" name="item9" value="Employee Details">
						            <td> <input type="radio" name="9" value="yes" @if($arrays['AppDocument'][8]['supplied'] == "yes") checked @endif></td>
						            
						            <td> <input type="radio" name="9"  @if($arrays['AppDocument'][8]['supplied'] == "no") checked @endif value="no"></td>
						            <td></td>
						            <td></td>
						        </tr>
						        <tr>
						            <td > Payslips </td>
						            <td> Last 4 weeks of employees payslips </td>
						            <input type="hidden" name="item16" value="Payslips" >
						            <td> <input type="radio" name="16" value="yes" @if($arrays['AppDocument'][15]['supplied'] == "yes") checked @endif></td>
						            <td> <input type="radio" name="16"  value="no" @if($arrays['AppDocument'][15]['supplied'] == "no") checked @endif></td>
						            <td>    
							            <a class="btn btn-primary btn-xs pull-center" href= "{{ route('getFile',['filename' =>  'payslipsCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
							            	<i class="fa fa-search-plus" aria-hidden="true"></i> View
							            </a>
						           	</td> 
						           <td> 
						           		<input class="filestyle " id="payslipsCopy"  name="payslipsCopy"  type="file" data-buttonname="btn-white">
						           
						           	</td>

						        </tr>
						        <tr>
						            <td > EBA entitlements </td>
						            <td> ACIRT - Redundancy (for Previous 3 Months)</td>
						            <input type="hidden" name="item12" value="Redundancy" >
						            <td> <input type="radio" name="12" value="yes" @if($arrays['AppDocument'][11]['supplied'] == "yes") checked @endif></td>
						            <td> <input type="radio" name="12"  value="no" @if($arrays['AppDocument'][11]['supplied'] == "yes") checked @endif></td>
						            <td>    
							            <a class="btn btn-primary btn-xs pull-center" href= "{{ route('getFile',['filename' =>  'redundancyCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
							            	<i class="fa fa-search-plus" aria-hidden="true"></i> View
							            </a>
						           	</td> 
						           <td> 
						           		<input class="filestyle " id="redundancyCopy"  name="redundancyCopy"  type="file" data-buttonname="btn-white">
						           
						           	</td>
						        </tr>

						        <tr>
						            <td >Income Protection Insurance</td>
						            <td>Uplus/ Built Income Protection ( for Previous 3 months) </td>
						            <input type="hidden" name="item5" value="Income Protection Insurance">
						            <td> <input type="radio" name="5" value="yes" @if($arrays['AppDocument'][4]['supplied'] == "yes") checked @endif></td>
						            <td> <input type="radio" name="5"  value="no" @if($arrays['AppDocument'][4]['supplied'] == "no") checked @endif></td>
						          	<td>    
							            
			
							            <a class="btn btn-primary btn-xs pull-center" href= "{{ route('getFile',['filename' =>  'incomeProtectionInsuranceCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
							            	<i class="fa fa-search-plus" aria-hidden="true"></i> View
							            </a>
						           	</td> 
						            <td> 
						            	
						            	<input class="filestyle " id="incomeProtectionInsuranceCopy"  name="incomeProtectionInsuranceCopy"  type="file" data-buttonname="btn-white">	
						            </td> 	
						        </tr>
						       

						        <tr>
						            <td > Superannuation – Employee </td>
						            <td>Supply Lastest Lodgement (for Previous 3 Months)</td>
						            <input type="hidden" name="item15" value="Superannuation – Employee" >
						            <td> <input type="radio" name="15" value="yes" @if($arrays['AppDocument'][14]['supplied'] == "yes") checked @endif ></td>
						            <td> <input type="radio" name="15"  value="no" @if($arrays['AppDocument'][14]['supplied'] == "no") checked @endif></td>
						            <td>    
							            
			
							            <a class="btn btn-primary btn-xs pull-center" href= "{{ route('getFile',['filename' =>  'superannuationCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
							            	<i class="fa fa-search-plus" aria-hidden="true"></i> View
							            </a>
						           	</td>
						            <td> 
						            	
						            	<input class="filestyle " id="superannuationCopy-"  name="superannuationCopy"  type="file" data-buttonname="btn-white">	
						            </td> 	
						        </tr>
						        <tr>
						            <td > Long Service Leave </td>
						            <td> Supply copy of last report </td>
						            <input type="hidden" name="item14" value="Long Service Leave" >
						            <td> <input type="radio" name="14" value="yes" @if($arrays['AppDocument'][13]['supplied'] == "yes") checked @endif></td>
						            <td> <input type="radio" name="14"  value="no" @if($arrays['AppDocument'][13]['supplied'] == "no") checked @endif></td>
						           <td>    
							            
			
							            <a class="btn btn-primary btn-xs pull-center" href= "{{ route('getFile',['filename' =>  'longServiceLeaveCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
							            	<i class="fa fa-search-plus" aria-hidden="true"></i> View
							            </a>
						           	</td>
						            <td> 
						            	
						            	<input class="filestyle " id="longServiceLeaveCopy-"  name="longServiceLeaveCopy"  type="file" data-buttonname="btn-white">	
						            </td> 
						        </tr>
						        <tr>
						            <td > Subcontractor Details </td>
						            <td>List any changes to contractor List</td>
						            <input type="hidden" name="item17" value="Subcontractor Details" >
						            <td> <input type="radio" name="17" value="yes" @if($arrays['AppDocument'][16]['supplied'] == "yes") checked @endif></td>
						            <td> <input type="radio" name="17"  value="no" @if($arrays['AppDocument'][16]['supplied'] == "no") checked @endif></td>
						            <td></td>
						            <td></td>
						        </tr>
						    </tbody>
						</table>
					</section>
					<!-- END Renewal CHECKLIST -->
					@endif	
					@if(strpos($_SERVER['REQUEST_URI'] , 'view') == false)
						@include('app.commons.declaration')
					@endif
					@include('pdf.footer')
					
				</form>
				<!-- End #wizard-vertical -->    
			</div>
		</div>
	</div>	
</div>
@endsection