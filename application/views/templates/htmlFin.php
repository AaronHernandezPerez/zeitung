<!-- Libreria Jquery -->
<script src="<?php echo base_url() ?>assets/libraries/jquery/jquery-3.3.1.js"></script>
<!-- Libreria Popper -->
<script src="<?php echo base_url() ?>assets/libraries/bootstrap/popper.js"></script>
<!-- Libreria Bootstrap -->
<script src="<?php echo base_url() ?>assets/libraries/bootstrap/bootstrap.js"></script>

<?php if (isset($miJS)) foreach ($miJS as $archivo) : ?>
<!-- Mi js -->
<script src="<?php echo base_url() ?>assets/js/<?php $archivo ?>"></script>
<?php endforeach ?>
</body>

</html>