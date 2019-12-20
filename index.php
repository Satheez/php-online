<?php $codesToBeEliminated = ['delete', 'truncate']; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Helps to execute PHP code through browser and get the output">
    <meta name="author" content="Vettivel Satheez <isatheez@gmail.com>">

    <title>Execute PHP code</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">PHP Online</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<main role="main">

    <div class="container" style="margin-top: 100px">

        <div class="row">
            <div class="col-md-12">


                <form method="POST">

                    <div class="form-group">
                        <h3>Run Code</h3>
                    </div>

                    <div class="form-group">
                        <textarea name="code" class="form-control" rows="7" placeholder="Add the PHP code here..."
                                  required><?php echo isset($_POST['code']) && !empty($_POST['code']) ? htmlentities($_POST['code']) : ''; ?></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Execute</button>
                    </div>
                </form>

            </div>

        </div>

        <hr>


        <?php if (isset($_POST['code']) && !empty($_POST['code'])): ?>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $code = $_POST['code'];
                    $error = false;
                    try {
                        foreach ($codesToBeEliminated as $codeToBeEliminated) {
                            if (strpos($code, $codeToBeEliminated) !== false) {
                                echo '<div class="alert alert-danger" role="alert">Cannot execute this code</div>';
                                $error = true;
                                break;
                            }
                        }
                        if (!$error) {
                            echo '<div class="form-group"><h3>Output</h3></div>';
                            echo '<div class="form-group"><textarea name="code" class="form-control" rows="7">';
                            eval($code);
                            echo '</textarea></div>';
                        }
                    } catch (Exception $ex) {
                        // var_dump($ex);
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>

    </div> <!-- /container -->

</main>

</body>
</html>
