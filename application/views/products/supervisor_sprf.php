<?php $this->load->view('header.php');
//echo '<h1>sanaullah_'.$this->session->userdata('userrole').'</h1><br>'.$this->session->userdata('territory').'<br>';
if($this->session->userdata('userrole')=='Supervisor')
{
	  $query="select `fk_office_id` from tbl_complaints where `pk_complaint_id` ='".$this->uri->segment(3)."'
	  AND `complaint_nature`='complaint'";
	  $query_db=$this->db->query($query);
	  $user_complaints=$query_db->result_array();	
	  //echo $user_complaints[0]['fk_office_id'];exit;		
	  if ($user_complaints[0]['fk_office_id'] != $this->session->userdata('territory'))
	  {
		  show_404();
	  }
}
?>
<h3 class="page-title"> Spare Parts Requisition Form <small>form layouts</small> </h3>

      <div class="page-bar">

        <ul class="page-breadcrumb">

          <li> <i class="fa fa-home"></i> Home <i class="fa fa-angle-right"></i> </li>

          <li> SPRF <i class="fa fa-angle-right"></i> </li>

        </ul>

        <div class="page-toolbar">

          

        </div>

      </div>

      <!-- END PAGE HEADER--> 

      <!-- BEGIN PAGE CONTENT-->

      <div class="row">

        <div class="col-md-12">

          <div class="tabbable tabbable-custom boxless tabbable-reversed">

            <ul class="nav nav-tabs">

              <li class="active"> <a href="#tab_0" data-toggle="tab"> SPRF </a> </li>

            </ul>

            <div class="tab-content">

              <div class="tab-pane active" id="tab_0">

                <div class="portlet box green">

                  <div class="portlet-title">

                    <div class="caption"> <i class="fa fa-gift"></i>SPRF </div>

                    <div class="tools"> <a href="javascript:;" class="collapse"> </a>  <a href="javascript:;" class="remove"> </a> </div>

                  </div>
                  <?php
						$status_array	=	 array("Pending", "Pending (BB)", "Shifted", "SPRF Approved");
						$status			=	'';
						$sprf_count		=	0;
						$product_id		=	0; // will be defined later
						$office_id		=	$this->session->userdata('territory');
						$dbres 		= $this->db->query("SELECT * FROM tbl_complaints where pk_complaint_id = '".$this->uri->segment(3)."'");
						$dbresResult=$dbres->result_array();
						foreach ($dbresResult as $k ) {
							$ts_number				 = 	$k['ts_number'];
							$date 					 =	$k['date'];
							$caller_name 			 = 	$k['caller_name'];
							$customer 				 = 	$k['fk_customer_id'];
							$fk_city_id 			 = 	$k['fk_city_id'];
							$fk_instrument_id 		 = 	$k['fk_instrument_id'];
							$status					 =	$k['status'];
						}
						//$status="Pending SPRF";
						
						
				  ?>

                  <div class="portlet-body form form-horizontal"> 

                    <!-- BEGIN FORM-->


                      <div class="form-body">

                        <div class="form-group">

                          <label class="col-md-3 control-label">TS Number</label>

                          <div class="col-md-4">

                            <input type="text" class="form-control " value="<?php echo $ts_number;?>" readonly name="ts_number" >

                          </div>

                        </div>

                        <div class="form-group">

                          <label class="col-md-3 control-label">Date</label>

                          <div class="col-md-4">

                            <input type="text" class="form-control " name="spf_date" value="<?php echo date('d-M-Y', strtotime($date));?>" readonly >

                          </div>

                        </div>

                        <div class="form-group">

                          <label class="col-md-3 control-label">Assign TS Person <?php //echo $get_complaint_list[0]["assign_to"]?></label>

                          <div class="col-md-4">

                            <input type="text" class="form-control " value="<?php $ty=$this->db->query("select * from user where id='".$get_complaint_list[0]["assign_to"]."'");
							  if($ty->num_rows()>0)
								{
								  $rt=$ty->result_array();
								  echo $rt[0]["first_name"];
								}
							  //echo $get_complaint_list[0]["assign_to"];?>" readonly name="assign_ts_person" >
                              <input type="hidden" name="engineer_id" value="<?php $get_complaint_list[0]["assign_to"]?>" />

                          </div>

                        </div>

                        <div class="form-group">

                          <label class="col-md-3 control-label">Customer Name</label>

                          <div class="col-md-4">
						  <?php
                            	$we= $this->db->query("select * from tbl_clients where pk_client_id ='".$customer."'");
								$rt=$we->result_array();
							?>

                            <input type="text" class="form-control " value="<?php echo $rt[0]['client_name'];?>" readonly name="customer_name" >

                          </div>

                        </div>

                        <div class="form-group">

                          <label class="col-md-3 control-label">City</label>

                          <div class="col-md-4">

                            <?php
                            	$we= $this->db->query("select * from tbl_cities where pk_city_id ='".$fk_city_id."'");
								$rt=$we->result_array();
							?>
                            <input type="text" class="form-control " value="<?php echo $rt[0]['city_name'];?>" readonly name="city" >

                          </div>

                        </div>

                        <div class="form-group">

                          <label class="col-md-3 control-label">Equipment</label>

                          <div class="col-md-4">

                            <?php
                            	$we2= $this->db->query("select * from tbl_instruments where pk_instrument_id ='".$fk_instrument_id."'");
								$rt2=$we2->result_array();
								$product_id	=	$rt2[0]['fk_product_id']; //
								if($we2->num_rows()>0)
								{
									$query = $this->db->query("select * from tbl_products where pk_product_id ='".$rt2[0]['fk_product_id']."'");
									$query_results=$query->result_array();
								}
								
							?>
                            <input type="text" class="form-control " value="<?php if(isset($query_results[0]['product_name'])){echo $query_results[0]['product_name'];}?>" 
                            readonly name="instrument_model" >

                          </div>

                        </div>

                        <div class="form-group">

                          <label class="col-md-3 control-label">Equipment Serial #</label>

                          <div class="col-md-4">

                            <input type="text" class="form-control "  value="<?php if(isset($rt2[0]['serial_no'])){echo $rt2[0]['serial_no'];}?>" 
                            readonly name="insturment_serial_number" >

                          </div>

                        </div>
                        
                        <!-- button for Modal -->
						<?php
							if (in_array($status,$status_array)){ /*
						?>
                        <a href="#" id="sample_editable_1_new" class="btn green-seagreen" data-toggle="modal" data-target="#myModal" > 
                            Add Part
                            <i class="fa fa-plus"></i> 
                        </a>
						<?php
							*/}
						?>
                        
                        <!-- Modal Form Begin (z)-->
							<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Add Part</h4>
								  </div>
								  <div class="modal-body">
								  <!-- Modal from Metronics -->
								   <form action="<?php echo base_url();?>complaint/submit_sprf" class="form-horizontal" method="post">
                
									
				
                 
									<div class="form-group row">
									<label class="col-md-3 control-label">Part Number</label>
									<div class="col-md-9">
									 <select name="part[]"  type="text" class="form-control" onchange="get_des_and_unitprice(this.value);" required> 
                                        <option value="">---Select---</option>
                                        <?php
                                            $we= $this->db->query("select * from tbl_parts ");
                                            $rt=$we->result_array();
                                            foreach($rt as $option)
                                            {
                                        ?> 
                                            <option value="<?php echo $option['pk_part_id'];?>"><?php echo $option['part_number'];?></option>
                                        <?php }?>
                                    </select>
									</div>
									</div>
                                    
                                    <div class="form-group row">
									<label class="col-md-3 control-label">Image</label>
									<div class="col-md-3 part_image">
									<img src="<?php echo base_url().'usersimages/complaint_images/800px-No_Image_Wide.svg.png' ;?>" style="width:125px;" />
									</div>
									<label class="col-md-1 control-label">Qty</label>
									<div class="col-md-5 stock_quanties">
                                    <table class="table table-striped table-bordered table-hover flip-content">
                                        <tr>
                                         <?php 
                                          $query = $this->db->query("select * from tbl_offices");
                                          $result = $query->result_array();
                                          foreach($result as $office)
                                          {
                                        ?>
                                        <th><?php echo $office['office_code']?></th>
                                        <?php }?>
                                        </tr>
                                        
                                    </table>
									</div>
									</div>

									<div class="form-group row">
									<label class="col-md-3 control-label">Part Description</label>
									<div class="col-md-9">
									<textarea name="part_description[0]" class="form-control description"></textarea>
									</div>
									</div>

									<div class="form-group row">
									<label class="col-md-3 control-label">Required Quantity</label>
									<div class="col-md-9">
									<input   name="quantity[0]"  class="form-control quantity" id="quantity" type="text"  onKeyUp="dicountFunction()" required="required">
									</div>
									</div>
									
									<div class="form-group row">
									<label class="col-md-3 control-label">Unit Price</label>
									<div class="col-md-9">
									<input  name="unit_price[0]" class="form-control unit_price" id="unit_price" type="text" readonly required="required"> 
									</div>
									</div>

									<div class="form-group row">
									<label class="col-md-3 control-label">Total</label>
									<div class="col-md-9">
									<input name="Total[0]" class="form-control " type="text" id="totalprice"  readonly  required="required">
									</div>
									</div>
									
                                    
                                    <div class="form-group row">
									<label class="col-md-3 control-label">Purpose/Justification</label>
									<div class="col-md-9">
									<textarea class="form-control" name="purpose[0]" placeholder="Enter your Purpose" rows="3"></textarea>
									</div>
									</div>
                                    
                                    <div class="form-group row">
									<label class="col-md-3 control-label">Billing</label>
									<div class="col-md-9">
									<select id="problem_type" name="problem_type[0]" class="form-control" required>
                                        <option value="">--Choose--</option>
                                        <option value="Pending" >Pending</option>
                                        <option value="FOC" >FOC</option>
                                        <option value="Invoice" >Invoice</option>
                                    </select> 
									</div>
									</div>
                                    
                                    
                                    
                                   
                                    
									<input type="hidden" name="fk_complaint_id" value="<?php echo $this->uri->segment(3);?> ">
                    
                
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-offset-8 col-md-4">
                                                        <input type="hidden" name="complaint_id" value="<?php echo $this->uri->segment(3);?>" />
                                                        <button type="submit" class="btn green-seagreen" >
                                                        	Submit
                                                        </button>
                                            <!--            <button type="button" class="btn default" data-dismiss="modal">Cancel</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                        </div>
                                    </div>
            					</form>
								  <!-- Form End -->
						
								  </div>
								  
								</div>

							  </div>
							</div>
<form action="<?php echo base_url();?>complaint/submit_sprf_approve" class="form-horizontal" method="post">                        
                        
			<input type="hidden" name="engineer_id" value="<?php echo $get_complaint_list[0]["assign_to"]?>" />
            <input type="hidden" name="sprf_date" value="<?php echo date('Y-m-d', strtotime($date));?>" />
            
              <div class="portlet-body flip-scroll">
			
             <table class="table table-striped table-bordered table-hover flip-content" id="sample_20">

                <thead>

                  <tr>

                    <th> Part Number </th>

                    <th> Part Description </th>

                    <th> Required Quantity </th>

                    <th> Unit Price </th>

                    <th> Total </th>

                    <th> Purpose/Justification </th>
                    <th> Part Source </th>
                    <th> Stock Total 	</th>
					<?php 
                      $query = $this->db->query("select * from tbl_offices");
                      $result = $query->result_array();
                      foreach($result as $office)
                      {
                    ?>
                    <th><?php echo $office['office_code']?></th>
                    <?php }?>


                     <th> Billing </th>
                     <th> Image </th>
					 
                     <th> Actions </th>

                  </tr>

                </thead>

                <tbody class="append_tbody">

                  <?php  
						$we= $this->db->query("select * from tbl_sprf where `status`='0' AND fk_complaint_id='".$this->uri->segment(3)."' ");
						
						  $rt=$we->result_array();
						  $sprf_count	=	sizeof($rt);
						  $j	=	0;
						  foreach($rt as $sprf)
						  {
						 ?>
                          <tr class="odd gradeX" id="rowfirst">
        
                            <td> <!-- Part Number -->
                            <?php
							$ghq="select * from tbl_parts where pk_part_id='".$sprf['fk_part_id']."'";
							//echo $ghq;exit;
                            $we2	= 	$this->db->query($ghq);
						    $rt2	=	$we2->result_array();
							foreach ($rt2 as $part_data)
							{
								$part_number	=	$part_data['part_number'];
								$description	=	$part_data['description'];
								$unit_price		=	$part_data['unit_price'];
								$image 			=	$part_data['image'];
								$part_id		=	$part_data['pk_part_id'];
							}
							?>
                               <input type="hidden" name="part_hidden_id[<?php echo $sprf['pk_sprf_id'];?>]" value="<?php echo $part_id;?>" />
                               <input name="part[<?php echo $sprf['pk_sprf_id'];?>]" type="text" readonly="readonly" value="<?php echo $part_number;?>" class="form-control" style="display:none;" />
							   <?php echo $part_number;?>
                            </td>
        
                            <td> <!-- Part Description -->
                            <input name="part_description[<?php echo $sprf['pk_sprf_id'];?>]" class="form-control description" value="<?php echo urldecode($description);?>" type="text" readonly style="display:none;">
                             <?php echo urldecode($description);?>
							 </td>
        
                            <td> <!-- Quantity -->
							
							<select  name="quantity[<?php echo $sprf['pk_sprf_id'];?>]" class="form-control quantity" required>
                              <?php for ($i=1;$i<=$sprf['quantity']+5;$i++) {?>
                              <option value="<?php echo $i;?>" <?php if($sprf['quantity']==$i){ echo 'selected="selected"';}?>><?php echo $i; ?></option>
							  <?php } ?>
                          </select>
						  
						  <!-- Commenting this one and adding above code as they want to edit quantity before approval
							<input   name="quantity[<?php echo $sprf['pk_sprf_id'];?>]" value="<?php echo $sprf['quantity'];?>" class="form-control quantity"  type="text" readonly style="display:none;"> 
							<?php echo $sprf['quantity'];?>
							-->
							</td>
        
                            <td> <!-- Unit Price -->
							<input  name="unit_price[<?php echo $sprf['pk_sprf_id'];?>]" class="form-control unit_price"  type="text" value="<?php echo $unit_price;?>" readonly style="display:none;"> 
							<?php echo $unit_price;?>
							</td>
        
                            <td> <!-- Total -->
							<input name="Total[<?php echo $sprf['pk_sprf_id'];?>]" class="form-control " type="text" id="totalprice" value="<?php echo $sprf['total'];?>" readonly style="display:none;"> 
							<?php echo $sprf['total'];?>
							</td>
        
                            <td> <!-- Purpose/ Justification -->
							<input name="purpose[<?php echo $sprf['pk_sprf_id'];?>]" value="<?php echo urldecode($sprf['purpose']);?>" class="form-control " type="text" readonly style="display:none;"> 
							<?php echo urldecode($sprf['purpose']);?>
							</td>
                            
                            
                            
                             <?php // Selecting Clients List with same equipment and office
								$cq		= "SELECT tbl_clients.pk_client_id, tbl_clients.client_name, tbl_instruments.serial_no, tbl_instruments.pk_instrument_id "
										. "FROM tbl_clients "
										. "INNER JOIN tbl_instruments "
										. "ON tbl_clients.pk_client_id=tbl_instruments.fk_client_id " 
										. "WHERE tbl_instruments.fk_product_id='".$product_id."' AND tbl_instruments.fk_office_id='".$office_id."' AND tbl_clients.delete_status='0'
										   ORDER BY tbl_clients.client_name";
								////////////////// ABOVE is for Same territory of Equipment .. Below is All Pakistan .. Comment the below one if only territory clients to be shown
								$cq		= "SELECT tbl_clients.pk_client_id, tbl_clients.client_name, tbl_instruments.serial_no, tbl_instruments.pk_instrument_id "
										. "FROM tbl_clients "
										. "INNER JOIN tbl_instruments "
										. "ON tbl_clients.pk_client_id=tbl_instruments.fk_client_id " 
										. "WHERE tbl_instruments.fk_product_id='".$product_id."'  AND tbl_clients.delete_status='0'
										   ORDER BY tbl_clients.client_name";
										   
								if ($product_id == '11' || $product_id == '40' || $product_id == '41') {
									$cq		= "SELECT tbl_clients.pk_client_id, tbl_clients.client_name, tbl_instruments.serial_no, tbl_instruments.pk_instrument_id "
										. "FROM tbl_clients "
										. "INNER JOIN tbl_instruments "
										. "ON tbl_clients.pk_client_id=tbl_instruments.fk_client_id " 
										. "WHERE tbl_instruments.fk_product_id IN ('11','40','41')  AND tbl_clients.delete_status='0'
										   ORDER BY tbl_clients.client_name";
								}
								$cqr 	= $this->db->query($cq);
								$cr		= $cqr->result_array();
								
								$qo = $this->db->query("SELECT tbl_offices.client_option, tbl_offices.office_name, tbl_instruments.serial_no, tbl_instruments.pk_instrument_id
								FROM tbl_offices 
								INNER JOIN tbl_instruments 
								ON tbl_offices.client_option=tbl_instruments.fk_client_id 
								WHERE tbl_instruments.fk_product_id='".$product_id."'
								ORDER BY tbl_offices.pk_office_id
								");
								
								if ($product_id == '11' || $product_id == '40' || $product_id == '41') {
									$qo = $this->db->query("SELECT tbl_offices.client_option, tbl_offices.office_name, tbl_instruments.serial_no, tbl_instruments.pk_instrument_id
								FROM tbl_offices 
								INNER JOIN tbl_instruments 
								ON tbl_offices.client_option=tbl_instruments.fk_client_id 
								WHERE tbl_instruments.fk_product_id IN ('11','40','41')
								ORDER BY tbl_offices.pk_office_id
								");
								}
								
								$or	= $qo->result_array();
							?> 
						  <td> <!-- Part Source -->
						  
						  <?php //echo $j; ?>
                          <input type="hidden" name="this_sprf_id[<?php echo $sprf['pk_sprf_id'];?>]" value="<?php echo $sprf['pk_sprf_id'];?>" />
                          
						  <select  name="part_source[<?php echo $sprf['pk_sprf_id'];?>]" class="form-control input-xlarge part_source_<?php echo $sprf['pk_sprf_id'];?>" 
                          	onchange="change_part_source(this.value,<?php echo $sprf['pk_sprf_id'];?>)" required>
                              <option value="">---Select---</option>
                              <option value="stock" <?php if($sprf['part_source']=='stock'){ echo 'selected="selected"';}?>>Stock</option>
                              <option value="client" <?php if($sprf['part_source']=='client'){ echo 'selected="selected"';}?>>Client</option>
                     <!--         <option value="old inventory" <?php if($sprf['part_source']=='old inventory'){ echo 'selected="selected"';}?>>Old&nbsp;Inventory</option> -->
                          </select>
                            
						  <select  name="source_id[<?php echo $sprf['pk_sprf_id'];?>]" class="form-control source_id_<?php echo $sprf['pk_sprf_id'];?>" 
							<?php //if($sprf['part_source']=='stock'){ echo 'style="display:none;"';}?> style="display:none;" > 
                              <?php foreach ($cr as $client) {
								  echo "<option value='".$client['pk_client_id'].'#'.$client['pk_instrument_id']."'>".$client['client_name']."--(".$client['serial_no'].")</option>";
							  }
							  // Office equipments
							  foreach ($or as $client) {
								  echo "<option value='".$client['client_option'].'#'.$client['pk_instrument_id']."'>".$client['office_name']."--(".$client['serial_no'].")</option>";
							  }
							  
							  ?>
                          </select>
						  
						  <?php
							$qo = $this->db->query("SELECT * FROM tbl_offices");
							$or	= $qo->result_array();
						  ?>
						  <select  name="office_id[<?php echo $sprf['pk_sprf_id'];?>]" class="form-control office_id_<?php echo $sprf['pk_sprf_id'];?>" 
							<?php //if($sprf['part_source']=='stock'){ echo 'style="display:none;"';}?> style="display:none;" > 
                              <?php foreach ($or as $office) {
								  echo "<option value='".$office['pk_office_id']."'>".$office['office_name']."</option>";
							  }
							  ?>
                          </select>
                            <script>
							function change_part_source(veriable, part_id)
							{
								if(veriable=='client')
								{
									$('.source_id_'+part_id).show();
									$('.office_id_'+part_id).hide();
								}
								else if(veriable=='stock')
								{
									$('.office_id_'+part_id).show();
									$('.source_id_'+part_id).hide();
								}
								else
								{
									$('.source_id_'+part_id).hide();
									$('.office_id_'+part_id).hide();
								}
							}
							</script>
							
						  </td>
                            <td> <!-- Stock -->
							<?php 
                              $stock = $this->db->query("select * from tbl_stock where  fk_part_id='".$sprf['fk_part_id']."' AND (dc_type='out' OR (dc_type='in' AND in_status='approved'))");
                                    if($stock->num_rows()>0)
                                    {
                                        $stock_result = $stock->result_array();
                                        $stock_total=0;
                                        foreach($stock_result as $total_stock)
                                        {
                                            $stock_total= $stock_total + $total_stock['stock'];
                                        }
                                        echo $stock_total;
                                    }
                                    else
                                    {
                                        echo '0';
                                    }
                            ?>
                              <?php 
                                //The data for blow table will be fetched form tbl_stock according to the part selected from the second drop-down in above form
                                $query = $this->db->query("select * from tbl_offices");
                                $result = $query->result_array();
                                foreach($result as $office)
                                {
                                  echo '<td>';
                                    $stock = $this->db->query("select SUM(stock) AS stock from tbl_stock where fk_office_id = '".$office['pk_office_id']."' 
                                                               AND fk_part_id='".$sprf['fk_part_id']."' AND (dc_type='out' OR (dc_type='in' AND in_status='approved'))");
                                    $stock_result = $stock->result_array();
									  if ($stock_result[0]['stock']!=0)
										echo $stock_result[0]['stock'];
									  else
										  echo '0';
                                echo '</td>';
                               }?>
                            <td> <!-- Billing -->
							<?php /*<select id="problem_type" name="problem_type[0]" class="form-control  ">
        
                                      <option value="">--Choose--</option>
        
                                      <option value="pending" <?php if($sprf['billing']=="pending"){ echo"selected";}?>>Pending</option>
        
                                      <option value="foc" <?php if($sprf['billing']=="foc"){ echo"selected";}?>>FOC</option>
        
                                      <option value="invoice" <?php if($sprf['billing']=="invoice"){ echo"selected";}?>>Invoice</option>
        
                                    </select> */ 
									echo $sprf['billing'];
									?>
                           </td>
                           <td> <!-- Image -->
                             <button type="button" class="btn btn-default blue-madison-stripe"
                                    data-toggle="modal" data-target="#part_image_<?php echo $sprf['pk_sprf_id'];?>">View Image</button>
                                    
                             <div id="part_image_<?php echo $sprf['pk_sprf_id'];?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                    <?php 
                                          
                                          if($image=='')
                                          {
                                              $src = base_url().'usersimages/complaint_images/800px-No_Image_Wide.svg.png';
                                          }
                                          else
                                          {
                                              $src = base_url().'usersimages/parts_images/'. $part_id.'/'.$image;
                                          }
                                    ?>
                                       <img src="<?php echo $src ;?>" class="img-responsive" />
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                          </td>
						 
                          
                          <td> <!-- Actions -->
						  
						  <?php
						   
							if ($status == "Pending SPRF"  && $sprf['status']=='0') {
								if($this->session->userdata('userrole')!='secratery')
									{
						  ?>
                                <a class="btn btn default red-thunderbird"  
                                  href="<?php echo base_url();?>products/delete_sprf/<?php echo $sprf["pk_sprf_id"].'?complaint_id='.$this->uri->segment(3);?>"
                                  onClick="return confirm('Are you sure you want to delete?')">
                                    Delete <i class="fa fa-trash-o"></i>
                                  </a>
							<?php }
							}
							?>
                            </td>
        
                          </tr>
						  
					<?php $j++;} // SPRF FOREACH
                        
						?>
                </tbody>
              </table>
              <script>
			  function get_des_and_unitprice(part_id)
			  {
				  var formdata =
					  {
						part_id: part_id,
						sec_var: 'second'
					  };
				  $.ajax({
					url: "<?php echo base_url();?>products/get_des_ajax",
					type: 'POST',
					data: formdata,
					success: function(msg){
						$(".description").val(msg);
						}
					})
					 $.ajax({
					url: "<?php echo base_url();?>products/get_par_image_ajax",
					type: 'POST',
					data: formdata,
					success: function(msg){
						$(".part_image").html(msg);
						}
					})
					$.ajax({
					url: "<?php echo base_url();?>products/get_unitprice_ajax",
					type: 'POST',
					data: formdata,
					success: function(msg){
						$(".unit_price").val(msg);
						dicountFunction_update_total(msg);
						}
					})
					$.ajax({
					url: "<?php echo base_url();?>products/get_stock_quantities_table_ajax",
					type: 'POST',
					data: formdata,
					success: function(msg){
						$(".stock_quanties").html(msg);
						}
					})
					
					return false;
			  }
			  // apply select 2 on select drop downs
			  //$('select').select2();
			  // Discount function 
			  function dicountFunction()
			  {
				 var quantity = document.getElementById('quantity').value;
				 var unit_price = document.getElementById('unit_price').value;
				 //alert(discount);
				 var iChars = "%";
						for (var i = 0; i < document.getElementById('quantity').value.length; i++)
						{
						   if (iChars.indexOf(document.getElementById('quantity').value.charAt(i)) != -1)
						   {
							  var newvar=quantity.replace(/%/, '')
							  //alert(newvar);
							  var totlperc=(newvar*unit_price);
							  document.getElementById('totalprice').value=totlperc;
							  quantity.focus(); 
							}
							else
							{
								document.getElementById('totalprice').value=quantity*unit_price;
							}
						} 
			  }
			  // this will be called when total to be changed with change in item, and quantity already given, only for first dropdown
			  function dicountFunction_update_total(msg)
			  {
				 var quantity = document.getElementById('quantity').value;
				 var unit_price = msg
				 //alert(msg);
				 var iChars = "%";
						for (var i = 0; i < document.getElementById('quantity').value.length; i++)
						{
						   if (iChars.indexOf(document.getElementById('quantity').value.charAt(i)) != -1)
						   {
							  var newvar=quantity.replace(/%/, '')
							  //alert(newvar);
							  var totlperc=(newvar*unit_price);
							  document.getElementById('totalprice').value=totlperc;
							  quantity.focus(); 
							}
							else
							{
								document.getElementById('totalprice').value=quantity*unit_price;
							}
						} 
			  }
				  $( ".fa-minus" ).click(function(event) {
						$(this).closest('tr').remove();
					});
			  $('.fa-plus').click(function(){
				  var count1=Math.floor(Math.random()*101);
				  $('.append_tbody').append('<tr class="odd gradeX"><td> <select name="part['+count1+']"  type="text" style="width:150px;"  onchange="get_des_and_unitprice_special(this.value,'+count1+');" required><option value="">---Select---</option> <?php $we= $this->db->query("select * from tbl_parts ");$rt=$we->result_array();foreach($rt as $option){ ?><option value="<?php echo $option['pk_part_id'];?>"><?php echo $option['part_number'];?></option><?php }?></select> </td><td> <input name="part_description['+count1+']" class="form-control description'+count1+'" type="text"> </td><td> <input name="quantity['+count1+']" class="form-control quantity'+count1+'" id="quantity'+count1+'" type="text"  onKeyUp="dicountFunctionspecial('+count1+')" type="text"> </td><td> <input name="unit_price['+count1+']" class="form-control  unit_price'+count1+'" id="unit_price'+count1+'" type="text" value="" readonly name="unit_price"> </td><td> <input name="Total['+count1+']"  class="form-control " type="text" value="" readonly  id="totalprice'+count1+'"> </td><td> <input name="purpose['+count1+']"  class="form-control " type="text"> </td><td> <select id="problem_type" name="problem_type['+count1+']" class="form-control  "><option value="">--Choose--</option><option value="Pending">Pending</option><option value="FOC">FOC</option><option value="Invoice">Invoice</option></select> </td><td> <a href="javascript:void();"><i class="fa fa-plus"></i></a><a href="javascript:void();"><i class="fa fa-minus" ></i></a> </td></tr>');
				  $('select').select2();
				  $( ".fa-minus" ).click(function(event) {
						$(this).closest('tr').remove();
					});
				  $('.fa-plus').click(function(){ add_row()});
			  });
			  function add_row()
			  {
				  var count1=Math.floor(Math.random()*101);
				  $('.append_tbody').append('<tr class="odd gradeX"><td> <select name="part['+count1+']"  type="text" style="width:150px;"  onchange="get_des_and_unitprice_special(this.value,'+count1+');" required> <option value="">---Select---</option><?php $we= $this->db->query("select * from tbl_parts ");$rt=$we->result_array();foreach($rt as $option){ ?><option value="<?php echo $option['pk_part_id'];?>"><?php echo $option['part_number'];?></option><?php }?></select> </td><td> <input name="part_description['+count1+']" class="form-control description'+count1+'" type="text"> </td><td> <input name="quantity['+count1+']" class="form-control quantity'+count1+'" id="quantity'+count1+'" type="text"  onKeyUp="dicountFunctionspecial('+count1+')" type="text"> </td><td> <input name="unit_price['+count1+']" class="form-control  unit_price'+count1+'" id="unit_price'+count1+'" type="text" value="" readonly name="unit_price"> </td><td> <input name="Total['+count1+']"  class="form-control " type="text" value="" readonly  id="totalprice'+count1+'"> </td><td> <input name="purpose['+count1+']"  class="form-control " type="text"> </td><td> <select id="problem_type" name="problem_type['+count1+']" class="form-control  "><option value="">--Choose--</option><option value="Pending">Pending</option><option value="FOC">FOC</option><option value="Invoice">Invoice</option></select> </td><td> <a href="javascript:void();"><i class="fa fa-plus"></i></a><a href="javascript:void();"><i class="fa fa-minus" ></i></a> </td></tr>');
				  $('select').select2();
				  $( ".fa-minus" ).click(function(event) {
						$(this).closest('tr').remove();
					});
				  $('.fa-plus').click(function(){ add_row()});
			  }
			  function dicountFunctionspecial(id)
			  {
				 //alert(id);
				 var quantity = document.getElementById('quantity'+id).value;
				 var unit_price = document.getElementById('unit_price'+id).value;
				 //alert(discount);
				 var iChars = "%";
						for (var i = 0; i < document.getElementById('quantity'+id).value.length; i++)
						{
						   if (iChars.indexOf(document.getElementById('quantity'+id).value.charAt(i)) != -1)
						   {
							  var newvar=quantity.replace(/%/, '')
							  //alert(newvar);
							  var totlperc=(newvar*unit_price);
							  document.getElementById('totalprice'+id).value=totlperc;
							  quantity.focus(); 
							}
							else
							{
								document.getElementById('totalprice'+id).value=quantity*unit_price;
							}
						} 
			  }
			  // this will be called when total to be changed with change in item, and quantity already given
			  function dicountFunctionspecial_update_total(id,msg)
			  {
				  //alert(id);
				 var quantity = document.getElementById('quantity'+id).value;
				 var unit_price = msg;
				 //alert(discount);
				 var iChars = "%";
						for (var i = 0; i < document.getElementById('quantity'+id).value.length; i++)
						{
						   if (iChars.indexOf(document.getElementById('quantity'+id).value.charAt(i)) != -1)
						   {
							  var newvar=quantity.replace(/%/, '')
							  //alert(newvar);
							  var totlperc=(newvar*unit_price);
							  document.getElementById('totalprice'+id).value=totlperc;
							  quantity.focus(); 
							}
							else
							{
								document.getElementById('totalprice'+id).value=quantity*unit_price;
							}
						} 
			  }
			  function get_des_and_unitprice_special(part_id,id)
			  {
				  var formdata =
					  {
						part_id: part_id,
						sec_var: 'second'
					  };
				  $.ajax({
					url: "<?php echo base_url();?>products/get_des_ajax",
					type: 'POST',
					data: formdata,
					success: function(msg){
						$(".description"+id).val(msg);
						}
					})
					$.ajax({
					url: "<?php echo base_url();?>products/get_unitprice_ajax",
					type: 'POST',
					data: formdata,
					success: function(msg){
						$(".unit_price"+id).val(msg);
						dicountFunctionspecial_update_total(id,msg);
						}
						
					})
					
					return false;
					
			  }
			  </script>

                         </div>   
                       </div>
					
                      <div class="form-actions">
						<div class="row">
                          <div class="col-md-offset-5 col-md-7">
						  <div  class="btn-group-vertical btn-group-solid">
						  <!-- This form starts on line 338-->
                         
                            <input type="hidden" name="complaint_id" value="<?php echo $this->uri->segment(3);?>" />
                            <?php if ($sprf_count>0 && $status == "Pending SPRF" ) { 
									if($this->session->userdata('userrole')!='secratery')
									{
							?>
							<button style="width:100%;" type="submit" class="btn btn-lg blue">APPROVE SPRF</button>
							<?php } 
							}?>
							</form>
                            
                            <form action="<?php echo base_url();?>complaint/submit_sprf_complaint_pending" class="form-horizontal" method="post">
						  <input type="hidden" name="complaint_id" value="<?php echo $this->uri->segment(3);?>" />
                            <?php if ($status == "Pending SPRF" ) { 
									if($this->session->userdata('userrole')!='secratery')
									{?>
							<button type="submit" class="btn btn-lg red">Mark Complaint Pending</button>
							  <?php } 
                                }?>
							</form>
						  
							</div>
                          </div>
						  </div>
                      </div>
					
										

                    <!-- END FORM--> 

                  </div>

                </div>
			   <div>

            </div>

          </div>

        </div>

      </div>

      <!-- END PAGE CONTENT--> 

    </div>

  </div>
 </div>

  <!-- END CONTENT --> 
<?php $this->load->view('footer.php');?>