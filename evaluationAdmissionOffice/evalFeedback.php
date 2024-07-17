<?php
session_start();
include("../connect.php");

$error = '';

$officeName = $_SESSION['selected_office'] ;
$evaluatorID = $_SESSION['ID'] ; 

$q1_eval1 = $_SESSION['eval1_q1'] ;
$q2_eval2 = $_SESSION['eval1_q2'] ;
$q3_eval3 = $_SESSION['eval1_q3'] ;
$q4_eval4 = $_SESSION['eval1_q4'] ;
$q5_eval5 = $_SESSION['eval1_q5'] ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = htmlspecialchars($_POST['feedback']);

    $insert_stmt = $conn->prepare("INSERT INTO evaluation (officeName, evaluatorID, q1, q2, q3, q4, q5, feedback) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $insert_stmt->bind_param("ssiiiiis", $officeName, $evaluatorID, $q1_eval1, $q2_eval2, $q3_eval3, $q4_eval4, $q5_eval5, $feedback);

    if ($insert_stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error in submitting feedback. Please try again later.']);
    }

    $insert_stmt->close();
    $conn->close();
    exit();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include '../templates/header.php'; ?>

    <div class="container my-5">
        <h2 class="text-center">ADMISSION OFFICE</h2>

        <form id="feedbackForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="row justify-content-center mt-4">
                <div class="col-md-10">
                    <h5 class="mb-4">Complaints, Comments, Suggestion</h5>

                    <div class="card">
                        <div class="p-1">
                            <textarea class="form-control h-100" id="feedback" name="feedback" rows="12" placeholder="Enter your feedback here..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="eval2.php">
                    <button class="btn btn-transparent"><i class="fas fa-arrow-left"></i> Back</button>
                </a>
                <button id="finishBtn" type="button" class="btn btn-transparent">Submit <i class="fas fa-check"></i></button>
            </div>
        </form>
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
                    const form = document.getElementById('feedbackForm');
                    const formData = new FormData(form);
                    
                    fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Finished!',
                                'Your survey has been submitted. Thank you for your Feedback.',
                                'success'
                            ).then(() => {
                                window.location.href = '../loginCustomer.php';
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                data.error,
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            'There was an error submitting your feedback. Please try again later.',
                            'error'
                        );
                    });
                }
            });
        });
    </script>
</body>
</html>
