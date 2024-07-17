<?php
session_start();
include("../connect.php");

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeID = $_POST['employeeid'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate inputs
    if (empty($employeeID) || empty($department) || empty($password) || empty($confirmPassword)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        // Check if employeeID already exists
        $check_stmt = $conn->prepare("SELECT employeeID FROM employee WHERE employeeID = ?");
        $check_stmt->bind_param("s", $employeeID);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            $error = "Employee ID already exists. Please choose a different one.";
        } else {
            // Insert new employee
            $insert_stmt = $conn->prepare("INSERT INTO employee (employeeID, department, password) VALUES (?, ?, ?)");
            $insert_stmt->bind_param("sss", $employeeID, $department, $password);

            if ($insert_stmt->execute()) {
                // Return success message in JSON format
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Error in registering. Please try again later.']);
            }

            $insert_stmt->close();
        }

        $check_stmt->close();
    }

    $conn->close();
    exit();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include '../templates/header.php'; ?>

    <div class="container my-5">
        <h2 class="text-center">SIGN-UP</h2>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card p-4">

                    <?php if ($error != ''): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                    <?php endif; ?>

                    <form id="signupForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="mb-3">
                            <label for="employeeid" class="form-label">Employee ID</label>
                            <input type="text" id="employeeid" name="employeeid" class="form-control" required>
                        </div>

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

                        <div class="mb-3 position-relative">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required>
                                <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer;">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button id="signupBtn" class="btn btn-red" type="button">Sign-Up</button>
                            <a href="../loginCustomer.php">
                                <button class="btn btn-outline-secondary w-100" type="button">Back</button>
                            </a>
                        </div>

                        <div class="text-center mt-3">
                            <p>Already an employee? <a href="loginEmployee.php">Login Here!</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPassword = document.querySelector('#confirmPassword');
        const signupBtn = document.getElementById('signupBtn');
        const signupForm = document.getElementById('signupForm');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        toggleConfirmPassword.addEventListener('click', function (e) {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        signupBtn.addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to sign up with the provided information?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#661A02',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = new FormData(signupForm);

                    fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Signed Up!',
                                'Your account has been created successfully.',
                                'success'
                            ).then(() => {
                                window.location.href = 'loginEmployee.php';
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                data.error,
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            'There was an error signing up. Please try again later.',
                            'error'
                        );
                    });
                }
            });
        });
    </script>
</body>

</html>
