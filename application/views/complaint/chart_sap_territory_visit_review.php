<?php $this->load->view('header');
$user_id =	$this->session->userdata('userid');
$equipment_id =	'0';
$dates_set = "no";
$start_date_month = date('Y-m').'-01';
$start_date = date('Y-m-d',strtotime($start_date_month));
$end_date = date('Y-m-d');
$current_date = date('Y-m-d');

// Assign Start End Dates
if(isset($_GET['start_mydate']) && isset($_GET['end_mydate'])) {
	
	$dates_set = "yes";
	$start_date = date('Y-m-d',strtotime($_GET['start_mydate']));
	$end_date = date('Y-m-d',strtotime($_GET['end_mydate']));
	if ($start_date==$end_date && $start_date>$current_date)
		$dates_set = "no";
}
// Assign Equipment ID

if(isset($_GET['equipment'])) {
	$equipment_id = $_GET['equipment'];
}

$maxqu = $this->db->query("SELECT * FROM user where id='".$user_id ."'");
$maxval=$maxqu->result_array();

function zerodisplay($val) {
	if($val==0) return '-';
	else return $val;
}

function Get_Date_Difference($start_date, $end_date)
    {
        $diff = abs(strtotime($end_date) - strtotime($start_date));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return (($years > 0) ? $years.' year'.(($years > 1 ? 's ' : '')) : '').(($months > 0) ? (($months == 1) ? ' '.$months.' month' : ' '.$months.' months' ) : '').(($days > 0) ? (($days == 1) ? ' '.$days.' day' : ' '.$days.' days' ) : '');
    }
	
	
$territory = 0;
$sap = 0;
if ($this->session->userdata('userrole') != 'Admin' && $this->session->userdata('userrole') != 'secratery') {
	$territory = $this->session->userdata('territory');
	$sap = $this->session->userdata('userid');
}
else {
	if (isset($_GET['territory'])) $territory = $_GET['territory'];
	if (isset($_GET['sap'])) $sap = $_GET['sap'];
}

if ($sap != 0) $territory = 0;
?>
										
<script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>										
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title">
                    SAP Statistics <small><?php //echo $average_visits_per_day; ?></small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                Home 
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                SAP Statistics
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER--> 
       <!-- BEGIN PAGE CONTENT-->
       <div class="row">
        <div class="col-md-12"> 
<?php if ($this->session->userdata('userrole')=='Admin' || $this->session->userdata('userrole')=='secratery'){ ?>		
		<!-- Search Form -->
		<div class="portlet light bg-inverse" >
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-paper-plane font-purple-seance"></i>
								<span class="caption-subject bold font-purple-seance uppercase">
								Territory </span>
							</div>
						</div>
						<div class="portlet-body">
						        <div class="row">
                            	<form method="get" action="<?php echo base_url();?>complaint/chart_sap_territory_visit_review">
                                <div class="col-md-4">
                            		<div class="form-group">
                            			<select name="territory" id="territory" onchange="territory_changed()" class="form-control" >
                                            <option value="">--Select Territory--</option>
											<?php 
											
											$maxqu = $this->db->query("SELECT * FROM tbl_offices ORDER BY `pk_office_id` ");
											$maxval=$maxqu->result_array();
                                            foreach($maxval as $val)
                                            {
                                                
                                                ?>
                                                <option value="<?php echo $val['pk_office_id'];//pk_instrument_id?>" <?php if($territory==$val['pk_office_id']){ echo 'selected="selected"';}//pk_instrument_id?>>
													<?php echo $val['office_name'];//$val['serial_no'].' - '.$val['product_name']?>
                                                </option>
                                                <?php 
                                            }
                                            ?>
											<option value="0"<?php if($territory==0){ echo 'selected="selected"';}?>>ALL</option>
                                        </select>
                            		</div>
                          		</div>
								<div class="col-md-4">
                            		<div class="form-group">
                            			<select name="sap" id="sap" onchange="sap_changed()" class="form-control" >
                                            <option value="">--Select SAP--</option>
											<option value="0"<?php if(isset($_GET['sap']) && $_GET['sap']==0){ echo 'selected="selected"';}?>>ALL</option>
											<?php 
											
											$maxqu = $this->db->query("SELECT * FROM user WHERE delete_status='0' AND userrole='Salesman' ORDER BY `fk_office_id` ");
											$maxval=$maxqu->result_array();
                                            foreach($maxval as $val)
                                            {
                                                
                                                ?>
                                                <option value="<?php echo $val['id'];//pk_instrument_id?>" <?php if(isset($_GET['sap']) && $_GET['sap']==$val['id']){ echo 'selected="selected"';}//pk_instrument_id?>>
													<?php echo $val['first_name'];//$val['serial_no'].' - '.$val['product_name']?>
                                                </option>
                                                <?php 
                                            }
                                            ?>
											
                                        </select>
                            		</div>
                          		</div>
								<!--
                          		<div class="col-md-3">
                            		<div class="form-group">
                            			
                                        <input type="text" name="start_mydate" class="form-control datepicker" id="start_mydate" value="<?php if(isset($_GET['start_mydate'])){ echo $_GET['start_mydate']; } else { echo '01-'.date('M-Y');}?>" required  />
										<span class="help-block">Start Date</span>
									</div>
                                </div>
                                <div class="col-md-3">
                            		<div class="form-group">
                            			
                                        <input type="text" name="end_mydate" class="form-control datepicker" id="end_mydate" value="<?php if(isset($_GET['end_mydate'])){ echo $_GET['end_mydate']; } else { echo date('d-M-Y');}?>" required />
										<span class="help-block">End Date</span>
									</div>
                                </div>
								-->
                                <div class="col-md-2">
                            		<div class="form-group">
                                        
                                            <input type="submit"  class="btn btn-default purple-seance" value="Search" >
                                    </div>
                                </div>
                          		</form>
                           </div>	
							
						</div>
					</div>
		<!-- Search Form -->
<?php } ?>



					<div class="portlet solid bordered light bg-inverse ">
						<!-- Portlet Title -->
						<div class="portlet-title">
							<div class="caption font-purple-seance">
								<i class="icon-bar-chart font-purple-seance"></i>
								<span class="caption-subject bold uppercase"> SAP Territory Visit Review</span>
								
							</div>
							
							<div class="tools">
								<a href="" class="collapse" data-original-title="" title="">
								</a>
								
								<a href="" class="fullscreen">
								</a>
								<a href="" class="remove" data-original-title="" title="">
								</a>
							</div>
							
							<div class="actions">
							</div>
						</div>
						<!-- End Portlet Title -->
						<!-- Begin Portlet Body -->
						
						<div class="portlet-body" style="margin-left:3%; margin-right:3%; ">
						<!--
						<div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red"> -->
								<div id="container" style="width: 100%; height: 1200px; margin-left:20px; "></div> 	 
						<!--	</div> -->
						</div>
						<!-- End Portlet Body -->
					</div>


<!------------------------------------- Begin 6 Table Portlets -------------------------------------------->
<?php
	$titles = array("Assigned Total","Pending Total");
	$title_colors = array("green-seagreen","red-thunderbird");
	
	$start_date_f			=	date('jS F Y',strtotime($start_date));
	$end_date_f				=	date('jS F Y',strtotime($end_date));
	$start = $month = strtotime($start_date);
	//$end = time();
	$end = strtotime($end_date);
while($month < $end)
{
    ////////////////// echo date('F Y', $month), PHP_EOL;
     $month = strtotime("+1 month", $month);
}
 ?>


          
<!-- END EXAMPLE TABLE PORTLET--> 

      </div>
     </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->





<?php 

$month = time();
$months = array('');
$categories = array('');
$category_ids = array('');
$active_projects_array = array('');
$inactive_projects_array = array('');
$ignored_projects_array = array('');
$monthss = array('');
$offices = array('Rawalpindi Office','Lahore Office','Karachi Office','Multan Office','Peshawar Office');
$complaint_types = array('complaint','PM');
$complaint_status = array('Shifted','Pending Verification','SPRF Approved','Pending SPRF','Pending','Pending Registration','Closed');

$months_to_show = 6;
for ($i=0;$i<$months_to_show;$i++) {
	//array_push($months,date('F Y', $month), PHP_EOL) ;
	$months[$i] = "'".date('F Y', $month)."'";
	$monthss[$i] = date('Y-m', $month);
	$month = strtotime("-1 month", $month);
}

$user_color = array('#292421','#00CD66','#FFD700','#DC143C');
$user_color = array('#DC143C','#FFD700','#939393','#292421','#00CD66');
$pm_statuses = array('NO PM Data','Good Units','Due PM','PM Neglected');
$pm_statuses = array('PM Neglected','Due PM','Assigned','NO PM Data','Good Units');

/////////// ABOVE is irrelevant
$user_color = array('#00CD66','#606062','#FFD700','#DC143C','#cf3000');
$project_statuses = array('Active','Extinct','Passive','Ignored','Neglected');


$categories = array('Tender','IDx','CIF','CDx','HDx','MDx','Manual Kits');
$category_ids = array('1','2','3','4','5','6','7');

$project_types = array('Active','Extinct','Passive','Ignored','Neglected');
//echo "unnus";
//print_r($product_ids);
//echo implode(',',$offices);



?>


<script>

$(document).ready(function() {


	
	var options = {

        chart: {
			
            type: 'column',
			marginBottom: 800,
			backgroundColor: null
        },

        title: {
            text: 'SAP Territory Visit Review'
        },

        xAxis: {
            //categories: ['Feb', 'Jan', 'Dec', 'Nov', 'Oct']
			//categories: [<?php echo  implode(',',$months);?>]
			//categories: [<?php echo  implode(',',$categories);?>]
			categories: ['Active','Extinct','Passive','Ignored','Neglected']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Customers',
				margin:20
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }
        },
		legend: {
            align: 'left',
            x: -30,
            verticalAlign: 'top',
            y: 0,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },

        tooltip: {
            formatter: function () {
				if (this.series.options.type === 'pie' || this.series.options.type === 'spline') { // the pie chart
                        return this.point.name + ': ' + this.y;
                    }
				else {
                return '<b>' + this.x +  '' 
				+ ''+  '</b><br/>' 
				+ this.series.name + ': ' + this.y + '<br/>'
				+ '<b>Details:</b>' + this.point.myData + '<br/>';
				}
            }
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: false,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 0px black'
                    }
                }
            }
        },

        series: [
		<?php 
		
			$k=0;
			foreach ($project_statuses AS $project_status) {
				
				echo "{ name: '".$project_status."',";
				echo "data: [";
				//for ($i=0;$i<$months_to_show;$i++) { // Loops through months
				$i = 0;
				foreach ($project_types AS $project_type) {
					$comma_limit 		= 	sizeof($project_types) - 1;
					
					$active_projects = 0;
					$extinct_projects = 0;
					$passive_projects = 0;
					$ignored_projects = 0;
					$neglected_projects = 0;
					
					$pt = $project_type;
					if ($project_type == "Unknown") $pt = "";
					
					$queryy = "select business_data.*,tbl_clients.client_name,tbl_cities.city_name,tbl_business_types.businesstype_name,user.first_name
					from business_data
					LEFT JOIN tbl_clients ON tbl_clients.pk_client_id = business_data.Customer
					LEFT JOIN tbl_cities ON tbl_cities.pk_city_id = tbl_clients.fk_city_id
					LEFT JOIN tbl_business_types ON tbl_business_types.pk_businesstype_id = business_data.`Business Project`
					LEFT JOIN user ON business_data.`Sales Person` = user.id
					where business_data.`status`=0 ";
					
				/*	$queryy = "SELECT tbl_clients.client_name, tbl_dvr.fk_customer_id, max(tbl_dvr.date) AS `recent_visit`,business_data.Territory, business_data.`Sales Person`,tbl_dvr.`fk_engineer_id`,business_data.`pk_businessproject_id` FROM `tbl_dvr`
					LEFT JOIN tbl_clients ON tbl_clients.pk_client_id = tbl_dvr.fk_customer_id
					JOIN business_data ON business_data.pk_businessproject_id = tbl_dvr.fk_business_id
					WHERE tbl_dvr.fk_business_id>0
					"; */
					
					
				/*	$queryy = "SELECT tbl_clients.client_name, tbl_dvr.fk_customer_id, max(tbl_dvr.date) AS `recent_visit`,business_data.Territory, business_data.`Sales Person`,tbl_dvr.`fk_engineer_id`,business_data.`pk_businessproject_id` FROM `tbl_clients`
					LEFT JOIN tbl_dvr ON tbl_clients.pk_client_id = tbl_dvr.fk_customer_id
					JOIN business_data ON business_data.pk_businessproject_id = tbl_dvr.fk_business_id
					WHERE tbl_dvr.fk_business_id>0
					"; */
					
					if ($territory!=0) {
						//$queryy .= " AND `Territory`='".$territory."' ";
						//$queryy .= " AND tbl_dvr.fk_customer_id IN (SELECT pk_client_id FROM tbl_clients WHERE fk_office_id='".$territory."')";
						$queryy .= " AND business_data.Customer IN (SELECT pk_client_id FROM tbl_clients WHERE fk_office_id='".$territory."')";
					}
					if ($sap!=0) {
						$queryy .= " AND `Sales Person`='".$sap."' ";
						//$queryy .= " AND tbl_dvr.fk_customer_id IN (SELECT fk_client_id FROM tbl_customer_sap_bridge WHERE fk_user_id='".$sap."')";
						//$queryy .= " AND tbl_dvr.`fk_engineer_id`='".$sap."' ";
					}
					//$queryy .= " GROUP BY tbl_dvr.fk_customer_id";
					$queryy .= " ORDER BY tbl_clients.client_name ";
					$pq	=	$this->db->query($queryy);
					$pr =	$pq->result_array();
					
					$s_active = ""; // string ignored projects
					$s_extinct = ""; // string inactive projects
					$s_passive = ""; // string active projects
					$s_ignored = ""; // string active projects
					$s_neglected = ""; // string active projects
					
					foreach ($pr as $project) {
						
						//$ty=$this->db->query("select * from tbl_dvr where fk_business_id='".$project["pk_businessproject_id"]."' ORDER BY  `pk_dvr_id` DESC ");
						//$rvr;
						
						$rvqq = "SELECT max(tbl_dvr.date) AS `recent_visit_date`,user.first_name FROM `tbl_dvr`
						LEFT JOIN user ON tbl_dvr.fk_engineer_id = user.id
							WHERE fk_business_id='".$project["pk_businessproject_id"]."' "; 
						if ($sap!=0) {
							$rvqq .=  "AND fk_engineer_id = '".$sap."'";
						}
							$rvq = $this->db->query($rvqq);
							$rvr = $rvq->result_array();
						
						//$ty=$this->db->query("select * from business_data WHERE status=0 AND Customer='".$project["fk_customer_id"]."' ");
						 $pc = $project['client_name'] . "- (" . $project['businesstype_name'].") ";
						 
						  if($rvr[0]["recent_visit_date"]!= NULL) { // IF at least one visit
							 // echo "inside if";
							  //$rt=$ty->result_array();
							  
							  $now 		 = time(); 
							  $your_date = strtotime($rvr[0]["recent_visit_date"]);
							  $datediff  = $now - $your_date;
							  $mydiffrence = floor($datediff/(60*60*24));
							  
							  $pc .= " (". date('d M Y',strtotime($rvr[0]["recent_visit_date"])) . ")" ;
							  if($project_status == "Neglected" && $project_type == "Neglected" && $mydiffrence>=90) { // neglected_projects
								  $neglected_projects++;
								  $s_neglected .= $pc.",<br/>";
							  }
							  
							  elseif($project_status == "Ignored" && $project_type == "Ignored" && $mydiffrence<=89 && $mydiffrence>=60 ) { //ignored_projects
								  $ignored_projects++;
								  $s_ignored .= $pc.",<br/>";
							  }
							  elseif($project_status == "Passive" && $project_type == "Passive" && $mydiffrence<=59 && $mydiffrence>=31 ) { //passive_projects
								  $passive_projects++;
								  $s_passive .= $pc.",<br/>";
							  }
							  else { //active_projects
							  if ($project_status == "Active" && $project_type == "Active" && $mydiffrence<=30 ) {
								  $active_projects++;
								  $s_active .= $pc.",<br/>";
							  }
							  } 
							  
						  }
						  else { //if no project
						  //echo "zaaid";
							  if ($project_status == "Extinct" && $project_type == "Extinct") {
								$extinct_projects++;
								$s_extinct .= $pc.",<br/>";
							  }
						  }
					} 
				
				//$pm_statuses = array('NO PM Data','Good Units','Due PM','PM Neglected');
				//$units = 0;
					// Begin code to count Units of respective PM status
				if ($project_status == "Ignored") {
					// code to calculate number of units
					echo "{y: ".$ignored_projects.", myData: '$s_ignored'}";
				}
				if ($project_status == "Passive") {
					// code to calculate number of units
					echo "{y: ".$passive_projects.", myData: '$s_passive'}";
				}
				if ($project_status == "Active") {
					// code to calculate number of units
					echo "{y: ".$active_projects.", myData: '$s_active'}";
				}
				if ($project_status == "Neglected") {
					// code to calculate number of units
					echo "{y: ".$neglected_projects.", myData: '$s_neglected'}";
				}
				if ($project_status == "Extinct") {
					// code to calculate number of units
					echo "{y: ".$extinct_projects.", myData: '$s_extinct'}";
				}
						
					if ($i<$comma_limit) echo ",";
					$i++;
				}
				//echo "3, 4, 4, 2, 5,6";
				echo "],";
				echo "color:'".$user_color[$k]."',";
				echo "showInLegend: true,";
				//echo "stack: '".$complaint_nature."'";
				echo "},";
				$k++;
			}
		
		?>
		/*
		{
            name: 'John',
            data: [5, 3, 4, 7, 2],
            stack: 'complaint'
        }, {
            name: 'Joe',
            data: [3, 4, 4, 2, 5],
            stack: 'complaint'
        }, {
            name: 'Jane',
            data: [2, 5, 6, 2, 1],
            stack: 'PM'
        }, {
            name: 'Janet',
            data: [3, 0, 4, 4, 3],
            stack: 'PM'
        }
		 
		{
            name: 'Completed',
            data: [5, 3, 4, 7, 2],
            color:'#26c281',
            showInLegend: false,
            stack: 'HO'
        }, {
            name: 'Pending',
            color:'#d91e18',
            data: [3, 4, 4, 2, 5],
            showInLegend: false,
            stack: 'HO'
        },{
            name: 'Completed',
            color:'#26c281',
            data: [5, 3, 4, 7, 2],
            showInLegend: false,
            stack: 'LO'
        }, {
            name: 'Pending',
            color:'#d91e18',
            data: [3, 4, 4, 2, 5],
            showInLegend: false,
            stack: 'LO'
        }, {
            name: 'Completed',
            color:'#26c281',
            data: [2, 5, 6, 2, 1],
            showInLegend: false,
            stack: 'MO'
        }, {
            name: 'Pending',
            color:'#d91e18',
            data: [3, 0, 4, 4, 3],
            showInLegend: false,
            stack: 'MO'
        }, {
            type: 'spline',
            name: 'Average',
            data: [3, 2.67, 3, 6.33, 3.33],
            marker: {
                lineWidth: 4
            }
        },*/ ]
    };
    
    $('#container').highcharts(options);
	});
	
</script>	




<?php $this->load->view('footer');?>

<script>
function territory_changed() {
	$("#sap").select2().select2('val','0');
}
function sap_changed() {
	
	$("#territory").select2().select2('val','0');
}
$(document).ready(function() { 
	var table = $('.dataaTable').dataTable({
	  'iDisplayLength': 100,
	  'aaSorting':[]
	});
	var table4 = $('#sample_225').dataTable({
			  'iDisplayLength': 100,
			   'aaSorting':[]
			}).columnFilter({ sPlaceHolder: "head:before",
					aoColumns: [ 	{type: "text" },
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
	
	//new $.fn.dataTable.FixedColumns( table );
});
</script>

<style>
textarea {
  width: 100%;
}
</style>