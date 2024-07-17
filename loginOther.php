<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include 'templates/header.php'; ?>

    <div class="container my-5">
        <h2 class="text-center">PERSONAL INFORMATION</h2>
        
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card p-4">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label for="clienttype" class="form-label">Type of Client</label>
                        <select id="clienttype" class="form-select">
                            <option selected>Choose...</option>
                            <option value="agency">Agency</option>
                            <option value="participant">Participant</option>
                            <option value="client">Client (Research)</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-red" type="button" id="nextBtn">Next</button>
                        <a href="loginCustomer.php">
                            <button class="btn btn-outline-secondary w-100" type="button">Back</button>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <?php include 'templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('nextBtn').addEventListener('click', function() {
            var clientType = document.getElementById('clienttype').value;
            if (clientType === 'agency') {
                window.location.href = 'customerAgency/instructionAgency.php';
            } else if (clientType === 'participant') {
                window.location.href = 'customerParticipant/instructionParticipant.php';
            } else if (clientType === 'client') {
                window.location.href = 'customerClient/instructionClient.php';
            } else {
                alert('Please select a type of client.');
            }
        });
    </script>
</body>
</html>
