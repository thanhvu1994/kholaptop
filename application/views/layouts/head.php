<!DOCTYPE html>
<html lang="en">

	<head>
		<title><?php echo (isset($title))? $title.' - '.$this->settings->get_param('defaultPageTitle') : $this->settings->get_param('defaultPageTitle'); ?></title>
        <meta name="description" content="<?php echo (isset($description))? $description.' - '.$this->settings->get_param('defaultPageTitle') : $this->settings->get_param('defaultPageTitle'); ?>">
		<link rel="icon" href="<?php echo base_url($this->settings->get_param('favicon')) ?>" type="image/x-icon"/>
		<link rel="shortcut icon" href="<?php echo base_url($this->settings->get_param('favicon')) ?>" type="image/x-icon"/>
		<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('themes/website/script/style5015.css?v=2.99')?>" media="all"/>
    
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,600"/>
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('themes/website/script/ie8.css')?>" media="all"/> -->
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('themes/website/script/ie8_mandison.css')?>" media="all"/>  -->
        <!--[if (gte IE 9) | (IEMobile)]><!-->
        <script src="<?php echo base_url('themes/website/script/jquery.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/script/product_view_history.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/script/common.js')?>"></script>
	</head>
	<!-- <body id="<?php echo $this->router->fetch_method(); ?>"> -->
    <body class=" cms-index-index cms-home">
       <!--  <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
		<div id="page"> -->
        <div class="wrapper">
            <div class="page">