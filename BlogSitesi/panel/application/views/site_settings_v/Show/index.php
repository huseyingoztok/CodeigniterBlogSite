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

            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content") ?>


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
    <script src="<?php echo base_url("assets") ?>/ckeditor/ckeditor.js"></script>


    <script>
        $(document).ready(function () {
            var editor = CKEDITOR.instances['content'];
            if (editor) {
                editor.destroy(true);
            }

            CKEDITOR.replace('content', {

                enterMode: CKEDITOR.ENTER_BR,
                //extraPlugins: 'imageuploader',

                extraPlugins : 'syntaxhighlight',
                toolbar: [
                    ['Source','-','Save','NewPage','Preview','-','Templates'] ,

                    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
                    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
                    '/',['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
                    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],['Link','Unlink','Anchor'],
                    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],'/',
                    ['Styles','Format','Font','FontSize'],['TextColor','BGColor'],['Maximize', 'ShowBlocks','-','About'],
                    ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About'] ,
                    ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About'] ,
                    ['Syntaxhighlight']
                ]

            });

        });


    </script>


</body>