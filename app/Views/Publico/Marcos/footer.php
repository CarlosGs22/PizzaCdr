<footer class="footer_section">
  <?php if ($lista_sucursal_info) {

    $datos_dias = [
      'lunes' => "Monday",
      'martes' => "Tuesday",
      'miercoles' => "Wednesday",
      'jueves' => "Thursday",
      'viernes' => "Friday",
      'sabado' => "Saturday",
      'domingo' => "Sunday"
    ];



    $calle = "";
    $numero = "";
    $cp = "";
    $colonia = "";

    $nombreMunicipio = "";
    $nombreEstado = "";
    foreach ($lista_sucursal_info as $value) {
      $calle = $value["calle"];
      $numero = $value["numero"];
      $cp = $value["cp"];
      $colonia = $value["colonia"];
      $nombreMunicipio = $value["nombreMunicipio"];
      $nombreEstado = $value["nombreEstado"];
      $correo = $value["correo"];
      $presentacion = $value["presentacion"];
    }
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contacto
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Ubicación: <?php echo $calle . " " .
                                $numero . ", " . $colonia .
                                " " . $cp . ", " . $nombreMunicipio .
                                ". " . $nombreEstado; ?>
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  <?= $telefono ?>
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  <?= $correo; ?>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <h4>
              Nosotros
            </h4>
            <p>
              <?= $presentacion; ?>
            </p>
            <div class="footer_social">

            <a href="<?=$value["facebook_link"]?>"><i class="fa fa-facebook"></i></a>

            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Horarios
          </h4>

      
          
            <?php
            foreach ($lista_sucursal_info as $value) {
              foreach ($datos_dias as $keyd => $valued) {
                if ($valued == $value["dia"]) { ?>


                  <p><?= $keyd ." " .  $value["horade"] . ":" .  $value["horademns"] . " " . "a" . " " . $value["horahasta"] . ":" .  $value["horahastamns"] . " " . "Hrs" ?></p>

            <?php }
              }
            } ?>
        
          
        </div>
      </div>
      <div class="footer-info">
        <p>
          Todos los derechos resevados por @<?php echo $listas_especiales[0]["img3"] != null ? $listas_especiales[0]["img3"] : "" ?>
        </p>
      </div>
    </div>

  <?php } ?>
</footer>

<script src="<?php echo base_url("public/Publico/js/jquery-3.4.1.min.js") ?>"></script>
<script src="<?php echo base_url("public/Publico/js/bootstrap.js") ?>"></script>
<script src="<?php echo base_url("public/Publico/js/propios.js") ?>"></script>

<script src="<?php echo base_url("public/Publico/js/carousel.min.js") ?>"></script>
<script src="<?php echo base_url("public/Publico/js/popper.min.js") ?>" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo base_url("public/Publico/js/owl-carousel.min.js") ?>"></script>

</body>

</html>