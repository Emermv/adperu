<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#212121">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <meta name="description" content="AD PERU">
  <meta name="og:title" property="og:title" content="AD PERU">
  <meta name="robots" content="index, follow">
  <title><?php echo $title; ?></title>
  <link rel="icon" href="app/assets/img/logo.png" />
  <link href='app/assets/css/materialize.min.css' rel="stylesheet">
  <link href='app/assets/css/animate.css' rel="stylesheet">

  <link href='app/assets/css/md-css.css' rel="stylesheet">
  <link href='app/assets/css/app.css' rel="stylesheet">
  <link rel="manifest" href="manifest.json">
</head>
<body>

  <div class="md-layout">
    <div class="md-layout md-flex-5 md-flex-small-15 md-flex-medium-15 primary md-align-center"
      style="border-right: 1px  solid rgb(221, 13, 69);height: 100vh;">
      <a cursor="pointer" class="menu-button dark-text" onclick="toogle_dialog()"><i
          class="material-icons ">menu</i></a>
      <div class="md-layout md-flex-100 md-align-center md-vertical-align-end" >
        <ul>
          <li class="center-align">
            <a href="<?php echo $RS["LINKEDIN"]; ?>" target="_blank" class="dark-text"> <strong
                class="vertical">Linkedin</strong></a>
          </li>
          <li class="center-align">
            <a href="<?php echo $RS["INSTAGRAM"]; ?>" target="_blank" class="dark-text"> <strong
                class="vertical">Instagram &#8212;</strong></a>

          </li>
          <li class="center-align">
            <a href="<?php echo $RS["FACEBOOK"]; ?>" target="_blank" class="dark-text"><strong
                class="vertical ">Facebook &#8212;</strong></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="md-layout md-flex-95 md-flex-small-85 md-flex-medium-85">
      <main>
        <?php echo $view; ?>

      </main>
    </div>

  </div>
  <?php require $this->checkTemplate("template/dialog-menu");?>

</body>
<script src="app/assets/js/materialize.min.js"></script>
<script src="app/assets/js/app.js"></script>
</html>