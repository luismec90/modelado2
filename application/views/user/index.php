<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuarios</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<table class="table">
    <tr>
        <td>
            Nombre
        </td>
        <td>
            Correo
        </td>
        <td>
            Opciones
        </td>
    </tr>
    <?php foreach ($users as $user) {
        if ($_SESSION["idUsuario"] != $user->id) {
            ?>
            <tr>
                <td>
                    <?= $user->first_name . " " . $user->last_name ?>
                </td>
                <td>
                    <?= $user->email ?>
                </td>
                <td>
                    <a class="btn btn-primary" href="<?= base_url() ?>users/<?= $user->id ?>"> Ver álbumes</a>
                </td>
            </tr>
        <?php
        }
    }
    ?>
</table>

