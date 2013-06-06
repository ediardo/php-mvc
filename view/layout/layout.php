<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Reportel - <?php echo $this->title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/custom-layout.css" rel="stylesheet" media="screen">
        <script src="js/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        

        
        <div class="container">
            <div class="navbar navbar-static-top navbar-inverse">
                <div class="navbar-inner">
                <a class="brand" href="#">Reportel</a>
                    <ul class="nav">
                        <li><a href="#">Buscar numero</a></li>
                        <li><a href="index.php?controller=reports&action=add">Denunciar</a></li>
                        <li><a href="index.php?controller=users&action=index">Mi cuenta</a></li>
                    </ul>
                </div>
            </div>
            <?php
            include $this->content;
            ?>
        </div>
        
        
        <div class="footer"><p class="text-center">asd</p></div>
        
    </body>
</html>
