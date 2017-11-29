<!DOCTYPE html>
<html>
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">  <title>Remote file for Bootstrap Modal</title>  
</head>
<body>
    
    <form id="editClient" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{method_field('PUT')}}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Client</h4>
        </div>
        <div class="modal-body">
                 <input type="hidden" name="idClient" value="{{ $client->id }}">  
                <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="username">Username</label>
                    <div class="col-lg-10">
                        <input class="form-control " id="username" name="username" type="text" value="{{ $client->username }}" >
                    </div>
                </div>
                 <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="companyName">Company Name</label>
                    <div class="col-lg-10">
                        <input class="form-control " id="companyName" name="companyName" type="text" value="{{ $client->companyName }}">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="password">New Password</label>
                    <div class="col-lg-10">
                        <input class="form-control " id="password"  name="password" type="password"  >
                       
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="passwordConfirmation">Confirm Password</label>
                    <div class="col-lg-10">
                        <input class="form-control " id="passwordConfirmation"  name="passwordConfirmation" type="password"  >
                       
                    </div>
                </div>
               

        </div>
        <div class="modal-footer"><br/>
           <input type="submit" class="btn btn-success" value="update" >
           
        </div>
    </form>
   
</body>
 
 <script type="text/javascript" src=" {{asset('js/edit-client.js')}} "></script>
</html>

