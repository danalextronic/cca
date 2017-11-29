$(document).ready(function() {
 var currentLocation =  window.location.href ;
 $('input[type=file]').removeAttr('required').removeClass('required');

  // for add new application remove all values because add new and show and update have the same views
  

  if (currentLocation.indexOf('view') !== -1 ) {
  	$('input').attr('readonly', 'readonly');
  	$('textarea').attr('readonly', 'readonly');
    $('input').removeAttr('required').removeClass('required');
  }
  else if (currentLocation.indexOf('new') !== -1 ) {
  	$('input[type=text]').removeAttr('value');
  	$('input[type=date]').removeAttr('value');
  	$('input[type=radio]').removeAttr('checked');
  }	
  

  	
} );