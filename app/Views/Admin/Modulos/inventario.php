<div class="xs-pd-20-10 pd-ltr-20">
    <div class="page-header">
        <div class="row">
            <div class="col-6 col-md-6 col-sm-6">
                <div class="title">
                    <?php
                    $pieces = explode("/", uri_string());
                    ?>
                    <h4><?php echo $pieces[1];  ?></h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a><?php echo $pieces[0]; ?></a></li>
                        <li class="breadcrumb-item"><a><?php echo $pieces[1]; ?></a></li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card-box mb-30">
            <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">

                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">

                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline" action="<?php echo base_url("admin/inventario") ?>" accept-charset="UTF-8" method="get">
                                        <div class="flex-fill mr-2">
                                            <input type="text" name="txtBuscar" id="txtBuscar" value="" placeholder="Ingrediente/Producto" class="form-control w-100" required>
                                        </div>
                                        <button type="submit" class="btn btn-success"><i class="ti-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="pb-20 pt-20">

                <table class="table tablaDatatable  dt-responsive nowrap" style="width:100%">
                    
                        <thead>
                            <tr>
                                <th class="table-plus">ID</th>
                                <th>Cantidad</th>
                                <th>Ingrediente/Producto</th>
                                <th>Fecha de actualización</th>
                                <th>Sucursal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($lista_inventario) {
                                foreach ($lista_inventario as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $value['id']; ?></td>
                                        <td><?php echo $value['cantidad']; ?></td>
                                        <td><?php echo $value['ingrediente']; ?></td>
                                        <td class="table-plus"><?php echo $value['fecha_actualizacion']; ?></td>
                                        <td class="table-plus"><?php echo $value['sucursal']; ?></td>
                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>

                <div class="paginadordiv mt-30">
                        <?php
                        if ($pager) {
                            echo $pager;
                        }
                        ?>
                    </div>

            </div>
        </div>

    </div>
</div>

<script>
    $(function() {


    });
</script>