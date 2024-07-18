<?php
session_start();
include("../connect.php");

$query = "SELECT evaluationID, officeName, evaluatorID, q1, q2, q3, q4, q5, feedback FROM evaluation";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Responses - Evaluation</title>
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
                    <a href="customerFeedbacks.php" class="list-group-item list-group-item-action active"><i class="fas fa-comment"></i> Feedbacks</a>
                    <a href="printReport.php" class="list-group-item list-group-item-action"><i class="fas fa-print"></i> Print Reports</a>
                    <a href="settings.php" class="list-group-item list-group-item-action"><i class="fas fa-cog"></i> Settings</a>
                    <a href="#" id="logoutLink" class="list-group-item list-group-item-action"><i class="fas fa-sign-out"></i> Logout</a>
                </div>
            </div>
    
            <main class="col-md-10">
                    <h2>Customer Feedbacks</h2>

                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs justify-content-end p-1" id="settingsTabs" role="tablist" >
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="semesterDropdown" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Select Office</a>
                            <ul class="dropdown-menu" aria-labelledby="semesterDropdown">
                                <li><a class="dropdown-item semester-select" href="#" data-value="First Semester">Admission Office</a></li>
                                <li><a class="dropdown-item semester-select" href="#" data-value="Second Semester">Registrar Office</a></li>
                            </ul>
                        </li>
                    </ul>
    
                <div class="table-responsive my-4">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Office Name</th>
                                <th scope="col">Evaluator ID</th>
                                <th scope="col">Question 1</th>
                                <th scope="col">Question 2</th>
                                <th scope="col">Question 3</th>
                                <th scope="col">Question 4</th>
                                <th scope="col">Question 5</th>
                                <th scope="col">Feedback</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Output each row of data
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                    <tr>
                                        <td>' . $row['evaluationID'] . '</td>
                                        <td>' . $row['officeName'] . '</td>
                                        <td>' . $row['evaluatorID'] . '</td>
                                        <td>' . $row['q1'] . '</td>
                                        <td>' . $row['q2'] . '</td>
                                        <td>' . $row['q3'] . '</td>
                                        <td>' . $row['q4'] . '</td>
                                        <td>' . $row['q5'] . '</td>
                                        <td>' . $row['feedback'] . '</td>
                                    </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    
    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
} else {
    echo "No evaluations found.";
}

$conn->close();
?>
