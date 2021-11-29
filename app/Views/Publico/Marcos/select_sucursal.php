<div class="newsletter-subscribe">
    <div class="container">
        <form class="form-inline" action="<?php echo base_url("/buscar_cobertura") ?>" accept-charset="UTF-8" method="post">
            <div class="form-group mb-2">
                <label>Ingresa tu CP ó localidad</label>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" name="txtCp" maxlength="5" required>
            </div>
            <button type="submit" id="btnBuscarLocalización" class="btn btn-primary mb-2">Buscar</button>
        </form>
    </div>
</div>

<style>
    .newsletter-subscribe {
        color: #313437;
        background-color: #ffffff;
        margin: 30px;
    }

    .newsletter-subscribe .intro {
        font-size: 16px;
        max-width: 500px;
        margin: 0 auto 25px
    }

    .newsletter-subscribe .intro p {
        margin-bottom: 35px
    }

    .newsletter-subscribe form {
        justify-content: center
    }


    .newsletter {
        color: #0062cc !important
    }
</style>