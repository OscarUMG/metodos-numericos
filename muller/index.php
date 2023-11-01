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
                        <a class="nav-link active" href="./">
                        <i class="ni ni-ruler-pencil text-success"></i> Muller
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
                        <h1 class="text-center">Método de Muller</h1>
                    </p>
                    <!-- Ecuación e Intervalos -->
                    <form method="post" action="">
                        <input class="form-control w-25" type="text" name="ecuacion" required placeholder="Ingrese la función"><br>
                        <input class="form-control w-25" type="text" name="x0" required placeholder="Xo"><br>
                        <input class="form-control w-25" type="text" name="x1" required placeholder="X1"><br>
                        <input class="form-control w-25" type="text" name="x2" required placeholder="X2"><br>
                        
                        <input class="btn btn-success" type="submit" name="calcular" value="Calcular">
                    </form>
                </div>
                <!-- Método -->
                <?php
                if(isset($_POST['calcular'])){
                    $ecuacion = $_POST['ecuacion'];
                    $x0 = $_POST['x0'];
                    $x1 = $_POST['x1'];
                    $x2 = $_POST['x2'];

                    // Remover cualquier caracter que no sea dígito, letra, operador o paréntesis
                    $ecuacion = preg_replace("/[^0-9a-zA-Z\+\-\*\/\^\(\)\.]/", "", $ecuacion);

                    //x0
                    $ecuacion_x0 = str_replace('x', "(".$x0.")", $ecuacion);
                    $ecuacion_x0 = str_replace("^", "**", $ecuacion_x0);
                    eval("\$resultado_x0 = round($ecuacion_x0,4);");

                    //x1
                    $ecuacion_x1 = str_replace('x', "(".$x1.")", $ecuacion);
                    $ecuacion_x1 = str_replace("^", "**", $ecuacion_x1);
                    eval("\$resultado_x1 = round($ecuacion_x1,4);");

                    //x2
                    $ecuacion_x2 = str_replace('x', "(".$x2.")", $ecuacion);
                    $ecuacion_x2 = str_replace("^", "**", $ecuacion_x2);
                    eval("\$resultado_x2 = round($ecuacion_x2,4);");

                    //Variables
                    $_x0[]   = 0;
                    $_x1[]   = 0;
                    $_x2[]   = 0;
                    $_x3[] = 0;
                    $fx0[]  = 0;
                    $fx1[]  = 0;
                    $fx2[]  = 0;
                    $_h0[] = 0;
                    $_h1[] = 0;
                    $_d0[] = 0;
                    $_d1[] = 0;
                    $_a[] = 0;
                    $_b[] = 0;
                    $_c[] = 0;
                    $_error[] = 0;

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
                                <th>x2</th>
                                <th>f(xo)</th>
                                <th>f(x1)</th>
                                <th>f(x2)</th>
                                <th>ho</th>
                                <th>h1</th>
                                <th>do</th>
                                <th>d1</th>
                                <th>a</th>
                                <th>b</th>
                                <th>c</th>
                                <th>x3</th>
                                <th>Error Tolerancia</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for($i=1;$fin>0.001;$i++){?>
                            <tr>
                                <?php if($i==1){?>
                                <th scope="row"><?php echo $i?></th>
                                <td><?php echo $x0?></td>
                                <td><?php echo $x1?></td>
                                <td><?php echo $x2?></td>
                                <td><?php echo $resultado_x0?></td>
                                <td><?php echo $resultado_x1?></td>
                                <td><?php echo $resultado_x2?></td>
                                <td><?php echo $h0 = round($x1 - $x0,4)?></td>
                                <td><?php echo $h1 = round($x2 - $x1,4)?></td>
                                <td><?php echo $d0 = round(($resultado_x1 - $resultado_x0)/$h0,4)?></td>
                                <td><?php echo $d1 = round(($resultado_x2 - $resultado_x1)/$h1,4)?></td>
                                <td><?php echo $a = round(($d1 - $d0)/($h1 + $h0),4)?></td>
                                <td><?php echo $b = round($h1 * $a + $d1,4)?></td>
                                <td><?php echo $c = round($resultado_x2,4)?></td>
                                <td><?php
                                    if($b>=0){
                                        echo $x3 = round($x2 + ((-2*$c)/($b + sqrt(pow($b,2)-4*$a*$c))),4);
                                    }else{
                                        echo $x3 = round($x2 + ((-2*$c)/($b - sqrt(pow($b,2)-4*$a*$c))),4);
                                    }
                                ?></td>
                                <td><?php echo $error = abs(round(($x3-$x2)/$x3,4))?></td>
                            </tr>
                            <?php 
                                $_x0[] = $x0;
                                $_x1[] = $x1;
                                $_x2[] = $x2;
                                $_x3[] = $x3;
                                $fx0[] = $resultado_x0;
                                $fx1[] = $resultado_x1;
                                $fx2[] = $resultado_x2;
                                $_h0[] = $h0;
                                $_h1[] = $h1;
                                $_d0[] = $d0;
                                $_d1[] = $d1;
                                $_a[] = $a;
                                $_b[] = $b;
                                $_c[] = $c;
                                $con = 1;
                                }else{?>
                            <tr>
                                <th scope="row"><?php echo $i?></th>
                                <td><?php 
                                        //Xo
                                        $_x0[] = round($_x1[$i-1],4);
                                        echo round($_x0[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //X1
                                        $_x1[] = round($_x2[$i-1],4);
                                        echo round($_x1[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //X2
                                        $_x2[] = round($_x3[$i-1],4);
                                        echo round($_x2[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //f(xo)
                                        echo round($fx1[$i-1],4);
                                        $fx0[] = round($fx1[$i-1],4);
                                        ?>
                                </td>
                                <td><?php 
                                        //f(x1)
                                        echo round($fx2[$i-1],4);
                                        $fx1[] = round($fx2[$i-1],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //f(x2)
                                        $f_x2 = str_replace('x', "(".$_x2[$i].")", $ecuacion);
                                        $f_x2 = str_replace("^", "**", $f_x2);
                                        eval("\$resultado_fx2 = $f_x2;");
                                        echo round($resultado_fx2,4);
                                        $fx2[] = round($resultado_fx2,4);
                                    ?>
                                </td>
                                <td><?php 
                                        //ho
                                        $_h0[] = round($_x1[$i] - $_x0[$i],4);
                                        echo round($_h0[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //h1
                                        $_h1[] = $_x2[$i] - $_x1[$i];
                                        echo round($_h1[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //d0
                                        $_d0[] = round($_d1[$i-1],4);
                                        echo round($_d0[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //d1
                                        $_d1[] = round(($fx2[$i] - $fx1[$i])/$_h1[$i],4);
                                        echo round($_d1[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //a
                                        $_a[] = round(($_d1[$i] - $_d0[$i])/($_h1[$i] + $_h0[$i]),4);
                                        echo round($_a[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //b
                                        $_b[] = round($_h1[$i] * $_a[$i] + $_d1[$i],4);
                                        echo round($_b[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //c
                                        $_c[] = round($fx2[$i],4);
                                        echo round($_c[$i],4);
                                    ?>
                                </td>
                                <td><?php 
                                        //x3
                                        if($_b[$i]>=0){
                                            echo $_x3[] = round($_x2[$i] + ((-2*$_c[$i])/($_b[$i] + sqrt(pow($_b[$i],2)-4*$_a[$i]*$_c[$i]))),4);
                                            $con +=1;
                                        }else{
                                            echo $_x3[] = round($_x2[$i] + ((-2*$_c[$i])/($_b[$i] - sqrt(pow($_b[$i],2)-4*$_a[$i]*$_c[$i]))),4);
                                            $con +=1;
                                        }
                                    ?>
                                </td>
                                <td><?php
                                        //Tolerancia
                                        $_error[] = abs(round(($_x3[$i]-$_x2[$i])/$_x3[$i],4));
                                        echo abs(round($_error[$i-1],4));
                                        $fin = abs(round($_error[$i-1],4));
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
                                <?php echo $_x3[$con];?>
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