<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Satisfaction Survey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include '../templates/header.php'; ?>

    <div class="container my-5">
        <h2 class="text-center">CLIENT SATISFACTION SURVEY (EXTENSION)</h2>
        <h3 class="text-center">Cooperating Agency</h3>
        <p class="text-center">Please indicate below your other concerns or suggestions on how we can further improve our services.</p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <div class="card">
                    <div class="p-1">
                        <textarea class="form-control h-100" id="feedback" rows="8" placeholder="Enter your feedback here..."></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="evalAgency.php">
                <button class="btn btn-transparent"><i class="fas fa-arrow-left"></i> Back</button>
            </a>
            <a href="#">
                <button class="btn btn-transparent" id="finishBtn">Finish <i class="fas fa-arrow-right"></i></button>
            </a>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('finishBtn').addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to finish the survey?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#661A02',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'

            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Finished!',
                        'Your survey has been submitted. Thank you for your Feedback.',
                        'success'
                    ).then(() => {
                        window.location.href = '../loginOther.php';
                    });
                }
            });
        });
    </script>
</body>
</html>
