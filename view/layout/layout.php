
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $this->title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/custom-layout.css" rel="stylesheet" media="screen">
        <script src="js/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
              <div class="container">
                <a class="brand" href="#">Reportel</a>
                <ul class="nav">
                  <li class="active"><a href="#">Buscar</a></li>
                  <li><a href="#about">Reportar</a></li>
                  <li><a href="#contact">Mi cuenta</a></li>
                </ul>
              </div>
            </div>
      </div>
        <div class="container">
            
            <?php
            include $this->content;
            ?>
        </div>
        
    </body>
</html>
