<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("includes/frontend/head") ?>
    <link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/login.css")?>">
</head>

<body id="pagetop" style="font-family: 'Exo 2', sans-serif;">

<!-- Navigation -->

<?php $this->load->view("includes/frontend/nav") ?>

<!-- fixed-top -->
<!-- Page Content -->


    <div class="container-fluid mt-5">
        <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content") ?>
    </div>


<!-- /.container -->
<!-- Footer -->

<?php $this->load->view("includes/frontend/footer") ?>
<a class="scroll-to-top rounded" href="">
    <i class="fa fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript -->

<?php $this->load->view("includes/frontend/scripts") ?>
<script src="<?php echo base_url("assets/frontend/js/login.js")?>"></script>
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
