<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
    <title>Métodos Numéricos</title>
</head>
<body>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="./">
                <img src="../assets/img/brand/logo.png" class="navbar-brand-img" alt="...">
            </a>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                    <a href="./">
                        <img src="../assets/img/brand/logo.png">
                    </a>
                    </div>
                    <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                        <span></span>
                        <span></span>
                    </button>
                    </div>
                </div>
                </div>
                <!-- Navigation -->
                <!-- Heading -->
                <h6 class="navbar-heading text-muted">Cerrados</h6>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../biseccion">
                        <i class="ni ni-ruler-pencil text-gray"></i> Método Bisección
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../regla-falsa">
                        <i class="ni ni-ruler-pencil text-gray"></i> Método Regla Falsa
                        </a>
                    </li>
                </ul>

                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading text-muted">Abiertos</h6>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../secante">
                        <i class="ni ni-ruler-pencil text-gray"></i> Método Secante
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../newton">
                        <i class="ni ni-ruler-pencil text-gray"></i> Método Newton
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./">
                        <i class="ni ni-ruler-pencil text-success"></i> Interpolación de Newton
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../interpolacion-langrage">
                        <i class="ni ni-ruler-pencil text-gray"></i> Interpolación de langrage
                        </a>
                    </li>
                </ul>

                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading text-muted">Raices</h6>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../muller">
                        <i class="ni ni-ruler-pencil text-gray"></i> Muller
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-content">
        <div class="container-fluid">
            <div class="header-body">
                <div class="table-responsive">
                    <p>
                        <h1 class="text-center">Interpolación de newton</h1>
                    </p>
                    <form method="post" action="">
                        <input class="form-control w-25" type="number" step="any" name="x" required placeholder="x"><br>
                        <input class="form-control w-25" type="number" step="any" name="x1" required placeholder="x1"><br>
                        <input class="form-control w-25" type="number" step="any" name="x2" required placeholder="x2"><br>
                        <input class="form-control w-25" type="number" step="any" name="y1" required placeholder="y1"><br>
                        <input class="form-control w-25" type="number" step="any" name="y2" required placeholder="y2"><br>
                        
                        <input class="btn btn-success" type="submit" name="calcular" value="Calcular">
                    </form>

                    <?php 
                        if(isset($_POST['calcular'])){
                            $x = $_POST['x'];
                            $x1 = $_POST['x1'];
                            $x2 = $_POST['x2'];
                            $y1 = $_POST['y1'];
                            $y2 = $_POST['y2'];

                            $y = round((($x-$x1)/($x2 - $x1)) * ($y2 - $y1) + $y1,2);
                    ?>

                    <br>

                    <p>
                        <h1><?php echo "Y= " . $y; }?></h1>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!--   Core   -->
    <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Argon JS   -->
    <script src="../assets/js/argon-dashboard.min.js?v=1.1.2"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
</body>
</html>