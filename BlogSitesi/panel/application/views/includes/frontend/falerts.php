<?php


$alert = $this->session->userdata("falert");


if (!empty($alert)) {
    if ($alert['type'] === "success") {

        ?>
        <script>
            iziToast.success({
                title: '<?php echo (empty($alert['title']))? "Başarılı":$alert['title']?>',
                message: '<?php echo $alert['message']?>',
                position: 'topCenter'
            });
        </script>
    <?php } elseif ($alert['type'] === "info") { ?>
        <script>
            iziToast.info({
                title: '<?php echo (empty($alert['title']))? "Bilgilendirme":$alert['title']?>',
                message: '<?php echo $alert['message']?>',
                position: 'topCenter'
            });
        </script>

    <?php } elseif ($alert['type'] === "warning") {
        ?>
        <script>
            iziToast.warning({
                title: '<?php echo (empty($alert['title']))? "Uyarı":$alert['title'] ?>',
                message: '<?php echo $alert['message']?>',
                position: 'topCenter'
            });
        </script>
    <?php }else{ ?>
        <script>
            iziToast.warning({
                title: '<?php echo (empty($alert['title']))? "Başarısız":$alert['title']?>',
                message: '<?php echo $alert['message']?>',
                position: 'topCenter'
            });
        </script>
    <?php } ?>
<?php }


?>