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
        <h2 class="text-center">CLIENT SATISFACTION SURVEY (EXTENSION)</h2>
        <h3 class="text-center">Cooperating Agency</h3>

        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <div class="card p-4">
                    <p class="text-justify">In line with our commitment to understand your requirements and seek to satisfy your needs consistently, we would like to know the level of your satisfaction on the services we have provided. Your response will be a vital input in the review and continual improvement of our services and of our Quality Management System. We sincerely appreciate your cooperation. Thank You!</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <h4>Rating Scheme</h4>
                <ul class="list-unstyled ms-5 mt-3 d-grid gap-2 ">
                    <li>5 <span class="badge bg-success">  </span> Outstanding</li>
                    <li>4 <span class="badge bg-yellow-green">  </span> Exceed expectation</li>
                    <li>3 <span class="badge bg-yellow">  </span> Meets Expectations</li>
                    <li>2 <span class="badge bg-orange">  </span> Failed to meet expectation</li>
                    <li>1 <span class="badge bg-danger">   </span> Needs Improvement</li>
                </ul>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="../loginOther.php">
                <button class="btn btn-transparent"><i class="fas fa-arrow-left"></i> Back</button>
            </a>
            <a href="infoAgency.php">
                <button class="btn btn-transparent">Next <i class="fas fa-arrow-right"></i></button>
            </a>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>
