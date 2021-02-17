<?php 

## This function will generate a randomized password

// function passwordGenerator($length) 
// {
//     ## Create the data containing the alphabet
//     $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';

//     ## Call upon a string shuffle, shuffle the letters in $data, give the password a limit to zero so it won't create a big password
//     ## $length will call upon how many characters you want in your password.
//     return substr(str_shuffle($data), 0, $length);
// };



function createUser($user_data)
{
    ## 1. Run the proper SQL query to insert user
    $pdo = Database::getInstance()->getConnection(); 

    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email)';
    $create_user_query .= 'VALUES(:fname, :username, :password, :email)';

    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array(
            ':fname'=>$user_data['fname'],
            ':username'=>$user_data['username'],
            ':password'=>$user_data['password'],
            ':email'=>$user_data['email'],
        )
    );

    ## 2. Redirect to index.php if create user successfully, (maybe with some message??)
    # otherwise, showing the error message

    // return $create_user_query;

    ## I will be using a mail function with a word wrap to send the email to whatever was inputed into $user_data['email']

    if($create_user_result) {
       ##Create the message that contains the info
        $msg = "Welcome! ".':fname'."Your username and password is".':username'.':password'.':email';

        $msg = wordwrap($msg, 100);

        ## send the email to the user data email
        mail($user_data['email'],"Login Information",$msg);

        redirect_to('index.php');
    }else{
        return 'The user did not go through!!';
    }

}

?>
