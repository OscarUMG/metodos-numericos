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
                        <a class="nav-link active" href="./">
                        <i class="ni ni-ruler-pencil text-success"></i> Método Secante
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../newton">
                        <i class="ni ni-ruler-pencil text-gray"></i> Método Newton
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
                        <h1 class="text-center">Método de la Secante</h1>
                    </p>
                    <!-- Ecuación e Intervalos -->
                    <form method="post" action="">
                        <input class="form-control w-25" type="text" name="ecuacion" required placeholder="Ingrese una función como 2*x^6"><br>
                        <input class="form-control w-25" type="number" step="any" name="x1" required placeholder="Xo"><br>
                        <input class="form-control w-25" type="number" step="any" name="x2" required placeholder="X1"><br>
                        
                        <input class="btn btn-success" type="submit" name="calcular" value="Calcular">
                    </form>
                </div>
                <!-- Método -->
                <?php
                if(isset($_POST['calcular'])){
                    $ecuacion = $_POST['ecuacion'];
                    $x_1 = $_POST['x1'];
                    $x2 = $_POST['x2'];

                    // Remover cualquier caracter que no sea dígito, letra, operador o paréntesis
                    $ecuacion = preg_replace("/[^0-9a-zA-Z\+\-\*\/\^\(\)\.]/", "", $ecuacion);

                    // Reemplazar la letra 'x' en la ecuación con el valor de $x1 y luego evaluar la ecuación
                    $ecuacion_x1 = str_replace('x', "(".$x_1.")", $ecuacion);
                    $ecuacion_x1 = str_replace("^", "**", $ecuacion_x1);
                    eval("\$resultado_x1 = round($ecuacion_x1,4);");

                    // Reemplazar la letra 'x' en la ecuación con el valor de $x2 y luego evaluar la ecuación
                    $ecuacion_x2 = str_replace('x', "(".$x2.")", $ecuacion);
                    $ecuacion_x2 = str_replace("^", "**", $ecuacion_x2);
                    eval("\$resultado_x2 = round($ecuacion_x2,4);");

                    //Variables
                    $xo[]   = 0;
                    $x1[]   = 0;
                    $fxo[]  = 0;
                    $fx1[]  = 0;
                    $xri[] = 0;
                    $tol[] = 0;
                    $fin   = 1;
                ?>

                <br>
                <br>

                <div class="">
                    <span>
                        <strong>Función: </strong>
                        <?php echo $ecuacion;?>
                    </span>
                    <br>
                    <br>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>i</th>
                                <th>xo</th>
                                <th>x1</th>
                                <th>f(xo)</th>
                                <th>f(X1)</th>
                                <th>xi+1</th>
                                <th>Error Tolerancia</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for($i=1;$fin>0.001;$i++){?>
                            <tr>
                                <?php if($i==1){?>
                                <th scope="row"><?php echo $i?></th>
                                <td><?php echo $x_1?></td>
                                <td><?php echo $x2?></td>
                                <td><?php echo $resultado_x1?></td>
                                <td><?php echo $resultado_x2?></td>
                                <td><?php echo $xr=round($x_1-($resultado_x1 * ($x2-$x_1)/($resultado_x2-$resultado_x1)),4)?></td>
                                <td></td>
                            </tr>
                            <?php 
                                $xo[] = $x_1;
                                $x1[] = $x2;
                                $fxo[] = $resultado_x1;
                                $fx1[] = $resultado_x2;
                                $xri[] = round($x1[$i]-($fx1[$i] * ($xo[$i]-$x1[$i])/($fxo[$i]-$fx1[$i])),4);
                                $con = 1;
                                }else{?>
                            <tr>
                                <th scope="row"><?php echo $i?></th>
                                <td><?php 
                                        //Xo
                                        $xo[] = round($x1[$i-1],4);
                                        echo round($xo[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //X1
                                        $x1[] = round($xri[$i-1],4);
                                        echo round($x1[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //f(xo)
                                        $f_a = str_replace('x', "(".$xo[$i].")", $ecuacion);
                                        $f_a = str_replace("^", "**", $f_a);
                                        eval("\$resultado_f_a = $f_a;");
                                        echo round($resultado_f_a,4);
                                        $fxo[] = round($resultado_f_a,4);
                                    ?>
                                </td>
                                <td><?php 
                                        //f(x1)
                                        $f_b = str_replace('x', "(".$x1[$i].")", $ecuacion);
                                        $f_b = str_replace("^", "**", $f_b);
                                        eval("\$resultado_f_b = $f_b;");
                                        echo round($resultado_f_b,4);
                                        $fx1[] = round($resultado_f_b,4);
                                    ?>
                                </td>
                                <td><?php 
                                        //xi+1
                                        $xri[] = round($x1[$i]-($fx1[$i] * ($xo[$i]-$x1[$i])/($fxo[$i]-$fx1[$i])),4);
                                        echo round($xri[$i],4);
                                        $con +=1;
                                    ?>
                                </td>
                                <td><?php
                                        //Tolerancia
                                        $tol[] = abs(round($xri[$i] - $xri[$i-1],4));
                                        echo abs(round($tol[$i-1],4));
                                        $fin = abs(round($tol[$i-1],4));
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
                                <?php echo $xri[$con];?>
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