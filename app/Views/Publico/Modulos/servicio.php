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
                            Servicio no disponible
                        </h2>
                    </div>
                    <p>

                Por el momento no contamos con servicio disponible, seleccione otra sucr        
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
                Tipo de orden
            </h2>
        </div>
        <div class="row">
            <div class="col-6 col-md-6" data-aos="fade-up">
                <div class="service-box w-100 h-100">
                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                    <h4><a>Entrega a domicilio</a></h4>
                    <form id="frmSearch" class="form-inline" action="<?php echo base_url("/buscar_cobertura") ?>" accept-charset="UTF-8" method="post">

                        <div class="row w-100">
                            <div class="col-12">
                                <input type="text" class="form-control w-100 Código-Postal" name="txtCp" placeholder="CP" maxlength="5">

                            </div>
                        </div>

                        <div class="row w-100">
                            <div class="col-12">
                                <input type="hidden" name="txtReg" value="32U3&#vUd">
                                <button type="submit" id="btnBuscarLocalización" class="btn btnForm mb-2">Buscar</button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="col-6" data-aos="fade-up">
                <div class="service-box w-100 h-100">
                    <i class="fas fa-people-carry    "></i>
                    <h4><a>En sucursal</a></h4>
                    <form class="form-inline" id="frmChoose" action="<?php echo base_url("/buscar_cobertura") ?>" accept-charset="UTF-8" method="post">

                        <div class="row w-100">
                            <div class="col-12">
                                <select name="txtSucursal" id="txtSucursal" class="form-control w-100 Sucursal">
                                    <option value="0"></option>
                                    <?php if ($lista_sucursales) { ?>
                                        <?php foreach ($lista_sucursales as $key => $value) { ?>
                                            <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_sucursal) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row w-100">
                            <div class="col-12">
                                <input type="hidden" name="txtReg" value="ZM8ByFx#">
                                <button type="submit" id="btnSeleccionarSucursal" class="btn btnForm mb-2">Seleccionar</button>

                            </div>
                        </div>

                    </form>
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

<script>
    $(function() {
        $("#frmChoose").submit(function(e) {
            e.preventDefault();

            var valid = false;

            if (validacionInput("frmChoose")) {
                if (validacionSelect("frmChoose")) {
                    valid = true;
                }
            }

            if (valid) this.submit();
        });

        $("#frmSearch").submit(function(e) {
            e.preventDefault();

            var valid = false;

            if (validacionInput("frmSearch")) {
                if (validacionSelect("frmSearch")) {
                    valid = true;
                }
            }

            if (valid) this.submit();
        });

    });
</script>