
<div class="well well-small">
			<h4>Featured Products <small class="pull-right"></small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			  <div class="item active">			  					
						<ul class="thumbnails">						
						<?php
						for($i=0;$i<(count($featured_products)/2);$i++)
						{
							?>
							<li class="span3">
							  <div class="thumbnail">
								<a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$featured_products[$i]['product_id']; ?>"><img src="<?php echo base_url()."public/images/".$featured_products[$i]['picture']?>" alt=""></a>
								<div class="caption">
								   <h5><a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$featured_products[$i]['product_id']; ?>"><?php echo $featured_products[$i]['product_name']; ?></a></h5>
								   <span class="btn"><?php echo $featured_products[$i]['situation']."%"; ?></span> 
								   <a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$featured_products[$i]['product_id']; ?>" class="btn">Exchange</a>	
								  </h4>
								</div>
							  </div>
							</li>
						<?php
						}
						?>
						</ul>								
			  </div>

				 <div class="item">
					  <ul class="thumbnails">						
						<?php
						for($i=(count($featured_products)/2);$i<count($featured_products);$i++)
						{
							?>
							<li class="span3">
							  <div class="thumbnail">
								<a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$featured_products[$i]['product_id']; ?>"><img src="<?php echo base_url()."public/images/".$featured_products[$i]['picture']?>" alt=""></a>
								<div class="caption">
								   <h5><a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$featured_products[$i]['product_id']; ?>"><?php echo $featured_products[$i]['product_name']; ?></a></h5>
								   <span class="btn"><?php echo $featured_products[$i]['situation']."%"; ?></span> 
								   <a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$featured_products[$i]['product_id']; ?>" class="btn">Exchange</a>		
								  </h4>
								</div>
							  </div>
							</li>
						<?php
						}
						?>
						</ul>
				 </div>


			  </div>
			  
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>

			  
			</div>
			</div>
</div>
		
		
		
		
		<h4>Latest Products </h4>
			  <ul class="thumbnails">
			  <?php
				for($i=0;$i<count($last_products);$i++)
				{
					?>
				<li class="span3">
				  <div class="thumbnail">
					<a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$last_products[$i]['product_id']; ?>"><img src="<?php echo base_url()."public/images/".$last_products[$i]['picture'];?>" alt=""/></a>
					<div class="caption">
					  <h5><a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$last_products[$i]['product_id']; ?>"><?php echo $last_products[$i]['product_name']; ?></a></h5>
					   <h4 style="text-align:center"><span class="btn"><?php echo $last_products[$i]['situation']."%"; ?></span> 
					   <a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$last_products[$i]['product_id']; ?>" class="btn">
					   <?php if($last_products[$i]['purpose']==1) echo "Buy"; else echo "Exchange";?>
					   </a> 
					   </h4>
					</div>
				  </div>
				</li>
				<?php 
				} 
				?>
			  </ul>	
