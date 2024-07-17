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
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2">
                <h4 class="text-center my-2">ADMIN</h4>
                <div class="list-group">
                    <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <a href="printReport.php" class="list-group-item list-group-item-action active"><i class="fas fa-print"></i> Print Reports</a>
                    <a href="settings.php" class="list-group-item list-group-item-action"><i class="fas fa-cog"></i> Settings</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <h2>Print Reports</h2>
                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs p-1" id="reportTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="overall-tab" data-bs-toggle="tab" data-bs-target="#overall" type="button" role="tab" aria-controls="overall" aria-selected="true">Print Overall</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="specific-tab" data-bs-toggle="tab" data-bs-target="#specific" type="button" role="tab" aria-controls="specific" aria-selected="false">Print Specific Department</button>
                    </li>
                </ul>

                <!-- Tabs Content -->
                <div class="tab-content" id="reportTabsContent">
                    <!-- Print Overall Tab -->
                    <div class="tab-pane fade show active" id="overall" role="tabpanel" aria-labelledby="overall-tab">
                        <div class="card mt-4">
                            <div class="card-body">
                                <h4>Print Overall Result</h4>
                                <button type="button" class="btn btn-red" id="printOverallBtn"><i class="fas fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>

                    <!-- Print Specific Department Tab -->
                    <div class="tab-pane fade" id="specific" role="tabpanel" aria-labelledby="specific-tab">
                        <div class="card mt-4">
                            <div class="card-body">
                                <h4>Report Details</h4>
                                <form>
                                    <div class="mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <select class="form-select" id="department">
                                            <option selected>Select Department</option>
                                            <option value="IFMS">Institute of Fisheries and Marine Science (IFMS)</option>
                                            <option value="COED">College of Education (COED)</option>
                                            <option value="CCMS">College of Computing and Multimedia Studies (CCMS)</option>
                                            <option value="CAS">College of Arts and Sciences (CAS)</option>
                                            <option value="CBPA">College Of Business and Public Administration (CBPA)</option>
                                            <option value="COTT">College of Trade and Technology (COTT)</option>
                                            <option value="EZ">Entienza Campus (EZ)</option>
                                            <option value="CANR">College of Agriculture and Natural Resources (CANR)</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="specificDateStart" class="form-label">Date to print from</label>
                                        <input type="number" class="form-control" id="specificDateStart" placeholder="2020">
                                    </div>

                                    <div class="mb-3">
                                        <label for="specificDateEnd" class="form-label">Date to print to</label>
                                        <input type="number" class="form-control" id="specificDateEnd" placeholder="2023">
                                    </div>

                                    <button type="button" class="btn btn-red" id="printSpecificBtn"><i class="fas fa-print"></i> Print</button>
                                </form>
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
        document.getElementById('printOverallBtn').addEventListener('click', function() {
            Swal.fire({
                icon: 'success',
                title: 'Printed Successfully',
                text: 'The overall report has been printed successfully!'
            });
        });

        document.getElementById('printSpecificBtn').addEventListener('click', function() {
            Swal.fire({
                icon: 'success',
                title: 'Printed Successfully',
                text: 'The specific department report has been printed successfully!'
            });
        });
    </script>
</body>
</html>
