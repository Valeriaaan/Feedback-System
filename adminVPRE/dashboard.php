<?php
session_start();
include("../connect.php");

$query = "SELECT COUNT(*) as total_feedbacks FROM evaluation";
$result = $conn->query($query);

$total_feedbacks = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_feedbacks = $row['total_feedbacks'];
}

function countOccurrences($conn, $numbers) {
    $columns = ['q1', 'q2', 'q3', 'q4', 'q5'];
    $counts = [];

    foreach ($numbers as $number) {
        $count = 0;
        foreach ($columns as $column) {
            $query = "SELECT COUNT(*) as count FROM evaluation WHERE $column = $number";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $count += $row['count'];
            }
        }
        $counts[$number] = $count;
    }

    return $counts;
}

function countEvaluatorID($conn, $table, $column) {
    $query = "SELECT COUNT(*) as count FROM evaluation WHERE evaluatorID IN (SELECT $column FROM $table)";
    $result = $conn->query($query);
    $count = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
    }
    return $count;
}

$others_count = 0;
$employee_count = countEvaluatorID($conn, 'employee', 'employeeID');
$student_count = countEvaluatorID($conn, 'student', 'studentID');

$countsNo1 = countOccurrences($conn, [1]);
$countsNo2 = countOccurrences($conn, [2]);
$countsNo3 = countOccurrences($conn, [3]);
$countsNo4 = countOccurrences($conn, [4]);
$countsNo5 = countOccurrences($conn, [5]);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - CNSC Customer Feedback System</title>
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
                    <a href="dashboard.php" class="list-group-item list-group-item-action active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <a href="customerFeedbacks.php" class="list-group-item list-group-item-action"><i class="fas fa-comment"></i> Feedbacks</a>
                    <a href="printReport.php" class="list-group-item list-group-item-action"><i class="fas fa-print"></i> Print Reports</a>
                    <a href="settings.php" class="list-group-item list-group-item-action"><i class="fas fa-cog"></i> Settings</a>
                    <a href="#" id="logoutLink" class="list-group-item list-group-item-action"><i class="fas fa-sign-out"></i> Logout</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <h2>Dashboard</h2>

                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs justify-content-end p-1" id="settingsTabs" role="tablist">
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
                </ul>

                <h4 class="my-4">Overview of Results</h4>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>Insights</h4>
                                <div id="wordCloudContainer" style="height: 400px;"></div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>Quantitative Result</h4>
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h1 class=""><?php echo $total_feedbacks; ?></h1>
                                <h5>Total Feedback</h5>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>Customers</h4>
                                <canvas class="my-4"id="pieChart"></canvas>

                                <a href="satisfactionStudent.php">
                                    <button class="btn btn-transparent position-absolute bottom-0 end-0 m-2" id="resultBtn">View Detailed Result <i class="fas fa-arrow-right"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wordcloud2.js/1.0.1/wordcloud2.min.js" integrity="sha512-V9GoXkVO7MfITOYkagdEaqowj4FJtxO7SLhX38OHNBCDnQOGeNiFVveH/hGXWvWVEp7UhAXIa3mDsn6APywNvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        function updateDropdownText(selector, dropdownId) {
            const items = document.querySelectorAll(selector);
            items.forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    document.getElementById(dropdownId).textContent = this.getAttribute('data-value');
                });
            });
        }

        updateDropdownText('.office-select', 'officeDropdown');
        updateDropdownText('.semester-select', 'semesterDropdown');
        updateDropdownText('.year-select', 'yearDropdown');

        // Word cloud
        fetch('getWordCloudData.php')
            .then(response => response.json())
            .then(wordList => {
                WordCloud(document.getElementById('wordCloudContainer'), { list: wordList, width: 400, height: 400 });
            })
            .catch(error => console.error('Error fetching word cloud data:', error));

        // Bar Chart
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Feedback'], 
                datasets: [
                    {
                        label: 'Very Dissatisfied',
                        data: [<?php foreach ($countsNo1 as $number => $count): ?> <?php echo $count; ?> <?php endforeach; ?>],
                        backgroundColor: 'rgba(220, 53, 69, 0.2)', 
                        borderColor: 'rgba(220, 53, 69, 1)', 
                        borderWidth: 1
                    },
                    {
                        label: 'Dissatisfied',
                        data: [<?php foreach ($countsNo2 as $number => $count): ?> <?php echo $count; ?> <?php endforeach; ?>],
                        backgroundColor: 'rgba(255, 159, 64, 0.2)', 
                        borderColor: 'rgba(255, 159, 64, 1)', 
                        borderWidth: 1
                    },
                    {
                        label: 'Neutral',
                        data: [<?php foreach ($countsNo3 as $number => $count): ?> <?php echo $count; ?> <?php endforeach; ?>],
                        backgroundColor: 'rgba(255, 205, 86, 0.2)', 
                        borderColor: 'rgba(255, 205, 86, 1)', 
                        borderWidth: 1
                    },
                    {
                        label: 'Satisfied',
                        data: [<?php foreach ($countsNo4 as $number => $count): ?> <?php echo $count; ?> <?php endforeach; ?>],
                        backgroundColor: 'rgba(142, 196, 65, 0.2)', // Exceed expectation - yellow-green
                        borderColor: 'rgba(142, 196, 65, 1)', // Exceed expectation - yellow-green
                        borderWidth: 1
                    },
                    {
                        label: 'Very Satisfied',
                        data: [<?php foreach ($countsNo5 as $number => $count): ?> <?php echo $count; ?> <?php endforeach; ?>],
                        backgroundColor: 'rgba(40, 167, 69, 0.2)', // Outstanding - green
                        borderColor: 'rgba(40, 167, 69, 1)', // Outstanding - green
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                }
            }
        });

        // Pie Chart
        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Student', 'Employee', 'Other'],
                datasets: [{
                    label: 'Colors',
                    data: [<?php echo $student_count; ?>, <?php echo $employee_count; ?>, <?php echo $others_count; ?>,],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            }
        });

        // Logout Confirmation
        document.getElementById('logoutLink').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure you want to logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, logout',
                confirmButtonColor: '#661A02',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../landingPage.php';
                }
            });
        });
    </script>
</body>
</html>
