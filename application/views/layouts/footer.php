</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php if ($this->session->flashdata('mensaje')) { ?>
    <div id="toast-container" class="toast-top-center">
        <div class="toast toast-<?= $this->session->flashdata('tipo') ?>">
            <div class="toast-message"><?= $this->session->flashdata('mensaje') ?></div>
        </div>
    </div>
<?php } ?>

<!-- jQuery -->
<script src="<?= base_url() ?>public/assets/libs/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url() ?>public/assets/libs/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= base_url() ?>public/assets/libs/metisMenu/metisMenu.min.js"></script>

<!-- Abigimage JavaScript -->
<script src="<?= base_url() ?>public/assets/libs/abigimage.jquery.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= base_url() ?>public/assets/libs/sb-admin-2.js"></script>

<!-- Global JavaScript -->
<script src="<?= base_url() ?>public/assets/js/global.js"></script>

</body>

</html>
