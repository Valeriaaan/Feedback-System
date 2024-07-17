<?php
session_start();
include("../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit']) && isset($_POST['office'])) {
        $_SESSION['selected_office'] = $_POST['office'];
        header("Location: eval1.php");
        exit();
    } else {
        $error = "Please select an office.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback System - Select Office</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <?php include '../templates/header.php'; ?>
    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="container my-5">
            <h2 class="text-center">Select Office</h2>
            
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card p-4">
                        
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <ul class="list-group select-office">
                            <li class="list-group-item">
                                <input type="radio" id="admission" name="office" class="form-check-input me-2">
                                <label class="form-check-label" for="admission">Admission Office</label>
                            </li>
                            <li class="list-group-item">
                                <input type="radio" id="registrar" name="office" class="form-check-input me-2">
                                <label class="form-check-label" for="registrar">Registrar Office</label>
                            </li>
                            <li class="list-group-item">
                                <input type="radio" id="guidance" name="office" class="form-check-input me-2">
                                <label class="form-check-label" for="guidance">Guidance Office</label>
                            </li>
                            <li class="list-group-item">
                                <input type="radio" id="health" name="office" class="form-check-input me-2">
                                <label class="form-check-label" for="health">Health Service Office</label>
                            </li>
                            <li class="list-group-item">
                                <input type="radio" id="library" name="office" class="form-check-input me-2">
                                <label class="form-check-label" for="library">Library</label>
                            </li>
                            <li class="list-group-item">
                                <input type="radio" id="canteen" name="office" class="form-check-input me-2">
                                <label class="form-check-label" for="canteen">Canteen (Food Service)</label>
                            </li>
                            <li class="list-group-item">
                                <input type="radio" id="publication" name="office" class="form-check-input me-2">
                                <label class="form-check-label" for="publication">Student Publication</label>
                            </li>
                            <li class="list-group-item">
                                <input type="radio" id="scholarship" name="office" class="form-check-input me-2">
                                <label class="form-check-label" for="scholarship">Scholarship Programs</label>
                            </li>
                            <li class="list-group-item">
                                <input type="radio" id="organization" name="office" class="form-check-input me-2">
                                <label class="form-check-label" for="organization">Student Organization</label>
                            </li>
                            <li class="list-group-item">
                                <input type="radio" id="sports" name="office" class="form-check-input me-2">
                                <label class="form-check-label" for="sports">Sport and Cultural Services</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between mt-3">
                <a href="instruction.php">
                    <button class="btn btn-transparent"><i class="fas fa-arrow-left"></i> Back</button>
                </a>

                <button type="submit" name="submit" class="btn btn-transparent mt-3">Next <i class="fas fa-arrow-right"></i></button>
            </div>
        </div>

    </form>
    
    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>

