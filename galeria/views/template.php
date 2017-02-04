<!DOCTYPE html>
<html>
    <head>
        <title>Titulo do Site</title>

        <link href="<?php echo BASE_URL; ?>/assets/css/style.css" rel="stylesheet"/>

    </head>
    <body>    

        <?php $this->loadViewInTemplate($viewName, $viewData); ?>

    </body>
</html>
