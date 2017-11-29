@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <!-- Vertical Steps Example -->
    <div class="row">
        <div class="col-sm-12  "> 
            <div class="card-box">
                @include('pdf.header')
                <h4 class="m-t-0 header-title"><b> Audit Report </b></h4> <br/><br/>
                @if( strpos($_SERVER['REQUEST_URI'], 'update') || strpos( $_SERVER['REQUEST_URI'], '/view') )<br>
                <a  href="{{ url('admin/report/pdf/'.$Report->id) }}" target="_blank" class="btn btn-danger pull-right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF </a>
                @endif
                <form id="wizard-vertical"  enctype="multipart/form-data" method="POST">
                    @if(strpos($_SERVER['REQUEST_URI'], 'update'))
                    {{method_field('PUT')}}
                    @endif
                    
                    <!-- Csrf token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="idApplication" value="{{ $idApplication }}">
                     
                    @include('admin.reports.business-identification')
                    @include('admin.reports.section-status')
                    @include('admin.reports.fair-work')
                    @include('admin.reports.employees-details') 
                    @include('admin.reports.subcontractors')
                    @include('admin.reports.report-compliance-finding')
                    @include('admin.reports.signature')
                    @include('pdf.footer')
                </form>
                <!-- End #wizard-vertical -->    
            </div>
        </div>
    </div>  
</div>
@endsection
@push('scripts')
    <script type="text/javascript" src=" {{asset('js/search-client.js')}} "></script>
    <script type="text/javascript" src=" {{asset('js/companyname-report.js')}} "></script>
@endpush