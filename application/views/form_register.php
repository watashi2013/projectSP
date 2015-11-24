

    
	<h3> Register</h3>	<?php if(!empty($message)) echo $message; ?>
	<hr class="soft"/>
	
	<div class="row">
		
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<form action="<?php echo base_url();?>index.php/dangki/check" method="post">
			  
			  <div class="control-group">
				<label class="control-label" for="">First name: <span class="required">*</span>
				<?php if(isset($errors) && in_array('first name', $errors)) echo "<span class='label label-warning'>Please enter your first name</span>"; ?>
				</label>
				<div class="controls">
				  <input class="span3"  type="text" id="" placeholder="First name" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" tabindex="1">
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="">Last name: <span class="required">*</span>
				<?php if(isset($errors) && in_array('last name', $errors)) echo "<span class='label label-warning'>Please enter your last name</span>"; ?>
				</label>
				<div class="controls">
				  <input class="span3"  type="text" id="" placeholder="Last name" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" tabindex="2">
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="">Email: <span class="required">*</span>
				<?php if(isset($errors) && in_array('email', $errors)) echo "<span class='label label-warning'>Please enter your valid email</span>"; ?>
				</label>
				<div class="controls">
				  <input class="span3"  type="text" id="" placeholder="Email" name="email" value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email'], ENT_COMPAT, 'UTF-8'); ?>" tabindex="3">
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="">Password: (4-20 character) <span class="required">*</span>
				<?php if(isset($errors) && in_array('password', $errors)) echo "<span class='label label-warning'>Please enter your password</span>"; ?>
				</label>
				<div class="controls">
				  <input type="password" class="span3"  id="" placeholder="Password" name="password1" value="" tabindex="4">
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="">Confirm Password: <span class="required">*</span> 
				<?php if(isset($errors) && in_array('password not match', $errors)) echo "<span class='label label-warning'>Your confirmed password does not match.</span>"; ?>
				</label>
				<div class="controls">
				  <input type="password" class="span3"  id="" placeholder="Confirm password" name="password2" value="" tabindex="5">
				</div>
			  </div>
			  
			  <div class="control-group">
				<div class="controls">
				  <input type="submit" class="btn" name="submit" value="Sign in" tabindex="6" ></input>
				</div>
			  </div>
			  
			</form>
		</div>
		</div>
	</div>	
	

