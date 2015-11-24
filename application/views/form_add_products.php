
    
	<h3> Add products</h3>	 <?php if(!empty($message)) echo $message; ?>
	<hr class="soft"/>
	
	<div class="well well-small">		
		<div class="row-fluid">
			<div id="featured" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
			  
									<form id="add_products" action="<?php echo base_url();?>index.php/add_products/check" method="post" enctype="multipart/form-data">
			  
										  <div class="control-group">
											<label class="control-label" for="inputProductname">Product name: <span class="required">*</span>
											<?php 
											if(isset($errors) && in_array('product_name',$errors))
											{
												echo "<span class='label label-warning'>Please fill in the category name</span>";
											}
											?>
											</label>
											<div class="control-group">
											  <input class="span3"  type="text" id="inputProduct" placeholder="Product name" name="product_name" value="<?php if(isset($_POST['product_name'])) echo strip_tags($_POST['product_name']); ?>" tabindex="1" >
											</div>
										  </div>
										  
										  
										  <div class="control-group">
											<label class="control-label" for="select01">All Categories: <span class="required">*</span></label>
											<div class="controls">
											  <select name="category" form="add_products" tabindex="2">
													  <?php 
														for($i=0;$i<count($categories);$i++)
														{
															echo "<option value='{$categories[$i]['cat_id']}'";
																if(isset($_POST['category']) && ($_POST['category'] == $categories[$i]['cat_id'])) echo "selected = 'selected' ";
															echo ">".$categories[$i]['cat_name']."</option>";
														}
													  ?>                       
											  </select>	
											</div>
										  </div>
										  
										  
										  <div class="control-group">
											<label class="control-label" for="select01">Situation: (%)<span class="required">*</span></label>
											<div class="controls">
											  <select name="situation" tabindex="3">
														 <?php 
															for($i=99;$i>0;$i--)
															{
																echo "<option value='$i'";
																	if(isset($_POST['situation']) && $_POST['situation'] == $i) echo "selected='selected'";
																echo ">".$i."</option>";
															}
														 ?>
											   </select>
											</div>
										  </div>
										  
										  
										  
										  <div class="control-group">
											<label class="control-label" for="fileInput">Picture <span class="required">*</span>
											<?php 
												if(!empty($result))  
												for($i=0;$i<count($result);$i++)
												{
													echo "<span class='label label-warning'>".$result[$i]."<span>";
												}
												if(isset($errors) && in_array('image',$errors))
												{
													echo "<span class='label label-warning'>Please select image</span>";
												}
											?>
											</label>
											<div class="control-group">
											  <input class="input-file" id="fileInput" type="file" name="image" tabindex="6" >
											</div>
										  </div>

											</br>
											<div class="control-group">
												<label class="control-label" for="textarea">Product Description: <span class="required">*</span>
												<?php 
												if(isset($errors) && in_array('description',$errors))
												{
													echo "<span class='label label-warning'>Please fill in the description</span>";
												}
												?>
												</label>
												<div class="controls">
												  <textarea class="input-xlarge" id="textarea1" rows="3" name="description" tabindex="7" ><?php if(isset($_POST['description'])) echo htmlentities($_POST['description'], ENT_COMPAT, 'UTF-8'); ?></textarea>
												</div>
											</div>
											
										  
										  <div class="control-group">
											<div class="controls">
											  <input type="submit" class="btn" value="Add product"  name="submit" tabindex="8" ></input>
											</div>
										  </div>
										
										</form>
					 
					</div>
				</div>		  
			</div>
		</div>
	</div>
		
	

