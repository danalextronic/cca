<h3> Contractor Compliance Findings </h3>
<section>
    <h3> Contractor Compliance Findings </h3>
    <div class="form-group clearfix">
        <label class="col-lg-2 control-label " for="businessStructure"> Business Structure </label>
        <div class="col-lg-10">
            <input id="businessStructure" name="businessStructure" type="text" value="{{ $businessStructure}}" class=" form-control">
        </div>
    </div>
    <?php $i=1; ?>
    @foreach($sections as $section)
    <div class="form-group clearfix">
        <label class="col-lg-2 control-label " for="sectionValue_{{$i}}">  {{$section['sectionName']}}  </label>
        <div class="col-lg-10">
            <input id="sectionValue_{{$i}}" name="sectionValue_{{$i}}" value=" {{$sectionValue[$i]}} " type="text" class=" form-control">
        </div>
    </div>
    <?php $i++; ?>
    @endforeach
    <div class="table-responsive" >
        <table  class="table table-bordered">
            <thead>
             <tr>
               <th> Fair Work Principles </th>
               <th > Y/N </th>
               <th> Comments </th>
           </tr>
       </thead>
       <tbody>
         <tr>
            
            <td> 
                Has the Contractor had any adverse court or tribunal decision for breach of workplace relations law, occupational health and safety laws, or worker’s compensation in the last two years? 
            </td>
            <td> 
             <label class="radio-inline">
                <input type="radio" name="adverseTribunalDecisionCheck" value="1" @if($reportFairWork['adverseTribunalDecisionCheck'] == 1) checked @endif >Yes
            </label><br/>
            <label class="radio-inline">
                <input type="radio" name="adverseTribunalDecisionCheck" value="0" @if($reportFairWork['adverseTribunalDecisionCheck'] != 1) checked @endif>No
            </label>
        </td>
        <td>
            <textarea name="commentAdverseTribunalDecision" id="" cols="15" rows="2">{{$reportFairWork['commentAdverseTribunalDecision'] }}</textarea>
            
        </td>
    </tr>
    <tr>
        <td>
            Is the Contractor fully complying with the court or tribunal decision?
        </td>
        <td> 
         <label class="radio-inline">
            <input type="radio" name="fullyComplyingTribunalCheck" value="1" @if($reportFairWork['fullyComplyingTribunalCheck'] == 1) checked @endif >Yes
        </label><br/>
        <label class="radio-inline">
            <input type="radio" name="fullyComplyingTribunalCheck" value="0" @if($reportFairWork['fullyComplyingTribunalCheck'] != 1) checked @endif> No
        </label>
    </td>
    <td>
        <textarea name="commentFullyComplyingTribunal" id="" cols="15" rows="2">{{$reportFairWork['commentFullyComplyingTribunal'] }}</textarea>
    </td>
</tr>                                  
</tbody>


</table>
</div>
</section>