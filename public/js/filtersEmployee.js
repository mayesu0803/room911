var minDate, maxDate;
 
    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[5] );
            console.log(date);
     
            if (
                ( min === null && max === null ) ||
                ( min <= date  && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date  && date <= max )
            ) {
               console.log(( min <= date   && date <= max ));
                return true;
            }
            return false;
        }
    );
    $(document).ready(function() {
    new DateTime(document.getElementById('test'), {
        buttons: {
            today: true,
            clear: true
        }
    });
});
    $(document).ready(function () {
      
      minDate = new DateTime($('#min'), {
            buttons: {
            clear: true
        },
            format: 'MMMM Do YYYY'
        });
      maxDate = new DateTime($('#max'), {
        buttons: {
            clear: true
        },
            format: 'MMMM Do YYYY'
        });
     
        // DataTables initialisation
      var table = $('#datatable').DataTable({
      initComplete: function () {
      this.api().columns().every( function () {
          var column = this;
          var select = $('<select><option value="">All</option></select>')
              .appendTo( $(column.footer()))

              .on( 'change', function () {

                  var val = $.fn.dataTable.util.escapeRegex(
                      $(this).val()
                  );
                  column
                      .search( val ? '^'+val+'$' : '', true, false )
                      .draw();
              } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );

            } );
            }
        });
      $('#min, #max').on('change', function () {
      table.draw();
      });

    });