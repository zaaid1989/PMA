<?php $this->load->view('header');
if ($this->uri->segment(3)=="")
	show_404();

$fontawesome = array('fa fa-glass','fa fa-music','fa fa-search','fa fa-envelope-o','fa fa-heart','fa fa-star','fa fa-star-o','fa fa-user','fa fa-film','fa fa-th-large','fa fa-th','fa fa-th-list','fa fa-check','fa fa-remove','fa fa-close','fa fa-times','fa fa-search-plus','fa fa-search-minus','fa fa-power-off','fa fa-signal','fa fa-gear','fa fa-cog','fa fa-trash-o','fa fa-home','fa fa-file-o','fa fa-clock-o','fa fa-road','fa fa-download','fa fa-arrow-circle-o-down','fa fa-arrow-circle-o-up','fa fa-inbox','fa fa-play-circle-o','fa fa-rotate-right','fa fa-repeat','fa fa-refresh','fa fa-list-alt','fa fa-lock','fa fa-flag','fa fa-headphones','fa fa-volume-off','fa fa-volume-down','fa fa-volume-up','fa fa-qrcode','fa fa-barcode','fa fa-tag','fa fa-tags','fa fa-book','fa fa-bookmark','fa fa-print','fa fa-camera','fa fa-font','fa fa-bold','fa fa-italic','fa fa-text-height','fa fa-text-width','fa fa-align-left','fa fa-align-center','fa fa-align-right','fa fa-align-justify','fa fa-list','fa fa-dedent','fa fa-outdent','fa fa-indent','fa fa-video-camera','fa fa-photo','fa fa-image','fa fa-picture-o','fa fa-pencil','fa fa-map-marker','fa fa-adjust','fa fa-tint','fa fa-edit','fa fa-pencil-square-o','fa fa-share-square-o','fa fa-check-square-o','fa fa-arrows','fa fa-step-backward','fa fa-fast-backward','fa fa-backward','fa fa-play','fa fa-pause','fa fa-stop','fa fa-forward','fa fa-fast-forward','fa fa-step-forward','fa fa-eject','fa fa-chevron-left','fa fa-chevron-right','fa fa-plus-circle','fa fa-minus-circle','fa fa-times-circle','fa fa-check-circle','fa fa-question-circle','fa fa-info-circle','fa fa-crosshairs','fa fa-times-circle-o','fa fa-check-circle-o','fa fa-ban','fa fa-arrow-left','fa fa-arrow-right','fa fa-arrow-up','fa fa-arrow-down','fa fa-mail-forward','fa fa-share','fa fa-expand','fa fa-compress','fa fa-plus','fa fa-minus','fa fa-asterisk','fa fa-exclamation-circle','fa fa-gift','fa fa-leaf','fa fa-fire','fa fa-eye','fa fa-eye-slash','fa fa-warning','fa fa-exclamation-triangle','fa fa-plane','fa fa-calendar','fa fa-random','fa fa-comment','fa fa-magnet','fa fa-chevron-up','fa fa-chevron-down','fa fa-retweet','fa fa-shopping-cart','fa fa-folder','fa fa-folder-open','fa fa-arrows-v','fa fa-arrows-h','fa fa-bar-chart-o','fa fa-bar-chart','fa fa-twitter-square','fa fa-facebook-square','fa fa-camera-retro','fa fa-key','fa fa-gears','fa fa-cogs','fa fa-comments','fa fa-thumbs-o-up','fa fa-thumbs-o-down','fa fa-star-half','fa fa-heart-o','fa fa-sign-out','fa fa-linkedin-square','fa fa-thumb-tack','fa fa-external-link','fa fa-sign-in','fa fa-trophy','fa fa-github-square','fa fa-upload','fa fa-lemon-o','fa fa-phone','fa fa-square-o','fa fa-bookmark-o','fa fa-phone-square','fa fa-twitter','fa fa-facebook-f','fa fa-facebook','fa fa-github','fa fa-unlock','fa fa-credit-card','fa fa-rss','fa fa-hdd-o','fa fa-bullhorn','fa fa-bell','fa fa-certificate','fa fa-hand-o-right','fa fa-hand-o-left','fa fa-hand-o-up','fa fa-hand-o-down','fa fa-arrow-circle-left','fa fa-arrow-circle-right','fa fa-arrow-circle-up','fa fa-arrow-circle-down','fa fa-globe','fa fa-wrench','fa fa-tasks','fa fa-filter','fa fa-briefcase','fa fa-arrows-alt','fa fa-group','fa fa-users','fa fa-chain','fa fa-link','fa fa-cloud','fa fa-flask','fa fa-cut','fa fa-scissors','fa fa-copy','fa fa-files-o','fa fa-paperclip','fa fa-save','fa fa-floppy-o','fa fa-square','fa fa-navicon','fa fa-reorder','fa fa-bars','fa fa-list-ul','fa fa-list-ol','fa fa-strikethrough','fa fa-underline','fa fa-table','fa fa-magic','fa fa-truck','fa fa-pinterest','fa fa-pinterest-square','fa fa-google-plus-square','fa fa-google-plus','fa fa-money','fa fa-caret-down','fa fa-caret-up','fa fa-caret-left','fa fa-caret-right','fa fa-columns','fa fa-unsorted','fa fa-sort','fa fa-sort-down','fa fa-sort-desc','fa fa-sort-up','fa fa-sort-asc','fa fa-envelope','fa fa-linkedin','fa fa-rotate-left','fa fa-undo','fa fa-legal','fa fa-gavel','fa fa-dashboard','fa fa-tachometer','fa fa-comment-o','fa fa-comments-o','fa fa-flash','fa fa-bolt','fa fa-sitemap','fa fa-umbrella','fa fa-paste','fa fa-clipboard','fa fa-lightbulb-o','fa fa-exchange','fa fa-cloud-download','fa fa-cloud-upload','fa fa-user-md','fa fa-stethoscope','fa fa-suitcase','fa fa-bell-o','fa fa-coffee','fa fa-cutlery','fa fa-file-text-o','fa fa-building-o','fa fa-hospital-o','fa fa-ambulance','fa fa-medkit','fa fa-fighter-jet','fa fa-beer','fa fa-h-square','fa fa-plus-square','fa fa-angle-double-left','fa fa-angle-double-right','fa fa-angle-double-up','fa fa-angle-double-down','fa fa-angle-left','fa fa-angle-right','fa fa-angle-up','fa fa-angle-down','fa fa-desktop','fa fa-laptop','fa fa-tablet','fa fa-mobile-phone','fa fa-mobile','fa fa-circle-o','fa fa-quote-left','fa fa-quote-right','fa fa-spinner','fa fa-circle','fa fa-mail-reply','fa fa-reply','fa fa-github-alt','fa fa-folder-o','fa fa-folder-open-o','fa fa-smile-o','fa fa-frown-o','fa fa-meh-o','fa fa-gamepad','fa fa-keyboard-o','fa fa-flag-o','fa fa-flag-checkered','fa fa-terminal','fa fa-code','fa fa-mail-reply-all','fa fa-reply-all','fa fa-star-half-empty','fa fa-star-half-full','fa fa-star-half-o','fa fa-location-arrow','fa fa-crop','fa fa-code-fork','fa fa-unlink','fa fa-chain-broken','fa fa-question','fa fa-info','fa fa-exclamation','fa fa-superscript','fa fa-subscript','fa fa-eraser','fa fa-puzzle-piece','fa fa-microphone','fa fa-microphone-slash','fa fa-shield','fa fa-calendar-o','fa fa-fire-extinguisher','fa fa-rocket','fa fa-maxcdn','fa fa-chevron-circle-left','fa fa-chevron-circle-right','fa fa-chevron-circle-up','fa fa-chevron-circle-down','fa fa-html5','fa fa-css3','fa fa-anchor','fa fa-unlock-alt','fa fa-bullseye','fa fa-ellipsis-h','fa fa-ellipsis-v','fa fa-rss-square','fa fa-play-circle','fa fa-ticket','fa fa-minus-square','fa fa-minus-square-o','fa fa-level-up','fa fa-level-down','fa fa-check-square','fa fa-pencil-square','fa fa-external-link-square','fa fa-share-square','fa fa-compass','fa fa-toggle-down','fa fa-caret-square-o-down','fa fa-toggle-up','fa fa-caret-square-o-up','fa fa-toggle-right','fa fa-caret-square-o-right','fa fa-euro','fa fa-eur','fa fa-gbp','fa fa-dollar','fa fa-usd','fa fa-rupee','fa fa-inr','fa fa-cny','fa fa-rmb','fa fa-yen','fa fa-jpy','fa fa-ruble','fa fa-rouble','fa fa-rub','fa fa-won','fa fa-krw','fa fa-bitcoin','fa fa-btc','fa fa-file','fa fa-file-text','fa fa-sort-alpha-asc','fa fa-sort-alpha-desc','fa fa-sort-amount-asc','fa fa-sort-amount-desc','fa fa-sort-numeric-asc','fa fa-sort-numeric-desc','fa fa-thumbs-up','fa fa-thumbs-down','fa fa-youtube-square','fa fa-youtube','fa fa-xing','fa fa-xing-square','fa fa-youtube-play','fa fa-dropbox','fa fa-stack-overflow','fa fa-instagram','fa fa-flickr','fa fa-adn','fa fa-bitbucket','fa fa-bitbucket-square','fa fa-tumblr','fa fa-tumblr-square','fa fa-long-arrow-down','fa fa-long-arrow-up','fa fa-long-arrow-left','fa fa-long-arrow-right','fa fa-apple','fa fa-windows','fa fa-android','fa fa-linux','fa fa-dribbble','fa fa-skype','fa fa-foursquare','fa fa-trello','fa fa-female','fa fa-male','fa fa-gittip','fa fa-gratipay','fa fa-sun-o','fa fa-moon-o','fa fa-archive','fa fa-bug','fa fa-vk','fa fa-weibo','fa fa-renren','fa fa-pagelines','fa fa-stack-exchange','fa fa-arrow-circle-o-right','fa fa-arrow-circle-o-left','fa fa-toggle-left','fa fa-caret-square-o-left','fa fa-dot-circle-o','fa fa-wheelchair','fa fa-vimeo-square','fa fa-turkish-lira','fa fa-try','fa fa-plus-square-o','fa fa-space-shuttle','fa fa-slack','fa fa-envelope-square','fa fa-wordpress','fa fa-openid','fa fa-institution','fa fa-bank','fa fa-university','fa fa-mortar-board','fa fa-graduation-cap','fa fa-yahoo','fa fa-google','fa fa-reddit','fa fa-reddit-square','fa fa-stumbleupon-circle','fa fa-stumbleupon','fa fa-delicious','fa fa-digg','fa fa-pied-piper','fa fa-pied-piper-alt','fa fa-drupal','fa fa-joomla','fa fa-language','fa fa-fax','fa fa-building','fa fa-child','fa fa-paw','fa fa-spoon','fa fa-cube','fa fa-cubes','fa fa-behance','fa fa-behance-square','fa fa-steam','fa fa-steam-square','fa fa-recycle','fa fa-automobile','fa fa-car','fa fa-cab','fa fa-taxi','fa fa-tree','fa fa-spotify','fa fa-deviantart','fa fa-soundcloud','fa fa-database','fa fa-file-pdf-o','fa fa-file-word-o','fa fa-file-excel-o','fa fa-file-powerpoint-o','fa fa-file-photo-o','fa fa-file-picture-o','fa fa-file-image-o','fa fa-file-zip-o','fa fa-file-archive-o','fa fa-file-sound-o','fa fa-file-audio-o','fa fa-file-movie-o','fa fa-file-video-o','fa fa-file-code-o','fa fa-vine','fa fa-codepen','fa fa-jsfiddle','fa fa-life-bouy','fa fa-life-buoy','fa fa-life-saver','fa fa-support','fa fa-life-ring','fa fa-circle-o-notch','fa fa-ra','fa fa-rebel','fa fa-ge','fa fa-empire','fa fa-git-square','fa fa-git','fa fa-hacker-news','fa fa-tencent-weibo','fa fa-qq','fa fa-wechat','fa fa-weixin','fa fa-send','fa fa-paper-plane','fa fa-send-o','fa fa-paper-plane-o','fa fa-history','fa fa-genderless','fa fa-circle-thin','fa fa-header','fa fa-paragraph','fa fa-sliders','fa fa-share-alt','fa fa-share-alt-square','fa fa-bomb','fa fa-soccer-ball-o','fa fa-futbol-o','fa fa-tty','fa fa-binoculars','fa fa-plug','fa fa-slideshare','fa fa-twitch','fa fa-yelp','fa fa-newspaper-o','fa fa-wifi','fa fa-calculator','fa fa-paypal','fa fa-google-wallet','fa fa-cc-visa','fa fa-cc-mastercard','fa fa-cc-discover','fa fa-cc-amex','fa fa-cc-paypal','fa fa-cc-stripe','fa fa-bell-slash','fa fa-bell-slash-o','fa fa-trash','fa fa-copyright','fa fa-at','fa fa-eyedropper','fa fa-paint-brush','fa fa-birthday-cake','fa fa-area-chart','fa fa-pie-chart','fa fa-line-chart','fa fa-lastfm','fa fa-lastfm-square','fa fa-toggle-off','fa fa-toggle-on','fa fa-bicycle','fa fa-bus','fa fa-ioxhost','fa fa-angellist','fa fa-cc','fa fa-shekel','fa fa-sheqel','fa fa-ils','fa fa-meanpath','fa fa-buysellads','fa fa-connectdevelop','fa fa-dashcube','fa fa-forumbee','fa fa-leanpub','fa fa-sellsy','fa fa-shirtsinbulk','fa fa-simplybuilt','fa fa-skyatlas','fa fa-cart-plus','fa fa-cart-arrow-down','fa fa-diamond','fa fa-ship','fa fa-user-secret','fa fa-motorcycle','fa fa-street-view','fa fa-heartbeat','fa fa-venus','fa fa-mars','fa fa-mercury','fa fa-transgender','fa fa-transgender-alt','fa fa-venus-double','fa fa-mars-double','fa fa-venus-mars','fa fa-mars-stroke','fa fa-mars-stroke-v','fa fa-mars-stroke-h','fa fa-neuter','fa fa-facebook-official','fa fa-pinterest-p','fa fa-whatsapp','fa fa-server','fa fa-user-plus','fa fa-user-times','fa fa-hotel','fa fa-bed','fa fa-viacoin','fa fa-train','fa fa-subway','fa fa-medium');
sort($fontawesome);
?>

      <!-- BEGIN PAGE HEADER-->

      <h3 class="page-title">  Edit Submenu <small></small> </h3>

      <div class="page-bar">

        <ul class="page-breadcrumb">

          <li> <i class="fa fa-home"></i> <a href="<?php echo site_url(); ?>">Home</a> <i class="fa fa-angle-right"></i> </li>

          <li> <a href="<?php echo site_url(); ?>complaint/sub_menu">Submenu</a> <i class="fa fa-angle-right"></i></li>
		  <li> Edit Submenu </li>

        </ul>

        

      </div>

      <!-- END PAGE HEADER--> 

      <!-- BEGIN PAGE CONTENT-->

      <div class="row">

        <div class="col-md-12">

                <div class="portlet box blue-steel">

                  <div class="portlet-title">

                    <div class="caption"> <i class="fa fa-edit"></i>Edit Submenu Details </div>

                    <div class="tools"> 
                    	<a href="javascript:;" class="collapse"> </a>
                        <a href="javascript:;" class="remove"> </a> 
                    </div>

                  </div>

                  <div class="portlet-body form"> 
                  
                  <?php
					  if(isset($_GET['msg']) && $_GET['msg']=='success')
						{ 
						  echo '<div class="alert alert-success alert-dismissable">  
								  <a class="close" data-dismiss="alert">×</a>  
								  Submenu Updated Successfully.  
								</div>';
						}
						
						
					?>

                    <!-- BEGIN FORM-->

                   <!-- BEGIN FORM-->
            <form action="<?php echo base_url();?>complaint/update_submenu" class="form-horizontal" method="post">
                <div class="form-body">
                 <?php
                 		$ty22=$this->db->query("select * from tbl_sub_menu where pk_sub_menu_id='".$this->uri->segment('3')."'");
                        $submenu=$ty22->result_array();
				 ?>
				 
				 <div class="form-group">
                    <label class="col-md-3 control-label">Main Menu</label>
                    <div class="col-md-5">
                       <select class="from_control input-large" name="fk_main_menu_id">
                       <?php 
						  $ty=$this->db->query("select * from tbl_main_menu ORDER BY tbl_main_menu.order");
						  $rt=$ty->result_array();
						  foreach($rt as $result)
						  {
						   ?>
							<option value="<?php echo $result["pk_main_menu_id"];?>" 
							<?php if($result["pk_main_menu_id"]==$submenu[0]["fk_main_menu_id"]){?> selected="selected"<?php }?>
							>
							<?php echo $result["main_menu"];?>
                            </option>
							<?php
							  }
							?>
                       </select>
                    </div>
                </div>
                 
                 <div class="form-group">
                    <label class="col-md-3 control-label">Submenu</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="sub_menu" value="<?php echo $submenu[0]["sub_menu"]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label">Pre</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="pre" value="<?php echo $submenu[0]["pre"]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label">Post</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="post" value="<?php echo $submenu[0]["post"]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label">Icon</label>
					
                    <div class="col-md-4">
					<select class="from_control input-large" name="icon" id="icon">
					<option value="">-- Choose --</option>
					<option value="icon-reload" <?php if($submenu[0]["icon"]=="icon-reload"){?> selected="selected"<?php }?>>icon-reload</option>
					<?php foreach($fontawesome as $fa) { ?>
							<option value="<?php echo $fa;?>" 
							<?php if($fa==$submenu[0]["icon"]){?> selected="selected"<?php }?>>
							<?php echo substr($fa,6);?>
                            </option>
					<?php } ?>
					</select> &nbsp;&nbsp;
					<i id="iconclass" class="<?php echo $submenu[0]["icon"]; ?>"></i>
                      <!--  <input type="text" class="form-control" name="icon" id="icon" value="<?php echo $submenu[0]["icon"]; ?>"> -->
                    </div>
					<div class="col-md-1">
						
					</div>
				</div>
				<div class="form-group">
                    <label class="col-md-3 control-label">Order</label>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="order" value="<?php echo $submenu[0]["order"]; ?>">
                    </div>
                </div>
			<!--	
				<div class="form-group">
					<label class="control-label col-md-3">Order</label>
					<div class="col-md-9">
						<div id="spinner1">
							<div class="input-group input-small">
								<input type="text" class="spinner-input form-control" maxlength="3" name="order" value="<?php echo $submenu[0]["order"]; ?>" readonly>
								<div class="spinner-buttons input-group-btn btn-group-vertical">
									<button type="button" class="btn spinner-up btn-xs blue">
									<i class="fa fa-angle-up"></i>
									</button>
									<button type="button" class="btn spinner-down btn-xs blue">
									<i class="fa fa-angle-down"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				-->
				
				<div class="form-group">
					<label class="control-label col-md-3">Admin</label>
					<div class="col-md-9">
						<input type="checkbox" name="Admin" class="make-switch" data-on-color="primary" data-off-color="danger" data-on-text="Yes" data-off-text="No" value="1" <?php if($submenu[0]["Admin"]=='1') echo 'checked'; ?> >
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3">Stcoadmin</label>
					<div class="col-md-9">
						<input type="checkbox" name="secratery" class="make-switch" data-on-color="primary" data-off-color="danger" data-on-text="Yes" data-off-text="No" value="1" <?php if($submenu[0]["secratery"]=='1') echo 'checked'; ?> >
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3">Supervisor</label>
					<div class="col-md-9">
						<input type="checkbox" name="Supervisor" class="make-switch" data-on-color="primary" data-off-color="danger" data-on-text="Yes" data-off-text="No" value="1" <?php if($submenu[0]["Supervisor"]=='1') echo 'checked'; ?> >
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3">FSE</label>
					<div class="col-md-9">
						<input type="checkbox" name="FSE" class="make-switch" data-on-color="primary" data-off-color="danger" data-on-text="Yes" data-off-text="No" value="1" <?php if($submenu[0]["FSE"]=='1') echo 'checked'; ?> >
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3">SAP</label>
					<div class="col-md-9">
						<input type="checkbox" name="Salesman" class="make-switch" data-on-color="primary" data-off-color="danger" data-on-text="Yes" data-off-text="No" value="1" <?php if($submenu[0]["Salesman"]=='1') echo 'checked'; ?> >
					</div>
				</div>
                     
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-offset-6 col-md-6">
                                    <input type="hidden" name="pk_sub_menu_id" value="<?php echo $this->uri->segment(3); ?>">
                                    <button type="submit" class="btn yellow-crusta">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

                    <!-- END FORM--> 

                  </div>

                </div>

      </div>

      <!-- END PAGE CONTENT--> 

    </div>

  </div>

  <!-- END CONTENT --> 

  

</div>
<?php $this->load->view('footer');?>
<script>
$('#icon').on('change', function() {
  //alert( this.value ); // or $(this).val()
  var on = this.value;
  $('#iconclass').removeClass();
  $('#iconclass').addClass(on);
});
</script>