<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("includes/head") ?>

</head>


<body id="page-top">
    <?php $this->load->view("includes/nav") ?>
    <?php $this->load->view("includes/sidebar") ?>
    <div id="content-wrapper">

        <div class="container-fluid">

            <?php $this->load->view("{$viewFolder}/content") ?>


        </div>
        <!-- /.container-fluid -->


        <?php $this->load->view("includes/footer") ?>

    </div>
    <!-- /.content-wrapper -->

    </div>


    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php $this->load->view("includes/logoutmodal") ?>
    <?php $this->load->view("includes/include_scripts") ?>
</body>