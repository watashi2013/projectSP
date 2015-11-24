
    
	<h3> Messages</h3>
	<hr class="soft"/>
	
	<table class="table table-bordered">
		<thead>
		  <tr style="background-color:#CCCC00;">
			<th>From</th>
			<th>To</th>
			<th>Content</th>
			<th></th>
			<th></th>
		  </tr>
		</thead>
		
		<tbody>
		  
		  <?php 
			foreach($messages as $message)
			{
				if( (($this->session->userdata('user_info')['user_id']==$message['u_id1']) && ($message['view']==1)) ||  (($this->session->userdata('user_info')['user_id']==$message['u_id2']) && ($message['view']==2)))
				{
		  ?>
				<tr onclick="document.location = '<?php echo base_url()."index.php/mess_details/view_details?tran_id=".$message['tran_id']; ?>';" style="cursor:pointer;">
				<td>
					<?php 						
						if ($message['u_id_send']==$message['u_id1'])
							echo $message['u_id1_name'];
						else
							echo $message['u_id2_name'];
					?>
				</td>
				<td>
					<?php 
						echo "me";
					?>
				</td>
				<td>
				  <?php echo $message['content']; ?>
				</td>
				<td>
				  <?php echo $message['post_on'] ?>
				</td>
				<td>
				<a id="delete" href="<?php echo base_url()."index.php/delete_transactions/delete?tran_id=".$message['tran_id']; ?>">Delete</a>
				</td>
				</tr>
			<?php
				}
					if( (($this->session->userdata('user_info')['user_id']==$message['u_id1']) && (($message['view']==0) || ($message['view']==2))) ||  (($this->session->userdata('user_info')['user_id']==$message['u_id2']) && (($message['view']==0) || ($message['view']==1))))
					{
			  ?>
					<tr onclick="document.location = '<?php echo base_url()."index.php/mess_details/view_details?tran_id=".$message['tran_id']; ?>';" style="cursor:pointer;background-color:#FFCC80;">
					<td>
						<?php 
						if($message['u_id_send'] == $this->session->userdata('user_info')['user_id'])
							echo "me";
						else	
						{	
							if ($message['u_id_send']==$message['u_id1'])
								echo $message['u_id1_name'];
							else
								echo $message['u_id2_name'];
						}		
						?>
					</td>
					<td>
						<?php 
							if($message['u_id_send']==$message['u_id1'])
								$id_nguoi_nhan = $message['u_id2'];
							else
								$id_nguoi_nhan = $message['u_id1'];
							if($id_nguoi_nhan == $this->session->userdata('user_info')['user_id'])
								echo "me";
							else
								if($id_nguoi_nhan == $message['u_id1'])
									echo $message['u_id1_name'];
								else
									echo $message['u_id2_name'];
									
						?>
					</td>
					<td>
					  <?php echo $message['content']; ?>
					</td>
					<td>
					  <?php echo $message['post_on'] ?>
					</td>
					<td>
					<a id="delete" href="<?php echo base_url()."index.php/delete_transactions/delete?tran_id=".$message['tran_id']; ?>">Delete</a>
					</td>
					</tr>
				<?php
					}
					
			}
			?>
			
			
		  
		</tbody>
  </table>
		
	

