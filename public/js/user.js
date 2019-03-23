$( function() {
    if($('#lista-de-usuarios').length){
        $('#lista-de-usuarios').DataTable();
    }
    if($('#form-user').length){
        $( "#born_date" ).datepicker();
        $( "#entry_date" ).datepicker();
        $('#form-user').validate();
    }


  } );