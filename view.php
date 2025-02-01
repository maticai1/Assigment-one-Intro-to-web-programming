<?php
include_once('crud.php'); 

$crud = new crud();


$query = "SELECT * FROM subscribers ORDER BY id DESC";
$result = $crud->getData($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Records</title>
    <meta name="robots" content="noindex, nofollow">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="text-center py-4 bg-light">
        <h1 class="fw-bold">List of Users</h1>
        <p class="lead">Here you can see all the submitted information</p>
    </header>

    <main class="container py-5">
    <?php if (is_array($result) && count($result) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Preferences</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['interests']."</td>"; 
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <?php else: ?>
        <p class="text-center">No records found.</p>
        <?php endif; ?>

        <div class="text-center mt-3">
            <a class="btn btn-primary" href="index.php">Go Back to Home</a>
        </div>
    </main>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
