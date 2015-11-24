<link href="<?php echo base_url();?>/templates/css/style.css" rel="stylesheet" type="text/css" />

<?php
echo $first_name."</br>";
?>

<html>
<head>
<title>Dang ki</title>
</head>
<body>
<?php if(isset($message))  echo $message; ?>
	 <form action="../cores/router.php" method="post">
        <fieldset>
       	    <legend>Register</legend>
                <div>
                    <label for="First Name">First Name <span class="required">*</span>
                        
                    </label> 
    	           <input type="text" name="first_name" size="20" maxlength="20" value="" tabindex='1' />
                </div>
                
                <div>
                    <label for="Last Name">Last Name <span class="required">*</span>
                   
                    </label> 
    	           <input type="text" name="last_name" size="20" maxlength="40" value="" tabindex='2' />
                </div>
                
                <div>
                    <label for="email">Email <span class="required">*</span>
                   
                    </label> 
    	           <input type="text" name="email" id="email" size="20" maxlength="80" value="" tabindex='3' />
                    <span id="available"></span>
                </div>
                
                <div>
                    <label for="password">Password (4-20 character) <span class="required">*</span>
                   
                    </label> 
    	           <input type="password" name="password1" size="20" maxlength="20" value="" tabindex='4' />
                </div>
                
                <div>
                    <label for="email">Confirm Password <span class="required">*</span> 
                   
                    </label> 
    	           <input type="password" name="password2" size="20" maxlength="20" value="" tabindex='5' />
                </div>
        </fieldset>
        <p><input type="submit" name="submit" value="Register" tabindex='6' /></p>
    </form>
</body>
</html>