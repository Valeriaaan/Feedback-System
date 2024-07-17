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

        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <h5 class="mb-4">Instructions:</h5>
                <div class="card p-4">
                    <p class="text-justify">
                        We value your feedback! Please share your experience with School Student Services by rating us on a scale of 5 (Very Satisfied) to 
                        1 (Very Dissatisfied). Your honest feedback will help us improve our services to better meet your needs.
                    </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <h4>Rating Scheme</h4>
                <ul class="list-unstyled ms-5 mt-3 d-grid gap-2 ">
                    <li>5 <span class="badge bg-success">  </span> Very Satisfied</li>
                    <li>4 <span class="badge bg-yellow-green">  </span> Satisfied</li>
                    <li>3 <span class="badge bg-yellow">  </span> Neutral</li>
                    <li>2 <span class="badge bg-orange">  </span> Dissatisfied</li>
                    <li>1 <span class="badge bg-danger">   </span> Very Dissatisfied</li>
                </ul>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="selectOffice.php">
                <button class="btn btn-transparent">Next <i class="fas fa-arrow-right"></i></button>
            </a>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>
