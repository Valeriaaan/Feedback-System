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
        <h2 class="text-center">PARTICIPANT INFORMATION</h2>
        
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card p-4">

                    <div class="mb-3">
                        <label for="title" class="form-label">Extension Activity Title</label>
                        <input type="text" id="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="venue" class="form-label">Venue</label>
                        <input type="number" id="venue" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" id="date" class="form-control">
                    </div>

                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="instructionParticipant.php">
                <button class="btn btn-transparent"><i class="fas fa-arrow-left"></i> Back</button>
            </a>
            <a href="eval1Participant.php">
                <button class="btn btn-transparent">Next <i class="fas fa-arrow-right"></i></button>
            </a>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>
