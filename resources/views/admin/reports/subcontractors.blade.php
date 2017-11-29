<h3> 
    SubContractors Details
</h3>
<section>
    <h3> 
        SubContractors Details
    </h3>
    @if(strpos($_SERVER['REQUEST_URI'] , 'pdf') !== false)
    <?php $i = 1 ; ?>
    @foreach($subcontractors as $subcontractor)
    <div class="row">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="panel-title">Subcontractor no {{ $i }}</h3>
                </div>

                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">
                        Contractor Name : {{ $subcontractor['subContractorName'] }}
                    </li>
                    <li class="list-group-item">
                       ABN : {{ $subcontractor['ABN'] }}
                    </li>
                    <li class="list-group-item">
                        Business Structure :  {{ $subcontractor['businessStructure'] }}
                    </li>
                    <li class="list-group-item">
                        IRE Certificate :  {{ $subcontractor['IRECertificate'] }}
                    </li>
                    <li class="list-group-item">
                       CCA Report : {{ $subcontractor['ccaReport'] }}
                    </li>
                    <li class="list-group-item">
                        Insurance : {{ $subcontractor['insurance'] }}
                    </li>
                    <li class="list-group-item">
                        Type : {{ $subcontractor['type'] }}
                    </li>

                    
                </ul>
            </div>
        </div>
    </div>
    <?php $i++ ; ?>
    @endforeach
    @else
    <div id="controlButtons">
        <button class="btn btn-primary btn-xs" type="button" onclick="addRowReportSubContractor();"> <i class="fa fa-plus-square"> </i> Add more</button>
        
    </div><br/>
    <div class="inputs-table" > 
        <input type="hidden" name="numberRowsSub" id="numberRowsSub">
        <table  class="table-hover" id="myTableSub">
            <thead >
                <tr >
                    <th>Contractor Name</th>
                    <th>ABN</th>
                    <th>Business Structure </th>
                    <th>IRE Certificate</th>
                    <th>CCA Report</th>
                    <th>Insurance</th>
                    <th>Type</th>
                </tr>
                
                

            </thead>
            <?php /* Passing number of employees to javascript employees details to initialize count to the real number of employees instead of 0 , go public/js/employees-details for more informations */$countSubContractors = 0 ?>
            <tbody id="employees">
               @if(strpos($_SERVER['REQUEST_URI'] , '/new') == false)
               @foreach($subcontractors as $subcontractor)
               
               <tr>
                <td>
                    <input type="text" name="subcontractor_name_{{$countSubContractors}}" value="{{ $subcontractor['subContractorName'] }}">
                </td>
                <td>
                    <input type="text" name="subcontractor_abn_{{$countSubContractors}}" value="{{ $subcontractor['ABN'] }}">
                </td>
                <td>
                    <input type="text" name="subcontractor_businessStructure_{{$countSubContractors}}" value="{{ $subcontractor['businessStructure'] }}">
                </td>
                <td>
                    <input type="text" name="subcontractor_IRECertificate_{{$countSubContractors}}" value="{{ $subcontractor['IRECertificate'] }}">
                </td>
                <td>
                    <input type="text" name="ccaReport_{{$countSubContractors}}" value="{{ $subcontractor['ccaReport'] }}">
                </td>
                 <td>
                    <input type="text" name="insurance_{{$countSubContractors}}" value="{{ $subcontractor['insurance'] }}">
                </td>
                <td>
                    <select name="type_{{ $countSubContractors }}">
                      <option value="L" @if($subcontractor['type'] == 'L') selected @endif> Labour Hire </option>
                      <option value="C" @if($subcontractor['type'] == 'C') selected @endif> Contractor </option>
                      <option value="A" @if($subcontractor['type'] == 'A') selected @endif> Associated Entity </option>
                    </select> 
                </td>
                
               </tr>
               <?php $countSubContractors++ ?>
               @endforeach
               @endif   
               <script>
                var countSub = <?php echo json_encode($countSubContractors); ?>;
               </script>
            </tbody>
        </table>
    </div>
    @endif
</section> 