<?php

include("config.php");


function checkConnection() {
    $connection = @mysqli_connect(SERVER_NAME,USER_NAME,PASSWORD,DATABASE_NAME);

    if (!$connection) {
    die ("Connection failed: " . mysqli_connect_error());
    } else {
        return $connection;
    echo "Connected successfully <br>";
    }
}

function insertUser($firstname ,$lastname,$email,$gender,$subscribe) {
    $connect = checkConnection();
    $insertQuery = "INSERT INTO `Info_table` (`First_name`,`Last_name`,`Email`,`Gender`,`Email_Subscription`) VALUES ('${firstname}','${lastname}','$email','$gender','$subscribe')";
    $res = @mysqli_query($connect , $insertQuery);
    if ($res !== TRUE) {
        echo mysqli_error($connect);
    }
}

function selectAllUsers(){
    echo "<div class='container'>";
    echo "<table class='table table-hover'>";
    echo "<tr class='text-center' style=' background-color: #4CAF50; color: white;'>
    <th>id</th> <th> First Name </th> <th>Last Name</th> <th>Email</th> <th>Gender</th> <th>Email subscription</th> <th>Delete</th> 
    </tr>";
    $selectQuery = "select * from `Info_table`";
    $connect = checkConnection();
    $res = mysqli_query($connect , $selectQuery);
        
    while($row = mysqli_fetch_assoc($res)) {
        $userId = $row['id'];
        echo "<tr class='text-center'>";
        echo "<td >" .  $row["id"] . "</td>";
        echo "<td>" .  $row["First_name"] . "</td>";
        echo "<td>" .  $row["Last_name"] . "</td>";
        echo "<td>" .  $row["Email"] . "</td>";
        echo "<td>" .  $row["Gender"] . "</td>";
        echo "<td>" .  $row["Email_Subscription"] . "</td>";
        echo "<td><a href='delete.php?id=".$userId."'> <button>Delete</button> </a></td>";
        echo "</tr>";
    }
    
}

function deleteUser($id) {
    $connect = checkConnection();
    $deleteQuery = " DELETE FROM `Info_table` WHERE `id`=$id";
    $res = mysqli_query($connect , $deleteQuery);
    header('location:index.php');
    selectAllUsers();
}

function updateUser($id) {
    $connect = checkConnection();
    $updateQuery = " UPDATE `Info_table` SET `First_name`= WHERE `id`=$id";
    $res = mysqli_query($connect , $updateQuery);
}
?>