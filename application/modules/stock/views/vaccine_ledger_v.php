
<table id="vaccine_ledger" class="display">
    <thead>
        <tr>
            <th>Vaccine/Diluents</th>
            <th>Origin/Destination</th>
            <th>Batch Number</th>
            <th>Transaction Date</th>
            <th>Stock Received</th>
            <th>Stock Issued</th>
            <th>Expiry Date</th>
            <th>VVM Status</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
      <tfoot>
        <tr>
            <th>Vaccine/Diluents</th>
            <th>Origin/Destination</th>
            <th>Batch Number</th>
            <th>Transaction Date</th>
            <th>Stock Received</th>
            <th>Stock Issued</th>
            <th>Expiry Date</th>
            <th>VVM Status</th>
        </tr>
    </tfoot>
</table>


<script type="text/javascript">
$(document).ready(function() {
	$('#example').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "../examples_support/server_processing_post.php",
		"fnServerData": function ( sSource, aoData, fnCallback ) {
			$.ajax( {
				"dataType": 'json', 
				"type": "POST", 
				"url": sSource, 
				"data": aoData, 
				"success": fnCallback
			} );
		}
	} );
} );


$(document).ready(function() {
      table = $('#vaccine_ledger').DataTable({ 
        
        
        "responsive": true,
         "order":[],
         "pagingType":"full_numbers",
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "dom": 'Bfrtip',
        "buttons": [
            'excel', 'pdf'
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('stock/c_vaccine_ledger/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });


</script>

