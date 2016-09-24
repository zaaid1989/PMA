<?php $this->load->view('header');?>
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title">
                    Complaints List <small></small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo base_url();?>">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Complaints List                        
                    </li>
                    
                </ul>
                    </div>
                    <!-- END PAGE HEADER--> 
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                      <div class="col-md-12"> 
					  <?php
						  if(isset($_GET['msg']))
							{ 
							  echo '<div class="alert alert-success alert-dismissable">  
									  <a class="close" data-dismiss="alert">×</a>  
									  Complaint Added Successfully.  
									</div>';
							}
							
							if(isset($_GET['msg_update']))
							{ 
							  echo '<div class="alert alert-success alert-dismissable">  
									  <a class="close" data-dismiss="alert">×</a>  
									  Complaint Updated Successfully.  
									</div>';
							}
							
							if(isset($_GET['msg_delete']))
							  { 
								echo '<div class="alert alert-success alert-dismissable">  
										<a class="close" data-dismiss="alert">×</a>  
										Complaint Deleted Successfully.  
									  </div>';
							  }
						?>
					  <?php /*
						 $m	=	1;
						for ($m=1;$m<4;$m++)  {
							echo $m; */
					  ?>
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box red">
                          <div class="portlet-title">
                            <div class="caption"> <i class="fa icon-book-open"></i>Complaints List</div>
                            <div class="tools"> 
                            	<a href="javascript:;" class="collapse"> </a> 
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a> 
                                <a href="javascript:;" class="reload"> </a> 
                                <a href="javascript:;" class="remove"> </a> 
                             </div>
                          </div>
                          <div class="portlet-body">
                            <div class="table-toolbar">
                            	
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="btn-group">
                                    <a href="<?php echo base_url();?>complaint/add_complaint/d" id="sample_editable_1_new" class="btn purple"> Add New <i class="fa fa-plus"></i> </a>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                          <div class="portlet-body flip-scroll">
                          <table class="table table-striped table-bordered table-hover flip-content " id="sample_222">
                              <thead class="bg-grey-cascade">
							  <tr>
                                    
                                    <th class="sorting">
                                         
                                    </th>
                           <!--         <th>
                                         
                                    </th>
									<th>
                                         Closing Date
                                    </th> -->
                                    
                                    <th>
                                         
                                    </th>
									<th>
										
                                         
                                    </th>
                                    <th>
										 
									</th>
									<th>
										 
									</th>
									<th>
										 
									</th>
									<th>
										
									</th>
									
									<th>
										 
									</th>
  
                                    <th>
                                         
                                    </th>
                                    
                                    <th>
                                         
                                    </th>
                                    <th>
                                         
                                    </th>
                                    <th>
                                         
                                    </th>
									<!--
									<th>
                                         
                                    </th>
									-->
									<th>
										
									</th>
                                </tr>
                                <tr>
                                    
                                    <th class="sorting">
                                         TS number
                                    </th>
                                    <th>
                                         Date
                                    </th>
					<!--				<th>
                                         Closing Date
                                    </th> -->
                                    
                                    <th>
                                         Time Elapsed
                                    </th>
									<th>
										Time Taken
                                         
                                    </th>
                                    <th>
										 City
									</th>
									<th>
										 Customer
									</th>
								<!--	<th>
										 Area
									</th> -->
									<th>
										Equipment
									</th>
									
									<th>
										 S/No
									</th>
  
                                    <th>
                                         Problem Summary
                                    </th>
                                    
                                    <th>
                                         FSE/SAP
                                    </th>
                                    <th>
                                         Status
                                    </th>
                                    <th>
                                         Actions
                                    </th>
									<!--
									<th>
                                         Shift
                                    </th>
									-->
									<th>
										Comments
									</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
									  function nicetime($date)
										{
											if(empty($date)) {
												return "No date provided";
											}
											$periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
											$lengths         = array("60","60","24","7","4.35","12","10");
											$now             = time();
											$unix_date         = strtotime($date);
											   // check validity of date
											if(empty($unix_date)) {   
												return "Bad date";
											}
											// is it future date or past date
											if($now > $unix_date) {   
												$difference     = $now - $unix_date;
												$tense         = "ago";
											} else {
												$difference     = $unix_date - $now;
												$tense         = "from now";
											}
											for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
												$difference /= $lengths[$j];
											}
											$difference = round($difference);
											if($difference != 1) {
												$periods[$j].= "s";
											}
											return "$difference $periods[$j] {$tense}";
										}
										//end nice time fucntion
										function nicetime_two_parameters($start_date, $end_date)
										{
											
											if(empty($start_date)) {
												return "No date provided";
											}
											$periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
											$lengths         = array("60","60","24","7","4.35","12","10");
											$unix_start_date         = strtotime($start_date);
											$unix_end_date   = strtotime($end_date);
											   // check validity of date
											if(empty($unix_start_date)) {   
												return "Bad date";
											}
											// is it future date or past date
											if($unix_end_date > $unix_start_date) {   
												$difference     = $unix_end_date - $unix_start_date;
												$tense         = "";
											} else {
												$difference     = $unix_start_date - $unix_end_date;
												$tense         = "";
											}
											for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
												$difference /= $lengths[$j];
											}
											$difference = round($difference);
											if($difference != 1) {
												$periods[$j].= "s";
											}
											return "$difference $periods[$j] {$tense}";
										
										}
										//
										function time_elapsed_string3($start_dat, $end_date, $full) {
											$from_timezone = 'America/New_York';
											$tz1 = new DateTimezone($from_timezone);
											$now = new DateTime($end_date, $tz1);
											$ago = new DateTime($start_dat, $tz1);
											$diff = $now->diff($ago);
											$diff->w = floor($diff->d / 7);
											$diff->d -= $diff->w * 7;
										
											$string = array(
												'y' => 'year',
												'm' => 'month',
												'w' => 'week',
												'd' => 'day',
												'h' => 'hour',
												'i' => 'minute',
												's' => 'second',
											);
											foreach ($string as $k => &$v) {
												if ($diff->$k) {
													$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
												} else {
													unset($string[$k]);
												}
											}
										
											if (!$full) $string = array_slice($string, 0, 1);
											return $string ? implode(', ', $string) . '' : '';
										}
										//
									  $dbres = $this->db->query("SELECT * FROM tbl_complaints where complaint_nature='complaint'  
									  AND 
									  status NOT IN ('Pending Verification','Pending SPRF', 'Closed','Pending Registration')  
									  order by `pk_complaint_id` DESC");
           							  $dbresResult=$dbres->result_array();
									  if (sizeof($dbresResult) == "0") {
										  
									  } else {
										  foreach ($dbresResult as $complaint_list) {
											  /*
											  if ($k==1) {
												  if ($complaint_list['status']=='Pending Verification' || $complaint_list['status']=='Closed' )
													  continue;
											  }
											  elseif ($k==2) {
												  if ($complaint_list['status']!='Pending Verification' )
													  continue;
											  }
											  elseif ($k==3) {
												  if ($complaint_list['status']!='Closed' )
													  continue;
											  }*/
											  ?>
											  <tr class=" <?php if($complaint_list['urgent_priority']==1){ echo "danger even";} else { echo "odd gradeX";}?>">
                                                  <td>
													  <?php echo $complaint_list["ts_number"] ?>
												  </td>
												  <td>
													  <?php 
															echo date('d-M-Y',strtotime($complaint_list["date"])); 
													  ?>
												  </td>
                                           <!--       <td> -->
													  <?php  /*
													  	if($complaint_list["status"]=='Closed')
														{
															echo date('d-M-Y',strtotime($complaint_list["solution_date"])); 
														}
														else
														{
															echo 'Not Closed';
														} */
													  ?> 
											<!--	  </td> -->
											
												<td>
                                                      <?php 
													  	if($complaint_list["status"]=='Closed')
														{
															echo "Closed ". nicetime($complaint_list["solution_date"]); 
														}
														else
														{
															echo nicetime($complaint_list["date"]);
														}
													  ?>
												  </td>
												  <td>
                                                      <?php
													  	if($complaint_list["status"]=='Closed')
														{
															echo nicetime_two_parameters($complaint_list["date"],$complaint_list["solution_date"]); 
															//echo time_elapsed_string3($complaint_list["date"],$complaint_list["solution_date"], true);
														}
														else
														{
															echo 'N/A';
														}
													  ?>
												  </td>
                                                  
												                                            
                                          <td>
                                              <?php 
                                              $ty=$this->db->query("select * from tbl_cities where pk_city_id='".$complaint_list["fk_city_id"]."'");
                                              $rt=$ty->result_array();
                                              echo $rt[0]["city_name"] ?>
                                          </td>
										  <td>
                                              <?php    
												$nsql3=$this->db->query("select * from tbl_clients where pk_client_id ='".$complaint_list['fk_customer_id']."'");
												$n2sql3=$nsql3->result_array();
												echo $n2sql3[0]['client_name'];
												?>
                                          </td>
											
								<!--		  <td>
										  <?php 
												$nsql3=$this->db->query("select area from tbl_area where pk_area_id ='".$n2sql3[0]['fk_area_id']."'");
												$n2sql3=$nsql3->result_array();
												echo $n2sql3[0]['area'];
												?>
										  </td> -->
										  
										  <td>
                                              <?php 
                                              $ty=$this->db->query("select * from tbl_instruments where pk_instrument_id='".$complaint_list["fk_instrument_id"]."'");
                                              $rt=$ty->result_array();
                                              //echo $rt[0]["fk_brand_id"];
											  if($ty->num_rows()>0)
											  {
												  $ty2=$this->db->query("select * from tbl_products where pk_product_id='".$rt[0]["fk_product_id"]."'");
												  $rt2=$ty2->result_array();
												  echo $rt2[0]["product_name"];
											  }
                                              //echo $complaint_list["instrument_name"] ?>
                                          </td>
                                          <td>
                                              <?php 
											  if($ty->num_rows()>0)
											  {
											  	echo $rt[0]["serial_no"]; 
											  }
											  ?>
                                          </td>

                                                  <td>
													  <?php echo $complaint_list["problem_summary"] ?>
												  </td>
                                                  
                                                  <td>
													  <?php 
													  $ty=$this->db->query("select * from user where id ='".$complaint_list["assign_to"]."'");
													  $rt=$ty->result_array();
													  echo $rt[0]["first_name"];
													  //echo $complaint_list["FSE_SAP"] ?>
												  </td>
												  </td>
                                          <td>
                                              <?php 
													  $this->load->model("complaint_model");
													  $obj=new Complaint_model();
													  $obj->current_status($complaint_list['status']);
												?>
                                          </td>
                                          <td>
										  <div class="btn-group-vertical btn-group-solid">
                                          <a class="btn btn-sm default purple-stripe" 
                                          href="<?php echo base_url();?>complaint/ts_report_director/<?php echo $complaint_list["pk_complaint_id"] ?>">
                                          	TSR 
											<i class="fa fa-eye"></i>
                                          </a>
                                          <?php if($this->session->userdata('userrole')=='Admin'){?>
                                          <a class="btn btn-sm default red-thunderbird-stripe" onClick="return confirm('Are you sure you want to delete?')" 
                                            href="<?php echo base_url();?>complaint/delete_complaint/<?php echo $complaint_list["pk_complaint_id"];?>">
                                              Delete <i class="fa fa-trash-o"></i>
                                            </a>
											
											<a class="btn btn-sm default blue-stripe" onClick="return confirm('Are you sure you want to edit?')" 
                                            href="<?php echo base_url();?>complaint/add_complaint_registration/<?php echo $complaint_list["pk_complaint_id"];?>">
                                              Edit <i class="fa fa-edit"></i>
                                            </a>
											
                                            <?php }?>
											<a class="btn btn-sm default yellow-zed-stripe" 
                                          href="<?php echo base_url();?>complaint/shift_complaint/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											Shift 
											<i class="fa fa-share"></i>
                                          </a>
										  
										  <?php if($complaint_list["problem_type"]=='equipment' || $complaint_list["status"]=='Pending (BB)') {?>
                                          <a class="btn btn-sm default green-haze-stripe" 
                                              href="<?php echo base_url();?>products/sprf/<?php echo $complaint_list["pk_complaint_id"] ?>">
                                              	SPRF
                                          </a>
                                          <?php }?>
										  </div>
                                          </td>
										  <!--
										  <td>
										  <a class="btn btn-sm default yellow-zed-stripe" 
                                          href="<?php echo base_url();?>complaint/shift_complaint/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											Shift 
											<i class="fa fa-share"></i>
                                          </a>
										  </td>
										  -->
										  
										  
										  <?php
												$userid		=	$this->session->userdata('userid');
												$userrole	=	$this->session->userdata('userrole');
												$complaint_id =	$complaint_list["pk_complaint_id"];
												$count_msgs	=	0;
												$count_msgs_r	=	0;
												$countfield	=	'read_director';
												
												
												if($userrole=='Admin') $countfield = 'read_director';
												if($userrole=='secratery') $countfield = 'read_secratery';
												if($userrole=='Supervisor') $countfield = 'read_supervisor';
												if($userrole=='FSE' || $userrole=='Salesman') $countfield = 'read_employee';
												
												$cq			=	"select * from tbl_comments where `fk_complaint_id`='".$complaint_id."' AND `".$countfield."`=0";
												$cr			=	$this->db->query($cq);
												$count_msgs	=	sizeof($cr->result_array());
												
												$cq			=	"select * from tbl_comments where `fk_complaint_id`='".$complaint_id."'";
												$cr			=	$this->db->query($cq);
												$count_msgs_r	=	sizeof($cr->result_array());
												
												$cq			=	"select * from tbl_dvr where `fk_complaint_id`='".$complaint_id."'";
												$cr			=	$this->db->query($cq);
												$count_msgs_r	+=	sizeof($cr->result_array());
											?>	
										  <td>
										  <a class="icon-btn" 
                                          href="<?php echo base_url();?>complaint/comments/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											<i class="fa fa-comments-o"></i>
											<div>Comments</div>
											<?php if ($count_msgs>0) {?>
												<span class="badge bg-blue">
												<?php echo $count_msgs; ?>
												</span>
											<?php } ?>
											<?php if ($count_msgs==0 && $count_msgs_r>0) {?>
												<span class="badge bg-grey-cascade">
												<?php echo $count_msgs_r; ?>
												</span>
											<?php } ?>
                                          </a>
										  </td>
												 
											  </tr>
											  <?php
										  }
									  }
                              ?>
                                
                              </tbody>
                            </table>
                           </div>
                          </div>
                        </div>
                        
                        
                        <!-- BEGIN EXAMPLE TABLE PORTLET Pending Verification-->
                        <div class="portlet box yellow-zed">
                          <div class="portlet-title">
                            <div class="caption"> <i class="fa icon-book-open"></i>Complaints List (Pending Verification)</div>
                            <div class="tools"> 
                            	<a href="javascript:;" class="collapse"> </a> 
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a> 
                                <a href="javascript:;" class="reload"> </a> 
                                <a href="javascript:;" class="remove"> </a> 
                             </div>
                          </div>
                          <div class="portlet-body">
                            <div class="table-toolbar">
                            	
                              
                            </div>
                          <div class="portlet-body flip-scroll">
                          <table class="table table-striped table-bordered table-hover flip-content " id="sample_221">
                              <thead class="bg-grey-cascade">
							  <tr>
                                    
                                    <th class="sorting">
                                         
                                    </th>
                         <!--           <th>
                                         
                                    </th>
									<th>
                                         Closing Date
                                    </th> -->
                                    
                                    <th>
                                         
                                    </th>
									<th>
										
                                         
                                    </th>
                                    <th>
										 
									</th>
									<th>
										 
									</th>
									<th>
										 
									</th>
									<th>
										
									</th>
									
									<th>
										 
									</th>
  
                                    <th>
                                         
                                    </th>
                                    
                                    <th>
                                         
                                    </th>
                                    <th>
                                         
                                    </th>
                                    <th>
                                         
                                    </th>
									<!--
									<th>
                                         
                                    </th>
									-->
									<th>
										
									</th>
                                </tr>
                                
                                <tr>
                                    
                                    <th class="sorting">
                                         TS number
                                    </th>
                                    <th>
                                         Date
                                    </th>
					<!--				<th>
                                         Closing Date
                                    </th> -->
                                    
                                    <th>
                                         Time Elapsed
                                    </th>
									<th>
										Time Taken
                                         
                                    </th>
                                    <th>
										 City
									</th>
									<th>
										 Customer
									</th>
								<!--	<th>
										 Area
									</th> -->
									<th>
										Equipment
									</th>
									
									<th>
										 S/No
									</th>
  
                                    <th>
                                         Problem Summary
                                    </th>
                                    
                                    <th>
                                         FSE/SAP
                                    </th>
                                    <th>
                                         Status
                                    </th>
                                    <th>
                                         Actions
                                    </th>
									<!--
									<th>
                                         Shift
                                    </th>
									-->
									<td>
										Comments
									</td>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
									  $dbres = $this->db->query("SELECT * FROM tbl_complaints where complaint_nature='complaint' 
									  AND 
									  status IN ('Pending Verification') order by `pk_complaint_id` DESC");
           							  $dbresResult=$dbres->result_array();
									  if (sizeof($dbresResult) == "0") {
										  
									  } else {
										  foreach ($dbresResult as $complaint_list) {
											  /*
											  if ($k==1) {
												  if ($complaint_list['status']=='Pending Verification' || $complaint_list['status']=='Closed' )
													  continue;
											  }
											  elseif ($k==2) {
												  if ($complaint_list['status']!='Pending Verification' )
													  continue;
											  }
											  elseif ($k==3) {
												  if ($complaint_list['status']!='Closed' )
													  continue;
											  }*/
											  ?>
											  <tr class=" <?php if($complaint_list['urgent_priority']==1){ echo "danger even";} else { echo "odd gradeX";}?>">
                                                  <td>
													  <?php echo $complaint_list["ts_number"] ?>
												  </td>
												  <td>
													  <?php 
															echo date('d-M-Y',strtotime($complaint_list["date"])); 
													  ?>
												  </td>
                                           <!--       <td> -->
													  <?php  /*
													  	if($complaint_list["status"]=='Closed')
														{
															echo date('d-M-Y',strtotime($complaint_list["solution_date"])); 
														}
														else
														{
															echo 'Not Closed';
														} */
													  ?> 
											<!--	  </td> -->
											
												<td>
                                                      <?php 
													  	if($complaint_list["status"]=='Closed')
														{
															echo "Closed ". nicetime($complaint_list["solution_date"]); 
														}
														else
														{
															echo nicetime($complaint_list["date"]);
														}
													  ?>
												  </td>
												  <td>
                                                      <?php
													  	if($complaint_list["status"]=='Closed')
														{
															echo nicetime_two_parameters($complaint_list["date"],$complaint_list["solution_date"]); 
															//echo time_elapsed_string3($complaint_list["date"],$complaint_list["solution_date"], true);
														}
														else
														{
															echo 'N/A';
														}
													  ?>
												  </td>
                                                  
												                                            
                                          <td>
                                              <?php 
                                              $ty=$this->db->query("select * from tbl_cities where pk_city_id='".$complaint_list["fk_city_id"]."'");
                                              $rt=$ty->result_array();
                                              echo $rt[0]["city_name"] ?>
                                          </td>
										  <td>
                                              <?php    
												$nsql3=$this->db->query("select * from tbl_clients where pk_client_id ='".$complaint_list['fk_customer_id']."'");
												$n2sql3=$nsql3->result_array();
												echo $n2sql3[0]['client_name'];
												?>
                                          </td>
											
									<!--	  <td>
										  <?php 
												$nsql3=$this->db->query("select area from tbl_area where pk_area_id ='".$n2sql3[0]['fk_area_id']."'");
												$n2sql3=$nsql3->result_array();
												echo $n2sql3[0]['area'];
												?>
										  </td> -->
										  
										  <td>
                                              <?php 
                                              $ty=$this->db->query("select * from tbl_instruments where pk_instrument_id='".$complaint_list["fk_instrument_id"]."'");
                                              $rt=$ty->result_array();
                                              //echo $rt[0]["fk_brand_id"];
											  if($ty->num_rows()>0)
											  {
												  $ty2=$this->db->query("select * from tbl_products where pk_product_id='".$rt[0]["fk_product_id"]."'");
												  $rt2=$ty2->result_array();
												  echo $rt2[0]["product_name"];
											  }
                                              //echo $complaint_list["instrument_name"] ?>
                                          </td>
                                          <td>
                                              <?php 
											  if($ty->num_rows()>0)
											  {
											  	echo $rt[0]["serial_no"]; 
											  }
											  ?>
                                          </td>

                                                  <td>
													  <?php echo $complaint_list["problem_summary"] ?>
												  </td>
                                                  
                                                  <td>
													  <?php 
													  $ty=$this->db->query("select * from user where id ='".$complaint_list["assign_to"]."'");
													  $rt=$ty->result_array();
													  echo $rt[0]["first_name"];
													  //echo $complaint_list["FSE_SAP"] ?>
												  </td>
												  </td>
                                          <td>
                                              <?php 
													  $this->load->model("complaint_model");
													  $obj=new Complaint_model();
													  $obj->current_status($complaint_list['status']);
												?>
                                          </td>
                                          <td>
                                          <a class="btn btn-sm default purple-stripe" 
                                          href="<?php echo base_url();?>complaint/ts_report_director/<?php echo $complaint_list["pk_complaint_id"] ?>">
                                          	TSR 
											<i class="fa fa-eye"></i>
                                          </a>
                                          <?php if($this->session->userdata('userrole')=='Admin'){?>
                                          <a class="btn btn-sm default red-thunderbird" onClick="return confirm('Are you sure you want to delete?')" 
                                            href="<?php echo base_url();?>complaint/delete_complaint/<?php echo $complaint_list["pk_complaint_id"];?>">
                                              Delete <i class="fa fa-trash-o"></i>
                                            </a>
											
											
											<a class="btn btn-sm default blue-stripe" onClick="return confirm('Are you sure you want to edit?')" 
                                            href="<?php echo base_url();?>complaint/add_complaint_registration/<?php echo $complaint_list["pk_complaint_id"];?>">
                                              Edit <i class="fa fa-edit"></i>
                                            </a>
											
                                            <?php }?>
											<a class="btn btn-sm default yellow-zed-stripe" 
                                          href="<?php echo base_url();?>complaint/shift_complaint/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											Shift 
											<i class="fa fa-share"></i>
                                          </a>
                                          </td>
										  <!--
										  <td>
										  <a class="btn btn-sm default yellow-zed-stripe" 
                                          href="<?php echo base_url();?>complaint/shift_complaint/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											Shift 
											<i class="fa fa-share"></i>
                                          </a>
										  </td>
										  -->
										  <?php
												$userid		=	$this->session->userdata('userid');
												$userrole	=	$this->session->userdata('userrole');
												$complaint_id =	$complaint_list["pk_complaint_id"];
												$count_msgs	=	0;
												$count_msgs_r	=	0;
												$countfield	=	'read_director';
												
												
												if($userrole=='Admin') $countfield = 'read_director';
												if($userrole=='secratery') $countfield = 'read_secratery';
												if($userrole=='Supervisor') $countfield = 'read_supervisor';
												if($userrole=='FSE' || $userrole=='Salesman') $countfield = 'read_employee';
												
												$cq			=	"select * from tbl_comments where `fk_complaint_id`='".$complaint_id."' AND `".$countfield."`=0";
												$cr			=	$this->db->query($cq);
												$count_msgs	=	sizeof($cr->result_array());
												
												$cq			=	"select * from tbl_comments where `fk_complaint_id`='".$complaint_id."'";
												$cr			=	$this->db->query($cq);
												$count_msgs_r	=	sizeof($cr->result_array());
											?>
										  
										  <td>
										  <a class="icon-btn" 
                                          href="<?php echo base_url();?>complaint/comments/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											<i class="fa fa-comments-o"></i>
											<div>Comments</div>
											<?php if ($count_msgs>0) {?>
												<span class="badge bg-blue">
												<?php echo $count_msgs; ?>
												</span>
											<?php } ?>
											<?php if ($count_msgs==0 && $count_msgs_r>0) {?>
												<span class="badge bg-grey-cascade">
												<?php echo $count_msgs_r; ?>
												</span>
											<?php } ?>
                                          </a>
										  </td>
												 
											  </tr>
											  <?php
										  }
									  }
                              ?>
                                
                              </tbody>
                            </table>
                           </div>
                          </div>
                        </div>
                        
                        <!-- BEGIN EXAMPLE TABLE PORTLET Pending SPRF-->
                        <div class="portlet box purple">
                          <div class="portlet-title">
                            <div class="caption"> <i class="fa icon-book-open"></i>Complaints List (Pending SPRF)</div>
                            <div class="tools"> 
                            	<a href="javascript:;" class="collapse"> </a> 
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a> 
                                <a href="javascript:;" class="reload"> </a> 
                                <a href="javascript:;" class="remove"> </a> 
                             </div>
                          </div>
                          <div class="portlet-body">
                            <div class="table-toolbar">
                            	
                              
                            </div>
                          <div class="portlet-body flip-scroll">
                          <table class="table table-striped table-bordered table-hover flip-content " id="sample_225">
                              <thead class="bg-grey-cascade">
							  <tr>
                                    
                                    <th class="sorting">
                                         
                                    </th>
                        <!--            <th>
                                         
                                    </th>
									<th>
                                         Closing Date
                                    </th> -->
                                    
                                    <th>
                                         
                                    </th>
									<th>
										
                                         
                                    </th>
                                    <th>
										 
									</th>
									<th>
										 
									</th>
									<th>
										 
									</th>
									<th>
										
									</th>
									
									<th>
										 
									</th>
  
                                    <th>
                                         
                                    </th>
                                    
                                    <th>
                                         
                                    </th>
                                    <th>
                                         
                                    </th>
                                    <th>
                                         
                                    </th>
									<!--
									<th>
                                         
                                    </th>
									-->
									<th>
										
									</th>
									<th>
										
									</th>
                                </tr>
                                
                                <tr>
                                    
                                    <th class="sorting">
                                         TS number
                                    </th>
                                    <th>
                                         Date
                                    </th>
					<!--				<th>
                                         Closing Date
                                    </th> -->
                                    
                                    <th>
                                         Time Elapsed
                                    </th>
									<th>
										Time Taken
                                         
                                    </th>
                                    <th>
										 City
									</th>
									<th>
										 Customer
									</th>
								<!--	<th>
										 Area
									</th> -->
									<th>
										Equipment
									</th>
									
									<th>
										 S/No
									</th>
  
                                    <th>
                                         Problem Summary
                                    </th>
                                    
                                    <th>
                                         FSE/SAP
                                    </th>
                                    <th>
                                         Status
                                    </th>
                                    <th>
                                         Actions
                                    </th>
									<!--
									<th>
                                         Shift
                                    </th>
									-->
									<td>
										Comments
									</td>
									<!--
                                    <th>
                                         SPRF Form
                                    </th>
									-->
                                    <th>
                                         SPRF Time
                                    </th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
									  $dbres = $this->db->query("SELECT * FROM tbl_complaints where complaint_nature='complaint' 
									  AND 
									  status IN ('Pending SPRF') order by `pk_complaint_id` DESC");
           							  $dbresResult=$dbres->result_array();
									  if (sizeof($dbresResult) == "0") {
										  
									  } else {
										  foreach ($dbresResult as $complaint_list) {
											  /*
											  if ($k==1) {
												  if ($complaint_list['status']=='Pending Verification' || $complaint_list['status']=='Closed' )
													  continue;
											  }
											  elseif ($k==2) {
												  if ($complaint_list['status']!='Pending Verification' )
													  continue;
											  }
											  elseif ($k==3) {
												  if ($complaint_list['status']!='Closed' )
													  continue;
											  }*/
											  ?>
											  <tr class=" <?php if($complaint_list['urgent_priority']==1){ echo "danger even";} else { echo "odd gradeX";}?>">
                                                  <td>
													  <?php echo $complaint_list["ts_number"] ?>
												  </td>
												  <td>
													  <?php 
															echo date('d-M-Y',strtotime($complaint_list["date"])); 
													  ?>
												  </td>
                                           <!--       <td> -->
													  <?php  /*
													  	if($complaint_list["status"]=='Closed')
														{
															echo date('d-M-Y',strtotime($complaint_list["solution_date"])); 
														}
														else
														{
															echo 'Not Closed';
														} */
													  ?> 
											<!--	  </td> -->
											
												<td>
                                                      <?php 
													  	if($complaint_list["status"]=='Closed')
														{
															echo "Closed ". nicetime($complaint_list["solution_date"]); 
														}
														else
														{
															echo nicetime($complaint_list["date"]);
														}
													  ?>
												  </td>
												  <td>
                                                      <?php
													  	if($complaint_list["status"]=='Closed')
														{
															echo nicetime_two_parameters($complaint_list["date"],$complaint_list["solution_date"]); 
															//echo time_elapsed_string3($complaint_list["date"],$complaint_list["solution_date"], true);
														}
														else
														{
															echo 'N/A';
														}
													  ?>
												  </td>
                                                  
												                                            
                                          <td>
                                              <?php 
                                              $ty=$this->db->query("select * from tbl_cities where pk_city_id='".$complaint_list["fk_city_id"]."'");
                                              $rt=$ty->result_array();
                                              echo $rt[0]["city_name"] ?>
                                          </td>
										  <td>
                                              <?php    
												$nsql3=$this->db->query("select * from tbl_clients where pk_client_id ='".$complaint_list['fk_customer_id']."'");
												$n2sql3=$nsql3->result_array();
												echo $n2sql3[0]['client_name'];
												?>
                                          </td>
											
									<!--	  <td>
										  <?php 
												$nsql3=$this->db->query("select area from tbl_area where pk_area_id ='".$n2sql3[0]['fk_area_id']."'");
												$n2sql3=$nsql3->result_array();
												echo $n2sql3[0]['area'];
												?>
										  </td> -->
										  
										  <td>
                                              <?php 
                                              $ty=$this->db->query("select * from tbl_instruments where pk_instrument_id='".$complaint_list["fk_instrument_id"]."'");
                                              $rt=$ty->result_array();
                                              //echo $rt[0]["fk_brand_id"];
											  if($ty->num_rows()>0)
											  {
												  $ty2=$this->db->query("select * from tbl_products where pk_product_id='".$rt[0]["fk_product_id"]."'");
												  $rt2=$ty2->result_array();
												  echo $rt2[0]["product_name"];
											  }
                                              //echo $complaint_list["instrument_name"] ?>
                                          </td>
                                          <td>
                                              <?php 
											  if($ty->num_rows()>0)
											  {
											  	echo $rt[0]["serial_no"]; 
											  }
											  ?>
                                          </td>

                                                  <td>
													  <?php echo $complaint_list["problem_summary"] ?>
												  </td>
                                                  
                                                  <td>
													  <?php 
													  $ty=$this->db->query("select * from user where id ='".$complaint_list["assign_to"]."'");
													  $rt=$ty->result_array();
													  echo $rt[0]["first_name"];
													  //echo $complaint_list["FSE_SAP"] ?>
												  </td>
												  </td>
                                          <td>
                                              <?php 
													  $this->load->model("complaint_model");
													  $obj=new Complaint_model();
													  $obj->current_status($complaint_list['status']);
												?>
                                          </td>
                                          <td>
                                          <a class="btn btn-sm default purple-stripe" 
                                          href="<?php echo base_url();?>complaint/ts_report_director/<?php echo $complaint_list["pk_complaint_id"] ?>">
                                          	TSR 
											<i class="fa fa-eye"></i>
                                          </a>
                                          <?php if($this->session->userdata('userrole')=='Admin'){?>
                                          <a class="btn btn-sm default red-thunderbird" onClick="return confirm('Are you sure you want to delete?')" 
                                            href="<?php echo base_url();?>complaint/delete_complaint/<?php echo $complaint_list["pk_complaint_id"];?>">
                                              Delete <i class="fa fa-trash-o"></i>
                                            </a>
											
											<a class="btn btn-sm default blue-stripe" onClick="return confirm('Are you sure you want to edit?')" 
                                            href="<?php echo base_url();?>complaint/add_complaint_registration/<?php echo $complaint_list["pk_complaint_id"];?>">
                                              Edit <i class="fa fa-edit"></i>
                                            </a>
											
                                            <?php }?>
											<a class="btn btn-sm default yellow-zed-stripe" 
                                          href="<?php echo base_url();?>complaint/shift_complaint/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											Shift 
											<i class="fa fa-share"></i>
                                          </a>
										  <a class="btn btn-sm default blue-stripe" href="<?php echo base_url();?>products/supervisor_sprf/<?php echo $complaint_list["pk_complaint_id"] ?>">
                                          	SPRF Form
                                          </a>
                                          </td>
										  <!--
										  <td>
										  <a class="btn btn-sm default yellow-zed-stripe" 
                                          href="<?php echo base_url();?>complaint/shift_complaint/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											Shift 
											<i class="fa fa-share"></i>
                                          </a>
										  </td>
										  -->
										  <?php
												$userid		=	$this->session->userdata('userid');
												$userrole	=	$this->session->userdata('userrole');
												$complaint_id =	$complaint_list["pk_complaint_id"];
												$count_msgs	=	0;
												$count_msgs_r	=	0;
												$countfield	=	'read_director';
												
												
												if($userrole=='Admin') $countfield = 'read_director';
												if($userrole=='secratery') $countfield = 'read_secratery';
												if($userrole=='Supervisor') $countfield = 'read_supervisor';
												if($userrole=='FSE' || $userrole=='Salesman') $countfield = 'read_employee';
												
												$cq			=	"select * from tbl_comments where `fk_complaint_id`='".$complaint_id."' AND `".$countfield."`=0";
												$cr			=	$this->db->query($cq);
												$count_msgs	=	sizeof($cr->result_array());
												
												$cq			=	"select * from tbl_comments where `fk_complaint_id`='".$complaint_id."'";
												$cr			=	$this->db->query($cq);
												$count_msgs_r	=	sizeof($cr->result_array());
											?>
										  
										  <td>
										  <a class="icon-btn" 
                                          href="<?php echo base_url();?>complaint/comments/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											<i class="fa fa-comments-o"></i>
											<div>Comments</div>
											<?php if ($count_msgs>0) {?>
												<span class="badge bg-blue">
												<?php echo $count_msgs; ?>
												</span>
											<?php } ?>
											<?php if ($count_msgs==0 && $count_msgs_r>0) {?>
												<span class="badge bg-grey-cascade">
												<?php echo $count_msgs_r; ?>
												</span>
											<?php } ?>
                                          </a>
										  </td>
                                          <!--
                                          <td>
                                          <a class="btn btn-default" href="<?php echo base_url();?>products/supervisor_sprf/<?php echo $complaint_list["pk_complaint_id"] ?>">
                                          	SPRF Form
                                          </a>
                                          </td>
										  -->
                                          <td>
                                          	<?php 
                                                if($complaint_list['sprf_date']!='0000-00-00 00:00:00')
												{
													echo nicetime($complaint_list['sprf_date']);
												}
												else
												{
													echo "N/A";
												}
											 ?>
                                          </td>
												 
											  </tr>
											  <?php
										  }
									  }
                              ?>
                                
                              </tbody>
                            </table>
                           </div>
                          </div>
                        </div>
                        
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box green-meadow">
                          <div class="portlet-title">
                            <div class="caption"> <i class="fa icon-book-open"></i>Complaints List (Closed)</div>
                            <div class="tools"> 
                            	<a href="javascript:;" class="collapse"> </a> 
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a> 
                                <a href="javascript:;" class="reload"> </a> 
                                <a href="javascript:;" class="remove"> </a> 
                             </div>
                          </div>
                          <div class="portlet-body">
                            <div class="table-toolbar">
                            	
                              
                            </div>
                          <div class="portlet-body flip-scroll">
                          <table class="table table-striped table-bordered table-hover flip-content " id="sample_220">
                              <thead class="bg-grey-cascade">
							  <tr>
                                    
                                    <th class="sorting">
                                         
                                    </th>
                          <!--          <th>
                                         
                                    </th>
								<th>
                                         Closing Date
                                    </th> -->
                                    
                                    <th>
                                         
                                    </th>
									<th>
										
                                         
                                    </th>
                                    <th>
										 
									</th>
									<th>
										 
									</th>
									<th>
										 
									</th>
									<th>
										
									</th>
									
									<th>
										 
									</th>
  
                                    <th>
                                         
                                    </th>
                                    
                                    <th>
                                         
                                    </th>
                                    <th>
                                         
                                    </th>
                                    <th>
                                         
                                    </th>
									<!--
									<th>
                                         
                                    </th>
									-->
									<th>
										
									</th>
									
                                </tr>
                               
                                <tr>
                                    
                                    <th class="sorting">
                                         TS number
                                    </th>
                                    <th>
                                         Date
                                    </th>
					<!--				<th>
                                         Closing Date
                                    </th> -->
                                    
                                    <th>
                                         Time Elapsed
                                    </th>
									<th>
										Time Taken
                                         
                                    </th>
                                    <th>
										 City
									</th>
									<th>
										 Customer
									</th>
								<!--	<th>
										 Area
									</th> -->
									<th>
										Equipment
									</th>
									
									<th>
										 S/No
									</th>
  
                                    <th>
                                         Problem Summary
                                    </th>
                                    
                                    <th>
                                         FSE/SAP
                                    </th>
                                    <th>
                                         Status
                                    </th>
                                    <th>
                                         Actions
                                    </th>
									<!--
									<th>
                                         Shift
                                    </th>
									-->
									<th>
										Comments
									</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
									  
										//
									  $dbres = $this->db->query("SELECT * FROM tbl_complaints where complaint_nature='complaint' 
									  AND 
									  status IN ('Closed') order by `pk_complaint_id` DESC");
           							  $dbresResult=$dbres->result_array();
									  if (sizeof($dbresResult) == "0") {
										  
									  } else {
										  foreach ($dbresResult as $complaint_list) {
											  /*
											  if ($k==1) {
												  if ($complaint_list['status']=='Pending Verification' || $complaint_list['status']=='Closed' )
													  continue;
											  }
											  elseif ($k==2) {
												  if ($complaint_list['status']!='Pending Verification' )
													  continue;
											  }
											  elseif ($k==3) {
												  if ($complaint_list['status']!='Closed' )
													  continue;
											  }*/
											  ?>
											  <tr class=" <?php if($complaint_list['urgent_priority']==1){ echo "danger even";} else { echo "odd gradeX";}?>">
                                                  <td>
													  <?php echo $complaint_list["ts_number"] ?>
												  </td>
												  <td>
													  <?php 
															echo date('d-M-Y',strtotime($complaint_list["date"])); 
													  ?>
												  </td>
                                           <!--       <td> -->
													  <?php  /*
													  	if($complaint_list["status"]=='Closed')
														{
															echo date('d-M-Y',strtotime($complaint_list["solution_date"])); 
														}
														else
														{
															echo 'Not Closed';
														} */
													  ?> 
											<!--	  </td> -->
											
												<td>
                                                      <?php 
													  	if($complaint_list["status"]=='Closed')
														{
															echo "Closed ". nicetime($complaint_list["solution_date"]); 
														}
														else
														{
															echo nicetime($complaint_list["date"]);
														}
													  ?>
												  </td>
												  <td>
                                                      <?php
													  	if($complaint_list["status"]=='Closed')
														{
															echo nicetime_two_parameters($complaint_list["date"],$complaint_list["finish_time"]); 
															//echo time_elapsed_string3($complaint_list["date"],$complaint_list["solution_date"], true);
														}
														else
														{
															echo 'N/A';
														}
													  ?>
												  </td>
                                                  
												                                            
                                          <td>
                                              <?php 
                                              $ty=$this->db->query("select * from tbl_cities where pk_city_id='".$complaint_list["fk_city_id"]."'");
                                              $rt=$ty->result_array();
                                              echo $rt[0]["city_name"] ?>
                                          </td>
										  <td>
                                              <?php    
												$nsql3=$this->db->query("select * from tbl_clients where pk_client_id ='".$complaint_list['fk_customer_id']."'");
												$n2sql3=$nsql3->result_array();
												echo $n2sql3[0]['client_name'];
												?>
                                          </td>
											
										<!--  <td>
										  <?php 
												$nsql3=$this->db->query("select area from tbl_area where pk_area_id ='".$n2sql3[0]['fk_area_id']."'");
												$n2sql3=$nsql3->result_array();
												echo $n2sql3[0]['area'];
												?>
										  </td> -->
										  
										  <td>
                                              <?php 
                                              $ty=$this->db->query("select * from tbl_instruments where pk_instrument_id='".$complaint_list["fk_instrument_id"]."'");
                                              $rt=$ty->result_array();
                                              //echo $rt[0]["fk_brand_id"];
											  if($ty->num_rows()>0)
											  {
												  $ty2=$this->db->query("select * from tbl_products where pk_product_id='".$rt[0]["fk_product_id"]."'");
												  $rt2=$ty2->result_array();
												  echo $rt2[0]["product_name"];
											  }
                                              //echo $complaint_list["instrument_name"] ?>
                                          </td>
                                          <td>
                                              <?php 
											  if($ty->num_rows()>0)
											  {
											  	echo $rt[0]["serial_no"]; 
											  }
											  ?>
                                          </td>

                                                  <td>
													  <?php echo $complaint_list["problem_summary"] ?>
												  </td>
                                                  
                                                  <td>
													  <?php 
													  $ty=$this->db->query("select * from user where id ='".$complaint_list["assign_to"]."'");
													  $rt=$ty->result_array();
													  echo $rt[0]["first_name"];
													  //echo $complaint_list["FSE_SAP"] ?>
												  </td>
												  </td>
                                          <td>
                                              <?php 
													  $this->load->model("complaint_model");
													  $obj=new Complaint_model();
													  $obj->current_status($complaint_list['status']);
												?>
                                          </td>
                                          <td>
                                          <a class="btn btn-sm default purple-stripe" 
                                          href="<?php echo base_url();?>complaint/ts_report_director/<?php echo $complaint_list["pk_complaint_id"] ?>">
                                          	TSR 
											<i class="fa fa-eye"></i>
                                          </a>
                                          <?php if($this->session->userdata('userrole')=='Admin'){?>
                                          <a class="btn btn-sm default red-thunderbird" onClick="return confirm('Are you sure you want to delete?')" 
                                            href="<?php echo base_url();?>complaint/delete_complaint/<?php echo $complaint_list["pk_complaint_id"];?>">
                                              Delete <i class="fa fa-trash-o"></i>
                                            </a>
											
											<a class="btn btn-sm default blue-stripe" onClick="return confirm('Are you sure you want to edit?')" 
                                            href="<?php echo base_url();?>complaint/add_complaint_registration/<?php echo $complaint_list["pk_complaint_id"];?>">
                                              Edit <i class="fa fa-edit"></i>
                                            </a>
											
                                            <?php }?>
											<a class="btn btn-sm default yellow-zed-stripe" 
                                          href="<?php echo base_url();?>complaint/shift_complaint/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											Shift 
											<i class="fa fa-share"></i>
                                          </a>
                                          </td>
										  <!--
										  <td>
										  <a class="btn btn-sm default yellow-zed-stripe" 
                                          href="<?php echo base_url();?>complaint/shift_complaint/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											Shift 
											<i class="fa fa-share"></i>
                                          </a>
										  </td>
										  -->
										  
										  <?php
												$userid		=	$this->session->userdata('userid');
												$userrole	=	$this->session->userdata('userrole');
												$complaint_id =	$complaint_list["pk_complaint_id"];
												$count_msgs	=	0;
												$count_msgs_r	=	0;
												$countfield	=	'read_director';
												
												
												if($userrole=='Admin') $countfield = 'read_director';
												if($userrole=='secratery') $countfield = 'read_secratery';
												if($userrole=='Supervisor') $countfield = 'read_supervisor';
												if($userrole=='FSE' || $userrole=='Salesman') $countfield = 'read_employee';
												
												$cq			=	"select * from tbl_comments where `fk_complaint_id`='".$complaint_id."' AND `".$countfield."`=0";
												$cr			=	$this->db->query($cq);
												$count_msgs	=	sizeof($cr->result_array());
												
												$cq			=	"select * from tbl_comments where `fk_complaint_id`='".$complaint_id."'";
												$cr			=	$this->db->query($cq);
												$count_msgs_r	=	sizeof($cr->result_array());
											?>	
										  
										  <td>
										  <a class="icon-btn" 
                                          href="<?php echo base_url();?>complaint/comments/<?php echo $complaint_list["pk_complaint_id"] ?>">                                         	
											<i class="fa fa-comments-o"></i>
											<div>Comments</div>
											<?php if ($count_msgs>0) {?>
												<span class="badge bg-blue">
												<?php echo $count_msgs; ?>
												</span>
											<?php } ?>
											<?php if ($count_msgs==0 && $count_msgs_r>0) {?>
												<span class="badge bg-grey-cascade">
												<?php echo $count_msgs_r; ?>
												</span>
											<?php } ?>
                                          </a>
										  </td>
										  
												 
											  </tr>
											  <?php
										  }
									  }
                              ?>
                                
                              </tbody>
                            </table>
                           </div>
                          </div>
                        </div>
                        
						<?php //} ?>
					  </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <?php $this->load->view('footer');?>
		
		
         <script>
		 
		 $(document).ready(function() { 
			var table = $('#sample_220').dataTable({
			  'iDisplayLength': 1000,
			  'order': [[ 1, "desc" ]]
			}).columnFilter({ sPlaceHolder: "head:before",
					aoColumns: [ 	{type: "text" },
								{ type: "text" },
								{ type: "text" },
								{ type: "text" },
								{ type: "text" },
				    	 		{ type: "text" },
								{ type: "text" },
								{ type: "text" },
                                { type: "text" },
								{ type: "text" },
								{ type: "text" }
								
						]

		});
		var table2 = $('#sample_221').dataTable({
			  'iDisplayLength': 1000,
			  'order': [[ 1, "desc" ]]
			}).columnFilter({ sPlaceHolder: "head:before",
					aoColumns: [ 	{type: "text" },
								{ type: "text" },
								{ type: "text" },
								{ type: "text" },
								{ type: "text" },
				    	 		{ type: "text" },
								{ type: "text" },
								{ type: "text" },
                                { type: "text" },
								{ type: "text" },
								{ type: "text" }
								
						]

		});
		var table3 = $('#sample_222').dataTable({
			  'iDisplayLength': 1000,
			  'order': [[ 1, "desc" ]]
			}).columnFilter({ sPlaceHolder: "head:before",
					aoColumns: [ 	{type: "text" },
								{ type: "text" },
								{ type: "text" },
								{ type: "text" },
								{ type: "text" },
				    	 		{ type: "text" },
								{ type: "text" },
								{ type: "text" },
                                { type: "text" },
								{ type: "text" },
								{ type: "text" }
								
						]

		});
		var table4 = $('#sample_225').dataTable({
			  'iDisplayLength': 1000,
			  'order': [[ 1, "desc" ]]
			}).columnFilter({ sPlaceHolder: "head:before",
					aoColumns: [ 	{type: "text" },
								{ type: "text" },
								{ type: "text" },
								{ type: "text" },
								{ type: "text" },
				    	 		{ type: "text" },
								{ type: "text" },
								{ type: "text" },
                                { type: "text" },
								{ type: "text" },
								{ type: "text" }
								
						]

		});
});

</script>