

  $(document).ready(function() {
    $('table#myTable').dataTable({
      'bFilter': false,
      'bInfo': false,
      'bPaginate': false,
    });
    $('#numberRows').val(count) ;
    currentLocation = window.location.href ;

    if (currentLocation.indexOf('new') !== -1 ) {
      // Add initial row
        var count = 0;
        addRow();
    }
    
  } );

  function addRow() {
    $('table#myTable').dataTable().fnAddData( [
      '<input type="text" name="employee_name_' + count + '">',
      '<input type="text" name="date_birth_' + count + '">',
      '<input type="text" name="country_birth_' + count + '">',
      '<input type="text" name="passport_cardnumber_' + count + '">',
      '<input type="text" name="ohs_card_' + count + '">',
      '<input type="text" name="asbestos_awareness_cert_' + count + '">',
      '<input type="text" name="trade_labourer_classification_' + count + '">',
    ]);
    $('#employees').append('<input type="hidden" value="'+count+'" name="employee_number_'+ count + '">')
    count++;
    $('#numberRows').val(count) ;

  }

  function deleteRow () {
    if (count != 1) {
        $("table#myTable").dataTable().fnDeleteRow(count - 1);

        count--;
        $('#numberRows').val(count) ;

    }
  }