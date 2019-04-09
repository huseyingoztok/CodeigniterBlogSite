<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">


<?php if (isset($openGraph)) {?>
    <meta property="og:title" content="<?php echo $article->title ?>">
    <meta property="og:descrption" content="<?php echo strip_tags(substr($article->content,50)) ?>">
    <meta property="og:image" content="<?php echo base_url("uplads/articles_v/$article->image_url") ?>">
<?php } ?>

<title>
    <?php echo (isset($pageTitle))?  $pageTitle:getSettings()->site_name?>
</title>

<link rel="shortcut icon" type="image/png" href="<?php echo base_url("uploads/settings_v/".getSettings()->favicon)?>"/>
<link href="<?php echo base_url("assets/frontend")?>/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url("assets/frontend")?>/css/sitelogo.css" rel="stylesheet" />


<link href="<?php echo base_url("assets/frontend")?>/css/shop-homepage.css" rel="stylesheet" />
<link href="<?php echo base_url("assets/frontend")?>/css/font-awesome.min.css" rel="stylesheet" />
<link href="<?php echo base_url("assets/frontend")?>/css/MLevelCategory.css" rel="stylesheet" />
<link href="<?php echo base_url("assets/frontend")?>/css/bootstrap-social.css" rel="stylesheet" />

<link href="<?php echo base_url("assets/frontend")?>/css/card.css" rel="stylesheet" />
<link href="<?php echo base_url("assets")?>/css/iziToast.min.css" rel="stylesheet" />




<link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa|Exo:400,600i|Gugi|Rajdhani:700|Jura:500:Armata|Prosto+One|Merienda|Glegoo|Titillium+Web|Monoton|Oxygen|Exo+2" rel="stylesheet">
