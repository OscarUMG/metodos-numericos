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
                        <a class="nav-link active" href="./">
                        <i class="ni ni-ruler-pencil text-success"></i> Método Newton
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../interpolacion-newton">
                        <i class="ni ni-ruler-pencil text-gray"></i> Interpolación de Newton
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
                        <h1 class="text-center">Método Newton</h1>
                    </p>
                    <!-- Ecuación e Intervalos -->
                    <form method="post" action="">
                        <input class="form-control w-25" type="text" name="funcion" required placeholder="f(x)"><br>
                        <input class="form-control w-25" type="text" name="derivada" required placeholder="f'(x)"><br>
                        <input class="form-control w-25" type="text" name="xi" required placeholder="xi"><br>
                        
                        <input class="btn btn-success" type="submit" name="calcular" value="Calcular">
                    </form>
                </div>
                <!-- Método -->
                <?php
                if(isset($_POST['calcular'])){
                    $funcion = $_POST['funcion'];
                    $derivada = $_POST['derivada'];
                    $xi[] = $_POST['xi'];
                    
                    // Remover cualquier caracter que no sea dígito, letra, operador o paréntesis
                    $funcion = preg_replace("/[^0-9a-zA-Z\+\-\*\/\^\(\)\.]/", "", $funcion);

                    // Evaluamos f(x)
                    $ecuacion_x1 = str_replace('x', "(".$xi[0].")", $funcion);
                    $ecuacion_x1 = str_replace("^", "**", $ecuacion_x1);
                    eval("\$resultado_x1 = round($ecuacion_x1,4);");

                    // Evaluamos f'(x)
                    $ecuacion_x2 = str_replace('x', "(".$xi[0].")", $derivada);
                    $ecuacion_x2 = str_replace("^", "**", $ecuacion_x2);
                    eval("\$resultado_x2 = round($ecuacion_x2,4);");
            
                    $fin[] = 1;
                    $con = 0;
                ?>

                <br>
                <br>

                <div class="">
                    <span>
                        <strong>f(x): </strong>
                        <?php echo $funcion;?>
                    </span>
                    <br>
                    <span>
                        <strong>f'(x): </strong>
                        <?php echo $derivada;?>
                    </span>
                    <br>
                    <br>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>i</th>
                                <th>xi</th>
                                <th>f(xi)</th>
                                <th>f'(xi)</th>
                                <th>xi+x</th>
                                <th>Tolerancia</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for($i=1;$fin>0.001;$i++){?>
                            <tr>
                                <?php 
                                if($i==1){
                                $xr[] = round($xi[0]-($resultado_x1/$resultado_x2),4);
                                ?>
                                <th scope="row"><?php echo $i?></th>
                                <td><?php echo $xi[0]?></td>
                                <td><?php echo round($resultado_x1,4)?></td>
                                <td><?php echo round($resultado_x2,4)?></td>
                                <td><?php echo $xr[0]?></td>
                                <td></td>
                            </tr>
                            <?php 
                                }else{?>
                            <tr>
                                <th scope="row"><?php echo $i?></th>
                                <td><?php 
                                        //Xi
                                        $xi[] = round($xr[$i-2],4);
                                        echo round($xi[$i-1],4);
                                        $con +=1;
                                    ?>
                                </td>
                                <td><?php 
                                        //f(xi)
                                        $funcion_xi = str_replace('x', "(".$xi[$i-1].")", $funcion);
                                        $funcion_xi = str_replace("^", "**", $funcion_xi);
                                        eval("\$resultado_fxi = $funcion_xi;");

                                        $fxi[] = round($resultado_fxi,4);
                                        echo round($fxi[$i-2],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //f'(xi)
                                        $derivada_xi = str_replace('x', "(".$xi[$i-1].")", $derivada);
                                        $derivada_xi = str_replace("^", "**", $derivada_xi);
                                        eval("\$resultado_d_xi = $derivada_xi;");

                                        $fdxi[] = round($resultado_d_xi,4);
                                        echo round($fdxi[$i-2],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //xi+1
                                        $xr[] = round($xi[$i-1]-($fxi[$i-2]/$fdxi[$i-2]),4);
                                        echo round($xr[$i-1],4);
                                    ?>
                                </td>
                                <td><?php
                                        //Tolerancia
                                        $tol[] = abs(round($xi[$i-1] - $xi[$i-2],4));
                                        echo abs(round($tol[$i-2],4));
                                        $fin = abs(round($tol[$i-2],4));
                                    ?>
                                </td>
                            </tr>
                <?php
                            }
                        }
                ?>
                        <div class="">
                            <h2>Resultado:</h2>
                            <span>
                                <strong>x: </strong>
                                <?php echo $xi[$con];?>
                            </span>
                            <br>
                            <br>
                        </div>  
                <?php   
                    }
                ?>
                        </tbody>
                    </table>
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
            