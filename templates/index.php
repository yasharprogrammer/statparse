<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Checkout example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <a href="/">
            <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        </a>
        <h2>Parse Form</h2>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <form novalidate method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Select CSV file:</label>
                        <input type="file" name="csv_file" class="form-control" required/>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Parse</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>
</body>
</html>
