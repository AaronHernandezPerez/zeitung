<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Awesome Font -->
  <link href="<?php echo base_url() ?>assets/libraries/fontawesome/css/all.css" rel="stylesheet">
  <!-- Css de bootstrap -->
  <link href="<?php echo base_url() ?>assets/libraries/bootstrap/bootstrap.css" rel="stylesheet">
  <?php if (isset($miCSS)) : ?>
  <!-- Mi css -->
  <link href="<?php echo base_url() ?>assets/css/<?php echo $miCSS ?>" rel="stylesheet">
  <?php endif ?>
  <!-- Ionicons -->
  <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
  <!-- Base url -->
  <?php echo "<script>const BASE_URL='" . base_url() . "';</script>" ?>
  <title><?php echo $titulo ?></title>
</head>

<body>