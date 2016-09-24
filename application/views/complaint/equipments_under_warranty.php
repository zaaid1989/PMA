<?php $this->load->view('header');?>
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title"> Equipments - Under Warranty<small></small> </h3>
            <div class="page-bar">
              <ul class="page-breadcrumb">
                   <li>
                      <i class="fa fa-home"></i>
                      <a href="<?php echo base_url();?>">Home</a>
                      <i class="fa fa-angle-right"></i>
                  </li>
                  <li>
                      Equipments Under Warranty
                  </li> 
              </ul>
              
            </div>
            <!-- END PAGE HEADER--> 
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
              <div class="col-md-12"> 
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green-seagreen">
                  <div class="portlet-title">
                    <div class="caption"> <i class="icon-flag"></i>Equipments </div>
                    <div class="tools"> 
                    	<a href="javascript:;" class="collapse"> </a> 
                        <a href="javascript:;" class="remove"> </a> 
                    </div>
                  </div>
                  <div class="portlet-body">
                    
              	   
                   <table class="table table-striped table-bordered table-hover flip-content" id="dataaTable">
                      <thead class="bg-grey-gallery">
					  <tr>
<!--                          <th> Category   			</th>-->
                          <th>  			</th>
                          <th>  			    </th>
                          <th>   			</th>
                          <th>    			</th>
                          <th>    			</th>
                          <th>  		</th>
                          <th>  </th>
                          <th>   				</th>
                       
                        </tr>
                        <tr>
<!--                          <th> Category   			</th>-->
                          <th> Territory 			</th>
                          <th> City 			    </th>
                          <th> Vendor Name 			</th>
                          <th> Equipment   			</th>
                          <th> Location   			</th>
                          <th> Serial Number 		</th>
                          <th> Warranty End Date </th>
                          <th> Status  				</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                             $ty=$this->db->query("select * from tbl_instruments");
                             $rt=$ty->result_array();
							  if (sizeof($rt) == "0") {
                                  
                              } else {
                                  foreach ($rt as $get_users_list) {
									  $warranty_end_date = 0;
									  if ($get_users_list["warranty_months"]>0) {
												  $months_to_add = "+".$get_users_list["warranty_months"]." months";
												  $warranty_end_date =  strtotime($months_to_add, strtotime($get_users_list["warranty_start_date"]));
											}
										if ($warranty_end_date<time()) continue;
                                      ?>
                                      <tr class="odd gradeX">
                                          <td>
                                              <?php
											  		/*$ty=$this->db->query("select * from tbl_category where
													pk_category_id='".$get_users_list["fk_category_id"]."'");
                             						$rt=$ty->result_array();
													echo $rt[0]["category_name"];*/
                                                    $ty=$this->db->query("select * from tbl_offices where
													pk_office_id='".$get_users_list["fk_office_id"]."'");
                             						$rt=$ty->result_array();
													echo $rt[0]["office_name"];
                                              ?>
                                          </td>
                                          <td>
                                              <?php
                                                    if(substr($get_users_list['fk_client_id'],0,1)=='o')
                                                    {
                                                        $office_id		=	substr($get_users_list['fk_client_id'],13,1);
                                                        $qu2			=	"SELECT * from tbl_offices where pk_office_id =  '".$office_id."'";
                                                        $gh2			=	$this->db->query($qu2);
                                                        $rt2			=	$gh2->result_array();
                                                        $myclient 		= 	$rt2[0]['office_name'];
                                                        $city 			= 	$rt2[0]['office_name'];
                                                    }
                                                    else
                                                    {
                                                         $maxqu = $this->db->query("SELECT * FROM tbl_clients where pk_client_id='".$get_users_list['fk_client_id']."' ");
                                                         $maxval=$maxqu->result_array();
                                                         $myclient = $maxval[0]['client_name'];
                                                         //for area
                                                         $maxqu7 = $this->db->query("SELECT * FROM tbl_cities where pk_city_id='".$maxval[0]['fk_city_id']."' ");
                                                         $maxval7=$maxqu7->result_array();
                                                         $city = $maxval7[0]['city_name'];
                                                    }
													echo $city;
                                               ?>
                                          </td>
                                          <td>
                                              <?php 
											  		$ty2=$this->db->query("select * from tbl_vendors where 
													pk_vendor_id='".$get_users_list["fk_vendor_id"]."'");
													if($ty2->num_rows()>0)
													{
                             						$rt2=$ty2->result_array();
													echo $rt2[0]["vendor_name"]; 
													}
													?> 
                                                    
                                          </td>
                                          
                                          <td>
                                              <?php 
											  		$ty=$this->db->query("select * from tbl_products where pk_product_id='".$get_users_list["fk_product_id"]."'");
                             						$rt=$ty->result_array();
													echo $rt[0]["product_name"]; ?> 
                                          </td>
                                          <td>
                                              
											  <?php
                                              if(substr($get_users_list['fk_client_id'],0,1)=='o')
                                                    {
                                                        $office_id		=	substr($get_users_list['fk_client_id'],13,1);
                                                        $qu2			=	"SELECT * from tbl_offices where pk_office_id =  '".$office_id."'";
                                                        $gh2			=	$this->db->query($qu2);
                                                        $rt2			=	$gh2->result_array();
                                                        $myclient 		= 	$rt2[0]['office_name'];
                                                        $city 			= 	$rt2[0]['office_name'];
                                                    }
                                                    else
                                                    {
                                                         $maxqu = $this->db->query("SELECT * FROM tbl_clients where pk_client_id='".$get_users_list['fk_client_id']."' ");
                                                         $maxval=$maxqu->result_array();
                                                         $myclient = $maxval[0]['client_name'];
                                                    }
													echo $myclient;
											  ?> 
                                          </td>
                                          <td>
                                              <?php echo $get_users_list["serial_no"]; ?>
                                          </td>
                                          <td>
                                              <?php
											  if ($get_users_list["warranty_months"]<0) echo "Not Defined";
											  if ($get_users_list["warranty_months"]==0) echo "No Warranty";
											  if ($get_users_list["warranty_months"]>0) {
												 // echo date('d-M-Y', strtotime($get_users_list["warranty_start_date"]));
												  $months_to_add = "+".$get_users_list["warranty_months"]." months";
												  echo date('d-M-Y', strtotime($months_to_add, strtotime($get_users_list["warranty_start_date"])));
											  }
                                                    
                                                    /*$difference		=	strtotime($get_users_list["warranty_start_date"]) - time();
								                    $interval		=	floor($difference/(60*60*24));
                                                    echo $interval." days";*/
                                              ?>
                                          </td>
                                          <td>
                                              <?php if($get_users_list["status"]=='1')
													  {
														  echo "<label class='label bg-blue'>Active</label>";
													  }
													  if($get_users_list["status"]=='2')
													  {
														  echo "<label class='label bg-yellow-zed'>Inactive</label>";
													  }
													  if($get_users_list["status"]=='3')
													  {
														  echo "<label class='label bg-red'>Expired</label>";
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
                <!-- END EXAMPLE TABLE PORTLET--> 
              </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php $this->load->view('footer');?>
<script>
		 
		 $(document).ready(function() { 
			var table = $('#dataaTable').dataTable({
			  'iDisplayLength': 1000,
			  'order': [[ 0, "desc" ]]
			}).columnFilter({ sPlaceHolder: "head:before",
					aoColumns: [ 	{type: "text" },
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