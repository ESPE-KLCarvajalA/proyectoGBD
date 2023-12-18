<?php
include_once("../formularios/Conexion.php");
Cconexion::ConexionBD();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo/logo_1.png">
  <title>
    PetroEcuador
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>
<style>
  /* Estilos para el Navbar */
  nav.navbar {
    background-color: white !important;
    margin-top: 10px;
    /* Ajusta el valor según tus necesidades */
  }

  nav.navbar a.nav-link {
    color: rgb(94, 114, 228) !important;
  }

  nav.navbar a.navbar-brand span {
    color: rgb(94, 114, 228) !important;
    /* Cambia 'red' al color que desees */
  }

  nav a.bold {
    font-weight: bold;
  }
</style>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="../pages/inicio.php">Inicio</a>
            </li>
          </ol>
          <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
              aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="../pages/inicio.php" target="_blank">
              <img src="../assets/img/logo/logo_1.png" class="navbar-brand-img h-100" alt="main_logo">
              <span class="font-weight-bolder text-white mb-0">KiBri Energy Solutions</span>
            </a>
          </div>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

          </div>
          <ul class="navbar-nav justify-content-end">
            <!-- Nuevas opciones del menú -->
            <li class="nav-item">
              <a class="nav-link text-white" href="../pages/inicio.php">Registros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../pages/inicio.php">Trabajadores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../pages/contacto.php">Asignaciones</a>
            </li>
            <!-- Fin de nuevas opciones -->

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="#" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- End Navbar -->
    <div class="container-fluid py-4">

      <div class="row mt-4">
        <div class="col-lg-1 ">
          <div class="">

            <div class="">
              <div class="">
                <canvas id="" class="" height="500"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-11 mx-auto">
          <div class="card card-carousel overflow-hidden h-100 p-0">
            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
              <div class="carousel-inner border-radius-lg h-100">
                <div class="carousel-item h-100 active" style="background-image: url('../assets/img/slider_1.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-camera-compact text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Con Corazón de la Tieera</h5>
                    <p>"En el corazón de la Tierra late el oro negro que ilumina nuestras vidas. Recordemos siempre su
                      valor y busquemos formas de aprovecharlo de manera responsable."</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/slider_2.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Faster way to create web pages</h5>
                    <p>"El petróleo, como la vida, es una mezcla de luces y sombras. Aprendamos a extraer su esencia
                      luminosa y a mitigar las sombras que deja a su paso."</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/slider_3.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-trophy text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Share with us your design tips!</h5>
                    <p>"En cada gota de petróleo hay una historia de millones de años. Respetemos su antigüedad y
                      valoremos cada gota como una joya que nos conecta con el pasado."</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
              </button>
              <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
              </button>
            </div>
          </div>
        </div>
        <div class="mt-4">
          <h3>
            <center>Información Petrolera</center>
          </h3>
          <hr>
        </div>
        <!-- Tarjetas de información sobre el petróleo -->
        <div class="row mt-4">
          <!-- Tarjeta 1 -->
          <div class="col-lg-4">
            <div class="card">
              <img src="../assets/img/car_3.jpg" class="card-img-top" alt="Imagen 1">
              <div class="card-body">
                <h5 class="card-title">Qué es el Petroleo?</h5>
                <p class="card-text">El petróleo se considera un hidrocarburo de origen fósil, es decir, que se debe a
                  la acumulación de grandes cantidades de materia orgánica hace millones de años,
                  tales como zooplancton (plancton de origen animal que se alimenta de materia orgánica elaborada) y
                  algas provenientes de regiones
                  lacustres (lagos o reservorios de agua dulce) desecadas con el pasar de los siglos, cuyos fondos
                  anóxicos (sin oxígeno) fueron enterrados bajo capas de sedimentos.</p>
              </div>
            </div>
          </div>

          <!-- Tarjeta 2 -->
          <div class="col-lg-4">
            <div class="card">
              <img src="../assets/img/car_2.jpg" class="card-img-top" alt="Imagen 2">
              <div class="card-body">
                <h5 class="card-title">Importacia</h5>
                <p class="card-text">El petróleo desempeña un papel crucial en la actual era industrial, siendo hoy el
                  motor principal de la economía mundial. Esta fuente de energía
                  fósil se ha convertido en el recurso más utilizado para impulsar la maquinaria industrial, el
                  transporte y la producción de energía eléctrica..</p>
              </div>
            </div>
          </div>

          <!-- Tarjeta 3 -->
          <div class="col-lg-4">
            <div class="card">
              <img src="../assets/img/car_1.jpg" class="card-img-top" alt="Imagen 3">
              <div class="card-body">
                <h5 class="card-title">Beneficicos</h5>
                <p class="card-text">Hay pocas materias primas tan versátiles y necesarias para el funcionamiento de
                  nuestra sociedad cómo el petróleo.
                  Además de los combustibles líquidos (gasolina, gasóil, fuelóil) necesarios para la movilidad de
                  personas y mercancías,
                  el petróleo nos proporciona agua caliente, calefacción y electricidad. Y está presente también en
                  muchos productos
                  de nuestra vida cotidiana: envases plásticos, productos sanitarios, tintes, jabones, gafas, zapatos,
                  componentes electrónicos…</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Fin de las tarjetas -->
      </div>


    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>