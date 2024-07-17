<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Reports - CNSC Customer Feedback System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include '../templates/header.php'; ?>

    <div class="container-fluid my-4">
        <div class="row d-flex justify-content-center">

            <div class="col-md-11">
                <h2>Print Reports</h2>

                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs justify-content-between p-1" id="settingsTabs" role="tablist">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php"><i class="fas fa-arrow-left"></i> back</a>
                    </li>

                    <div class="d-flex">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="officeDropdown" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Office</a>
                            <ul class="dropdown-menu" aria-labelledby="officeDropdown">
                                <li><a class="dropdown-item office-select" href="#" data-value="Admission Office">Admission Office</a></li>
                                <li><a class="dropdown-item office-select" href="#" data-value="Guidance Office">Guidance Office</a></li>
                                <li><a class="dropdown-item office-select" href="#" data-value="Registrar Office">Registrar Office</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="semesterDropdown" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Semester</a>
                            <ul class="dropdown-menu" aria-labelledby="semesterDropdown">
                                <li><a class="dropdown-item semester-select" href="#" data-value="First Semester">First Semester</a></li>
                                <li><a class="dropdown-item semester-select" href="#" data-value="Second Semester">Second Semester</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="yearDropdown" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Academic Year</a>
                            <ul class="dropdown-menu" aria-labelledby="yearDropdown">
                                <li><a class="dropdown-item year-select" href="#" data-value="2021-2022">2021-2022</a></li>
                                <li><a class="dropdown-item year-select" href="#" data-value="2022-2023">2022-2023</a></li>
                                <li><a class="dropdown-item year-select" href="#" data-value="2023-2024">2023-2024</a></li>
                            </ul>
                        </li>
                    </div>
                </ul>

                <div class="d-flex justify-content-center text-center">
                    <div class="col-md-4">
                        <div class="card mt-4 p-3">
                            <div class="card-body ">
                                <h2 class="my-3">Print Overall Result</h2>
                                <button type="button" class="btn btn-red w-100" id="printOverallBtn"><i class="fas fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('printOverallBtn').addEventListener('click', function() {
                Swal.fire(
                    'Printed Successfully',
                    'The overall report has been printed successfully!',
                    'success'
                ).then(() => {
                    window.location.href = 'dashboard.php';
                });
            });
        });
    </script>
</body>
</html>
