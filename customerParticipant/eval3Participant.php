<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Satisfaction Survey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include '../templates/header.php'; ?>

    <div class="container my-5">
        <h2 class="text-center">CLIENT SATISFACTION SURVEY (EXTENSION)</h2>
        <h3 class="text-center">Participant/Beneficiary</h3>

        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <div class="card p-4">

                    <div class="mb-4">
                        <h4 class="mb-4">3. Venue (Lugar   na pinagdausan)</h4>

                        <div class="likert-scale">
                            <div class="scale-1">
                                <input type="radio" id="q1-1" name="q1" value="1">
                                <label for="q1-1">&#8205;</label>
                            </div>
                            <div class="scale-2">
                                <input type="radio" id="q1-2" name="q1" value="2">
                                <label for="q1-2">&#8205;</label>
                            </div>
                            <div class="scale-3">
                                <input type="radio" id="q1-3" name="q1" value="3">
                                <label for="q1-3">&#8205;</label>
                            </div>
                            <div class="scale-4">
                                <input type="radio" id="q1-4" name="q1" value="4">
                                <label for="q1-4">&#8205;</label>
                            </div>
                            <div class="scale-5">
                                <input type="radio" id="q1-5" name="q1" value="5">
                                <label for="q1-5">&#8205;</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="mb-4">4. Food (Pagkaing inihanda   sa oras ng pagsasanay)</h4>
                        <div class="likert-scale">
                            <div class="scale-1">
                                <input type="radio" id="q2-1" name="q2" value="1">
                                <label for="q2-1">&#8205;</label>
                            </div>
                            <div class="scale-2">
                                <input type="radio" id="q2-2" name="q2" value="2">
                                <label for="q2-2">&#8205;</label>
                            </div>
                            <div class="scale-3">
                                <input type="radio" id="q2-3" name="q2" value="3">
                                <label for="q2-3">&#8205;</label>
                            </div>
                            <div class="scale-4">
                                <input type="radio" id="q2-4" name="q2" value="4">
                                <label for="q2-4">&#8205;</label>
                            </div>
                            <div class="scale-5">
                                <input type="radio" id="q2-5" name="q2" value="5">
                                <label for="q2-5">&#8205;</label>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="eval2Participant.php">
                <button class="btn btn-transparent"><i class="fas fa-arrow-left"></i> Back</button>
            </a>
            <a href="eval4Participant.php">
                <button class="btn btn-transparent">Next <i class="fas fa-arrow-right"></i></button>
            </a>
        </div>
    </div>

    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>