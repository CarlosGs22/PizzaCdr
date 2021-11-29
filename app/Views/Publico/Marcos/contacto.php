<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                ¡Cuentanos tu experiencia!
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form method="post" action="<?php echo base_url("contacto") ?>" id="frm_contacto">
                        <div>
                            <label for="Nombre">Nombre: *</label>
                            <input type="text" class="form-control Nombre" name="txtNombre" maxlength="150" placeholder="" />
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="Telefono">Teléfono: *</label>
                                    <input type="text" class="form-control Teléfono" placeholder="" name="txtTelefono" oninput="restrict(this);" maxlength="10" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div>
                                    <label for="Telefono">Correo: *</label>
                                    <input type="text" class="form-control Correo" placeholder="" name="txtCorreo" maxlength="100" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="Mensaje">Mensaje: *</label>
                            <textarea class="form-control Mensaje" name="txtMensaje" rows="10" cols="50" maxlength="300"></textarea>
                        </div>
                        <div class="btn_box">
                            <button>
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_container ">
                    <div id="">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29886.849687034122!2d-100.40594632567924!3d20.553063318569556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d3450c153a5305%3A0x95f244958275eef9!2sTrapani%20Pizza!5e0!3m2!1ses-419!2smx!4v1637465752836!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {

        $("#frm_contacto").submit(function(e) {
            e.preventDefault();

            var valid = false;

            if (validacionInput("frm_contacto")) {
                if (validacionSelect("frm_contacto")) {
                    if (validacionTextArea("frm_contacto")) {
                        valid = true;
                    }
                }
            }

            if (valid) this.submit();
        });

    });
</script>