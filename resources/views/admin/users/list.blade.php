@extends('layouts.app')

@section('content')
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-border panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">  Contractors </h3>
        </div>
        <div class="panel-body"> 
          <div class="table-responsive" >
            <table  class="table  table-striped">
               <thead>
                 <tr>
                   <th > First Name </th>
                   <th > Last Name </th>
                   <th > Email </th>
                   <th > Company </th>
                   <th > Contact Number </th>
                   <th > Status </th>
                   <th> Last Login </th>
                   <th> Action </th>

                 </tr>
               </thead>
               <tbody>
                 @foreach($contractors as $contractor)
                 <tr>
                  <td> {{$contractor['name']}} </td>
                  <td> {{$contractor['contractorLastname']}} </td>
                  <td> {{$contractor['email']}} </td>
                  <td> {{$contractor['contractorCompany']}} </td>
                  <td> {{$contractor['contractorContactNumber']}} </td>
                  <td> {{$contractor['contractorStatus']}} </td>
                  <td> {{$contractor['contractorLastLogin']}} </td>
                  <td><a href="#" data-toggle="modal" data-target="#edit-contractor{{$contractor['id']}}" class="btn btn-primary btn-xs"> <i class="fa fa-pencil"> </i> Edit </a></td>
                </tr>
                <form method="POST" class="form-inline" role="form">
                  {{method_field('put')}}
                  <!-- Modal  choosing the state they come from -->
                  <div id="edit-contractor{{$contractor['id']}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog"> 
                      <div class="modal-content"> 
                        <div class="modal-header"> 
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                          <h4 class="modal-title"> Contractor Status </h4> 
                        </div> 
                        <div class="modal-body"> 

                          <div class="row"> 
                            <div class="col-md-12"> 

                              <!-- Form CSRF Tokens  -->
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="idContractor" value="{{$contractor['id']}}">
                              <div class="form-group">
                                <label >Please choose the new status </label>

                              </div>
                              <!-- Select box -->
                              <label class="radio-inline">
                                <input type="radio" name="status" value="active">Active
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="status" value="inactive">Inactive
                              </label>
                            </div> 
                          </div> 

                        </div>

                        <div class="modal-footer"> 
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                          <button type="submit" class="btn btn-primary waves-effect waves-light"> Submit </button> 
                        </div> 
                      </div> 
                    </div>
                  </div><!-- /.modal -->
                </form>
                @endforeach
              </tbody>


            </table>
          </div>
      </div>
    </div>

  </div>
</div>
</div>


@endsection
