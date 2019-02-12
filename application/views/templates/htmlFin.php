<!-- Libreria Jquery -->
<script src="<?php echo base_url() ?>assets/libraries/jquery/jquery-3.3.1.js"></script>
<!-- Libreria Popper -->
<script src="<?php echo base_url() ?>assets/libraries/bootstrap/popper.js"></script>
<!-- Libreria Bootstrap -->
<script src="<?php echo base_url() ?>assets/libraries/bootstrap/bootstrap.js"></script>
<!-- Navbar active enlaces -->
<script src="<?php echo base_url() ?>assets/js/navbar-activo.js"></script>
<?php //print_r($miJS) ?>
<?php if (isset($miJS)) foreach ($miJS as $archivo) : ?>
<!-- Mi js -->
<script src="<?php echo base_url() ?>assets/<?php echo $archivo ?>"></script>
<?php endforeach ?>
</body>

</html>