<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		</br>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<?php
				if($this->session->userdata('user_info')!=NULL && $this->session->userdata('user_info')['level']==1)
				{	
					echo "<li><a href='".base_url()."index.php/add_categories/form_add_categories'>-+- Add categories -+-</a></li>";
				}			
			?>
			<?php
				if(true)
				{	
					echo "<li><a href='".base_url()."index.php/add_products/form_add_products'>-+- Add products -+-</a></li>";
				}			
			?>
			
			<?php 
			for($i=0;$i<count($categories);$i++)
			{
				echo "<li><a href='".base_url()."index.php/list_products/show_list_products?cat_id=".$categories[$i]['cat_id']."'";  
				if(isset($_GET['cat_id']) && filter_var($_GET['cat_id'], FILTER_VALIDATE_INT, array('min_range'=>1)))
					if($categories[$i]['cat_id']==$_GET['cat_id']) echo "class='selected'";
				echo ">".$categories[$i]['cat_name']."</a></li>";
			}
			?> 
	<!--	<img src="<?php echo base_url() ?>public/images/Banner_doc.jpg" alt="Quang cao" height="100%" width="100%">	-->
		</ul>
		<br/>

	</div>
<!-- Sidebar end=============================================== -->

<div class="span9">
