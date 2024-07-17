<?php
session_start();
include("../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['q3']) && isset($_POST['q4']) && isset($_POST['q5'])) {
        $_SESSION['eval1_q3'] = $_POST['q3'];
        $_SESSION['eval1_q4'] = $_POST['q4'];
        $_SESSION['eval1_q5'] = $_POST['q5'];
        
        header("Location: evalFeedback.php");
        exit();
    } else {
        $error = "Please answer all questions before proceeding.";
    }
}
?>

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

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="container my-5">
            <h2 class="text-center">ADMISSION OFFICE</h2>

            <div class="row justify-content-center mt-4">
                <div class="col-md-10">
                    <div class="card p-4">

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <div class="mb-4">
                            <p>3. Ang mga kawani ng tanggapan ay madaling lapitan, nagpapaliwanag nang maayos, matulungin at may kaaya-ayang pag-uugali.</p>
                            <div class="likert-scale">
                                <div class="scale-1">
                                    <input type="radio" id="q3-1" name="q3" value="1">
                                    <label for="q3-1">&#8205;</label>
                                </div>
                                <div class="scale-2">
                                    <input type="radio" id="q3-2" name="q3" value="2">
                                    <label for="q3-2">&#8205;</label>
                                </div>
                                <div class="scale-3">
                                    <input type="radio" id="q3-3" name="q3" value="3">
                                    <label for="q3-3">&#8205;</label>
                                </div>
                                <div class="scale-4">
                                    <input type="radio" id="q3-4" name="q3" value="4">
                                    <label for="q3-4">&#8205;</label>
                                </div>
                                <div class="scale-5">
                                    <input type="radio" id="q3-5" name="q3" value="5">
                                    <label for="q3-5">&#8205;</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <p>4. Ang pagpapaskil ng mga nakapasa sa CNSC AT (CNSC Admission Test) ay naaayon sa talatakdaan.</p>
                            <div class="likert-scale">
                                <div class="scale-1">
                                    <input type="radio" id="q4-1" name="q4" value="1">
                                    <label for="q4-1">&#8205;</label>
                                </div>
                                <div class="scale-2">
                                    <input type="radio" id="q4-2" name="q4" value="2">
                                    <label for="q4-2">&#8205;</label>
                                </div>
                                <div class="scale-3">
                                    <input type="radio" id="q4-3" name="q4" value="3">
                                    <label for="q4-3">&#8205;</label>
                                </div>
                                <div class="scale-4">
                                    <input type="radio" id="q4-4" name="q4" value="4">
                                    <label for="q4-4">&#8205;</label>
                                </div>
                                <div class="scale-5">
                                    <input type="radio" id="q4-5" name="q4" value="5">
                                    <label for="q4-5">&#8205;</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p>5. Ang resulta ng CNSC AT ay   maaaring malaman kung kinakailangan.</p>
                            <div class="likert-scale">
                                <div class="scale-1">
                                    <input type="radio" id="q5-1" name="q5" value="1">
                                    <label for="q5-1">&#8205;</label>
                                </div>
                                <div class="scale-2">
                                    <input type="radio" id="q5-2" name="q5" value="2">
                                    <label for="q5-2">&#8205;</label>
                                </div>
                                <div class="scale-3">
                                    <input type="radio" id="q5-3" name="q5" value="3">
                                    <label for="q5-3">&#8205;</label>
                                </div>
                                <div class="scale-4">
                                    <input type="radio" id="q5-4" name="q5" value="4">
                                    <label for="q5-4">&#8205;</label>
                                </div>
                                <div class="scale-5">
                                    <input type="radio" id="q5-5" name="q5" value="5">
                                    <label for="q5-5">&#8205;</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        <div class="d-flex justify-content-between">
                <a href="eval1.php">
                    <button class="btn btn-transparent"><i class="fas fa-arrow-left"></i> Back</button>
                </a>
                <button type="submit" name="submit" class="btn btn-transparent">Next <i class="fas fa-arrow-right"></i></button>
            </div>
        </div>

    </form>

    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
