

<footer class="footer_section">
  <?php if ($lista_sucursal_info) {
    foreach ($lista_sucursal_info as $key => $value) {
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
                    Ubicación: <?php echo $value["calle"] . " " .
                                  $value["numero"] . ", " . $value["colonia"] .
                                  " " . $value["cp"] . ", " . $value["nombre_municipio"] .
                                  ". " . $value["nombre_estado"]; ?>
                  </span>
                </a>
                <a href="">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span>
                    <?= $value["telefono"]; ?>
                  </span>
                </a>
                <a href="">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <span>
                    <?= $value["correo"]; ?>
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
                <?= $value["presentacion"]; ?>
              </p>
              <div class="footer_social">

                <?php
                $lista_iconos = explode(",", $value["facebook_link"]);
                foreach ($lista_iconos as $values) {
                  echo $values;
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-4 footer-col">
            <h4>
              Horarios
            </h4>

            <p>
              <?= $value["horario"]; ?>
            </p>
          </div>
        </div>
        <div class="footer-info">
          <p>
            Todos los derechos resevados por @<?php echo $listas_especiales[0]["img3"] != null ? $listas_especiales[0]["img3"] : "" ?>
          </p>
        </div>
      </div>
  <?php }
  } ?>
</footer>

<script src="<?php echo base_url("public/Publico/js/jquery-3.4.1.min.js") ?>"></script>
<script src="<?php echo base_url("public/Publico/js/bootstrap.js") ?>"></script>



</body>

</html>