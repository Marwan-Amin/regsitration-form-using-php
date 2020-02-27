<?php
include("config.php");
?>

<html>
<head>
<title>Registration form</title>
</head>     
<body>
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h1>Enter your information</h1>
        </div>

        <div class="card-body">
            <form method = "post" action="register.php">
            <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control" name ="firstName">
            </div>
            <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control" name ="lastName">
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" name ="email">
            </div>
            <div class="form-group">
                <label>Select your gender:</label> <br>
                <input type="radio" class="exampleRadios" name ="gender" value="female" id="female">
                <label class="form-check-label" for="female">
                    Female    
                </label>
                <input type="radio" class="exampleRadios" name ="gender" value="male" id="male">
                <label class="form-check-label" for="male">
                    Male    
                </label>
            </div>
            <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" name="checkbox">
            <label class="form-check-label">
                Subscribe to our emails  
                </label>
                </div>
                </div>

                <input class="btn btn-primary"  type = "submit" name = "submit" value = "submit">
            </form>
        </div>
    </div>
</div>

</body>
</html>