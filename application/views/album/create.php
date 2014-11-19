<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Crear álbum</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <form action="<?= base_url() ?>album/store" method="POST" role="form">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input name="name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
