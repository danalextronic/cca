
@extends('layouts.app')

@section('content')
<div class="container">
    
    <!-- List all applications of contractor -->
    <div class="row">
        <div class="table-responsive" >
            <table  class="table  table-bordered" id="application-table">
                <thead>
                    <tr>
                        <th>Application Number</th>
                        <th >Application State</th>
                        <th >Application Status</th>
                        <th > Created At</th>
                        <th> Updated At </th>
                        <th > View/Edit </th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
   
    @endsection
    @push('scripts')

        <script type="text/javascript">
            $(function() {
                $('#application-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('applications.data') !!}',
                    columns: [
                        { data: 'applicationNumber', name: 'applicationNumber' },
                        { data: 'applicationType', name: 'applicationType' },
                        { data: 'applicationStatus', name: 'applicationStatus' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'updated_at', name: 'updated_at' }
                    ]
                });
            });
        </script>

    @endpush
