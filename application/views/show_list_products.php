	

<ul class="breadcrumb">
		<li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active"><?php echo $title; ?></li>
    </ul>
	<h3> Products Name <small class="pull-right">  </small></h3>	
	
	<p>
	</p>
	<hr class="soft"/>
	
	<form class="form-horizontal span6" action="<?php echo base_url()."index.php/list_products/show_list_products?cat_id=".$_GET['cat_id']; ?>" method="post">
		<div class="control-group">
		  <label class="control-label alignL">Sort By: </label>
		  
			<select name="sort">
			  <option value="">Select</option>
			  <option value="last_products">Last products</option>	
			  <option value="az">Product name A - Z</option>				  
              <option value="za">Product name Z - A</option>
            </select>
			

		 <button type="submit" id="submitButton" class="btn btn-primary">Go</button>			
		</div>
	  </form>
	  
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane active" id="listView">
		<?php
		for($i=0;$i<count($products);$i++)
		{
			?>
			<div class='row'>	  
				<div class="span2">
					<a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$products[$i]['product_id']; ?>"><img src="<?php echo base_url()."public/images/".$products[$i]['picture'];?>" alt=""/></a>
				</div>
				<div class="span4">
					<h3><a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$products[$i]['product_id']; ?>"><?php echo $products[$i]['product_name']; ?></a></h3>				
					<hr class="soft"/>
					
					<p>
						<?php 
						echo List_products::the_excerpt($products[$i]['description'],500); 
						echo "...";
						?>
					</p>
					<a class="btn btn-small pull-right" href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$products[$i]['product_id']; ?>">View Details</a>
					<br class="clr"/>
				</div>
				<div class="span3 alignR">
				<form class="form-horizontal qtyFrm">
				<h5> <?php echo "Situation: ".$products[$i]['situation']." %"; ?></h5>
				<h5> <?php if($products[$i]['purpose']==1) echo "<span style='color:blue;'>".number_format($products[$i]['price'])." VNĐ</span>"; ?></h5>
				
				  <a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$products[$i]['product_id']; ?>" class="btn btn-large">
				  <?php
				  if($products[$i]['purpose']==1) echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBuy&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
				  else echo "&nbsp&nbsp&nbsp&nbspExchange&nbsp&nbsp&nbsp";
				  ?>
				  </a>
				  
				
					</form>
				</div>
			</div>
			</br>
			<hr class="soft"/>
			</br>
			<?php
		}
		?>
		<hr class="soft"/>
				
	</div>

	<div class="tab-pane" id="blockView">
		<ul class="thumbnails">
			<?php
			for($i=0;$i<count($products);$i++)
			{
				?>
			<li class="span3">
			  <div class="thumbnail">
				<a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$products[$i]['product_id']; ?>"><img src="<?php echo base_url()."public/images/".$products[$i]['picture'];?>" alt=""/></a>
				<div class="caption">
				  <h5><a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$products[$i]['product_id']; ?>"><?php echo $products[$i]['product_name']; ?></a></h5>
				   <h4 style="text-align:center"><a class="btn"><?php echo $products[$i]['situation']."%"; ?></a> 
				   <a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$products[$i]['product_id']; ?>" class="btn">
					<?php if($products[$i]['purpose']==1) echo "Buy"; else echo "Exchange";  ?>
				   </a> 
				   
				   </h4>
				</div>
			  </div>
			</li>
			<?php 
			} 
			?>
		</ul>
	<hr class="soft"/>
	</div>
</div>

	
	<div class="pagination">
			<ul>
			<li><a href="#">&lsaquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">&rsaquo;</a></li>
			</ul>
			</div>
			<br class="clr"/>
