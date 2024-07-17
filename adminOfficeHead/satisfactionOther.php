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
                <div class="list-group">
                    <a href="satisfactionStudent.php" class="list-group-item list-group-item-action"><i class="fas fa-graduation-cap me-2"></i> Student</a>
                    <a href="satisfactionEmployee.php" class="list-group-item list-group-item-action"><i class="fas fa-user-tie me-2"></i> Employee</a>
                    <a href="satisfactionOther.php" class="list-group-item list-group-item-action active"><i class="fas fa-users me-2"></i> Other Customer</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="dashboard.php"class="btn btn-transparent mt-3"><i class="fas fa-arrow-left me-2"></i> Back</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <h2>Other Customers Satisfaction</h2>

                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs justify-content-end p-1" id="settingsTabs" role="tablist">
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

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>Insights</h4>
                                <div id="wordCloudContainer" style="height: 400px;"></div>
                            </div>
                        </div>

                        <div class="card mb-4" >
                            <div class="card-body">
                                <h4>Quantitative Result</h4>
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h1 class="">201, 435</h3>
                                <h5>Total Feedback</h5>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>Distribution Response</h4>
                                <canvas class="my-4"id="pieChart"></canvas>
                            </div>
                            
                            <a href="detailedSatisfactionOther.php">
                                <button class="btn btn-transparent position-absolute bottom-0 end-0 m-2" id="resultBtn">View Detailed Result <i class="fas fa-arrow-right"></i></button>
                            </a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wordcloud2.js/1.0.1/wordcloud2.min.js" integrity="sha512-V9GoXkVO7MfITOYkagdEaqowj4FJtxO7SLhX38OHNBCDnQOGeNiFVveH/hGXWvWVEp7UhAXIa3mDsn6APywNvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Function to handle dropdown selection and update displayed text
        function updateDropdownText(selector, dropdownId) {
            const items = document.querySelectorAll(selector);
            items.forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    document.getElementById(dropdownId).textContent = this.getAttribute('data-value');
                });
            });
        }

        // Update dropdown text when an item is selected
        updateDropdownText('.office-select', 'officeDropdown');
        updateDropdownText('.semester-select', 'semesterDropdown');
        updateDropdownText('.year-select', 'yearDropdown');

        // Bar Chart
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Feedback'], 
                datasets: [
                    {
                        label: 'Very Dissatisfied',
                        data: [120],
                        backgroundColor: 'rgba(220, 53, 69, 0.2)', // Needs Improvement - red
                        borderColor: 'rgba(220, 53, 69, 1)', // Needs Improvement - red
                        borderWidth: 1
                    },
                    {
                        label: 'Dissatisfied',
                        data: [190],
                        backgroundColor: 'rgba(255, 159, 64, 0.2)', // Failed to meet expectation - orange
                        borderColor: 'rgba(255, 159, 64, 1)', // Failed to meet expectation - orange
                        borderWidth: 1
                    },
                    {
                        label: 'Neutral',
                        data: [230],
                        backgroundColor: 'rgba(255, 205, 86, 0.2)', // Meets Expectations - yellow
                        borderColor: 'rgba(255, 205, 86, 1)', // Meets Expectations - yellow
                        borderWidth: 1
                    },
                    {
                        label: 'Satisfied',
                        data: [205],
                        backgroundColor: 'rgba(142, 196, 65, 0.2)', // Exceed expectation - yellow-green
                        borderColor: 'rgba(142, 196, 65, 1)', // Exceed expectation - yellow-green
                        borderWidth: 1
                    },
                    {
                        label: 'Very Satisfied',
                        data: [190],
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
                labels: ['Agency', 'Participant', 'Research'],
                datasets: [{
                    label: 'Colors',
                    data: [120, 190, 300,],
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

        // Word Cloud
        var wordList = [
            ['Feedback', "22"],
            ['Customer', "25"],
            ['Service', "19"],
            ['Satisfaction', "17"],
            ['Support', "17"],
            ['Quality', "24"],
            ['Efficiency', "33"],
            ['Experience', "28"],
            ['Response', "12"],
            ['Communication', "19"],
            ['Good', "24"],
            ['Great', "26"],
            ['Better', "30"],
            ['Poor', "13"],
            ['Excellent', "16"],
            ['Best', "16"]
        ];
        WordCloud(document.getElementById('wordCloudContainer'), { list: wordList, width: 200, height: 200 });
    </script>
</body>
</html>
