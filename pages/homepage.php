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

<body style="width: 100%;">


<span style="text-align: center;padding-right: 50%;"><h1>
    <?php
    //this how to print some data;
    echo $data['site_name'];
    ?> </h1></span>

<!-- <h1><a href="index.php?page=accounts&action=all">Show All Accounts</a></h1>
<h1><a href="index.php?page=tasks&action=all">Show All Tasks</a></h1> -->
<div style="width: 100%;padding-left: 30%;"> 
    <div style="width: 100%;padding-left: 40px;">
        <form action="index.php?page=accounts&action=login" method="POST">

            <div class="container">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="email" required><br><br>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required><br><br>

                <div style="float: left;width: 50%;padding-left: 150px;"><button type="submit">Login</button></div>

            </div>
        </form>
    </div>

    <div style="width: 100%;padding-top: 50px;">
        <div style="border-style: outset; width: 20%;padding-left: 20px;padding-right: 20px;">If you are a new user, please <a href="index.php?page=accounts&action=register">Sign Up!</a> here!</div>
    </div>
</div>


<script src="js/scripts.js"></script>
</body>
</html>