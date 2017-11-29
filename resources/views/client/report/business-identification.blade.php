<h3> 
    Business Identification
</h3>
<section>
    <h3> 
        Business Identification
    </h3>
    <button type="button" id="addClient" class="btn btn-default btn-xs"> Add More </button>
             
    <div id="clients">  
      @if(Request::segment(3) == 'new')
      <input type="hidden"  name="numClient" value="1">      
      <div class="form-group clearfix" >
          
          <label class="col-lg-2 control-label " > Client 1 </label>
          <div class="col-lg-10">
              <input type="hidden" name="num_1" value="1">
              <input id="client_1"  name="client_1" type="text" class="form-control">
              <div id="clientList_1">
                  
              </div> 
          </div>
      </div>
      @else
      <input type="hidden"  name="numClient" value="{{$numClients}}"> 
      <input type="hidden"  name="numClientInitial" value="{{$numClients}}">        
      @foreach($clients as $key => $client)
      <div class="form-group clearfix" >
          
          <label class="col-lg-2 control-label " > Client {{++$key}} </label>
          <div class="col-lg-10">
              <input type="hidden" name="num_{{$key}}" value=" {{$key}} ">
              <input id="client_{{$key}}"  name="client_{{$key}}" type="text" value="{{ $client->companyName}}" class="form-control" readonly>
              <div id="clientList_{{$key}}">
                  
              </div> 
          </div>
      </div>
      @endforeach
      @endif
    </div>
    <div class="form-group clearfix">
        <label class="col-lg-2 control-label " for="address"> Address </label>
        <div class="col-lg-10">
            <input id="address" name="address" type="text" value="{{ $businessIdentification['address'] }}" class=" form-control">
        </div>
    </div>
    
    <div class="form-group clearfix">
        <label class="col-lg-2 control-label " for="project"> Project </label>
        <div class="col-lg-10">
            <input id="project" name="project" type="text" value="{{ $businessIdentification['project'] }}"  class=" form-control">
        </div>
    </div>
    
    <div class="form-group clearfix">
        <label class="col-lg-2 control-label " for="businessName">Registered Business Name </label>
        <div class="col-lg-10">
        <input class="form-control " id="businessName" value="{{ $businessIdentification['businessName'] }}" name="businessName" type="text"  >
        </div>
    </div>
    
    <div class="form-group clearfix">
        <label class="col-lg-2 control-label " for="contactPerson"> Contact Person </label>
        <div class="col-lg-10">
            <input id="contactPerson" name="contactPerson" value="{{ $businessIdentification['contactPerson'] }}" type="text"  class=" form-control">
        </div>
    </div>
    
    <div class="form-group clearfix">
        <label class="col-lg-2 control-label " for="phone"> Phone </label>
        <div class="col-lg-10">
            <input id="confirm1" name="phone" type="text" value="{{ $businessIdentification['phone'] }}"  class=" form-control">
        </div>
    </div>

    <div class="form-group clearfix">
        <label class="col-lg-2 control-label " for="ABN"> ABN </label>
        <div class="col-lg-10">
            <input id="ABN" name="abn" type="text" value="{{ $businessIdentification['abn'] }}" class=" form-control">
        </div>
    </div>

    <div class="form-group clearfix">
        <label class="col-lg-2 control-label " for="email"> Email </label>
        <div class="col-lg-10">
            <input id="email" name="email"  type="email" value="{{ $businessIdentification['email'] }}" class=" form-control">
        </div>
    </div>

   

    <div class="form-group clearfix">
        <input type="hidden" id="dateExpiry"  value="{{ $businessIdentification['assessmentDate'] }}">
        <label class="col-lg-2 control-label " for="mobile"> Assessment Date </label>
        <div class="col-lg-10">
            <div class="row">
               <div class='col-md-12'>
                   <div class="form-group">
                       <div class='input-group date' id='datetimepicker1'>
                           <input type='text' placeholder="dd/mm/yyyy" name="assessmentDate"  class="form-control" />
                           <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                           </span>
                       </div>
                   </div>
               </div>
              
           </div> 
        </div>
                               
    </div>
    
    <div class="form-group clearfix">
        <input type="hidden" id="dateExpiryWorkers" value="{{ $businessIdentification['expiryDate'] }}">
        <label class="col-lg-2 control-label "> Expiry Date </label>
        <div class="col-lg-10">
            <div class="row">
               <div class='col-md-12'>
                   <div class="form-group">
                       <div class='input-group date' id='datetimepicker2'>
                           <input type='text' placeholder="dd/mm/yyyy" name="expiryDate"  class="form-control" />
                           <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                           </span>
                       </div>
                   </div>
               </div>
              
           </div> 
        </div>
                               
    </div>
    
</section>