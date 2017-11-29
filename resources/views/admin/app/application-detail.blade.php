<div class="row">
	<div class="portlet">
		<div class="portlet-heading bg-success">
			<h3 class="portlet-title">
				Application Information 
			</h3>
			<div class="portlet-widgets">
				<a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
				<span class="divider"></span>
				<a data-toggle="collapse" data-parent="#accordion1" href="#bg-success"><i class="ion-minus-round"></i></a>
				<span class="divider"></span>
				<a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div id="bg-success" class="panel-collapse collapse in">
			<div class="portlet-body">
				<!-- Table -->
				<table class="table">
					<thead>
						<tr>
							<th>Application Ref</th>
							<th>Contractor Name</th>
							<th>Contractor Email</th>
							<th>Application Type</th>
							<th>Application Status</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td> {{$applications[0]['ref']}} </td>
							<td> {{$applications[0]['name']}} </td>
							<td> {{$applications[0]['email']}}</td>
							<td> {{$applications[0]['applicationType']}}  </td>
							<td> 
								@if($applications[0]['applicationStatus'] == 1)
								    New
								@elseif($applications[0]['applicationStatus'] == 2 )
								    Viewed
								@elseif($applications[0]['applicationStatus'] == 3 )
								    In Process
								@elseif($applications[0]['applicationStatus'] == 4 )
								    Completed
								@elseif($applications[0]['applicationStatus'] == 5 )
								    Require Contractor Attention
								@endif
							</td>
							<td> {{$applications[0]['created_at']}} </td>
							<td> {{$applications[0]['updated_at']}} </td>
							<td><a href="#" data-toggle="modal" data-target="#edit"> <i class="fa fa-pencil"> </i> </a></td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- Modal  choosing the state they come from -->
<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<form method="POST">
				{{method_field('PUT')}}
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
					<h4 class="modal-title"> Update Application Status </h4> 
				</div> 
				<div class="modal-body"> 

					<div class="row"> 
						<div class="col-md-12"> 

							<!-- Form CSRF Tokens  -->
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label >Please choose your new application status </label>

							</div>
							<!-- Select box -->
							<div class="form-group pull-right"> 
								<select name="status" class="selectpicker" data-style="btn-white">
									<option value="1">New</option>
									<option value="2">Viewed</option>
									<option value="3">In Process</option>
									<option value="4">Completed</option>
									<option value="5">Require Contractor Attention</option>

								</select>
							</div>     

						</div> 

					</div>
				</div>
				<div class="modal-footer"> 
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
					<button type="submit" class="btn btn-primary waves-effect waves-light"> Submit </button> 
				</div> 	
			</form>

		</div>
	</div><!-- /.modal -->
</div>