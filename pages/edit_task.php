<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/styles.css?v=1.0">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>

<body>

<?php
//this is how you print something  $data contains the record that was selected on the table.
print_r($data);
date_default_timezone_set('EST');
$edit = false;
if(!empty($data))
{
	$edit = true;
}
?>

<h6><a href="index.php?page=accounts&action=logout">Logout</a></h6>

<?php
if($edit == true)
{?>
	<form action="index.php?page=tasks&action=edit&id=<?php echo $data->id; ?>" method="post">
		Todo Title/body:: <input type="text" name="message" value="<?php echo $data->message; ?>"><br>

	    Todo complete: <input type="text" name="isdone" value="<?php echo $data->isdone; ?>" pattern="[0|1]"><br>
	    Date created: <input type="text" name="createddate" value="<?php echo $data->createddate; ?>" readonly><br>
	    Date updated: <input type="text" name="duedate" value="<?php echo $data->duedate; ?>" readonly><br>
	    <button type="submit">Update</button>
	</form>
	<form action="index.php?page=tasks&action=delete&id=<?php echo $data->id; ?>" method="post" id="form1">
	    <button type="submit" form="form1" value="delete">Delete</button>
	</form>
<?php
}
else {
?>	
<form action="index.php?page=tasks&action=create" method="post">
	Todo Title/body: <input type="text" name="message" pattern=".{2,}" title="Message must have at least 2 characters"><br>

    Todo complete: <input type="text" name="isdone" maxlength="1" size="4" pattern="[0|1]" title="It can have 0 or 1 only"><br>
    Date created: <input type="text" name="createddate" value="<?php echo date("Y-m-d h:i:sa"); ?>" readonly><br>
    Date updated: <input type="text" name="duedate" value="<?php echo date("Y-m-d h:i:sa"); ?>" readonly><br>
    <button type="submit">Create</button>
</form>
<?php 
}
?>
<h6><a href="index.php?page=tasks&action=all">Back</a></h6>

<script src="js/scripts.js"></script>
</body>
</html>