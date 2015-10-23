<?php
$form_attributes = array('id' => 'physical_stock_fm');
echo form_open('',$form_attributes);?>
<div id="physical_stock">
<table class="table">
	<thead>
		<th style="width:12%;" class="small" align="center">Vaccine/Diluents</th>
                                                       
							<th style="width:9%;" class="small">Batch Number</th>
							<th style="width:15%;" class="small">Expiry Date</th>
							<th style="width:16%;" class="small">Available Quantity</th>
							<th style="width:15%;" class="small"> Physical Count</th>
                                                        <th style="width:9%;" class="small">Date Of Count</th>
							<th style="width:12%;" class="small">Action</th>
							
							
	</thead>
	<tbody>
		
             	<tr physical_row="1">
             	<input type="hidden" name ="transaction_type" class="transaction_type" value="2">
               
			     <td> <select name="vaccine" class="col-xs-15 vaccine" id="vaccine">
		                 <option value="">--Select One--</option>
		                 <?php foreach ($vaccines as $vaccine) { 
		                     echo "<option value='".$vaccine['ID']."'>".$vaccine['Vaccine_name']."</option>";
		                     }?>
                </select></td>
               
             		<td> <select name="batch_no" class="col-xs-15 batch_no" id="batch_no">
             		<td><?php $data=array('name' => 'expiry_date','id'=> 'expiry_date','class'=>'col-xs-14 expiry_date'); echo form_input($data);?></td>
             		 <style type="text/css">
		                input[id="available_quantity"]{
		                 background-color: #E0F2F7 !important }</style>
             		<td><?php $data=array('name' => 'available_quantity','id'=> 'available_quantity','class'=>'col-xs-12 available_quantity' ); echo form_input($data);?></td>
             		<td><?php $data=array('name' => 'physical_count','id'=>'physical_count' ,'class'=>'col-xs-12 physical_count'); echo form_input($data);?></td>
             		 <td><?php $data=array('name' => 'date_count','id'=> 'date_count','class'=>'col-xs-14 date_count','type'=>'date'); echo form_input($data);?></td>
             		<td class="col-xs-12 small "><a href="#" class="add"> Add </a><span class="divider"> | </span><a href="#" class="remove">Remove</a></td>
               
                
             	</tr>
             	
	</tbody>
</table>
</div>
<input type="submit" name="physical_count_fm" id="physical_count_fm" value="Submit">

<?php echo form_close();?>

<script src="<?php echo base_url();?>assets/js/stock/physical.js"></script>