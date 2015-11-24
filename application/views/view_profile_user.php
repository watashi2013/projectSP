    <ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Author</li>
    </ul>	
	<div class="row">	  
			
			<div class="span6">
				<h3><?php echo $profile['name']; ?></h3>				
				<hr class="soft clr"/>
				
				
				
				<h5>Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
				<?php echo $profile['email']; ?>
				</h5>
					
				<h5> Reliability&nbsp&nbsp&nbsp&nbsp&nbsp:</h5>	
				<fieldset class="rating">
				<input type="radio" id="star5" name="rating" value="5" <?php if(4<$profile['mark'] && $profile['mark']<=5) echo "checked"; else echo "disabled" ?>/><label for="star5" title="Very Good!"></label>
				<input type="radio" id="star4" name="rating" value="4" <?php if(3<$profile['mark'] && $profile['mark']<=4) echo "checked"; else echo "disabled" ?>/><label for="star4" title="Good"></label>
				<input type="radio" id="star3" name="rating" value="3" <?php if(2<$profile['mark'] && $profile['mark']<=3) echo "checked"; else echo "disabled" ?>/><label for="star3" title="Normal"></label>
				<input type="radio" id="star2" name="rating" value="2" <?php if(1<$profile['mark'] && $profile['mark']<=2) echo "checked"; else echo "disabled" ?>/><label for="star2" title="Bad"></label>
				<input type="radio" id="star1" name="rating" value="1" <?php if(0<=$profile['mark'] && $profile['mark']<=1) echo "checked"; else echo "disabled" ?>/><label for="star1" title="Very Bad"></label>
				</fieldset>
				
				</br>
				<hr class="soft clr"/>
				
				<form action="<?php echo base_url()."index.php/update_info/update" ?>" method="post">
				<h5>
					Phone&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp&nbsp
					<input type="text" id="" placeholder="Phone" name="phone" value="<?php echo $profile['phone']; ?>" />
				</h5>
			
				<h5>
					Address&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp&nbsp
					<input type="text" id="" placeholder="Address" name="address" value="<?php echo $profile['address']; ?>" />
				</h5>
				<input type="submit" class="btn" name="submit" value="Update" ></input>
				<?php if($this->session->userdata('mess')!=NULL) {echo $this->session->userdata('mess'); $this->session->unset_userdata('mess');} ?>
				</form>
				<hr class="soft clr"/>
	
			</div>
			
			<div class="span9">
				<h4> <?php echo " Your products: " ?> </h4>
				
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
						   <h4 style="text-align:center">
						   <a href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$products[$i]['product_id']; ?>" class="btn">View</a>
						   <a class="btn" href="">Edit</a> 
						   <a href="<?php echo base_url()."index.php/delete_product/delete?product_id=".$products[$i]['product_id']; ?>" class="btn">Delete</a> 						   
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

	</div>