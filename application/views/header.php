<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php if(isset($title)) echo $title; else echo "SecondHand.vn"; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo base_url();?>themes/superhero/bootstrap.min.css" media="screen"/>
    <link href="<?php echo base_url();?>themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="<?php echo base_url();?>themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?php echo base_url();?>themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?php echo base_url();?>themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>




<!-- tinymce -->	
	
	<script type="text/javascript" src="<?php echo base_url();?>js/tinymce/tiny_mce.js" ></script >
        <script type="text/javascript" >
        tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        plugins : "emotions,spellchecker,advhr,insertdatetime,preview", 
                
        // Theme options - button# indicated the row# only
        theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,fontselect,fontsizeselect,formatselect",
        theme_advanced_buttons2 : "cut,copy,paste,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,|,code,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "insertdate,inserttime,|,spellchecker,advhr,,removeformat,|,sub,sup,|,charmap,emotions",      
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true
        });
	</script >

  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome! 
	<?php 
		if($this->session->userdata('user_info')!=NULL)
		{	
			echo "<a href='".base_url()."index.php/profile_user/view_profile'><strong>".$this->session->userdata('user_info')['first_name']."</strong></a>";
			echo  "&nbsp&nbsp&nbsp&nbsp<a href='".base_url()."index.php/messages/view_mess'>Messages:<span style='color:red;font-weight:bold;'>".$num_msg."</span></a>";	
		}
	?>

	
	
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>themes/images/logo.png" alt="Bootsshop"/></a>
	<form class="form-inline navbar-search" method="post" action="<?php echo base_url(); ?>index.php/search/search_product" >
		<input  class="srchTxt" type="text" name="product_name" />
		  <select class="srchTxt" name="cat_id">
			<option value="">All</option>
			<?php 
			for($i=0;$i<count($categories);$i++)
			{
				echo "<option value='{$categories[$i]['cat_id']}'";
								
				echo ">".$categories[$i]['cat_name']."</option>";
			}
			?>                       
                 
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
		  
    </form>
	
    <ul id="topMenu" class="nav pull-right">
	 	
	 <li class="">
		<a href="#search" role="button" data-toggle="modal" style="padding-right:0">Advanced Search</a>
		<div id="search" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="false" style="display: block;">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3>Advanced Search</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" action="<?php echo base_url()."index.php/search/search_advanced"; ?>" method="post">
			  <div class="control-group">								
				<input type="text" id="" name="product_name" placeholder="Enter keywords here.......">
			  </div>
			  <div class="control-group">
				<select class="srchTxt" name="cat_id">
					<option value="">All</option>
					<?php 
					for($i=0;$i<count($categories);$i++)
					{
						echo "<option value='{$categories[$i]['cat_id']}'";
										
						echo ">".$categories[$i]['cat_name']."</option>";
					}
					?>                       						 
				</select> 
			  </div>
			  
				<div class="control-group">
					<select name="purpose" tabindex="3">
						<option value="">Purpose</option>
						<option value="1">Buy</option>
						<option value="2">Exchange</option>
					</select>
				</div>
				
				<div class="control-group">
					<select name="price" tabindex="4">
						<option value="">Price</option>
						<option value="1"> < 1000,000 VND </option>
						<option value="2"> 1000,000 - 3000,000 VND</option>
						<option value="3"> 3000,000 - 5000,000 VND </option>
						<option value="4"> > 5000,000 VND </option>
					</select>
				</div>
			
				<button type="submit" class="btn btn-success">Search</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</form>		
			
		  </div>
		</div>
	 </li>
	 	 	 
	 
	 

	 <?php
		if($this->session->userdata('user_info')!=NULL)
		{	
			$info = $this->session->userdata('user_info');
			echo "<li class=''><a href='".base_url()."index.php/log_out/out'>Log out</a></li>";
		}
		else
		{
			echo "<li class=''><a href='".base_url()."index.php/dangki/form_register'>Register</a></li>";
		}
	 ?>
	 <li class="">
	 <?php
	 	if($this->session->userdata('user_info')!=NULL)
		{	
			$info = $this->session->userdata('user_info');
			
			echo "<a href='".base_url()."index.php/profile_user/view_profile'><span class='btn btn-large btn-success'>Profile</span></a>"; 
		}
		else
			echo "<a href='".base_url()."index.php/dangnhap/form_login' ><span class='btn btn-large btn-success'>Login</span></a>";
	 ?>	
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
