<?php
//functions
function is_email_in_use($email3) {
    include('database_admin.php');
    $query = 'SELECT * FROM accounts WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email3);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function is_username_in_use($username2) {
    include('database_admin.php');
    $query = 'SELECT * FROM accounts WHERE userName = :userName';
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $username2);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

// Get the user account data
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$email2 = filter_input(INPUT_POST, 'email2', FILTER_VALIDATE_EMAIL);
$pword = filter_input(INPUT_POST, 'pword');
$pword2 = filter_input(INPUT_POST, 'pword2');
$firstName = filter_input(INPUT_POST, 'firstName');
$middleName = filter_input(INPUT_POST, 'middleName');
$lastName = filter_input(INPUT_POST, 'lastName');
$userName = filter_input(INPUT_POST, 'userName');
$phoneNum = filter_input(INPUT_POST, 'phoneNum');
$gender = filter_input(INPUT_POST, 'gender');
$city = filter_input(INPUT_POST, 'city');
$states = filter_input(INPUT_POST, 'state');
$street = filter_input(INPUT_POST, 'street');
$street2 = filter_input(INPUT_POST, 'street2');
$zipcode = filter_input(INPUT_POST, 'zipcode');
$dob = filter_input(INPUT_POST, 'dob');
if (($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg") ||
	($_FILES["file"]["type"] == "image/bmp") || ($_FILES["file"]["type"] == "image/gif") ||
	($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/webp")) {
		$pfp = filter_input(INPUT_POST, 'pfp');
}
else {
	$pfp = null;
}

$zip_regex = "/^[0-9]{5}(?:-[0-9]{4})?$/"; 

// Validate inputs
if ($firstName== null || $firstName == false || $lastName == null || $lastName == false ||
        $userName == null || $userName == false || $dob == null || $dob == false || 
        $phoneNum == null || $phoneNum == false || $gender == null || $gender == false ||
        $street == null || $street == false || $city == null || $city == false || $states == null ||
        $states == false) {
            $error = "Invalid data. Check all fields and try again.";
            include('error.php');
}
else if ((preg_match($zip_regex, $zipcode) != 1) || ($zipcode == null || $zipcode == false))
{
    $error = "Zip code improperly entered. Please try again.";
    include('error.php');
}
else if (($pword != $pword2) || ($pword == null || $pword == false || $pword2 == null || $pword2 == false)) {
    $error = "Passwords do not match or were invalid. Please try again.";
    include('error.php');
}
else if (($email != $email2) || ($email == null || $email == false || $email2 == null || $email2 == false)) {
    $error = "Email addresses do not match or were invalid. Please try again.";
    include('error.php');
}
else {
    if (is_email_in_use($email)) {
        $error = 'The e-mail address ' . $email . ' is already in use. Please try again.';
        include('error.php');
    }
    else if (is_username_in_use($userName)) {
        $error = 'The username ' . $userName . ' is already in use. Please try again.';
        include('error.php');
    }
    else {
        include('database_admin.php');
        // Add the user to the database 
        if (($middleName == null || $middleName == false) && ($street2 == null || $street2 == false) && ($pfp == null || $pfp == false)) {
            $query = 'INSERT INTO accounts
            (email, pword, firstName, lastName, phoneNum, userName, dob, gender, city, states, street, zipcode)
            VALUES
            (:email, :pword, :firstName, :lastName, :phoneNum, :userName, :dob, :gender, :city, :states, :street, :zipcode)';
            $statement = $db->prepare($query);
        }
        else if (($middleName == null || $middleName == false) && !($street2 == null || $street2 == false) && ($pfp == null || $pfp == false)) {
            $query = 'INSERT INTO accounts
            (email, pword, firstName, lastName, phoneNum, userName, dob, gender, city, states, street, street2, zipcode)
            VALUES
            (:email, :pword, :firstName, :lastName, :phoneNum, :userName, :dob, :gender, :city, :states, :street, :street2, :zipcode)';
            $statement = $db->prepare($query);
            $statement->bindValue(':street2', $street2); 
        }
        else if (!($middleName == null || $middleName == false) && ($street2 == null || $street2 == false) && ($pfp == null || $pfp == false)) {
            $query = 'INSERT INTO accounts
            (email, pword, firstName, middleName, lastName, phoneNum, userName, dob, gender, city, states, street, zipcode)
            VALUES
            (:email, :pword, :firstName, :middleName, :lastName, :phoneNum, :userName, :dob, :gender, :city, :states, :street, :zipcode)';
            $statement = $db->prepare($query);
            $statement->bindValue(':middleName', $middleName); 
        }
        else if (($middleName == null || $middleName == false) && ($street2 == null || $street2 == false) && !($pfp == null || $pfp == false)) {
            $query = 'INSERT INTO accounts
            (email, pword, firstName, lastName, phoneNum, userName, dob, gender, city, states, street, zipcode, pfp)
            VALUES
            (:email, :pword, :firstName, :lastName, :phoneNum, :userName, :dob, :gender, :city, :states, :street, :zipcode, :pfp)';
            $statement = $db->prepare($query);
            $statement->bindValue(':pfp', $pfp); 
        }
        else if (($middleName == null || $middleName == false) && !($street2 == null || $street2 == false) && !($pfp == null || $pfp == false)) {
            $query = 'INSERT INTO accounts
            (email, pword, firstName, lastName, phoneNum, userName, dob, gender, city, states, street, street2, zipcode, pfp)
            VALUES
            (:email, :pword, :firstName, :lastName, :phoneNum, :userName, :dob, :gender, :city, :states, :street, :street2, :zipcode, :pfp)';
            $statement = $db->prepare($query);
            $statement->bindValue(':street2', $street2); 
            $statement->bindValue(':pfp', $pfp); 
        }
        else if (!($middleName == null || $middleName == false) && ($street2 == null || $street2 == false) && !($pfp == null || $pfp == false)) {
            $query = 'INSERT INTO accounts
            (email, pword, firstName, middleName, lastName, phoneNum, userName, dob, gender, city, states, street, zipcode, pfp)
            VALUES
            (:email, :pword, :firstName, :middleName, :lastName, :phoneNum, :userName, :dob, :gender, :city, :states, :street, :zipcode, :pfp)';
            $statement = $db->prepare($query);
            $statement->bindValue(':middleName', $middleName); 
            $statement->bindValue(':pfp', $pfp); 
        }
        else {
            $query = 'INSERT INTO accounts
            (email, pword, firstName, middleName, lastName, phoneNum, userName, dob, gender, city, states, street, street2, zipcode, pfp)
            VALUES
            (:email, :pword, :firstName, :middleName, :lastName, :phoneNum, :userName, :dob, :gender, :city, :states, :street, :street2, :zipcode, :pfp)';
            $statement = $db->prepare($query);
            $statement->bindValue(':street2', $street2); 
            $statement->bindValue(':middleName', $middleName);
            $statement->bindValue(':pfp', $pfp); 
        }
        $statement->bindValue(':email', $email);
        $statement->bindValue(':pword', sha1($pword));
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':phoneNum', $phoneNum);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':gender', $gender);
        $statement->bindValue(':states', $states);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':street', $street);
        $statement->bindValue(':zipcode', $zipcode);
        $statement->bindValue(':dob', $dob);
        $statement->execute();
        $statement->closeCursor();
    
        // Display the login page
        include('login_form.php');
    }
}
?>