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
                <a class="nav-link active" href="./">
                <i class="ni ni-ruler-pencil text-success"></i> Método Bisección
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
            <h1 class="text-center">Método de Bisección</h1>
          </p>
          <!-- Ecuación e Intervalos -->
          <form method="post" action="">
            <input class="form-control w-25" type="text" name="ecuacion" required placeholder="Ingrese una función como 2*x^6"><br>
            <input class="form-control w-25" type="number" step="any" name="x1" required placeholder="Intervalo 1"><br>
            <input class="form-control w-25" type="number" step="any" name="x2" required placeholder="Intervalo 2"><br>
            
            <input class="btn btn-success" type="submit" name="calcular" value="Calcular">
          </form>
        </div>
        <!-- Método -->
        <?php
          if(isset($_POST['calcular'])){
              $ecuacion = $_POST['ecuacion'];
              $x1 = $_POST['x1'];
              $x2 = $_POST['x2'];

              // Remover cualquier caracter que no sea dígito, letra, operador o paréntesis
              $ecuacion = preg_replace("/[^0-9a-zA-Z\+\-\*\/\^\(\)\.]/", "", $ecuacion);

              // Reemplazar la letra 'x' en la ecuación con el valor de $x1 y luego evaluar la ecuación
              $ecuacion_x1 = str_replace('x', "(".$x1.")", $ecuacion);
              $ecuacion_x1 = str_replace("^", "**", $ecuacion_x1);
              eval("\$resultado_x1 = round($ecuacion_x1,4);");

              // Reemplazar la letra 'x' en la ecuación con el valor de $x2 y luego evaluar la ecuación
              $ecuacion_x2 = str_replace('x', "(".$x2.")", $ecuacion);
              $ecuacion_x2 = str_replace("^", "**", $ecuacion_x2);
              eval("\$resultado_x2 = round($ecuacion_x2,4);");

              if (($resultado_x1>=0 && $resultado_x2<0) || ($resultado_x2>=0 && $resultado_x1<0)){
                  //Variables
                  $a[]   = 0;
                  $b[]   = 0;
                  $fa[]  = 0;
                  $fb[]  = 0;
                  $xr2[] = 0;
                  $fxr[] = 0;
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
              <span>
                  <strong>Primer Intervalo: </strong>
                  <?php echo $resultado_x1;?>
              </span>
              <br>
              <span>
                  <strong>Segundo Intervalo: </strong>
                  <?php echo $resultado_x2;?>
              </span>
              <br>
              <br>
              <table class="table">
                  <thead class="table-dark">
                      <tr>
                          <th>i</th>
                          <th>a</th>
                          <th>b</th>
                          <th>f(a)</th>
                          <th>f(b)</th>
                          <th>xr</th>
                          <th>f(xr)</th>
                          <th>Error Tolerancia</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php for($i=1;$fin>0.001;$i++){?>
                      <tr>
                          <?php if($i==1){?>
                          <th scope="row"><?php echo $i?></th>
                          <td><?php echo $x1?></td>
                          <td><?php echo $x2?></td>
                          <td><?php echo $resultado_x1?></td>
                          <td><?php echo $resultado_x2?></td>
                          <td><?php echo $xr=round(($x1+$x2)/2,4)?></td>
                          <td><?php 
                                  $f_xr = str_replace('x', "(".$xr.")", $ecuacion);
                                  $f_xr = str_replace("^", "**", $f_xr);
                                  eval("\$funcion_xr = $f_xr;");
                                  echo round($funcion_xr,4);
                              ?>
                          </td>
                          <td></td>
                      </tr>
                      <?php 
                          $a[] = $x1;
                          $b[] = $x2;
                          $fa[] = $resultado_x1;
                          $fb[] = $resultado_x2;
                          $xr2[] = round(($a[$i]+$b[$i])/2,4);
                          $fxr[] = $funcion_xr;
                          $con = 1;   
                          }else{?>
                      <tr>
                          <th scope="row"><?php echo $i?></th>
                          <td><?php 
                                  //a
                                  if(($fxr[$i-1]>=0 && $fa[$i-1]>=0) || ($fxr[$i-1]<=0 && $fa[$i-1]<=0)){
                                      $a[] = round($xr2[$i-1],4);
                                      echo round($xr2[$i-1],4);
                                  }else{
                                      $a[] = round($a[$i-1],4);
                                      echo round($a[$i],4);
                                  }
                              ?>
                          </td>
                          <td><?php 
                                  //b
                                  if(($fxr[$i-1]>=0 && $fb[$i-1]>=0) || ($fxr[$i-1]<=0 && $fb[$i-1]<=0)){
                                      $b[] = round($xr2[$i-1],4);
                                      echo round($xr2[$i-1],4);
                                  }else{
                                      $b[] = round($b[$i-1],4);
                                      echo round($b[$i],4);
                                  }
                              ?>
                          </td>
                          <td><?php 
                                  //f(a)
                                  $f_a = str_replace('x', "(".$a[$i].")", $ecuacion);
                                  $f_a = str_replace("^", "**", $f_a);
                                  eval("\$resultado_f_a = $f_a;");
                                  echo round($resultado_f_a,4);
                                  $fa[] = round($resultado_f_a,4);
                              ?>
                          </td>
                          <td><?php 
                                  //f(b)
                                  $f_b = str_replace('x', "(".$b[$i].")", $ecuacion);
                                  $f_b = str_replace("^", "**", $f_b);
                                  eval("\$resultado_f_b = $f_b;");
                                  echo round($resultado_f_b,4);
                                  $fb[] = round($resultado_f_b,4);
                              ?>
                          </td>
                          <td><?php 
                                  //xr
                                  $xr2[] = round(($a[$i]+$b[$i])/2,4);
                                  echo round($xr2[$i],4);
                              ?>
                          </td>
                          <td><?php
                                  //f(xr)
                                  $f_xr = str_replace('x', "(".$xr2[$i].")", $ecuacion);
                                  $f_xr = str_replace("^", "**", $f_xr);
                                  eval("\$resultado_f_xr = $f_xr;");
                                  echo round($resultado_f_xr,4);
                                  $fxr[] = round($resultado_f_xr,4);
                              ?>
                          </td>
                          <td><?php
                                  //Tolerancia
                                  $tol[] = abs(round($xr2[$i] - $xr2[$i-1],4));
                                  echo abs(round($tol[$i-1],4));
                                  $fin = abs(round($tol[$i-1],4));
                                  $con +=1;
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
                    <?php echo $xr2[$con];?>
                </span>
                <br>
                <br>
            </div>
            <?php
                  }else{
          ?>
              <div class="container text-center">
                  <h2>No se puede resolver :(</h2>
                  <span>
                  <strong>Primer Intervalo: </strong>
                  <?php echo $resultado_x1;?>
              </span>
              <br>
              <span>
                  <strong>Segundo Intervalo: </strong>
                  <?php echo $resultado_x2;?>
              </span>
              </div>
          <?php
                  }
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
            