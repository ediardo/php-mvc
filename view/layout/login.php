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

        .form-signin,.form-signup {
          
          padding: 19px 29px 29px;
          margin: 0 auto 20px;
          background-color: #fff;
          border: 1px solid #e5e5e5;
          -webkit-border-radius: 5px;
             -moz-border-radius: 5px;
                  border-radius: 5px;
          -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
             -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                  box-shadow: 0 1px 2px rgba(0,0,0,.05);
        }
        .form-signin{
            max-width: 300px;
        }
        .form-signup{
            max-width: 550px;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
          margin-bottom: 10px;
        }
        .form-signin input[type="text"],
        .form-signin input[type="password"] {
          font-size: 16px;
          height: auto;
          margin-bottom: 15px;
          padding: 7px 9px;
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