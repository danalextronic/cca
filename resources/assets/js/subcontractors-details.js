var countSub = 0;
var currentLocation = window.location.href ;
if (currentLocation.indexOf('update') !== -1 ) {
  var countSub = '<?php echo $countSub ;?>';
}
  $(document).ready(function() {
    $('table#myTableSub').dataTable({
      'bFilter': false,
      'bInfo': false,
      'bPaginate': false,
    });

    // Add initial row
    addRowSub();
  } );

  function addRowSub() {
    $('table#myTableSub').dataTable().fnAddData( [
      '<input type="text" name="subcontractor_details_' + countSub + '">',
      '<input type="text" name="contact_name_' + countSub + '">',
      '<input type="text" name="abn_' + countSub + '">',
      '<input type="text" name="email_adress_' + countSub + '">',
      '<input type="text" name="phone_number_' + countSub + '">',
      
    ]);
    countSub++;
    $('#numberRowsSub').val(countSub) ;
  }

  function deleteRowSub () {
    if (countSub != 1) {
        $("table#myTableSub").dataTable().fnDeleteRow(countSub - 1);

        countSub--;
    }
  }