@extends('layouts.app')

@section('content')
<style type="text/css">
	@media print {
		-webkit-print-color-adjust: exact; 
	}
</style>

<br/>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-border panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">  Report @if(Request::segment(3) == "pdf")<div class="pull-right"> <img src="{{url('img/keys.png')}}"> </div>@else <a href="{{ url('client/report/pdf/'.Auth::guard('client')->user()->id) }}" class="btn btn-danger pull-right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a> <br/> @endif <br/> </h3>
					@if(Request::segment(3) != "pdf")
					<div class='my-legend  pull-right'>
						<div class='legend-title'> Report Keys</div>
						<div class='legend-scale'>
							<ul class='legend-labels'>
								<li><span style='background:#8DD3C7 !important;'></span>Compliant</li>
								<li><span style='background:#FFFFB3 !important;'></span>Pending</li>
								<li><span style='background:#FB8072!important;'></span>Non-Compliant</li>
								<li><span style='background:#9999e6!important;'></span>Not Required</li>
								<li><span style="background-color:!important#cc66cc"></span>Refused to supply docs</li>
							</ul>
						</div>
						
					</div>
					@endif
				</div>				
				<div class="panel-body"> 
					<div class="table-responsive" >
						<table id="full-report" class="table">
							<thead class="report-head">
								<th> Company <br> Name </th>
								<th> ABN </th>
								<th> Entity <br> Type</th>
								<th> Public <br> Liability </th>
								<th> Workers <br> Comp </th>
								<th> Income <br> Protection</th>
								<th> ATO </th>
								<th> Payroll <br> Tax </th>
								<th> Redundancy </th>
								<th> Long Service <br> Leave </th>
								<th> Industry <br> Licences </th>
								<th> OHS/ <br> Asbestos </th>
								<th> Employee <br> Details </th>
								<th> Employee <br> Agreement </th>
								<th> Employee <br> Payslips </th>
								<th> Employee <br> Super </th>
								<th> Employee <br> Immigration </th>
								<th> SubContractor <br> or Super </th>
								<th> SubContractor <br> Agreement </th>
								<th> SubContractor <br> Sole Trader </th>
								<th> IRE <br> certificate</th>
								<th> DEEWR <br> certificate</th>
								<th> FWC compliance <br> letter</th>
								<th> OHS/EHS <br> Management plan</th>
								<th> Drug & <br> Alcohol Policy </th>
								<th> Plant & <br>Equipement register </th>
								<th> Immigration <br> Details </th>
								<th> Assessment <br> Date </th>
								<th> Expiry <br> Date </th>
							</thead>
							<tbody class="report-body">
								<?php $i=0; ?>
								@foreach($reports as $report)
								<tr>
									@if(Request::segment(3) != 'pdf')
									<td> <a href="/client/report/view/{{$report->id}}"> {{$report->businessName}} </a> </td>
									@else
									<td> {{$report->businessName}} </td>
									@endif
									<td> </td>
									<td> {{$report->entityType }} </td>
									@foreach($sectionStatus[$i] as $sectionSt)
									@if($sectionSt->status == 'C')
									<td style='background:#8DD3C7;'> 
									@elseif($sectionSt->status == 'P')
									<td style='background:#FFFFB3;'>
									@elseif($sectionSt->status == 'NC')
									<td style='background:#FB8072;'>
									@elseif($sectionSt->status == 'NR')
									<td style="background-color:#9999e6">
									@elseif($sectionSt->status == 'RSD')
									<td style="background-color:#cc66cc">
									@else
									<td>
									@endif
									@if($sectionSt->reportSections_id == 1 || $sectionSt->reportSections_id == 2)
									{{findDate($sectionSt->value)}}		
									@endif
									@if($sectionSt->reportSections_id == 11)
										{{$report->employeeAgreementType }}
									@endif				 
									</td>
									@endforeach
									<?php $i++; ?>
									
									<td>
										
									</td>
									<td>
										{{date('d/m/Y',strtotime($report->assessmentDate)) }}
										
									</td>
									<td>
										{{ date('d/m/Y',strtotime($report->expiryDate)) }}
									</td>
								</tr>
								@endforeach
							</tbody>					
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
				
@endsection