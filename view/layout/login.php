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
        <style media="screen" type="text/css">
            html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; 
      }
            .container {
        width: 300px;
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; 
        -webkit-border-radius: 10px 10px 10px 10px;
           -moz-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

	  .login-form {
		margin-left: 65px;
	  }
	
	  legend {
		margin-right: -50px;
		font-weight: bold;
	  	color: #404040;
	  }
            </style>
        
    </head>
    <body>
        <div class="container">
            <?php
            include $this->content;
            ?>
        </div>
    </body>
</html>