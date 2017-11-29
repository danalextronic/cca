@extends('layouts.app')

@section('content')
@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') !== false)
	<img src="img/logo/logo.png">
@endif
<br>
<div class="container">
	
	<!-- Vertical Steps Example -->
	<div class="row">
		<div class="col-sm-12  "> 
			@include('pdf.header')
			<div class="card-box">
				<h4 class="m-t-0 header-title"><b>ACT Business Compliance Assessment Questionnaire</b></h4> <small> Please ensure that you read each section thoroughly and have provided all required
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
					
					<!-- Include common views -->					
					@include('app.commons.business-identification') 					
					@include('app.commons.business-structure')
					<!-- END INCLUDES -->
					
					
					
					<!-- Include common views -->
					@include('app.commons.public-liability-insurance')
					@include('app.commons.workers-compensation-insurance')
					@include('app.commons.income-protection-insurance')				
					@include('app.commons.taxation')
					<!-- END INCLUDES -->
					
					<!-- PAYROLL TAX ACT-->
					<h3> Payroll Tax</h3>
					<section>
						<h3> Payroll Tax</h3>
						<p> <b> Do you pay Payroll Tax? </b> </p>
						<br/>
						<label class="radio-inline">
						<input type="radio" id="payrollTaxExistYes" name="payrollTaxExist" value="1" @if($arrays["AppPayrollTax"][0]['payrollTaxExist'] == 1) checked @endif>Yes
						</label>
						<label class="radio-inline">
							<input type="radio" id="payrollTaxExistNo" name="payrollTaxExist" value="0">No
						</label>
						
						<!-- end for update -->
						
						<div class="form-group clearfix">	
							<p> If Yes , <strong class="text-danger"> please supply evidence of the last six months returns. </strong>  </p>	
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false  )
									@if($arrays["AppPayrollTax"][0]['copy'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'payrollTaxCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     	</a>
									@endif
								@endif
							@endif
							<input class="filestyle " id="payrollTaxCopy"  name="payrollTaxCopy"  type="file" data-buttonname="btn-white">	
						</div>
						<p> 
							Payroll tax is a general purpose tax imposed on wages paid by employers.
							From 1 July 2012, the rate of tax and the annual threshold before it becomes payable is 6.85% and $145,833.33 per month ($1,750.00.00 per annum)
						</p>						
					</section>
					
					<!-- Include common views -->
					@include('app.commons.visa-workers')				
					
					
					<!-- END INCLUDES -->
					
					<!-- Employees Details -->

					<h3> 
						Employees Details
					</h3>
					<section>
						<h3> 
							Employees Details
						</h3>
						@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') !== false)
							<?php $i = 1 ; ?>
							@foreach($arrays['AppEmployeesDetails'] as $array)
								<div class="row">
										<div class="panel panel-default">
											<!-- Default panel contents -->
											<div class="panel-heading">
												<h3 class="panel-title">Employee no {{ $i }}</h3>
											</div

											<!-- List group -->
											<ul class="list-group">
												<li class="list-group-item">
													Employee Name : {{ $array['employeeName'] }}
												</li>
												<li class="list-group-item">
													Date of Birth : {{ $array['employeeDateOfBirth'] }}
												</li>
												<li class="list-group-item">
													Country of Birth / Citizenship :  {{ $array['employeeCountryOfBirth'] }}
												</li>
												<li class="list-group-item">
													Passport/IMMI card number :  {{ $array['employeePassportImmiCardNumber'] }}
												</li>
												<li class="list-group-item">
													OHS Card : {{ $array['employeeOHSCard'] }}
												</li>
												<li class="list-group-item">
													Trade/labourer classification : {{ $array['employeesDetailscol'] }}
												</li>
											</ul>
										</div>
									</div>
								</div>
								<?php $i++ ; ?>
							@endforeach
						@else
							<div id="controlButtons">
								<button class="btn btn-primary btn-xs" type="button" onclick="addRowAct();"> <i class="fa fa-plus-square"> </i> Add more</button>
								
							</div><br/>
							<div class="row" >
								<div >
									<div class="inputs-table">	
										<input type="hidden" name="numberRows" id="numberRows">
										<table  class="table-hover" id="myTable" cellspacing="0" width="100%">
											<thead >
												<tr >
													<th >Name</th>
													<th>Date Birth</th>
													<th>Country of Birth</th>
													<th>Passport/IMMI</th>
													<th>OHS Card</th>
													<th>Asbestos Awareness Cert</th>
													<th>Trade/labourer</th>
													<th> Certificate </th>
												</tr>
									    
									    

											</thead>
											<?php /* Passing number of employees to javascript employees details to initialize count to the real number of employees instead of 0 , go public/js/employees-details for more informations */$countEmployees = 0 ?>
											<tbody id="employees">
											    @if(strpos($_SERVER['REQUEST_URI'] , 'new/') == false)
													@foreach($arrays['AppEmployeesDetails'] as $array)
														
														<tr>
															<td>
																<input type="text" name="employee_name_{{$countEmployees}}" value="{{ $array['employeeName'] }}">
															</td>
															<td>
																<input type="text" name="date_birth_{{$countEmployees}}" value="{{ $array['employeeDateOfBirth'] }}">
															</td>
															<td>
																<input type="text" name="country_birth_{{$countEmployees}}" value="{{ $array['employeeCountryOfBirth'] }}">
															</td>
															<td>
																<input type="text" name="passport_cardnumber_{{$countEmployees}}" value="{{ $array['employeePassportImmiCardNumber'] }}">
															</td>
															<td>
																<input type="text" name="ohs_card_{{$countEmployees}}" value="{{ $array['employeeOHSCard'] }}">
															</td>
															<td>
																<input type="text" name="asbestos_awareness_cert_{{$countEmployees}}" value="{{ $array['employeeAsbestos'] }}">
															</td>
															<td>
																<input type="text" name="trade_labourer_classification_{{$countEmployees}}" value="{{ $array['employeesDetailscol'] }}">
															</td>
															<td>
																@if($array['certificate'] !== null )	
																<a  href= "{{ route('getFile',['filename' =>  'certificate_'.$countEmployees, 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
																	View
																</a>
																<br/>
																@endif	
															</td>
															
														</tr>
														<?php $countEmployees++ ?>
													@endforeach
											    @endif	
											    <?php $numberRowsEmployees = $countEmployees ; ?>
											    <script>
											        var count = <?php echo json_encode($numberRowsEmployees); ?>;
											    </script>
											</tbody>
										</table>
									</div>
								</div>
							</div>		
						@endif
					</section>
					<!-- END EMPL0YEES DETAILS -->

					<!-- ASBESTOS Awareness Certificate Only for ACT --> 
					<h3> Asbestos Awareness Certificate – Mandatory as of 1 st July 2014 </h3>
					<section>
						<h3> Asbestos Awareness Certificate – Mandatory as of 1 st July 2014 </h3>
						<p> <strong class="text-danger"> Please supply a copy of your employees Asbestos Awareness Certificate.</strong> All employees onsite must have an Asbestos Awareness Certificate, dated post 2008 as of 1 st July 2014. </p>
						<p>
							All workers have until 30 th September 2014 to complete training.
						</p>
						<div class="form-group clearfix">		
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
									@if($arrays["AppAsbetosCertificate"][0]['copy'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'asbestosAwarenessCertificateCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     	</a>
									<br/>
									@endif
								@endif
							@endif	

							<input class="filestyle "  name="asbestosAwarenessCertificateCopy"  type="file" data-buttonname="btn-white">	
						</div>					
					</section>

					<!-- includes common views --> 
					@include('app.commons.industrial-instrument')
					@include('app.commons.redundancy')
					@include('app.commons.insurance-24h')
					@include('app.commons.long-service-leave')
					<!-- End includes -->
					
					<!-- SUPERANNUATION-Employees -->
					<h3> Super Annuation- Employees </h3>
					<section>
						<h3> Super Annuation- Employees </h3>
						<label class="radio-inline">
						<input type="radio" name="superAnnuationExist" value="1" @if($arrays["AppSuperAnnuation"][0]['superAnnuationExist'] == 1) checked @endif >Yes
						</label>
						<label class="radio-inline">
							<input type="radio" name="superAnnuationExist" value="0" @if($arrays["AppSuperAnnuation"][0]['superAnnuationExist'] == 0) checked @endif >No
						</label>
						<p>
							If yes, please provide CBUS (or equivalent fund): 
						</p>
						<div class="form-group clearfix">		
						@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
							@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
								@if($arrays["AppSuperAnnuation"][0]['CBUS'] !== null )	
								<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
								<a  href= "{{ route('getFile',['filename' =>  'CBUS', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     </a>
								<br/>
								@endif
							@endif
						@endif		

							<label class="col-lg-6" for="CBUS"> Returns for the previous 6 months.</label>
							<input id="CBUS" class="col-lg-6 filestyle "  name="CBUS"  type="file" data-buttonname="btn-white">	
						</div>
						<div class="form-group clearfix">		
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
									@if($arrays["AppSuperAnnuation"][0]['evidencePayement'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'evidencePayement', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
											 View
								     </a>	
									<br/>
									@endif
								@endif
							@endif		

							<label  class="col-lg-6" id="" for="evidencePayement"> Evidence of Payment</label>
							<input class="filestyle col-lg-6 "  name="evidencePayement"  type="file" data-buttonname="btn-white">	
						</div>
					</section>

					<!-- END  SUPERANNUATION-Employees -->
					<!-- includes common views --> 
					@include('app.commons.payslips')
					@include('app.commons.sub-contractors')
					@include('app.commons.intention-engage-subcontractors')
					@include('app.commons.superannuation-sole-trader')
					@include('app.commons.abn-workers')
					@include('app.commons.fair-work-principals')
					<!-- End includes -->
					<!-- ACT IRE CERTIFICATE ONLY FOR ACT !! -->
					<h3> 
						Act Government Industrial Relations and Employment Compliance Certificate (IRE Certificate) 
					</h3>
					<section>
						<h3> 
							Act Government Industrial Relations and Employment Compliance Certificate (IRE Certificate) 
						</h3>
						<label class="radio-inline">
						<input type="radio" name="IRECertificateExist" value="1" @if($arrays["AppIRE"][0]['IRECertificateExist'] == 1) checked @endif>Yes
						</label>
						<label class="radio-inline">
							<input type="radio" name="IRECertificateExist" value="0" @if($arrays["AppIRE"][0]['IRECertificateExist'] == 0) checked @endif>No
						</label>
						<p>
							All head contractors, sub contractors and trade contractors are required to hold a current
							Industrial Relations and Employment Certificate (IRE Certificate) while engaged on an ACT
							Government Project
							Please supply a copy of your ACT IRE compliance Certificate.
							If you don’t not have an IRE Certificate and require one, please contact our office for assistance
						</p>
						<div class="form-group clearfix">		
							@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)
								@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
									@if($arrays["AppIRE"][0]['copyIRE'] !== null )	
									<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
									<a  href= "{{ route('getFile',['filename' =>  'copyIRE', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
										 View
							     	</a>
									@endif
								@endif
							@endif			

							<input  class=" filestyle "  name="copyIRE"  type="file" data-buttonname="btn-white" >	
						</div>
						
					</section>
						
					<!-- END  ACT IRE CERTIFICATE -->
					@include('app.commons.departement-employment')
					@include('app.commons.OHSWHS')
					@include('app.commons.safe-work-method-statement')
					@include('app.commons.workers-injury')
					@include('app.commons.training-competency')
					@if(strpos($_SERVER['REQUEST_URI'] , 'new') !== false)
					<!-- ACT CHECKLIST STORE -->
					<h3> Checklist – Please supply documents relevant to your business structure. </h3>
					<section>	
						<table  class="table  table-striped">
						    <thead>
						        <tr>
						            <th>NO</th>
						            <th >ITEM</th>
						            <th >Supplied </th>
						            <th > Not Applicable</th>				  
						        </tr>
						    </thead>
						    <tbody>
						        <tr>
						            <td>1</td>
						            <td >Business Identification</td>
						            <input type="hidden" name="item1" value="Business Identification">
						            <td> <input type="radio" name="1" value="yes" ></td>
						            <td> <input type="radio" name="1"  value="no"></td>
						        </tr>
						        <tr>
						            <td>2</td>
						            <td >Business Structure</td>
						            <input type="hidden" name="item2" value="Business Structure">
						            <td> <input type="radio" name="2" value="yes" ></td>
						            <td> <input type="radio" name="2"  value="no"></td>
						        </tr>
						        <tr>
						            <td>3</td>
						            <td >Public Liability Insurance</td>
						            <input type="hidden" name="item3" value="Public Liability Insurance">
						            <td> <input type="radio" name="3" value="yes" ></td>
						            <td> <input type="radio" name="3"  value="no"></td>
						        </tr>
						        <tr>
						            <td>4</td>
						            <td >Workers Compensation Insurance</td>
						            <input type="hidden" name="item4" value="Workers Compensation Insurance">
						            <td> <input type="radio" name="4" value="yes" ></td>
						            <td> <input type="radio" name="4"  value="no"></td>
						        </tr>
						        <tr>
						            <td>5</td>
						            <td >Income Protection Insurance</td>
						            <input type="hidden" name="item5" value="Income Protection Insurance">
						            <td> <input type="radio" name="5" value="yes" ></td>
						            <td> <input type="radio" name="5"  value="no"></td>
						        </tr>
						        <tr>
						            <td>6</td>
						            <td >Taxation</td>
						            <input type="hidden" name="item6" value="Taxation">
						            <td> <input type="radio" name="6" value="yes" ></td>
						            <td> <input type="radio" name="6"  value="no"></td>
						        </tr>
						        <tr>
						            <td>7</td>
						            <td > Payroll Tax </td>
						            <input type="hidden" name="item7" value="Payroll Tax">
						            <td> <input type="radio" name="7" value="yes" ></td>
						            <td> <input type="radio" name="7"  value="no"></td>
						        </tr>
						        <tr>
						            <td>8</td>
						            <td > Immigration/Visa Check </td>
						            <input type="hidden" name="item8" value="Immigration/Visa Check">
						            <td> <input type="radio" name="8" value="yes" ></td>
						            <td> <input type="radio" name="8"  value="no"></td>
						        </tr>
						        <tr>
						            <td>9</td>
						            <td > Employee Details </td>
						            <input type="hidden" name="item9" value="Employee Details">
						            <td> <input type="radio" name="9" value="yes" ></td>
						            <td> <input type="radio" name="9"  value="no"></td>
						        </tr>
						        <tr>
						            <td>10</td>
						            <td > Asbestos Awareness Certificate </td>
						            <input type="hidden" name="item10" value=" Asbestos Awareness Certificate">
						            <td> <input type="radio" name="10" value="yes" ></td>
						            <td> <input type="radio" name="10"  value="no"></td>
						        </tr>
						        <tr>
						            <td>11</td>
						            <td > Industrial Instrument – Award/Agreement </td>
						            <input type="hidden" name="item11" value=" Industrial Instrument – Award/Agreement" >
						            <td> <input type="radio" name="11" value="yes" ></td>
						            <td> <input type="radio" name="11"  value="no"></td>
						        </tr>
						        <tr>
						            <td>12</td>
						            <td > Redundancy </td>
						            <input type="hidden" name="item12" value="Redundancy" >
						            <td> <input type="radio" name="12" value="yes" ></td>
						            <td> <input type="radio" name="12"  value="no"></td>
						        </tr>
						        <tr>
						            <td>13</td>
						            <td > Top Up Insurance</td>
						            <input type="hidden" name="item13" value=" Top Up Insurance" >
						            <td> <input type="radio" name="13" value="yes" ></td>
						            <td> <input type="radio" name="13"  value="no"></td>
						        </tr>
						        <tr>
						            <td>14</td>
						            <td > Long Service Leave </td>
						            <input type="hidden" name="item14" value="Long Service Leave" >
						            <td> <input type="radio" name="14" value="yes" ></td>
						            <td> <input type="radio" name="14"  value="no"></td>
						        </tr>
						        <tr>
						            <td>15</td>
						            <td > Superannuation – Employee </td>
						            <input type="hidden" name="item15" value="Superannuation – Employee" >
						            <td> <input type="radio" name="15" value="yes" ></td>
						            <td> <input type="radio" name="15"  value="no"></td>
						        </tr>
						        <tr>
						            <td>16</td>
						            <td > Payslips </td>
						            <input type="hidden" name="item16" value="Payslips" >
						            <td> <input type="radio" name="16" value="yes" ></td>
						            <td> <input type="radio" name="16"  value="no"></td>
						        </tr>
						        <tr>
						            <td>17</td>
						            <td > Subcontractor Details </td>
						            <input type="hidden" name="item17" value="Subcontractor Details" >
						            <td> <input type="radio" name="17" value="yes" ></td>
						            <td> <input type="radio" name="17"  value="no"></td>
						        </tr>
						        <tr>
						            <td>18</td>
						            <td > Intention to Engage Subcontractors </td>
						            <input type="hidden" name="item18" value="Intention to Engage Subcontractors" >
						            <td> <input type="radio" name="18" value="yes" ></td>
						            <td> <input type="radio" name="18"  value="no"></td>
						        </tr>
						        <tr>
						            <td>19</td>
						            <td > Superannuation- Sole Trader </td>
						            <input type="hidden" name="item19" value="Superannuation- Sole Trader" >
						            <td> <input type="radio" name="19" value="yes" ></td>
						            <td> <input type="radio" name="19"  value="no"></td>
						        </tr>
						        <tr>
						            <td>20</td>
						            <td > ABN Workers </td>
						            <input type="hidden" name="item20" value=" ABN Workers" >
						            <td> <input type="radio" name="20" value="yes" ></td>
						            <td> <input type="radio" name="20"  value="no"></td>
						        </tr>
						        <tr>
						            <td>21</td>
						            <td > Fair Work Principles </td>
						            <input type="hidden" name="item21" value="Fair Work Principles " >
						            <td> <input type="radio" name="21" value="yes" ></td>
						            <td> <input type="radio" name="21"  value="no"></td>
						        </tr>
						        <tr>
						            <td>22</td>
						            <td > ACT Government IRE Compliance Certificate </td>
						            <input type="hidden" name="item22" value="ACT Government IRE Compliance Certificate" >
						            <td> <input type="radio" name="22" value="yes" ></td>
						            <td> <input type="radio" name="22"  value="no"></td>
						        </tr>
						        <tr>
						            <td>23</td>
						            <td > FBWC Compliance Letter </td>
						            <input type="hidden" name="item23" value="FBWC Compliance Letter" >
						            <td> <input type="radio" name="23" value="yes" ></td>
						            <td> <input type="radio" name="23"  value="no"></td>
						        </tr>
						        <tr>
						            <td>24</td>
						            <td > OHS/WHS Management Plan </td>
						            <input type="hidden" name="item24" value="OHS/WHS Management Plan " >
						            <td> <input type="radio" name="24" value="yes" ></td>
						            <td> <input type="radio" name="24"  value="no"></td>
						        </tr>
						        <tr>
						            <td>25</td>
						            <td > Safe Work Method Statements </td>
						            <input type="hidden" name="item25" value="Safe Work Method Statements" >
						            <td> <input type="radio" name="25" value="yes" ></td>
						            <td> <input type="radio" name="25"  value="no"></td>
						        </tr>
						        <tr>
						            <td>26</td>
						            <td > Workers Compensation Injury Management Plan </td>
						            <input type="hidden" name="item26" value="Workers Compensation Injury Management Plan" >
						            <td> <input type="radio" name="26" value="yes" ></td>
						            <td> <input type="radio" name="26"  value="no"></td>
						        </tr>
						        <tr>
						            <td>27</td>
						            <td > Training and Competency Register </td>
						            <input type="hidden" name="item27" value="Training and Competency Register" >
						            <td> <input type="radio" name="27" value="yes" ></td>
						            <td> <input type="radio" name="27"  value="no"></td>
						        </tr>
						        <tr>
						            <td>28</td>
						            <td > Statutory Declaration </td>
						            <input type="hidden" name="item28" value="Statutory Declaration " >
						            <td> <input type="radio" name="28" value="yes" ></td>
						            <td> <input type="radio" name="28"  value="no"></td>
						        </tr>
						        
						    </tbody>
						</table>
					</section>
					<!-- END ACT CHECKLIST -->
					@endif
					@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false )
					
					<!-- ACT CHECKLIST SHOW&UPDATE -->
					<h3> Checklist – Please supply documents relevant to your business structure. </h3>
					<section>	
						<table  class="table  table-striped">
						    <thead>
						        <tr>
						            <th>NO</th>
						            <th >ITEM</th>
						            <th >Supplied </th>
						            <th > Not Applicable</th>				  
						        </tr>
						    </thead>
						    <tbody>
						        @foreach($arrays['AppDocument'] as $array )
						        <tr>
						            <td>{{ $array['itemid'] }}</td>
						            <td >{{$array['item']}}</td>
						            <td> <input type="radio" name="{{ $array['itemid']}}" value="yes" @if($array['supplied'] == "yes") checked @endif></td>
						            <td> <input type="radio" name="{{ $array['itemid']}}"  value="no" @if($array['supplied'] != "yes") checked @endif></td>
						        </tr>
						        @endforeach
						        
						    </tbody>
						</table>
					</section>
					@endif
					@if(strpos($_SERVER['REQUEST_URI'] , 'view') == false)
						@include('app.commons.declaration')
					@endif
					<!-- END CHECKLIST SHOW&UPDATE -->
					@include('app.commons.office-contact-details')
					@include('pdf.footer')		
				</form>
				<!-- End #wizard-vertical -->    
			</div>
		</div>
	</div>	
</div>
 
@endsection
