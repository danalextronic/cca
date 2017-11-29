<h3> Signature </h3>
<section>
    <h3> Signature </h3>
    
    @if(Request::segment(3) !== "new" ) 
		<div class="signature">
			@if($Report->signature == "1")
				<img src="/img/signature.png" />
				<span> Chayne Neighboor </span>
			@elseif($Report->signature == "2")
				<img src="/img/signature1.png" />
				<span> Anne McGregor </span>
			@elseif($Report->signature == "3")
				<img src="/img/signature2.png" />
				<span> Glen Neighbour </span>
			@endif
		</div>
		
	@else
		<div class="signature">
			<input  type="radio" name="signature" value="1"><img src="/img/signature.png" required/> <span> Chayne Neighboor </span>
			<input type="radio" name="signature" value="2"><img src="/img/signature1.png" /> <span> Anne McGregor </span>
			<input type="radio" name="signature" value="3"><img src="/img/signature2.png" /> <span> Glen Neighbour </span>
		</div>	
			
    @endif
</section>