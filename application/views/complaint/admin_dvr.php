<?php $this->load->view('header');?>
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title">
                    DVR <small>Individual History</small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                Home 
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                DVR History Individual
                            </li>
                        </ul>
                      
                    </div>
                    <!-- END PAGE HEADER--> 
       <!-- BEGIN PAGE CONTENT-->
       <div class="row">

        <div class="col-md-12"> 
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet box yellow-gold">

            <div class="portlet-title">

              <div class="caption"> <i class="icon-pie-chart"></i>Search DVR </div>

              <div class="tools"> 
              	<a href="javascript:;" class="collapse"> </a> 
                 
                <a href="javascript:;" class="remove"> </a> 
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-toolbar">
              </div>
              		<div class="portlet-body flip-scroll">
                            <?php
								if(isset($_GET['msg']))
								  { 
									echo '<div class="alert alert-success alert-dismissable">  
											<a class="close" data-dismiss="alert">×</a>  
											Complaint Added Successfully.  
										  </div>';
								  }
							  ?>
                            <div class="row">
                            	<form method="post" action="<?php echo base_url();?>complaint/get_date_dvr_for_admin">
                                <div class="col-md-4">
                            		<div class="form-group">
                            			
                                        <select name="engineer" id="engineer" class="form-control" required>
                                            <option value="">--Select employee--</option>
											<?php 
											$maxqu = $this->db->query("SELECT * FROM user WHERE delete_status = '0' ORDER BY  `fk_office_id` ,  `userrole` ASC ");
											$maxval=$maxqu->result_array();
                                            foreach($maxval as $val)
                                            {
                                                
                                                ?>
                                                <option value="<?php echo $val['id'];?>" <?php if(isset($myengineer) && $myengineer==$val['id']){ echo 'selected="selected"';}?>>
													<?php echo $val['first_name'];?>
                                                </option>
                                                <?php 
                                            }
                                            ?>
                                        </select>
                            		</div>
                          		</div>
								
                          		<div class="col-md-3">
                            		<div class="form-group">
                            			
                                        <input type="text" name="start_mydate" class="form-control datepicker" id="start_mydate" value="<?php if(isset($mystartdate)){ echo $mystartdate; } else { echo date('d-M-Y');}?>" required  />
										<span class="help-block">Start Date</span>
									</div>
                                </div>
                                <div class="col-md-3">
                            		<div class="form-group">
                            			
                                        <input type="text" name="end_mydate" class="form-control datepicker" id="end_mydate" value="<?php if(isset($myenddate)){ echo $myenddate; } else { echo date('d-M-Y');}?>" required />
										<span class="help-block">End Date</span>
									</div>
                                </div>
                                <div class="col-md-2">
                            		<div class="form-group">
                                        
                                            <input type="submit"  class="btn btn-default blue-madison" value="Search" >
                                    </div>
                                </div>
								
                          		</form>
                                
                           </div>
                           <script>
						function get_current_date_values()
						{
							engineer=$('#engineer').val();
							start_mydate=$('#start_mydate').val();
							end_mydate=$('#end_mydate').val();
							var formdata =
							  {
								start_mydate: start_mydate,
								end_mydate: end_mydate,
								engineer:engineer
							  };
						  $.ajax({
							url: "<?php echo base_url();?>complaint/get_date_dvr_for_admin",
							type: 'POST',
							data: formdata,
							success: function(msg){
								$(".engineer_dvrs").html(msg);
								//alert(msg);
								}
							})
							return false;
						}
						function get_egn_dvr(engineer_id)
						{
							var formdata =
							  {
								engineer_id: engineer_id
							  };
						  $.ajax({
							url: "<?php echo base_url();?>complaint/get_egn_dvr_ajax_for_admin",
							type: 'POST',
							data: formdata,
							success: function(msg){
								$(".engineer_dvrs").html(msg);
								//alert(msg);
								}
							})
							return false;
						}
						</script>
                <table class="table table-striped  table-hover flip-content" id="sample_7">

                <thead>

                  <tr>
                    <th class="bg-grey-gallery"> Date</th>
                    <th class="bg-grey-gallery"> StartTime </th>
                    <th class="bg-grey-gallery"> EndTime </th>
                    <th class="bg-grey-gallery"> Area </th>
					<th class="bg-grey-gallery"> Employee</th>
                    <th class="bg-grey-gallery"> Customer</th>
                    
                    <th class="bg-grey-gallery"> Business Project </th>

                    <th class="bg-grey-gallery"> Project Description </th>
                    
                    <th class="bg-grey-gallery"> Working Details/Discussion Summary </th>
                    <th class="bg-grey-gallery"> Update </th>
                    
                   
                 

                  </tr>

                </thead>

                <tbody class="engineer_dvrs">
               		<?php
					if (isset($get_sup_dvr) && sizeof($get_sup_dvr) == "0") 
					  {
						echo "<tr class='odd grade'><td colspan='10' align='center'>No Results Found.</td></tr>";
					  }
					   elseif(isset($get_sup_dvr) && sizeof($get_sup_dvr) != "0") 
					  {
							foreach($get_sup_dvr as $sup_dvr)
							{
								 echo '<tr class="odd gradeX">
															<td>';
								echo date('d-M-Y', strtotime($sup_dvr['date']));
								echo '</td>  ';	
								echo '						<td>';
								echo date('h:i A', strtotime($sup_dvr['start_time']));
								echo '</td>
															
															<td>';
								echo date('h:i A', strtotime($sup_dvr['end_time']));
								
								echo '</td>
														   
															<td>';
								//for are and customer calculation
								if(substr($sup_dvr['fk_customer_id'],0,1)=='o')
									{
										$office_id		=	substr($sup_dvr['fk_customer_id'],13,1);
										$qu2			=	"SELECT * from tbl_offices where pk_office_id =  '".$office_id."'";
										$gh2			=	$this->db->query($qu2);
										$rt2			=	$gh2->result_array();
										$myclient 		= 	$rt2[0]['office_name'];
										$business		=   '';
										//for area
										$area			= $myclient;
									}
									else
									{
										 $maxqu = $this->db->query("SELECT * FROM tbl_clients where pk_client_id='".$sup_dvr['fk_customer_id']."' ");
										 $maxval=$maxqu->result_array();
										 $myclient = $maxval[0]['client_name'];
										 //for area
										$maxqu_area 	= $this->db->query("SELECT * FROM tbl_area where pk_area_id='".$maxval[0]['fk_area_id']."' ");
										$maxval_area	=$maxqu_area->result_array();
										$area			= $maxval_area[0]['area'];
										 //for business project
										 if($sup_dvr['fk_business_id']=='0')
										 {
											 $business		=   'Others';
										 }
										 else
										 {
										 $maxqu3 = $this->db->query("SELECT * FROM business_data where pk_businessproject_id='".$sup_dvr['fk_business_id']."' ");
										 $maxval3=$maxqu3->result_array();
										 $maxqu4 = $this->db->query("SELECT * FROM tbl_business_types where pk_businesstype_id='".$maxval3[0]['Business Project']."' ");
										 $maxval4=$maxqu4->result_array();
										 $business = $maxval4[0]['businesstype_name'];
										 }
									}
								//
																
								echo $area;
								echo '</td>
															
															<td>';
								$maxqu_eng = $this->db->query("SELECT * FROM user where id='".$sup_dvr['fk_engineer_id']."' ");
								$maxval_eng=$maxqu_eng->result_array();
								echo $maxval_eng[0]['first_name'];
								echo'</td>
															<td>';
																 
								 
								echo $myclient;
								echo '</td> ';  
								echo '<td>';
																 
								 
								
								echo $business;
								echo '</td>';
								echo '<td> <textarea readonly name="summery" id="textarea" class="input-medium" required="" rows="4">';
								//
								if($sup_dvr['fk_business_id']!='0'){
								$maxqu3 = $this->db->query("SELECT * FROM business_data where pk_businessproject_id='".$sup_dvr['fk_business_id']."' ");
								$maxval3=$maxqu3->result_array();
								echo $maxval3[0]['Project Description'];
								}
								else
								{
									echo $sup_dvr['priority'];
								}
								echo '</textarea> </td>';
								
								echo '<td> <textarea readonly name="summery" id="textarea" class="input-medium" required="" rows="4">';
								echo urldecode($sup_dvr['summery']);
								echo '</textarea> </td>';
								echo '<td>
															<a class="btn btn default yellow-gold" href="'. base_url() .'complaint/update_dvr_project/'.$sup_dvr['pk_dvr_id'].'">
																Update
																<i class="fa fa-edit"></i>
															</a>
														  </td>';
							   echo '</tr>';
							}
					  }
					?>

                </tbody>

              </table>

            			</div>
                        
                 
                

            </div>

          </div>
		
          
          <!-- END EXAMPLE TABLE PORTLET--> 
        </div>
      </div>
     </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php $this->load->view('footer');?>