@extends('layouts.app')

@section('content')
<br/>
<div class="container">
    <!-- Add new application button -->
   
    <!-- List all applications of contractor -->
    <div class="row">
        <div class="col-lg-12">
            @if (Session::has('flash_notification.message'))
                @include('notifications.success')
            @endif
            @if(session()->has('message'))
                <div style="position:absolute;width:50%; right:300px;" class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="panel panel-border panel-success">
                <div class="panel-heading">
                <h3 class="panel-title">List of applications   <button href="#" data-toggle='modal' data-target='#new-application' class="btn btn-success pull-right waves-effect waves-light btn-xs"> <i class="fa fa-plus m-r-5"></i> <span>New Application </span> </button></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive" >
                        
                        <table  class="table  table-striped">
                       
                            <thead>
                                <tr>
                                    <th>Application Ref</th>
                                    <th >Application Type</th>
                                    <th >Application Status</th>
                                    <th > Created At</th>
                                    <th> Updated At </th>
                                    <th > View/Edit </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $application)
                                <tr>
                                    <td> {{ $application['ref'] }} </td>
                                    <td style="text-transform: uppercase;"> {{ $application['applicationType'] }} </td>
                                    <td> 
                                        @if($application['applicationStatus'] == 1)
                                            New
                                        @elseif($application['applicationStatus'] == 2 )
                                            Viewed
                                        @elseif($application['applicationStatus'] == 3 )
                                            In Process
                                        @elseif($application['applicationStatus'] == 4 )
                                            Completed
                                        @elseif($application['applicationStatus'] == 5 )
                                            Require Contractor Attention
                                        @endif
                                    </td>
                                    <td> {{ $application['created_at'] }} </td>
                                    <td> {{ $application['updated_at'] }} </td>
                                    <td> 
                                        <a href="{{ route('showApp',['state' => $application['applicationType'] , 'id' => $application['idapplication'] ]) }} " >
                                            <button class="btn btn-primary btn-xs pull-center"> 
                                                <i class="fa fa-search-plus" aria-hidden="true"></i> 
                                            </button>
                                        </a>

                                        <a href="{{ route('updateApp',['state' => $application['applicationType'] , 'id' => $application['idapplication'] ]) }} " >
                                            <button class="btn btn-success btn-xs pull-center"> 
                                                <i class="fa fa-pencil" aria-hidden="true"></i> 
                                            </button>
                                        </a>
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
   
    <!-- Modal  choosing the state they come from -->
    <div id="new-application" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title"> Application Type </h4> 
                </div> 
                <div class="modal-body"> 

                    <div class="row"> 
                        <div class="col-md-12"> 
                            <form method="POST" class="form-inline" role="form">
                                <!-- Form CSRF Tokens  -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label >Please choose your application type </label>
                                    
                                </div>
                                <!-- Select box -->
                                <div class="form-group pull-right"> 
                                    <select name="state" class="selectpicker" data-style="btn-white">
                                        <option value="act">ACT</option>
                                        <option value="nsw">NSW</option>
                                        <option value="vic">VIC</option>
                                        <option value="qld">QLD</option>
                                        <option value="tas">TAS</option>
                                        <option value="sa">SA</option>
                                        <option value="wa">WA</option>
                                        <option value="nt">NT</option>
                                        <option value="renewal">RENEWAL - ALL States</option>
                                        <option value="actIre">ACT IRE</option>
                                    </select>
                                </div> 
                            </div> 
                        </div> 

                    </div>
                     
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button> 
                        <button type="submit" class="btn btn-success waves-effect "> Next </button> 
                    </div> 
                </div> 
            </div>
        </div><!-- /.modal -->
    </div>
    @endsection
