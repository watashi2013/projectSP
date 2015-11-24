	
    
	<h3> Add categories</h3>	 <?php if(!empty($message)) echo $message; ?>
	<hr class="soft"/>
	
	<div class="row">
		
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<form   action="<?php echo base_url();?>index.php/add_categories/check" method="post">
			  
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Category name: <span class="required">*</span>
				<?php 
				if(isset($errors) && in_array('category',$errors))
				{
					echo "<span class='label label-warning'>Please fill in the category name</span>";
				}
				?>
				</label>
				<div class="controls">
				  <input class="span3"  type="text" id="inputCategory" placeholder="Category" name="category" value="<?php if(isset($_POST['category'])) echo strip_tags($_POST['category']); ?>" tabindex="1" >
				</div>
			  </div>
			  
			  
			  <div class="control-group">
				<div class="controls">
				  <input type="submit" class="btn" value="Add categories"  tabindex="2" ></input>
				</div>
			  </div>
			
			</form>
		</div>
		</div>
	</div>	
	

