<?php
/** @var string[][] $records */
?>
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
        <div class="col-md-12">
            <?php if ([] !== $records) :?>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Код</th>
                            <th scope="col">Названия</th>
                            <th scope="col">Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($records as $record) :?>
                            <tr>
                                <th scope="row"><?=$record['id']?></th>
                                <td><?=$record['code']?></td>
                                <td><?=$record['name']?></td>
                                <td><?=$record['price']?></td>
                            </tr>
                        <?php endforeach ;?>
                    </tbody>
                </table>
            <?php endif ;?>
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
