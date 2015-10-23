
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