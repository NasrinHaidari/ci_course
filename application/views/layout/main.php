<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url();?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
    
	<?php if($this->session->userdata('language') and $this->session->userdata('language')!="english"){ ?>
	<link href="<?php echo base_url();?>assets/css/rtl.css" rel="stylesheet" />
	<?php } ?>
	<!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
			
			<?php
				if($this->session->userdata['is_logedin']!=true){
					redirect('/');
				}
			?>
			
			<div class="language_bar" style="color: white;
			padding: 15px 50px 5px 50px;
			float: right;
			font-size: 16px;"> Last access : 30 May 2014 &nbsp; 
			
			<?php
				$attr= array(
				'class'=>"btn btn-danger square-btn-adjust"
				);
				echo anchor('welcome/logout','Logout',$attr);
			?>
				
				<ul style="float:right; list-style-type:none;">
					<li style="float:right; margin-right:10px;"><?php echo anchor('user/change_language/english','English') ?></li>
					<li style="float:right; margin-right:10px;"><?php echo anchor('user/change_language/persian','Persian') ?></li>
					<li style="float:right; margin-right:10px;"><?php echo anchor('user/change_language/pashto','Pashto') ?></li>
				</ul>
			</div>
		</nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
				<?php 
				if( $this->session->userdata['photo']=="" or $this->session->userdata['photo']=='default.png'){ ?>
				    <img style="margin-bottom:10px;" src="<?php echo base_url();?>/upload_image/default.png" class="user-image img-responsive"/>
				<?php
				} else {
				?>
                    <img style="width:120px; margin-bottom:10px;" src="<?php echo base_url();?>/upload_image/<?php echo $this->session->userdata['photo'];?>" class="user-image img-responsive"/>
				<?php
				}
				?>
				
				<p style="padding-top:0px; color:#fff;">
					<?php echo $this->session->userdata['user_name']; ?>
				</p>
				
					</li>
					
					<!--- for giving link to a controller use anchor() --->
                        
					<?php
						$ci=get_instance();
						$ci->load->model('role_model');
						$userrole=$this->session->userdata('user_role');
					?>	
						
					<li>  
						<?php echo anchor('/welcome/home', '<i class="fa fa-dashboard fa-3x"></i>Dashboard'); ?>
					</li>
					<li>
						<?php 
						if($ci->role_model->roleHasPermission($userrole,1)) {
						echo anchor('user/user_list', '<i class="fa fa-list fa-3x"></i>User List'); 
						}
						?>
					</li>
					<li>
						<?php 
						if($ci->role_model->roleHasPermission($userrole,2)) {
						echo anchor('user/add_user', '<i class="fa fa-user fa-3x"></i>new User');
						}
						?>
					</li>
					
                    <li>
						<?php 
						if($ci->role_model->roleHasPermission($userrole,5)) {
						echo anchor('role/view_roles','<i class="fa fa-desktop fa-3x"></i>View Rotes'); 
						}
						?>
                    </li>
					
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
			<div id="page-inner">
			<!--  Main Content  --->
			
			<?php $this->load->view($main_content) ?>
			
			
			
			
			
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="<?php echo base_url(); ?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    
   
</body>
</html>
