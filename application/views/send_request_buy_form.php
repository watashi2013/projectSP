    
	<h3> Send Request: 	 
	<?php 
		if($this->session->userdata('mess1')!=NULL) { echo $this->session->userdata('mess1');$this->session->unset_userdata('mess1');} 
		if($this->session->userdata('error')!=NULL) { echo $this->session->userdata('error');$this->session->unset_userdata('error');}
		if($this->session->userdata('ok')!=NULL) { echo $this->session->userdata('ok');$this->session->unset_userdata('ok');}
	?>
	</h3>
	<hr class="soft"/>
	
	<div class="well well-small">		
		<div class="row-fluid">
			<div id="featured" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
			  
									<form id="send_request_buy" action="<?php echo base_url()."index.php/send_request/send_buy?p_id=".$_GET['p_id']."&u_id=".$_GET['u_id']; ?>" method="post">
			  								  
										  <div class="control-group">
											<label class="control-label" for="select01"><h5>Payment Method: <span class="required">*</span></h5></label>
											<div class="controls">
											  <select name="method" tabindex="1">
														  <option value="1">Online Payment</option>	
														  <option value="2">Through post office</option>
														  <option value="3">Transfer by Credit card</option>
														  <option value="4">Meetting</option>
											  </select>
											</div>
										  </div>

											
											<div class="control-group">
												<label class="control-label" for="textarea"><h5>Message: <span class="required">*</span>
												<?php if($this->session->userdata('mess2')!=NULL) { echo $this->session->userdata('mess2'); $this->session->unset_userdata('mess2');} ?>
												</h5>
												</label>
												<div class="controls">
												  <textarea class="input-xlarge" id="textarea1" rows="3" name="message" tabindex="2" ></textarea>
												</div>
											</div>
											
											
										  
										  <div class="control-group">
											<div class="controls">
											  <input type="submit" class="btn" value="Send"  name="submit" tabindex="3" />
											</div>
										  </div>
										
									</form>
					 
					</div>
				</div>		  
			</div>
		</div>
	</div>
		
	

