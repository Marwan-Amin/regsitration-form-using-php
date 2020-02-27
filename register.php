<?php
include("database.php");
include("logFile.php");

$errors =[];
$firstname =$lastname = $email = $gender= $subscribe="";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        if (isset ($_POST["firstName"]) && !empty($_POST["firstName"])) {
            $firstname = $_POST["firstName"];
            if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
                array_push($errors,"error in first name format");
            }
        } else {
            array_push($errors,"First Name required");
        }

        if (isset ($_POST["lastName"]) && !empty($_POST["lastName"])) {
            $lastname = $_POST["lastName"];
            if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
                array_push($errors,"error in last name format");
            } 
        } else {
            array_push($errors,"Last Name required");        
        }

        if (isset ($_POST["email"]) && !empty($_POST["email"])) {
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors,"error in Email format");
            }
        } else {
            array_push($errors,"Email required");        
        }
        
        if (isset ($_POST["gender"]) && !empty($_POST["gender"])) {
            $gender = $_POST["gender"];
        } else {
            array_push($errors,"Gender required");
            exit;
        }

        if (isset ($_POST["checkbox"]) && !empty($_POST["checkbox"])) {
            $subscribe = "Yes";
        } else {
            $subscribe = "No";        
        }
}

if (count($errors) === 0){
    insertUser($firstname ,$lastname,$email,$gender,$subscribe);
    insertIntofile($firstname ,$lastname,$email,$gender,$subscribe);
    
} else {
    exit;
}

?>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container text-center my-5">
        <h1> Thank you <?php echo $firstname." ".$lastname; ?></h1>
        <a href="form.php" class="btn btn-dark" >Go to registration</a>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>