<h3> 
	Employees Details
</h3>
<section>
	<h3> 
		Employees Details
	</h3>
	<?php $i = 1 ; ?>
	@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') !== false)
	@foreach($arrays['AppEmployeesDetails'] as $array)
	<div class="row">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<h3 class="panel-title">Employee no {{ $i }}</h3>
				</div>

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
		<button class="btn btn-primary btn-xs" type="button" onclick="addRow();"> <i class="fa fa-plus-square"> </i> Add more</button>
		
	</div><br/>
	<div class="inputs-table" >	
		<input type="hidden" name="numberRows" id="numberRows">
		<table  class="table-hover" id="myTable">
			<thead >
				<tr >
					<th>Employee Name</th>
					<th>Date of Birth</th>
					<th>Country of Birth / Citizenship </th>
					<th>Passport/IMMI card number</th>
					<th>OHS Card</th>
					<th>Trade/labourer classification</th>
					<th>Certificate</th>
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
				<?php $numberRowsEmployees = $countEmployees ;
				
				?>
				<script>
					var count = <?php echo json_encode($numberRowsEmployees); ?>;
				</script>
			</tbody>
		</table>
	</div>
	@endif
</section>