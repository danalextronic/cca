<h3> Business Structure </h3>
<section>
	<h3> Business Structure </h3>
	<p> Please tick which is appropriate to your business: </p>
	<div class="form-group clearfix">
			<label class="radio-inline"><input type="radio" name="structureName" value="Company" @if($arrays["AppBusinessStructure"][0]['structureName'] == "Company") checked @endif >Company(Pty Ltd)</label>
			<label class="radio-inline"><input type="radio" name="structureName" value="Sole Trader" @if($arrays["AppBusinessStructure"][0]['structureName'] == "Sole Trader") checked @endif>Sole Trader</label>
			<label class="radio-inline"><input type="radio" name="structureName" value="Partnership" @if($arrays["AppBusinessStructure"][0]['structureName'] == "Partnership") checked @endif> Partnership</label>
			<label class="radio-inline"><input type="radio" name="structureName" value="Trust" @if($arrays["AppBusinessStructure"][0]['structureName'] == "Trust") checked @endif> Trust </label>
		<div class="row">	
			<div class="col-lg-4">	
				<label  class="radio-inline"> <input type="radio" id="otherBusinessStructure" name="structureName" value="other" @if($arrays["AppBusinessStructure"][0]['structureName'] == "other") checked @endif> Other ( Please explain ) </label>	
			</div>

			<div class="col-lg-8" >
				<input id="moreInput" @if($arrays["AppBusinessStructure"][0]['structureName'] != "other") style="display:none" @endif name="more" type="text" class="form-control" value="{{ $arrays["AppBusinessStructure"][0]['more'] }}">
			</div>
		</div>
	</div>
	
	

	
	
</section>