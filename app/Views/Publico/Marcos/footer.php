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

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>