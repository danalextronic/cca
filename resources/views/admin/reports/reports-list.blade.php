@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-border panel-success">
                <div class="panel-heading">
                <h3 class="panel-title">List of reports <a href="/admin/report/new" class="btn btn-primary btn-xs"> Add new </a> </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive" >
                        <table  class="table  table-bordered" id="reports" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width="70%">Company Name</th>
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
        $('#reports').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "/api/reports",
            "columns":[
                {data: 'id'},
                {data: 'businessName'},
                {data: 'action',name: 'action'}
            ]
           
        } );
    } );
</script>
@endpush
</div>