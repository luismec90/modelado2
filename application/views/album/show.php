<div class="row">
    <div class="col-lg-12">
        <?php if($_SESSION["idUsuario"]==$album[0]->user_id) {?>
        <h1 class="page-header">Álbum: <?= $album[0]->name ?>

            <button id="btn-subir-imagen" class="btn btn-primary pull-right"> Subir imagen</button>

        </h1>
        <?php } else{?>

        <h1 class="page-header">
            <a id="btn-subir-imagen" href="<?= base_url() ?>users/<?= $album[0]->user_id ?>" class="btn btn-primary ">Ir atrás</a>
            Álbum: <?= $album[0]->name ?>



        </h1>
        <?php }
        ?>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div id="div-imagenes" class="row">
    <div class="row">
        <?php foreach ($album[0]->photos as $photo) { ?>
            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Título: <?= ($photo->title!="") ? $photo->title :"N/A" ?>   <a data-photo-id="<?= $photo->id ?>" class="btn-eliminar-imagen glyphicon glyphicon-trash pull-right" aria-hidden="true" href="#"></a>
                    </div>
                    <div class="panel-body">
                        <a href="<?= base_url() . $photo->location ?>" class="images">
                        <img src="<?= base_url() . $photo->location ?>" class="img-responsive">
                        </a>
                    </div>
                    <div class="panel-footer">
                        <b>Descripción: </b>  <?= ($photo->description!="") ? $photo->description :"N/A" ?>

                    </div>
                </div>
            </div>
            <!-- /.col-lg-4 -->
        <?php } ?>
    </div>
</div>

<!-- Modal Subir Imagen-->
<div class="modal fade" id="modal-subir-imagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url() ?>photo/store" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Subir imagen</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="album_id" class="form-control" value="<?= $album[0]->id ?>" required>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Imagen:</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" value="" class="form-control" readonly="">
                                <span class="input-group-btn">
                                    <span id="span-btn-file" class="btn btn-primary btn-file">
                                        Seleccionar...
                                        <input id="file-photo2" name="photo" accept="image/*" name="photo" type="file" required="">
                                    </span>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Titulo:</label>
                            <input type="text"  name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descripción:</label>
                            <textarea name="description" class="form-control"></textarea>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Eliminar Imagen-->
<div class="modal fade" id="modal-eliminar-imagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url() ?>photo/delete" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar imagen</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="album_id" class="form-control" value="<?= $album[0]->id ?>" required>
                    <input type="hidden" id="photo_id" name="photo_id" class="form-control" required>
                    ¿Esta seguro de eliminar esta imagen?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
