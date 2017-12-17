<?php
//each page extends controller and the index.php?page=tasks causes the controller to be called
class accountsController extends http\controller
{
    //each method in the controller is named an action.
    //to call the show function the url is index.php?page=task&action=show
    public static function show()
    {
        $record = accounts::findOne($_REQUEST['id']);
        self::getTemplate('show_account', $record);
    }
    //to call the show function the url is index.php?page=accounts&action=all
    public static function all()
    {
        $records = accounts::findAll();
        self::getTemplate('all_accounts', $records);
    }
    //to call the show function the url is called with a post to: index.php?page=task&action=create
    //this is a function to create new tasks
    //you should check the notes on the project posted in moodle for how to use active record here
    //this is to register an account i.e. insert a new account
    public static function register()
    {
        //https://www.sitepoint.com/why-you-should-use-bcrypt-to-hash-stored-passwords/
        //USE THE ABOVE TO SEE HOW TO USE Bcrypt
        self::getTemplate('register');
    }
    //this is the function to save the user the new user for registration
    public static function store()
    {
        $user = accounts::findUserbyEmail($_REQUEST['email']);
        if ($user == FALSE) {
            $user = new account();
            $user->email = $_POST['email'];
            $user->fname = $_POST['fname'];
            $user->lname = $_POST['lname'];
            $user->phone = $_POST['phone'];
            $user->birthday = $_POST['birthday'];
            $user->gender = $_POST['gender'];
            $user->password = $user->setPassword($_POST['password']);
            echo $user->password;
            $userID = $user->save();
            
            session_start();
            $_SESSION["userID"] = $userID;
            $_SESSION["userFname"] = $user->fname;
            $_SESSION["userLname"] = $user->lname;
            $_SESSION["userEmail"] = $user->email;
            
            header("Location: index.php?page=tasks&action=all");
        } else {
            //You can make a template for errors called error.php
            // and load the template here with the error you want to show.
           // echo 'already registered';
            $error = 'already registered';
            self::getTemplate('error', $error);
        }
    }
    public static function edit()
    {
        $record = accounts::findOne($_REQUEST['id']);
        self::getTemplate('edit_account', $record);
    }
//this is used to save the update form data
    public static function save() {
        session_start();
        if(key_exists('userID',$_SESSION)) {
            $userID = $_SESSION['userID'];
        } else {
            header("Location: index.php?page=homepage&action=show");
        }
        
        $user = accounts::findOne($_REQUEST['id']);
        $user->email = $_POST['email'];
        $user->fname = $_POST['fname'];
        $user->lname = $_POST['lname'];
        $user->phone = $_POST['phone'];
        $user->birthday = $_POST['birthday'];
        $user->gender = $_POST['gender'];
        $user->password = $user->setPassword($_POST['password']);
        $user->save();
        header("Location: index.php?page=tasks&action=all");
    }
    public static function delete() {
        $record = accounts::findOne($_REQUEST['id']);
        $record->delete();
        session_destroy();
        header("Location: index.php?page=homepage&action=show");
    }
    public static function login()
    {
        $user = accounts::findUserbyEmail($_REQUEST['email']);
        if ($user == FALSE) {
            echo 'user not found';
        } else {
            if($user->checkPassword($_POST['password']) == TRUE) {
                echo 'login';
                session_start();
                $_SESSION["userID"] = $user->id;
                $_SESSION["userFname"] = $user->fname;
                $_SESSION["userLname"] = $user->lname;
                $_SESSION["userEmail"] = $user->email;
                print_r($_SESSION);
                header("Location: index.php?page=tasks&action=all");
            } else {
                echo 'password does not match';
            }
        }
    }
    public static function logout()
    {
        session_destroy();
        header("Location: index.php?page=homepage&action=show");
    }
}