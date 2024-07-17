<?php
session_start();
include("../connect.php");
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department = $_POST['department'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT officeHeadID FROM officeHead WHERE department = ? AND password = ?");
    $stmt->bind_param("ss", $department, $password);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['department'] = $department;
        header("location: dashboard.php");
    } else {
        $error = "Invalid department or password.";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Customer Feedback System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include '../templates/header.php'; ?>

    <div class="container my-5">
        <h2 class="text-center">OFFICE HEAD</h2>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8 col-lg-6">
                <div class="login-card card p-4">

                    <?php if ($error != ''): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select id="department" name="department" class="form-select" required>
                                <option value="" selected disabled>Choose...</option>
                                <option value="CAS">CAS</option>
                                <option value="CANR">CANR</option>
                                <option value="CBPA">CBPA</option>
                                <option value="CoED">CoED</option>
                                <option value="CoENG">CoENG</option>
                                <option value="ICS">ICS</option>
                                <option value="IFMS">IFMS</option>
                            </select>
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
                            <button class="btn btn-red" type="submit">Proceed</button>
                            <a href="../loginAdministrator.php">
                                <button class="btn btn-outline-secondary w-100" type="button">Back</button>
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
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

    </script>
</body>
</html>
