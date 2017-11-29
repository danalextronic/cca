@extends('layouts.app')
@section('content')
@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') !== false)
    <style type="text/css">
        tr {
            height:20px;
        }
    </style>
@endif
<div class="container form-body">
  
    <!-- Vertical Steps Example -->
 
    <div class="row">
        <div class="col-sm-12  "> 
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b> Audit Report </b></h4><a href="{{ url('client/report/pdf/'.Auth::guard('client')->user()->id.'/'.$id) }}" target="_blank" class="btn btn-danger pull-right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF </a> <br/><br/>
                
                <form id="wizard-vertical"  enctype="multipart/form-data" method="POST">
                    @if(strpos($_SERVER['REQUEST_URI'], 'update'))
                    {{method_field('PUT')}}
                    @endif
                   
                    <!-- Csrf token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="idApplication" value="{{ $idApplication }}">
                     
                    @include('client.report.business-identification')
                    @include('client.report.section-status')
                    @include('client.report.fair-work')
                    @include('client.report.employees-details') 
                    @include('client.report.subcontractors')  
                    @include ('client.report.compliance-finding')    
                </form>
                <!-- End #wizard-vertical -->    
            </div>
        </div>
    </div>  
</div>
@endsection
@push('scripts')
    <script type="text/javascript" src=" {{asset('js/search-client.js')}} "></script>
@endpush