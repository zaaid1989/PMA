<?php include('header.php');?>
            
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title"> Add Employee <small>Register New Employee</small> </h3>
                    <div class="page-bar">
                      <ul class="page-breadcrumb">
                        <li> <i class="fa fa-home"></i> <a href="<?php echo site_url(); ?>">Home</a> <i class="fa fa-angle-right"></i> </li>
                        <li> <a href="<?php echo site_url(); ?>profile/get_employees">Employees</a> <i class="fa fa-angle-right"></i> </li>
						<li> Add Employee </li>
                      </ul>
                      
                    </div>
                    <!-- END PAGE HEADER--> 
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="portlet box yellow-gold" id="form_wizard_1">
								<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-plus"></i> Employee Registeration - <span class="step-title">
								Step 1 of 5 </span>
							</div>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
								</a>
								
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
                        <div class="portlet-body form"> 
                                  <!-- BEGIN FORM-->
                                  <?php if(isset($message))
									  { 
										echo '<div class="alert alert-danger alert-dismissable">  
												<a class="close" data-dismiss="alert">×</a>  
												User Already Exist.  
											  </div>';
									  }
								  ?>
                                    <!-- BEGIN FORM-->
                                    <form  action="<?php echo base_url(); ?>profile/insert_employee"  id="submit_form2" method="post" 
                                    class="form-horizontal" enctype="multipart/form-data"  >
										<div class="form-wizard">
                                            <div class="form-body">
												<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Person Info </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i>Office Info</span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i>Items Info</span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Doc Info </span>
												</a>
											</li>
                                            <li>
												<a href="#tab5" data-toggle="tab" class="step">
												<span class="number">
												5 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Trainings </span>
												</a>
											</li>
                                            
                                            <li>
												<a href="#tab6" data-toggle="tab" class="step">
												<span class="number">
												6 </span>
												<span class="desc">
												<i class="fa fa-check"></i>Salary Info</span>
												</a>
											</li>
										</ul>
												<div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success">
                                                    </div>
                                                </div>
										<div class="tab-content">
                                        	<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												You have some form errors. Please check below.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Your form validation is successful!
											</div>
                                            
                                            <div class="tab-pane active" id="tab1">
                                                <h3 class="form-section">Person Info</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">User Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="my_username" name="username">
																
															</div>
														</div>
													</div>
													<script>
														$(document).ready(function(){
														//Code for capitaliz first letter starts
														$('#my_username').keyup(function(evt){
															var txt = $('#my_username').val();
															
															var lowercase=txt.toLowerCase();
															//alert('lowercase'+lowercase);
															$('#my_username').val(lowercase);
														});
														//Code for capitaliz first letter ends
														});
													</script>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Full Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="first_name">
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">NIC No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="nic">
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Passport No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="passport">
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
                                                
                                                
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date of Birth</label>
															<div class="col-md-9">
																<input type="text" class="form-control datepicker2" name="DOB">
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Personal Mobile No</label>
                                                            <div class="col-md-9">
																<input type="text" class="form-control" name="mobile">
																
															</div>
															
														</div>
													</div>
													<!--/span-->
												</div>
												
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Personal Email Address</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="email">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Home Contact No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="landline">
															</div>
														</div>
													</div>
												</div>
                                                
                                                <!--/row-->
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Home Address</label>
															<div class="col-md-9">
																<input style="display:none" type="text" name="fakeusernameremembered"/>
																<input type="text" class="form-control" name="address">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label  class="control-label col-md-3">Password</label>
															<div class="col-md-9">
																<input style="display:none" type="password" name="fakepasswordremembered"/>
																<input type="password" class="form-control" name="password">
																
																
															</div>
														</div>
													</div>
												</div>
                                              </div>
                                                
                                             <div class="tab-pane" id="tab2">
                                                <h3 class="form-section">Office Information</h3>
                                                
                                                <div class="row">
													
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company Mobile No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="company_mobile">
															</div>
														</div>
													</div>
													<!--/span-->
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company Email Address</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="company_email">
															</div>
														</div>
													</div>
                                                    
                                                    
												</div>
                                                
												<!--row-->
												<div class="row">
                                                    <!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Department</label>
															<div class="col-md-9">
																<select class="form-control  " id="department" name="department">

                                                                    <option value="">--Choose--</option>

                                                                    <option value="Sales">Sales</option>

                                                                    <option value="Technical">Technical</option>

                                                                </select>
															</div>
														</div>
													</div>
													<!--/span-->
                                                   
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Designation</label>
															<div class="col-md-9 mydesignations">
                                                            <select name="userrole" class="form-control">
															  <?php 
                                                                $tbl_designations=$this->db->query("select * from tbl_designations");
                                                                $dataa=$tbl_designations->result_array();
                                                                foreach($dataa as $val)
                                                                {
                                                              ?>
                                                              <option value="<?php echo $val['name']?>"><?php echo $val['name']?></option>
                                                              <?php }?>
                                                            </select>
															</div>
														</div>
													</div>
													
												</div>
												<!--/row-->
                                                
                                                <!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Territory</label>
															<div class="col-md-9">
																<select name="offices" class="form-control">
																  <?php 
                                                                    $tbl_designations=$this->db->query("select * from tbl_offices");
                                                                    $dataa=$tbl_designations->result_array();
                                                                    foreach($dataa as $val)
                                                                    {
                                                                  ?>
                                                                  <option value="<?php echo $val['pk_office_id']?>"><?php echo $val['office_name']?></option>
                                                                  <?php }?>
                                                                </select>
															</div>
														</div>
													</div>
                                                   
													<div class="col-md-6">
														<div class="form-group">
                                                        <label class="control-label col-md-3">City</label>
										                <div class="col-md-9">
                                                          <div class="checkbox-list">
                                                            <select name="cities" class="form-control" >
																  <?php 
                                                                    $tbl_designations=$this->db->query("select * from tbl_cities");
                                                                    $dataa=$tbl_designations->result_array();
                                                                    foreach($dataa as $val)
                                                                    {
                                                                  ?>
                                                                  <option value="<?php echo $val['pk_city_id']?>"><?php echo $val['city_name']?></option>
                                                                  <?php }?>
                                                                </select>
                                                         </div>

                                                      </div>
                                                  </div>
                                              </div>
												
												</div>
												<!--/row-->
                                                <div class="row">
													
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date of Joining</label>
															<div class="col-md-9">
																<input type="text" class="form-control datepicker2" name="date_of_joining">
															</div>
														</div>
													</div> 
                                                    
                                                    
                                                    
                                                    
												</div>
                                                
												<!--row-->
                                                </div>
                                     <div class="tab-pane" id="tab3">
                                                <h3 class="form-section">Items Information</h3>
                                                <!--/row-->
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3">Laptop Provided</label>
															<div class="col-md-9">
																<div class="radio-list">
																	<label class="radio-inline">
																	<input type="radio" name="is_laptop_provided" id="optionsRadios2" value="1"/>
																	Yes </label>
																	<label class="radio-inline">
																	<input type="radio" name="is_laptop_provided" id="optionsRadios2a" value="0" checked/>
																	No </label>
																</div>
															</div>

														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
                                                
                                              <!--/LaptopYes-->  
                                             <div id="laptopyes" style="display:none">   
                                             <!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Laptop Brand</label>
															<div class="col-md-9">
                                                            <input type="text" class="form-control" name="laptop_brand">
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Laptop Serial No</label>
															<div class="col-md-9">
															<input type="text" class="form-control" name="laptop_serial">
															</div>
														</div>
													</div>
                                                 </div>
                                                 <!--/row-->
                                               </div>
                                               <!--/laptopyes-->
                                               
                                            <!--/row-->
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3">Tool Kit Provided</label>
															<div class="col-md-9">
																<div class="radio-list">
																	<label class="radio-inline">
																	<input type="radio" name="is_kit_provided" id="optionsRadios3" value="1"/>
																	Yes </label>
																	<label class="radio-inline">
																	<input type="radio" name="is_kit_provided" id="optionsRadios3" value="0" checked/>
																	No </label>
																</div>
															</div>

														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
                                                
                                             <!--/row-->
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3">Company Convenience</label>
															<div class="col-md-9">
																<div class="radio-list">
																	<label class="radio-inline">
																	<input type="radio" name="is_company_conveyance" id="optionsRadios4" value="1"/>
																	Yes </label>
																	<label class="radio-inline">
																	<input type="radio" name="is_company_conveyance" id="optionsRadios4a" value="0" checked/>
																	No </label>
																</div>
															</div>

														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
                                                
                                       <!--/Convenienceyes-->  
                                             <div id="conyes" style="display:none">   
                                             <!--/row-->
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3">Type</label>
															<div class="col-md-6">
                                                            <select id="problem_type2" name="conveyance_type"class="form-control  ">
          
                                                                <option value="">--Choose--</option>
                          
                                                                <option value="bike">Bike</option>
          
                                                               <option value="car">Car</option>
                                  
                                                             </select>
                                                            </div>
														</div>
													</div>
                                                    <!--/row-->
                                                   </div>
                                                     
                                                     <!--row-->
                                                     <div class="row">
                                                     <!--car-->
													<div id="car" style="display:none">
                                                    
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3">Car No</label>
															<div class="col-md-6">
															<input type="text" class="form-control" name="car_number">

															</div>
														</div>
													</div>
                                                    <!--/car-->
                                                    </div>
                                                     <!--bike-->
                                                    <div id="bike" style="display:none">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3">Bike No</label>
															<div class="col-md-6">
															<input type="text" class="form-control" name="bike_number">
															</div>
														</div>
													</div>
                                                    <!--/bike-->
                                                    </div>
                                                 </div>
                                                 <!--/row-->
                                               </div>
                                               <!--/Convenienceyes-->
                                               </div>
                                     <div class="tab-pane" id="tab4">
                                               <h3 class="form-section">Documents Information</h3>
                                               <!--/row-->
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3">Original Documents Submitted</label>
															<div class="col-md-9">
																<div class="radio-list">
																	<label class="radio-inline">
																	<input type="radio" name="is_document_submited" id="optionsRadios6" value="1"/>
																	Yes </label>
																	<label class="radio-inline">
																	<input type="radio" name="is_document_submited" id="optionsRadios6a" value="0" checked/>
																	No </label>
																</div>
															</div>

														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
                                                
                                     <!--/Docyes-->  
                                             <div id="docyes" style="display:none">   
                                             <!--/row-->
												<div class="row">
													<div class="col-md-12">
													<div class="table-scrollable">

                                                   <table class="table table-hover table-bordered">

                                                    <thead>

                                                      <tr>

                                                        <th> Degree</th>
                                                        
                                                        <th> Board/University </th>
                    
                                                        <th> Year </th>
                    
                                                        <th> Marks </th>
                    
                                                        <th> Attach File </th>
                                                        
                                                        <th> Add Row &nbsp; <a href="javascript:void()"><i class="fa fa-plus" onclick="add_row()"></i></a></th>
                    
                                                       
                  
                                                    </tr>
                  
                                                  </thead>

                                                  <tbody class="append_tbody">
                  
                                                    <tr>
                  
                                                      <td><input type="text" class="form-control" name="ducument_degree[0]" reguired></td>
                  
                                                      <td><input type="text" class="form-control" name="document_board[0]" reguired></td>
                  
                                                      <td><input type="text" class="form-control" name="document_years[0]" reguired></td>
                  
                                                      <td><input type="text" class="form-control" name="document_marks[0]" reguired></td>
                  
                                                      <td><input type="file" id="exampleInputFile1" name="document_file[0]" reguired></td>
                  
                                                      <td> 
                                                      		<a href="javascript:void()"><i class="fa fa-plus" onclick="add_row()"></i></a>
                                                                        <br />
                                                            <a href="javascript:void()"><i class="fa fa-minus"></i></a> 
                                                      </td>
                  
                                                    </tr>
                  
                                                  </tbody>
                                                  <script>
												  function add_row()
													  {
														var count1=Math.floor(Math.random()*101);
														$('.append_tbody').append('<tr><td><input type="text" class="form-control" name="ducument_degree['+count1+']" reguired></td><td><input type="text" class="form-control" name="document_board['+count1+']" reguired></td><td><input type="text" class="form-control" name="document_years['+count1+']" reguired></td><td><input type="text" class="form-control" name="document_marks['+count1+']" reguired></td><td><input type="file" id="exampleInputFile1" name="document_file['+count1+']" reguired></td><td><a href="javascript:void()"><i class="fa fa-plus" onclick="add_row()"></i></a><br /><a href="javascript:void()"><i class="fa fa-minus"></i></a></td>');
														$('select').select2();
														$( ".fa-minus" ).click(function(event) {
															  $(this).closest('tr').remove();
														  });
													   }
              										</script>

                                                        </table>
                          
                                                      </div>
                                                    
                                                    
                                                    </div>
                                                </div>	
                                                 <!--/row-->
                                               </div>
                                     <!--/Docyes-->  
                                     </div>
                                     <div class="tab-pane" id="tab5">
									            <h3 class="form-section">Trainings</h3>
                                             <!--/row-->
												<div class="row">
													<div class="col-md-12">
													<div class="table-scrollable">

                                                   <table class="table table-hover table-bordered">

                                                    <thead>

                                                      <tr>

                                                        <th> Equipment</th>
                                                        
                                                        <th colspan="2"> Training Date </th>
                                                        
                                                        <th> Training Location </th>
                    
                                                        <th> Training Expense </th>
                    
                                                        <th> Bill of Training  </th>
                    
                                                        <th> Attach File </th>
                                                        
                                                        <th> Add Row &nbsp; <a href="javascript:void()"><i class="fa fa-plus" onclick="add_row_training()"></i></a></th>
                    
                                                        
                  
                                                    </tr>
                  
                                                   <tr>

                                                        <th></th>
                                                        
                                                        <th>From</th>
                                                        
                                                        <th>To</th>
                    
                                                        <th></th>
                    
                                                        <th></th>
                    
                                                        <th></th>
                                                        
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                  </thead>
                                                  <tbody class="append_tbody2">
                                                    <tr>
                                                      <td>
                                                        <select class="form-control" name="training_equipment[0]">
                                                        	<?php 
                                                                    $tbl_designations=$this->db->query("select * from tbl_products");
                                                                    $dataa=$tbl_designations->result_array();
                                                                    foreach($dataa as $val)
                                                                    {
                                                                  ?>
                                                                  <option value="<?php echo $val['pk_product_id']?>" 
																  >
																  		<?php echo $val['product_name']?>
                                                                  </option>
                                                                  <?php }?>
                                                          </select>
                                                      </td>
                  
                                                      <td><input type="text" class="form-control datepicker2" name="training_date_from[0]" reguired></td>
                  
                                                      <td><input type="text" class="form-control datepicker2" name="training_date_to[0]" reguired></td>
                  
                                                      <td><input type="text" class="form-control" name="training_location[0]" reguired></td>
                  
                                                      <td><input type="text" class="form-control" name="training_expence[0]" reguired></td>
                  
                                                      <td><input type="text" class="form-control" name="bill_of_training[0]" reguired></td>
                  
                                                      <td><input type="file" id="exampleInputFile1" name="training_file[0]" reguired></td>
                  
                                                      <td> 
                                                      		<a href="javascript:void()"><i class="fa fa-plus" onclick="add_row_training()"></i></a>
                                                                        <br />
                                                            <a href="javascript:void()"><i class="fa fa-minus"></i></a> 
                                                       </td>
                  
                                                    </tr>
                  
                                                  </tbody>
                                                  <script>
												  function add_row_training()
													  {
														var count1=Math.floor(Math.random()*101);
														$('.append_tbody2').append('<tr><td><select class="form-control" name="training_equipment['+count1+']"><?php $tbl_designations=$this->db->query("select * from tbl_products");$dataa=$tbl_designations->result_array();foreach($dataa as $val){?><option value="<?php echo $val['pk_product_id']?>" ><?php echo $val['product_name']?></option><?php }?></select></td><td><input type="text" class="form-control datepicker2" name="training_date_from['+count1+']" reguired></td><td><input type="text" class="form-control datepicker2" name="training_date_to['+count1+']" reguired></td><td><input type="text" class="form-control" name="training_location['+count1+']" reguired></td><td><input type="text" class="form-control" name="training_expence['+count1+']" reguired></td><td><input type="text" class="form-control" name="bill_of_training['+count1+']" reguired></td><td><input type="file" id="exampleInputFile1" name="training_file['+count1+']" reguired></td><td><a href="javascript:void()"><i class="fa fa-plus" onclick="add_row_training()"></i></a><br /><a href="javascript:void()"><i class="fa fa-minus"></i></a></td></tr>');
														$( ".fa-minus" ).click(function(event) {
															  $(this).closest('tr').remove();
														  });
														  $('.datepicker2').datepicker({
															dateFormat: 'dd-M-yy'
															});
													   }
              										</script>
                                                        </table>
                                                      </div>
                                                    </div>
                                                </div>	
                                      </div>
                                     <div class="tab-pane" id="tab6">
									            <h3 class="form-section">Salary</h3>
                                             <!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Basic Salary</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="salary">
																
															</div>
														</div>
													</div>
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Daily Allowance</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="specific_amount">
																
															</div>
														</div>
													</div>
                                                     <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">10% deduction</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="deduction_10_percent">
																
															</div>
														</div>
													</div>
                                                     <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Income Tax deduction</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="income_tax_deduction">
																
															</div>
														</div>
													</div>
                                                     <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Allowance / Arrear</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="allowance_arrear">
																
															</div>
														</div>
													</div>
                                                     <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile Quote</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="mobile_quote">
																
															</div>
														</div>
													</div>
													<!--/span-->
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Personal Mobile No</label>
                                                            <div class="col-md-9">
																<input type="text" class="form-control" name="mobile">
																
															</div>
															
														</div>
													</div>-->
													<!--/span-->
												</div>	
                                      </div>
                                         <!--/row-->
                                    </div>
											
                                            
                                    <div class="form-actions">
										<div class="row">
											<div class="col-md-offset-5 col-md-7">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>
												<a href="javascript:;" class="btn blue button-next">
												Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>
												<button type="submit" class="btn green button-submit">
												Submit <i class="m-icon-swapright m-icon-white"></i>
												</button>
											</div>
										</div>
									</div>
                                        </div>
                                       </div>
                                       </form>
                                      </div>
						<!-- END FORM-->
                        </div>
                      </div>
                    </div>
                   <!-- END PAGE CONTENT--> 
                </div>
            </div>
            <!-- END CONTENT -->
            <script>
			$('#optionsRadios2').on("change",function(){

				var locations = $(this).val();

				if(locations=="1"){
					document.getElementById('laptopyes').style.display = 'block';
					document.getElementById('laptopno').style.display = 'none';
				}
				});
				$('#optionsRadios2a').on("change",function(){
				var locations = $(this).val();
				if(locations=="0"){
					document.getElementById('laptopyes').style.display = 'none';
					document.getElementById('laptopno').style.display = 'none';
				}
			  });
</script>
<script>
			$('#optionsRadios4').on("change",function(){
				var locations = $(this).val();
				if(locations=="1"){
					document.getElementById('conyes').style.display = 'block';
					document.getElementById('conno').style.display = 'none';
				}
				});
				$('#optionsRadios4a').on("change",function(){
				var locations = $(this).val();
				if(locations=="0"){
					document.getElementById('conyes').style.display = 'none';
					document.getElementById('conno').style.display = 'none';
				}
			  });
</script>
<script>
			$('#optionsRadios6').on("change",function(){

				var locations = $(this).val();

				if(locations=="1"){
					document.getElementById('docyes').style.display = 'block';
					document.getElementById('docno').style.display = 'none';
				}
				});
				$('#optionsRadios6a').on("change",function(){

				var locations = $(this).val();

				if(locations=="0"){

					document.getElementById('docyes').style.display = 'none';

					document.getElementById('docno').style.display = 'none';
				}

			  });
</script>

<script>
    	$(document).ready(function(){
			$('#problem_type1').on("change",function(){
				var locations = $(this).val();
				if(locations=="faisalabad"){

					document.getElementById('faisalabad').style.display = 'block';

					document.getElementById('Lahore').style.display = 'none';

					document.getElementById('Karachi').style.display = 'none';
					
					document.getElementById('Islamabad').style.display = 'none';

					}

				

				else if (locations=="Islamabad"){

				document.getElementById('Islamabad').style.display = 'block';

					document.getElementById('Lahore').style.display = 'none';

					document.getElementById('Karachi').style.display = 'none';
					
					document.getElementById('faisalabad').style.display = 'none';

				}

				

				else if (locations=="Karachi"){

				document.getElementById('Karachi').style.display = 'block';

					document.getElementById('Lahore').style.display = 'none';

					document.getElementById('faisalabad').style.display = 'none';
					
					document.getElementById('Islamabad').style.display = 'none';

					

				}

				else if (locations=="Lahore"){
				document.getElementById('Lahore').style.display = 'block';

					document.getElementById('faisalabad').style.display = 'none';

					document.getElementById('Karachi').style.display = 'none';
					
					document.getElementById('Islamabad').style.display = 'none';
					
				}

				else{

					document.getElementById('faisalabad').style.display = 'none';

					document.getElementById('Lahore').style.display = 'none';

					document.getElementById('Karachi').style.display = 'none';
					
					document.getElementById('Islamabad').style.display = 'none';

					}

				});

			});
			//
			$(document).ready(function(){
			$('#department').on("change",function(){

				var locations = $(this).val();

				if(locations=="Sales"){
					$('.mydesignations').html('<select name="userrole" class="form-control"><option value="Salesman">Salesman</option></select>')
					
					}
				else{

					$('.mydesignations').html('<select name="userrole" class="form-control"><?php $tbl_designations=$this->db->query("select * from tbl_designations");$dataa=$tbl_designations->result_array();foreach($dataa as $val){?><option value="<?php echo $val['name']?>"><?php echo $val['name']?></option><?php }?></select>')
					}

				});

			});
</script>
<script>
			$(document).ready(function(){
			$('#problem_type2').on("change",function(){

				var locations = $(this).val();

				if(locations=="car"){

					document.getElementById('car').style.display = 'block';

					document.getElementById('bike').style.display = 'none';


					}
				else if (locations=="bike"){

				document.getElementById('bike').style.display = 'block';

					document.getElementById('car').style.display = 'none';

				}
				else{

					document.getElementById('car').style.display = 'none';

					document.getElementById('bike').style.display = 'none';
					}
				});
			});
</script>

            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>

        </div>
        <!-- END CONTAINER -->
        
 <?php //include('footer.php');// it require special footer thats why wee use this one?>
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 <?php echo date('Y');?> &copy; MIS by Roze Solutions.
	</div>
	<div class="page-footer-tools">
		<span class="go-top">
		<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo base_url();?>assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<!--<script src="<?php echo base_url();?>assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>-->
<script src="<?php echo base_url();?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/form-wizard.js"></script>

<link href="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
//QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   FormWizard.init();
});
$(document).ready(function () {
	$('.datepicker2').datepicker({
		dateFormat: 'd-M-yy'
		});
	});
$(document).ready(function () {
	$('.datepicker').datepicker({
		dateFormat: 'd-M-yy'
		});
	});
</script>
<style>
.ui-datepicker-header
{
	color:#333 !important;
}
#ui-datepicker-div
{
	border: 1px solid gray;
	border-radius: 5px !important;
	background: none repeat scroll 0 0 #fff;
	padding:5px;
}
</style>
<!-- END JAVASCRIPTS -->
</body>

<!-- END BODY -->
</html>