<!doctype html>
<html>
<head>
</head>
<body>




<form action="index.php?page=tasks&action=update&id=<?php echo $data->id; ?>" method="post">
				Created Date : <input type="text" name="createddate" id='createddate' value="<?php echo $data->createddate; ?>"><br>
				Owner email: : <input type="text" name="owneremail" id='owneremail' value="<?php echo $data->owneremail; ?>"><br>
				Owner id: <input type="text" name="ownerid" id='ownerid' value="<?php echo $data->ownerid; ?>"><br>
				Due Date: <input type="text" name="duedate" id='duedate' value="<?php echo $data->duedate; ?>"><br>
				Message: <input type="text" name="message" id='message' value="<?php echo $data->message; ?>"><br>
				Isdone: <input type="text" name="isdone" id="isdone" value="<?php echo $data->isdone; ?>"><br>
				
				<input type="submit" value="Submit form">
			</form>
			<script src="js/scripts.js"></script>
		</body>
	</html>