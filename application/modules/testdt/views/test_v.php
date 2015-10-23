
<html>
<head>
    <title></title>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.js"></script>



</head>
<body>


<table id="example" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Office</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
      <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Office</th>
        </tr>
    </tfoot>
</table>

</body>
</html>

<script type="text/javascript">
/*    $(document).ready( function () {
    $('#table_id').DataTable();
} );*/


    function Employee ( name, position, salary, office ) {
    this.name = name;
    this.position = position;
    this.salary = salary;
    this._office = office;
 
   /* this.office = function () {
        return this._office;
    }*/
};
 
$('#example').DataTable( {
    data: [
        new Employee( "Tiger Nixon", "System Architect", "$3,120", "Edinburgh" ),
        new Employee( "Garrett Winters", "Director", "$5,300", "Edinburgh" )
    ],
    columns: [
        { data: 'name' },
        { data: 'position' },
        { data: 'salary' },
        { data: '_office' }
        
    ]
} );


</script>