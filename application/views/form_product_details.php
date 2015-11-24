    <ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul>	
	<div class="row">	  
			<div  class="span3">
            
				<img class="thumbnail" src="<?php echo base_url()."public/images/".$product_details['picture'];?>" style="width:100%" alt="<?php echo $product_details['product_name'];?>"/>
            			
			</div>
			<div class="span6">
				<h3><?php echo $product_details['product_name']; ?></h3>				
				<hr class="soft clr"/>
				<h5>Purpose &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 
					<?php
					  if($product_details['purpose']==1) 
					  {
						echo "&nbsp&nbsp&nbsp&nbspBuy&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='";
						echo base_url()."index.php/send_request/form_buy?p_id=".$product_details['product_id']."&u_id=".$product_details['user_id'];
						echo "' class='btn btn-primary'>Send Request</a>";
						if($this->session->userdata('mess')!=NULL)
						{
							echo $this->session->userdata('mess');
							$this->session->unset_userdata('mess');
						}
					  }
					  else	
					  {
						echo "&nbsp&nbsp&nbsp&nbspExchange&nbsp&nbsp&nbsp&nbsp<a href='";
						echo base_url()."index.php/send_request/form_exchange?p_id=".$product_details['product_id']."&u_id=".$product_details['user_id'];
						echo "' class='btn btn-primary'>Send Request</a>";
						if($this->session->userdata('mess')!=NULL)
						{
							echo $this->session->userdata('mess');
							$this->session->unset_userdata('mess');
						}
					  }
					?>
					
				</h5>
				<?php  if($product_details['purpose']==1) {?>
				<h5>
					Price&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp&nbsp<?php echo number_format($product_details['price'])." VNĐ";  ?>
				</h5>
				<?php } ?>
				<h5>
					Situation&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp&nbsp&nbsp<?php echo $product_details['situation']." %";  ?>
				</h5>
				
				<h5>
					Post on&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp&nbsp&nbsp<?php echo $product_details['date']; ?>
				</h5>
				
				<h5>
					Post by&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp&nbsp<?php echo $product_details['name']."&nbsp&nbsp&nbsp&nbsp"; ?><a  href="<?php echo base_url()."index.php/profile/view_profile?u_id=".$product_details['user_id']; ?>" class="btn btn-primary" >View Profile</a>
				</h5>
				
				
				<hr class="soft clr"/>
	
			</div>
			
			<div class="span9">
				<h5> Description :</h5>
				<p>
				<?php echo $product_details['description']; ?>
				</p>
			</div>

	</div>