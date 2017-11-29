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
						Type : {{ $array['type'] }}
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
		<button class="btn btn-primary btn-xs" type="button" onclick="addRowSub();"> <i class="fa fa-plus-square"> </i> Add more</button>
	</div><br/>
	<div class="inputs-table" style="overflow-x:scroll">	
		<input type="hidden" name="numberRowsSub" id="numberRowsSub" >
		<table  class="table-hover" id="myTableSub">
			<thead >
				<tr >
					<th>Subcontractor details</th>
					<th> Contact Name </th>
					<th> Type </th>
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
						<select name="type_{{ $countSub }}">
						  <option value="L" @if($array['type'] == 'L') selected @endif> Labour Hire </option>
						  <option value="C" @if($array['type'] == 'C') selected @endif> Contractor </option>
						  <option value="A" @if($array['type'] == 'A') selected @endif> Associated Entity </option>
						</select> 
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