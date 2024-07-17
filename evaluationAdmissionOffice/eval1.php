<?php
session_start();
include("../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['q1']) && isset($_POST['q2'])) {
        $_SESSION['eval1_q1'] = $_POST['q1'];
        $_SESSION['eval1_q2'] = $_POST['q2'];
        
        header("Location: eval2.php");
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
                            <p>
                                1. Ang mga patakaran at iba't ibang kursong mapag-aaralan sa Kolehiyo ay malawak na 
                                naipababatid sa pamamagitan ng "brochures", "pamphlets" at mga lathala at anunsiyong 
                                nakapaskil sa "bulletin board".
                            </p>
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
                            <p>
                                2. Ang mga   panuntunan, patakaran, tuntunin at gabay patungkol sa "admission" 
                                ay malinaw at ipinatutupad nang may sistema.
                            </p>
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
                <a href="selectOffice.php">
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
