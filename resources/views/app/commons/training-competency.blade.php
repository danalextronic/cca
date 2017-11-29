<h3> Training And Competency Register </h3>
<section>
	<h3>Training And Competency Register </h3>
	
	<div class="form-group clearfix">		
		
		@if(strpos($_SERVER['REQUEST_URI'] , 'pdf') == false)	
			<p>
				Please supply your training and competency register, listing all the licences, certificates and other
				relevant qualifications all the business working directors and employees hold, e.g..
				<ul>
					<li> All licences to operate plant & equipment </li>
					<li> First Aid Certificate </li>
					<li> Trade specific licences </li>
					<li> Manual Handling </li>
					<li> Working at Heights </li>
					<p> Or Provide copies of cards/certificates </p>
				</ul>
				
			</p>
			@if(strpos($_SERVER['REQUEST_URI'] , 'new') == false)
				@if($arrays["AppTrainingAndCompetency"][0]['trainingAndCompetencyCopy'] !== null )	
				<strong class="text-danger"> Already uploaded , Please upload again if you have some changes </strong>
				<a  href= "{{ route('getFile',['filename' =>  'trainingAndCompetencyCopy', 'idContractor' => $arrays['application'][0]['contractors_idcontractors'] ,'idApplication' => $arrays['application'][0]['idapplication'] , 'date' => date('y-m-d',strtotime($arrays['application'][0]['updated_at'])) ] ) }}" > 
					 View
		     	</a>
				<br/>
				@endif
			@endif
		@endif		

		<input class="col-lg-6 filestyle "  name="trainingAndCompetencyCopy"  type="file" data-buttonname="btn-white">	
	</div>
	
</section>