<?php
//each page extends controller and the index.php?page=tasks causes the controller to be called
class tasksController extends http\controller
{
    //each method in the controller is named an action.
    //to call the show function the url is index.php?page=task&action=show
    public static function show()
    {
        $record = todos::findOne($_REQUEST['id']);
        self::getTemplate('show_task', $record);
    }
    //to call the show function the url is index.php?page=task&action=list_task
    public static function all()
    {
        $records = todos::findAll();
        /*session_start();
           if(key_exists('userID',$_SESSION)) {
               $userID = $_SESSION['userID'];
           } else {
               header("Location: index.php?page=homepage&action=show");
           }
        $userID = $_SESSION['userID'];
        $records = todos::findTasksbyID($userID);*/
        
        self::getTemplate('all_tasks', $records);
    }
    //to call the show function the url is called with a post to: index.php?page=task&action=create
    //this is a function to create new tasks
    //you should check the notes on the project posted in moodle for how to use active record here
    public static function create()
    {   
       /* session_start();
        if(key_exists('userID',$_SESSION)) {
            $userID = $_SESSION['userID'];
        } else {
            header("Location: index.php?page=homepage&action=show");
        }
        $userID = $_SESSION['userID'];
        echo $userID;
        print_r($_POST); */
        self::getTemplate('create_task'); 
    }
    public static function addTask()
    {
        session_start();
        $record = new todo();
        $record->owneremail = $_SESSION["userEmail"];
        $record->ownerid = $_SESSION["userID"];
        $record->createddate = $_POST['createddate'];
        $record->duedate = $_POST['duedate'];
        $record->message = $_POST['message'];
        $record->isdone = $_POST['isdone'];
        $record->save();
        header('Location: index.php?page=tasks&action=all&id='.$_SESSION["userID"]);
    }
    
    //this is the function to view edit record form
    public static function edit()
    {
        $record = todos::findOne($_REQUEST['id']);
        self::getTemplate('edit_task', $record);
    }
    //this would be for the post for sending the task edit form
   public static function store()
    {
        $record = todos::findOne($_REQUEST['id']);
        $record->body = $_REQUEST['body'];
        $record->save();
        print_r($_POST);
    }
    public static function save() {
        session_start();
        $task = new todo();
        $task->body = $_POST['body'];
        $task->ownerid = $_SESSION['userID'];
        $task->save();
    }
    //this is the delete function.  You actually return the edit form and then there should be 2 forms on that.
    //One form is the todo and the other is just for the delete button
    public static function delete()
    {
        $record = todos::findOne($_REQUEST['id']);
        $record->delete();
        print_r($_POST);
        header("Location: index.php?page=tasks&action=all");
    }
    public static function update()
    {
        $record = todos::findOne($_REQUEST['id']);
        $task->owneremail = $_POST['owneremail'];
        $task->ownerid = $_SESSION['userID'];
        $record->createddate = $_POST['createddate'];
        $record->duedate = $_POST['duedate'];
        $record->message = $_POST['message'];
        $record->isdone = $_POST['isdone'];
        $record->save();
        session_start();
        header('Location: index.php?page=tasks&action=all&id='.$_SESSION["userID"]);
    }
}  