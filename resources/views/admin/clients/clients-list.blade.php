@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-border panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">List of clients <a href="/admin/client/new"  class="btn btn-primary btn-xs" data-toggle="modal" data-target="#new-client"> Add new </a> </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive" >
                        <table  class="table  table-bordered" id="clients" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th >Company Name</th>
                                    <th> Created At</th>
                                    <th> Created By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection
    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#clients').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "/api/clients",
                "columns":[
                {data: 'id'},
                {data: 'username'},
                {data: 'companyName'},
                {data: 'created_at'},
                {data: 'name'},
                {data: 'action',name: 'action'}
                ]

            } );
        } );
    </script>


    @endpush
<div class="modal fade" id="new-client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div> 
    </div> 
</div> 
</div>