<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Layout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Your custom styles -->


    <style>
        /* styles.css */
        .image-section {
            background-color: #f0f0f0;
            /* Light gray background for better visibility */
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .text-boxes-section {
            padding: 20px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .card-body input.form-control {
            border-radius: 0.25rem;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {

            .card-body .col-md-4,
            .card-body .col-md-8 {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="card mb-4">
            <div class="row no-gutters">
                <!-- Image section -->
                <div class="col-md-3 image-section">
                    <img src="https://via.placeholder.com/400" class="img-fluid" alt="Placeholder Image">
                </div>

                <!-- Text boxes section -->
                <div class="col-md-8 text-boxes-section">
                    <div class="row">
                        <!-- Layout text boxes in a grid -->
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 1">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 2">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 3">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 4">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 5">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 6">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 7">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 8">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 9">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 10">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 11">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 12">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 13">
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Text Box 14">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>