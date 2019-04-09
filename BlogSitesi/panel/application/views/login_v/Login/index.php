<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("includes/head") ?>

</head>


<body class="bg-dark">

    <div id="content-wrapper">

        <div class="container-fluid">

            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content") ?>


        </div>
        <!-- /.container-fluid -->




    </div>
    <!-- /.content-wrapper -->

    </div>



    <?php $this->load->view("includes/include_scripts") ?>
    <script src='https://www.google.com/recaptcha/api.js?render=6LdycIIUAAAAAMaVlvstO7PFzztc0Fm4qxXcjPgM'></script>

</body>