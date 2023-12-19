<!DOCTYPE html>
<html lang="en">

<?php include('../elements/head.php') ?>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php include('../elements/aside.php'); ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <?php include('../elements/navbar.php') ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

      <div class="row mt-1">
        <div class="col-lg-1">
          <canvas id="" class="" height="400"></canvas>
        </div>
        <div class="col-lg-10">
          <div class="card card-carousel overflow h-100 p-1">
            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
              <div class="carousel-inner border-radius-lg h-100">
                <div class="carousel-item h-100 active" style="background-image: url('../assets/img/slider_1.jpg');
                  background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-camera-compact text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Futuro y Compromiso!</h5>
                    <p>"Impulsando el futuro con energía: descubre nuestro compromiso con la excelencia en la industria
                      petrolera."</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/slider_2.jpg');
                  background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Misión </h5>
                    <p>"Conduciendo el progreso, alimentando el mundo: nuestra misión es proporcionar soluciones
                      energéticas sostenibles para un mañana brillante."</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/slider_3.jpg');
                  background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Misión </h5>
                    <p>"Conduciendo el progreso, alimentando el mundo: nuestra misión es proporcionar soluciones
                      energéticas sostenibles para un mañana brillante."</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/slider_4.jpg');
                  background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Compromiso</h5>
                    <p>"Desde el yacimiento hasta tu vida diaria: comprometidos con la excelencia en cada etapa del
                      ciclo del petróleo."</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/slider_5.jpg');
                  background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Pioneros </h5>
                    <p>"Pioneros en energía: navegando el futuro con integridad, innovación y un compromiso duradero con
                      la excelencia."</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/slider_6.jpg');
                  background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-trophy text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Exploramos, Perforamos, Prosperamos!</h5>
                    <p>"Nuestra dedicación a la excelencia impulsa el desarrollo sostenible en la industria del
                      petróleo."</p>
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
                tales como zooplancton (que se alimenta de materia orgánica elaborada) y
                algas provenientes de lagos o ríos desecadas con el pasar de los siglos, cuyos fondos
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
              <p class="card-text">Hay pocas materias primas tan versátiles y necesarias para el funcionamiento de
                nuestra sociedad. El petróleo desempeña un papel crucial en la actual era industrial, siendo hoy el
                motor principal de la economía mundial. Esta fuente de energía
                fósil se ha convertido en el recurso más utilizado para impulsar la maquinaria industrial, el
                transporte y la producción de energía eléctrica.</p>
            </div>
          </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="col-lg-4">
          <div class="card">
            <img src="../assets/img/car_1.jpg" class="card-img-top" alt="Imagen 3">
            <div class="card-body">
              <h5 class="card-title">Beneficicos</h5>
              <p class="card-text">
                Además de los combustibles líquidos (gasolina, gasóil, fuelóil) necesarios para la movilidad,
                el petróleo nos proporciona agua caliente, calefacción y electricidad. Y está presente también en
                muchos productos
                de nuestra vida cotidiana: envases plásticos, productos sanitarios, tintes, jabones, gafas, zapatos,
                componentes electrónicos, etc.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de las tarjetas -->
    </div>

    </div>
    <?php include('../elements/footer.php'); ?>
  </main>

  <!--   Core JS Files   -->
  <?php include('../elements/dependencias.php'); ?>
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

</body>

</html>