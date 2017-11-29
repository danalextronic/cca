<h3> Sections Status </h3>
<section>
    <h3> Section Status </h3>
    <div class="table-responsive" >
        <table class="table table-bordered">
            <thead>
               <tr>
                 <th > Required </th>
                 <th > Status </th>
               </tr>
            </thead>
            <tbody>
               <?php $i=1; ?>
               @foreach($sections as $section)
               @if($i==13)
                  <tr>
                       
                       <td> Employee Agreement Type </td>
                       <td> 
                           <select class="selectEmpl" name="employeeAgreementType">
                               <option>
                                   
                               </option>
                               <option   @if($businessIdentification['employeeAgreementType'] == 'Modern Award NES') selected @endif value="Modern Award NES">
                                   Modern Award NES
                               </option>
                               <option @if($businessIdentification['employeeAgreementType'] == 'BC2013') selected @endif value="BC2013">
                                   BC2013
                               </option>
                               <option @if($businessIdentification['employeeAgreementType'] == 'BC2016') selected @endif value="BC2016">
                                   BC2016
                               </option>
                              
                           </select>
                       </td>
                  
                   </tr>
               @endif
               <tr>
                    
                    <td> {{$section['sectionName']}} </td>
                    <td> 
                        <select name="sectionStatus_{{$i}}">
                            <option>
                                
                            </option>
                            <option value="C" @if($sectionStatus[$i] == 'C') selected @endif>
                                Compliant
                            </option>
                            <option value="P" @if($sectionStatus[$i] == 'P') selected @endif>
                                Pending
                            </option>
                            <option value="NC" @if($sectionStatus[$i] == 'NC') selected @endif>
                                Non-Compliant
                            </option>
                            <option value="NR" @if($sectionStatus[$i] == 'NR') selected @endif>
                                Not Required
                            </option>
                            <option value="RSD" @if($sectionStatus[$i] == 'RSD') selected @endif>
                                Refused to supply docs
                            </option>
                        </select>
                    </td>
      
                </tr>
                <?php $i++; ?>
              @endforeach
            </tbody>


         </table>
    </div>
</section>  