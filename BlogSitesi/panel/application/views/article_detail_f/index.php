<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("includes/frontend/head") ?>
    <script type="text/javascript" src="<?php echo base_url("assets")?>/ckeditor/plugins/syntaxhighlight/scripts/shCore.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets")?>/ckeditor/plugins/syntaxhighlight/scripts/shLegacy.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets")?>/ckeditor/plugins/syntaxhighlight/scripts/shAutoloader.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets")?>/ckeditor/plugins/syntaxhighlight/scripts/shBrushCss.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets")?>/ckeditor/plugins/syntaxhighlight/scripts/shBrushJava.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets")?>/ckeditor/plugins/syntaxhighlight/scripts/shBrushJScript.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets")?>/ckeditor/plugins/syntaxhighlight/scripts/shBrushPhp.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets")?>/ckeditor/plugins/syntaxhighlight/scripts/shBrushPlain.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets")?>/ckeditor/plugins/syntaxhighlight/scripts/shBrushSql.js"></script>
    <link href="<?php echo base_url("assets")?>/ckeditor/plugins/syntaxhighlight/styles/shCoreDefault.css" rel="stylesheet" />
    <link href="<?php echo base_url("assets")?>/ckeditor/plugins/syntaxhighlight/styles/shCoreDefault.css" rel="stylesheet" />
    <link href="<?php echo base_url("assets/frontend")?>/css/comment.css" rel="stylesheet" />
    <script type="text/javascript">

        SyntaxHighlighter.all();
    </script>


</head>

<body id="pagetop" style="font-family: 'Exo 2', sans-serif;">


<!-- Navigation -->

<?php $this->load->view("includes/frontend/nav") ?>

<!-- fixed-top -->
<!-- Page Content -->


    <div class="container-fluid mt-5">
        <?php $this->load->view("{$viewFolder}/content") ?>
    </div>


<!-- /.container -->
<!-- Footer -->

<?php $this->load->view("includes/frontend/footer") ?>
<a class="scroll-to-top rounded" href="">
    <i class="fa fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript -->

<?php $this->load->view("includes/frontend/scripts") ?>

<script type="text/javascript">
    var pageTitle = $("title").text();
    // Change page title on blur
    $(window).blur(function () {
        $("title").text("❤ Bizi Unutma!!! ");
    });
    // Change page title back on focus
    $(window).focus(function () {
        $("title").text(pageTitle);
    });
</script>
</body>

</html>
