<h3> 
    Employees Details
</h3>
<section>
    <h3> 
        Employees Details
    </h3>
   
    <div id="controlButtons">
        <button class="btn btn-primary btn-xs" type="button" onclick="addRowReportEmployee();"> <i class="fa fa-plus-square"> </i> Add more</button>
        
    </div><br/>
    <div class="inputs-table" > 
        <input type="hidden" name="numberRows" id="numberRows">
        <table  class="table-hover" id="myTable">
            <thead >
                <tr >
                    <th>Employee Name</th>
                    <th>Super</th>
                    <th>LSBL </th>
                    <th>Redundancy</th>
                    <th>Top Up Insurance</th>
                    <th>OHS Card Numbers</th>
                    <th>Asbestos</th>
                    <th>Proof of Aust Citizenship</th>
                </tr>
                
                

            </thead>
            <?php /* Passing number of employees to javascript employees details to initialize count to the real number of employees instead of 0 , go public/js/employees-details for more informations */$countEmployees = 0 ?>
            <tbody id="employees">
               @if(strpos($_SERVER['REQUEST_URI'] , '/new') == false)
               @foreach($employeesDetails as $employee)
               
               <tr>
                <td>
                    <input type="text" name="employee_name_{{$countEmployees}}" value="{{ $employee['employeeName'] }}">
                </td>
                <td>
                    <input type="text" name="super_{{$countEmployees}}" value="{{ $employee['super'] }}">
                </td>
                <td>
                    <input type="text" name="lsbl_{{$countEmployees}}" value="{{ $employee['lsbl'] }}">
                </td>
                <td>
                    <input type="text" name="redundancy_{{$countEmployees}}" value="{{ $employee['redundancy'] }}">
                </td>
                <td>
                    <input type="text" name="top_insurance{{$countEmployees}}" value="{{ $employee['topUpInsurance'] }}">
                </td>
                 <td>
                    <input type="text" name="ohs_{{$countEmployees}}" value="{{ $employee['ohsCard'] }}">
                </td>
                <td>
                    <input type="text" name="asbestos_{{$countEmployees}}" value="{{ $employee['asbestos'] }}">
                </td>
                <td>
                    <input type="file" name="proof_{{$countEmployees}}">
                </td>
               </tr>
               <?php $countEmployees++ ?>
               @endforeach
               @endif   
               <?php $numberRowsEmployees = $countEmployees ;
               
               ?>
               <script>
                var count = <?php echo json_encode($countEmployees); ?>;
               </script>
            </tbody>
        </table>
    </div>
</section> 