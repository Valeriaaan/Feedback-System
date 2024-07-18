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
                    <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <a href="customerFeedbacks.php" class="list-group-item list-group-item-action"><i class="fas fa-comment"></i> Feedbacks</a>
                    <a href="printReport.php" class="list-group-item list-group-item-action"><i class="fas fa-print"></i> Print Reports</a>
                    <a href="settings.php" class="list-group-item list-group-item-action active"><i class="fas fa-cog"></i> Settings</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <h2>Settings</h2>

                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs p-1" id="settingsTabs" role="tablist" >
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="department-tab" data-bs-toggle="tab" data-bs-target="#department" type="button" role="tab" aria-controls="department" aria-selected="true">Department</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="questions-tab" data-bs-toggle="tab" data-bs-target="#questions" type="button" role="tab" aria-controls="questions" aria-selected="false">Questions</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="notification-tab" data-bs-toggle="tab" data-bs-target="#notification" type="button" role="tab" aria-controls="notification" aria-selected="false">Notification</button>
                    </li>
                </ul>

                <!-- Tabs Content -->
                <div class="tab-content" id="settingsTabsContent">

                    <!-- Department Tab -->
                    <div class="tab-pane fade show active" id="department" role="tabpanel" aria-labelledby="department-tab">
                        <div class="row mt-4">
                            <!-- Add Department Card -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Add Department</h4>
                                        <div id="departmentsContainer">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="departmentInput" placeholder="Enter department name">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-red" id="addDepartmentBtn"><i class="fas fa-plus"></i> Add</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Added Departments Card -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Added Departments</h4>
                                        <ul class="list-group" id="addedDepartmentsList">
                                            <!-- Dynamically added departments will appear here -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Questions Tab -->
                    <div class="tab-pane fade" id="questions" role="tabpanel" aria-labelledby="questions-tab">
                        <div class="row mt-4">
                            <!-- Select Office Card -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Select Office to Edit Questions</h4>
                                        <div class="mb-3">
                                            <select class="form-select" id="officeSelect">
                                                <option selected>Select Office</option>
                                                <option value="admission">Admission Office</option>
                                                <option value="registrar">Registrar Office</option>
                                                <option value="guidance">Guidance Office</option>
                                                <option value="health">Health Service Office</option>
                                                <option value="library">Library</option>
                                                <option value="canteen">Canteen (Food Service)</option>
                                                <option value="studentPublication">Student Publication</option>
                                                <option value="scholarship">Scholarship Programs</option>
                                                <option value="studentOrg">Student Organization</option>
                                                <option value="sportCultural">Sport and Cultural Services</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Questions Card -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Questions</h4>
                                        <div id="questionsContainer">
                                            <!-- Dynamically loaded questions for the selected office will appear here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Tab -->
                    <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                        <!-- Notification settings content can be added here -->
                        <div class="row mt-4">
                            <!-- Feedback Notifications Card -->
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4>Feedback</h4>
                                            <p>These are notifications for feedback on Student/staff/faculty, service satisfaction.</p>
                                        </div>
                                        <div class="form-check form-switch custom-switch">
                                            <input class="form-check-input" type="checkbox" id="feedbackNotificationSwitch">
                                            <label class="form-check-label" for="feedbackNotificationSwitch"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reminders Notifications Card -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4>Reminders</h4>
                                            <p>These are notifications to remind for updates might be missed.</p>
                                        </div>
                                        <div class="form-check form-switch custom-switch">
                                            <input class="form-check-input" type="checkbox" id="reminderNotificationSwitch">
                                            <label class="form-check-label" for="reminderNotificationSwitch"></label>
                                        </div>
                                    </div>
                                </div>
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
    <script>
        // Handle office selection and loading questions
        document.getElementById('officeSelect').addEventListener('change', function() {
            const office = this.value;
            const questionsContainer = document.getElementById('questionsContainer');
            questionsContainer.innerHTML = ''; // Clear existing questions

            if (office) {
                // Mockup questions for each office
                const questions = {
                    admission: ['Question 1 for Admission', 'Question 2 for Admission'],
                    registrar: ['Question 1 for Registrar', 'Question 2 for Registrar'],
                    guidance: ['Question 1 for Guidance', 'Question 2 for Guidance'],
                    health: ['Question 1 for Health', 'Question 2 for Health'],
                    library: ['Question 1 for Library', 'Question 2 for Library'],
                    canteen: ['Question 1 for Canteen', 'Question 2 for Canteen'],
                    studentPublication: ['Question 1 for Student Publication', 'Question 2 for Student Publication'],
                    scholarship: ['Question 1 for Scholarship', 'Question 2 for Scholarship'],
                    studentOrg: ['Question 1 for Student Organization', 'Question 2 for Student Organization'],
                    sportCultural: ['Question 1 for Sport and Cultural Services', 'Question 2 for Sport and Cultural Services']
                };

                if (questions[office]) {
                    questions[office].forEach(q => {
                        const div = document.createElement('div');
                        div.className = 'input-group mb-2';

                        const input = document.createElement('input');
                        input.type = 'text';
                        input.className = 'form-control';
                        input.value = q;

                        const button = document.createElement('button');
                        button.className = 'btn btn-outline-secondary';
                        button.type = 'button';
                        button.innerHTML = '<i class="fas fa-edit"></i>';
                        button.addEventListener('click', function() {
                            // Handle edit functionality here
                            console.log('Edit button clicked for question:', q);
                        });

                        div.appendChild(input);
                        div.appendChild(button);
                        questionsContainer.appendChild(div);
                    });
                }
            }
        });
    </script>
</body>
</html>
