
    
	<h3> 
	<?php 
		if($this->session->userdata('user_info')['user_id']== $mail_header['u_id1'] ) echo "I want to buy ".$mail_header['u_id2_name']."' product: <span style='color:green;'>".$mail_header['product_name']."</span>";
			else echo $mail_header['u_id1_name']." want to buy your product: <span style='color:green;'>".$mail_header['product_name']."</span>";
	?> 
	
	
	
	</h3>			
	<div class="well well-small">		
		<div class="row-fluid">
			<div id="featured" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">	  
					<img src="<?php echo base_url()."public/images/".$mail_header['picture']; ?>">
					</br>
					<a type="submit" class="btn" href="<?php echo base_url()."index.php/product_details/form_product_details?p_id=".$mail_header['product_id']; ?>">View details</a>
					<h5>
					<strong>Payment method: <?php 
									switch ($mail_header['method'])
										{
											case 1:
												echo "Online Payment";
												break;
											case 2:
												echo "Through post office";
												break;
											case 3:
												echo "Transfer by Credit card";
												break;
											case 4:
												echo "Meetting";
												break;
											default:
												break;
										}	
									?>
					</strong> 
					</h5>
					</br>
					<h5>Messages: </h5>
					</br>
					<?php 
						for($i=0;$i<count($conversation);$i++)
						{
					?>
						<?php echo "<div class='alert alert-success'><h5><strong>".$conversation[$i]['sender']."</strong>------------------------------------------------------------".$conversation[$i]['post_on']."</h5></br>".$conversation[$i]['content']."</div></br>"; ?>
						</br>
					<?php	
						}
					?>
					
					<form id="chat" action="<?php echo base_url()."index.php/chat/send?tran_id=".$_GET['tran_id'];?>" method="post">
					<div class="control-group">
						<label class="control-label" for="textarea">Leave a message: 
						<?php if($this->session->userdata('mess1')!=NULL) { echo $this->session->userdata('mess1');$this->session->unset_userdata('mess1');}  ?>
						</label>
						<div class="controls">
						<textarea class="input-xlarge" id="textarea1" rows="3" name="message" tabindex="1" ></textarea>
						</div>
					</div>
					
					<div class="control-group">
						<div class="controls">
						<input type="submit" class="btn" value="Send"  name="submit" tabindex="2" ></input>
						</div>
					 </div>
					</form>
					</div>
				</div>		  
			</div>
		</div>
	</div>
		
	


		
	

