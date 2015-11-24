
    
	<h3> Login</h3>	 
	<?php 
		if(!empty($message)) echo $message; 
		if($this->session->userdata('error_addProduct')!=NULL) 
		{ 
			echo $this->session->userdata('error_addProduct');
			$this->session->unset_userdata('error_addProduct');
		}
	?>
	<hr class="soft"/>
	
	<div class="row">
		
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<form id="login" action="<?php echo base_url();?>index.php/dangnhap/check" method="post">
			  
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Email: 
				<?php if(isset($errors) && in_array('email',$errors)) echo "<span class='label label-warning'>Please enter your email.</span>";?>
				</label>
				<div class="controls">
				  <input class="span3"  type="text" id="inputEmail1" placeholder="Email" name="email" value="<?php if(isset($_POST['email'])) {echo htmlentities($_POST['email'], ENT_COMPAT, 'UTF-8');} ?>" tabindex="1" >
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="inputPassword1">Password:
				 <?php if(isset($errors) && in_array('password',$errors)) echo "<span class='label label-warning'>Please enter your password.</span>";?>
				</label>
				<div class="controls">
				  <input type="password" class="span3"  id="inputPassword1" placeholder="Password" name="password" value="" tabindex="2">
				</div>
			  </div>
			  
			  <div class="control-group">
				<div class="controls">
				  <input type="submit" class="btn" value="Login"  tabindex="3" name="submit"></input>
				</div>
			  </div>
			
			</form>
		</div>
		</div>
	</div>	
	

