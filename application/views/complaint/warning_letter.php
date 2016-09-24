<?php $this->load->view('header');?>
      <!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">
      Warning Letter <small></small>
      </h3>
      <div class="page-bar">
          <ul class="page-breadcrumb">
              <li>
                  <i class="fa fa-home"></i>
                  <a href="<?php echo base_url();?>">Home</a>
                  <i class="fa fa-angle-right"></i>
              </li>
              <li>
                  <a href="<?php echo base_url();?>complaint/all_warning_letters">Warning Letter</a>
                  <i class="fa fa-angle-right"></i>
              </li>
          </ul>
        
      </div>
      <!-- END PAGE HEADER--> 
      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12"> 
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet box grey-cascade">

            <div class="portlet-title">

              <div class="caption"> <i class="fa fa-globe"></i>Warning Letters</div>

              <div class="tools"> 
                  <a href="javascript:;" class="collapse"> </a> 
                  <a href="#portlet-config" data-toggle="modal" class="config"> </a> 
                  <a href="javascript:;" class="reload"> </a> 
                  <a href="javascript:;" class="remove"> </a> 
              </div>

            </div>
		   <div class="portlet-body form">
           <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>complaint/insert_warning_letter">
        	<input type="hidden" name="engineer_dvr_form" value="engineer_dvr_form" />
            <input type="hidden" name="engineer" value="<?php echo $this->session->userdata('userid');?>" />
            <div class="form-body">

                <div class="form-group">
                    <label class="col-md-3 control-label">Date</label>
                    <div class="col-md-8">
                        <input type="text" class="datepicker2 form-control" name="date" required/>
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-md-3 control-label">Employee</label>

                    <div class="col-md-8">
                      <select class="form-control  " name="employee" id="employee" required>
                        <option value="">--Choose--</option>
                        <?php $quw="SELECT * from user  where delete_status = '0' ORDER BY  `fk_office_id` ,  `userrole` ASC ";
                          $ghw=$this->db->query($quw);
                          $rtw=$ghw->result_array();
                          foreach($rtw as $value)
                            {
                                ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['first_name'];?></option>
                                <?php
                            }?>
                      </select>
                    </div>
                </div>

                </div>
                <div class="form-group">

                    <label class="col-md-3 control-label">Employee Comments</label>

                    <div class="col-md-8">

                        <textarea name="employee_comments" class="input-xlarge" id="employee_comments" rows="5" required></textarea>

                    </div>

                </div>
                <div class="form-group">

                    <label class="col-md-3 control-label">Official Comments</label>

                    <div class="col-md-8">

                        <textarea name="official_comments" class="input-xlarge" id="official_comments" rows="5" required></textarea>

                    </div>

                </div>
                <div class="form-actions">
      <div class="row">
        <div class="col-md-offset-5 col-md-9">
          <button type="submit" class="btn btn-circle blue" onclick="return check_amount();">Submit</button>
          <button type="button" class="btn btn-circle default">Cancel</button>
        </div>
      </div>
    </div>
            
           </div>
           </form>
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