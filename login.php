<?php
// Get the user account data
$uname = filter_input(INPUT_POST, 'userName');
$pword = filter_input(INPUT_POST, 'password');

// Validate inputs
if ($uname== null || $uname == false || $pword == null || $pword == false) {
    $error = "Invalid login data. Check all fields and try again.";
    include('error.php');
}
else {
    function is_valid_customer_login($uname3, $pword3) {
        include('database_admin.php');
        $pword2 = sha1($pword3);
        $query = 'SELECT pword FROM accounts WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $uname3);
        $statement->execute();
        $valid = $statement->fetch();
        $statement->closeCursor();
    if ($valid['pword'] == $pword2) {
            return true;
        }
        else {
            return false;
        }
    }
    function get_customer_by_username($uname4) {
        include('database_admin.php');
        $query = 'SELECT * FROM accounts WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $uname4);
        $statement->execute();
        $customer = $statement->fetch();
        $statement->closeCursor();
        return $customer;
    }

    if (is_valid_customer_login($uname, $pword) == true) {
		session_start();
        $_SESSION['user'] = get_customer_by_username($uname);
    	include("index.php");
    } 
    else {
        $error = "Login failed. Invalid username or password.";
        include('error.php');
    }
} 
?>