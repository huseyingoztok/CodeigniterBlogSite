<?php


$alert=$this->session->userdata("alert");

 if(!empty($alert)) {
    if ($alert['type']==="success"){

        ?>
        <script>
            iziToast.success({
                title: '<?php echo $alert['title']?>' ,
                message: '<?php echo $alert['message']?>' ,
                position:'topCenter'
            });
        </script>
    <?php }else{?>
        <script>
            iziToast.error({
                title: '<?php echo $alert['title']?>' ,
                message: '<?php echo $alert['message']?>' ,
                position:'topCenter'
            });
        </script>
    <?php } ?>
<?php }



?>