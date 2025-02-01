<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Interests</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <main class="container py-5">
        <h2 class="text-center">Enter Your Interests</h2>
        <form method="POST" action="insert.php" class="col-md-6 mx-auto">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="interests" class="form-label">What are your interests?</label>
                <select id="interests" name="interests[]" class="form-select" multiple required>
                    <option value="music">Music</option>
                    <option value="movies">Movies</option>
                    <option value="sports">Sports</option>
                    <option value="technology">Technology</option>
                    <option value="books">Books</option>
                    <option value="travel">Travel</option>
                    <option value="food">Food</option>
                </select>
                <small class="text-muted">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple options.</small>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <?php
        include_once ('crud.php');
        include_once ('validate.php');

        $crud = new Crud();
        $validate = new Validate();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
            $name = $crud->sanitize($_POST['name']);
            $email = $crud->sanitize($_POST['email']);
            $interests = isset($_POST['interests']) ? implode(", ", $_POST['interests']) : '';

            $msg = $validate->checkEmpty($_POST, ['name', 'email']);
            $checkEmail = $validate->checkEmail($email);

            if ($msg != null) {
                echo "<p class='text-danger'>$msg</p>";
                echo "<a href='javascript:self.history.back();' class='btn btn-warning'>Go Back</a>";
                return;
            } elseif (!$checkEmail) {
                echo "<p class='text-danger'>Email is invalid</p>";
                return;
            }

            $result = $crud->execute("INSERT INTO subscribers (name, email, interests) VALUES ('$name', '$email', '$interests')");

            if ($result) {
                echo "<p class='text-success'>Interests saved successfully!</p>";
                echo "<a href='index.php' class='btn btn-success'>Go Back to Home</a> ";
                echo "<a href='view.php' class='btn btn-info'>View All Entries</a>";
            } else {
                echo "<p class='text-danger'>There was an error saving your interests.</p>";
                echo "<a href='javascript:self.history.back();' class='btn btn-warning'>Go Back</a>";
            }
        }
        ?>
    </main>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
