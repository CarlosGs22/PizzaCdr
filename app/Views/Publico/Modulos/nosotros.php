<!-- about section -->

<section class="about_section layout_padding">
  <div class="container  ">

    <div class="row">
      <div class="col-md-6 ">
        <div class="img-box">
          <img src="<?php echo base_url("public/Admin/img/especiales/" . $listas_especiales[0]["img1"]) ?>" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              ¿Quiénes somos?
            </h2>
          </div>
          <p>

            Somos un restaurante de comida oriental con calidad Nicaragüense
            dispuesto a dar lo mejor de nosotros a nuestros clientes.

            Ofrecemos a nuestros clientes un ambiente agradable con
            atención personalizada, garantizando llevar su comida
            del wok a tu mesa calientito y delicioso,
            en un ambiente cálido para disfrutar en familia.

            Nos caracterizamos en dar excelentes precios a nuestros clientes
            con porciones ideales para compartir en familia o con amigos.
          </p>
          <a href="">
            Read More
          </a>
        </div>
      </div>
    </div>
    <!-- ======= Services Section ======= -->

  </div>
</section>

<section class="services">
  <div class="container">
    <div class="heading_container heading_center mb-4">
      <h2>
        Nuestros valores
      </h2>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6" data-aos="fade-up">
        <div class="service-box w-100 h-100">
          <i class="fa fa-check-circle-o" aria-hidden="true"></i>
          <h4><a>Calidad</a></h4>
          <p>Excelencia en todo lo que hacemos</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" data-aos="fade-up">
        <div class="service-box w-100 h-100">
          <i class="fa fa-handshake-o"></i>
          <h4><a>Respeto</a></h4>
          <p>Brindamos un trato calido y educado hacia nuestros clientes</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" data-aos="fade-up">
        <div class="service-box w-100 h-100">
          <i class="fas fa-people-carry    "></i>
          <h4><a>Servicio</a></h4>
          <p>Somos unos verdaderos anfitriones</p>
        </div>
      </div>

    </div>
  </div>
</section>
<style>
  .services {
    padding-bottom: 30px;
    text-align: center;
    padding: 50px 0px;
  }

  .services .section-title h2 {
    color: #444;
    font-size: 42px;
  }

  .services .section-title p {
    text-align: center;
    font-style: italic;
    margin-bottom: 40px;
    color: #666;
  }

  .services .service-box {
    margin-bottom: 30px;
    padding: 15px;
    text-align: center;
    box-shadow: 0px 0 5px #bdbdbd;
    float: left;
    position: relative;
    z-index: 1;
    overflow: hidden;
  }

  .services .service-box::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #f1f1f1;
    left: 0px;
    top: -500px;
    z-index: -1;
    transition: 1s;
  }

  .services .service-box:hover::after {
    top: 0px;
  }

  .services i {
    display: flex;
    justify-content: center;
  }

  .services i {
    width: 70px;
    height: 70px;
    margin-bottom: 30px;
    background: #ffffff;
    border-radius: 100%;
    transition: 0.5s;
    color: #28a745;
    font-size: 35px;
    overflow: hidden;
    padding-top: 18px;
    box-shadow: 0px 0 5px #bdbdbd;
    margin: 10px auto 15px;
  }

  .services h4 {
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 18px;
    position: relative;
  }

  .services h4 a {
    color: #444;
    text-decoration: none;
  }

  .services h4 a:hover {
    color: #28a745;
  }

  .services p {
    line-height: 24px;
    font-size: 14px;
  }
</style>