<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("includes/frontend/head") ?>

</head>

<body id="pagetop" style="font-family: 'Exo 2', sans-serif;">
<div class="pb-4 ml-5 mt-5 mb-2 border-bottom">
    <h4><?php echo (isset($pageheader))?  $pageheader:"SphagettiBlog"?></h4>
</div>
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
