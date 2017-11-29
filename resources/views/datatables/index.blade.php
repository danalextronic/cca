@extends('layouts.app')

@section('content')
<br/>
<div class="container">

    <!-- List all applications of contractors -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-border panel-success">
                <div class="panel-heading">
                <h3 class="panel-title">List of applications</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive" >
                        <table  class="table  table-bordered" id="application-table" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ref</th>
                                    <th>Contractor Name</th>
                                    <th>Contractor Email</th>
                                    <th >Application Type</th>
                                    <th >Application Status</th>
                                    <th > Created At</th>
                                    <th> Updated At </th>
                                    <th> Action </th>
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
        $(function() {
            var table = $('#application-table').DataTable({
                processing: true,
                serverSide: true,
                "aaSorting": [[0, 'desc']],
                ajax: '{!! route('datatables.data') !!}',
                columns: [
                { data: 'idapplication', name: 'applications.idapplication' },
                { data: 'ref', name: 'applications.ref' },
                { data: 'name' , name:'users.name'},
                { data: 'email' , name:'users.email'},
                { data: 'applicationType', name: 'applications.applicationType' },
                { data: 'applicationStatus', name: 'applications.applicationStatus' },
                { data: 'created_at', name: 'applications.created_at' },
                { data: 'updated_at', name: 'applications.updated_at' },
                { data: 'action' , name: 'action'}
                ],

                columnDefs: [ 

                    {
                        targets : [5],
                        render : function (data, type, row) {
                            switch(data) {
                                case'1' : return 'New' ; break ;
                                case '2' : return 'Viewed' ; break ;
                                case '3' : return 'In Process' ; break ;
                                case '4' : return 'Completed' ; break ;
                                case '5' : return 'Require Contractor Attention' ; break ;
                            }
                        }
                    } ,
                    {
                        targets : [8],
                        searchable:false 
                    }
                ]
            });


        });
    </script>

    @endpush
</div>