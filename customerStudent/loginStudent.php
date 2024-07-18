<?php
session_start();
include("../connect.php");

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT studentID, department, password FROM student WHERE studentID = ?");
    $stmt->bind_param("s", $studentID);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($studentID, $department, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['ID'] = $studentID;
            $_SESSION['department'] = $department;
            
            header("Location: ../evaluationAdmissionOffice/instruction.php"); 
            exit();
        } else {
            $error = "Invalid student ID or password.";
        }
    } else {
        $error = "Invalid student ID or password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include '../templates/header.php'; ?>

    <div class="container my-5">
        <h2 class="text-center">LOGIN</h2>
        
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card p-4">

                    <?php if ($error != ''): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="mb-3">
                            <label for="username" class="form-label">Student ID</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control" required>
                                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-red w-100" type="submit">Login</button>
                            <a href="signupStudent.php">
                                <button class="btn btn-outline-secondary w-100 mt-2" type="button">Back to Sign-Up</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye / eye slash icon
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
