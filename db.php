<?php
require_once ('config.php');

function login($user, $password){
    global $conn;

    $sql = "SELECT * FROM users WHERE username=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Error";
        exit();
    }

    // execute query
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // check result
    if ($row = mysqli_fetch_assoc($result)) {
        return password_verify($password, $row["password"]);
    }
    return False;
}

function fetch_user_data($user){
    global $conn;

    $sql = "SELECT * FROM users WHERE username=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Error";
        exit();
    }

    // execute query
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // check result
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
    return False;
}

function fetch_data($id){
    global $conn;

    $sql = "SELECT * FROM data WHERE id=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Error";
        exit();
    }

    // execute query
    $id = intval($id);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $result = mysqli_fetch_assoc($result);

    $owner = $result['owner'];
    $name = $result['name'];
    $path = '/var/www/' . $owner . '/' . $name . '.txt';

    echo $path;

    return array("name" => $name, "content" => file_get_contents($path));
}

function fetch_files($username){
    global $conn;

    $sql = "SELECT * FROM data WHERE owner=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Error";
        exit();
    }

    // execute query
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return $result;
}

function check_access($id, $user){
    global $conn;

    $sql = "SELECT * FROM data WHERE id=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Error";
        exit();
    }

    // execute query
    $id = intval($id);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($result);

    return $row['owner'] === $user;
}

function update_filename($id, $user, $new_filename, $old_filename){
    global $conn;

    $sql = "UPDATE data SET name=? WHERE owner=? AND id=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Error";
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssi", $new_filename, $user, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_get_result($stmt);

    # move file to new location
    $old_path = '/var/www/' . $user . '/' . $old_filename . '.txt';
    $new_path = '/var/www/' . $user . '/' . $new_filename . '.txt';
    rename($old_path, $new_path);
}

function update_username($user, $new_username){
    global $conn;

    # check if user already exists
    if (fetch_user_data($new_username)){
        return false;
    }

    # update username
    $sql = "UPDATE users SET username=? WHERE username=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Error";
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $new_username, $user);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_get_result($stmt);

    # update files
    $sql = "UPDATE data SET owner=? WHERE owner=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Error";
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $new_username, $user);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_get_result($stmt);

    return true;
}