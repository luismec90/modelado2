<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Álbumes</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div id="div-albumes" class="row">
    <?php foreach ($albumes as $album) { ?>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?= $album->name ?>
                    <?php if($_SESSION["idUsuario"]==$album->user_id) {?><span data-album-id="<?= $album->id ?>"
                                              class="btn-eliminar-album glyphicon glyphicon-trash pull-right"
                                              aria-hidden="true" href="#"></span>
                    <?php } ?>
                </div>
                <div class="panel-body">
                    <?php foreach ($album->photos as $photo) { ?>
                        <div class="col-lg-4 margin-top">
                            <a href="<?= base_url() . $photo->location ?>" class="images">
                                <img src="<?= base_url() . $photo->location ?>"
                                     class="img-thumbnail img-responsive">
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    Total fotos: <?= sizeof($album->photos) ?>
                    <?php if($_SESSION["idUsuario"]==$album->user_id) {?>
                         <a class="pull-right" href="<?= base_url() . "album/show/$album->id" ?>">Ver álbum</a>
                    <?php }else{ ?>
                        <a class="pull-right" href="<?= base_url() . "users/{$album->user_id}/album/$album->id" ?>">Ver álbum</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /.col-lg-4 -->
    <?php } ?>
</div>

<!-- Modal Eliminar Album-->
<div class="modal fade" id="modal-eliminar-album" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url() ?>album/delete" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar álbum</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="album_id" name="album_id" class="form-control" required>
                    ¿Esta seguro de eliminar este álbum?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
