<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid vh-100 d-flex">
        <div class="row flex-fill">

            <div class="col-lg-7 d-flex flex-column  align-items-center bg-white text-center p-3 mt-5">
                <h1 class="my-5 fw-bolder">Camarines Norte State College<br>Customer Feedback System</h1>

                <div class="d-grid gap-3 my-4 py-5 w-50">
                    <a href="customerStudent/signupStudent.php">
                        <button class="btn btn-red mt-5 w-100" type="button">Student</button>
                    </a>
                    <a href="customerEmployee/signupEmployee.php">
                        <button class="btn btn-red w-100" type="button">Employee</button>
                    </a>
                    <a href="loginOther.php">
                        <button class="btn btn-red w-100" type="button">Others</button>
                    </a>
                    <a href="landingPage.php">
                        <button class="btn btn-outline-secondary w-100" type="button">Back</button>
                    </a>
                </div>
            </div>

            <div class="col-lg-5 d-flex justify-content-center align-items-center bg-red text-white p-3 logo-background">
                <div class="logo-placeholder">
                    <img src="img_cnsc_logo.png" alt="Logo" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
