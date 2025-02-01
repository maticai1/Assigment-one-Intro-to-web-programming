<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preferences Form</title>
    <meta name="description" content="Fill out this form to share your personal preferences and tastes">
    <meta name="robots" content="noindex, nofollow">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header class="text-center py-4 bg-light">
        <h1 class="fw-bold">Preferences Form</h1>
        <p class="lead">Share your tastes and preferences with us</p>
    </header>
    
    <main class="container py-5 text-center">
        <h3 class="text-success">Your information has been received!</h3>
        <p>You will receive news and updates regarding this.</p>
        <a class="btn btn-primary mt-3" href="index.php">Go Back to Home</a>
        <?php 
        // Start by including our classes
        include_once ('crud.php');
        include_once ('validate.php');

        $crud = new crud();
        $valid = new validate();

        if(isset($_POST['Submit'])){
            //  escape string function
            $name = $crud->escape_string($_POST['name']);
            $age = $crud->escape_string($_POST['age']);
            $email = $crud->escape_string($_POST['email']);

            // validation functions
            $msg = $valid->checkEmpty($_POST, array('name', 'age', 'email'));
            $checkAge = $valid->validAge($_POST['age']);
            $checkEmail = $valid->validEmail($_POST['email']);

            if($msg != null){
                echo "<p class='text-danger'>$msg</p>";
                echo "<a class='btn btn-secondary' href='javascript:self.history.back();'>Go Back</a>";
            } elseif(!$checkAge){
                echo "<p class='text-danger'>Please provide a valid age</p>";
                echo "<a class='btn btn-secondary' href='javascript:self.history.back();'>Go Back</a>";
            } elseif(!$checkEmail){
                echo "<p class='text-danger'>Please provide a valid email</p>";
                echo "<a class='btn btn-secondary' href='javascript:self.history.back();'>Go Back</a>";
            } else {
                // If all fields are valid
                $result = $crud->execute("INSERT INTO phpusers(name, age, email) VALUES('$name', '$age', '$email')");

                // Success message
                echo "<h3 class='text-success'>Your data has been saved!</h3>";
                echo "<p>You will receive news and updates soon.</p>";
                echo "<a class='btn btn-primary' href='index.php'>Go Back to Home</a>";
            }
        }
        ?>
    </main>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
