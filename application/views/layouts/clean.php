<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lang') ?>">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="rmlJ3C4AIh0ruwJsEG0wLRkWhXNZ7SSAZth51NgTw8o" />
    <?php echo $template['metas']; ?>
       <link rel="icon" href="<?php echo base_url('assets/img/favicon.ico') ?>" type="image/x-icon"/>
        <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico') ?>" type="image/x-icon"/>

    <title><?php echo $template['title']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo bower_url('bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

     <!-- Font Awesome -->
    <link href="<?php echo bower_url('font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo css_url('util.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo css_url('main.css') ?>">
<!--===============================================================================================-->
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WHCE0WXH9S"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WHCE0WXH9S');
</script>
<body style="background-color: #666666;">

	<!-- <div class="container"> -->
		<?php echo $template['content']; ?>
	<!-- </div> -->

  </body>
</html>
