<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP　Prototype001</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            div {
                /*border: 1px solid #000;*/
            }
            .tmp1 button {
                width: 50%;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <span class="navbar-brand">タイトル</span>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#">メニュー１</a></li>
                        <li><a href="#">メニュー１</a></li>
                        <li><a href="#">メニュー１</a></li>
                    </ul>
                    <div class="nav navbar-right">
                        <span class="navbar-text">ユーザ名</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="btn-group" style="width:100%;">
                <button class="btn btn-default active">メニュー１</button>
                <button class="btn btn-default">メニュー１</button>
                <button class="btn btn-default">メニュー１</button>
            </div>
        </div>
        
        <div class="container tmp1">
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-default btn-lg center-block">メニュー１</button>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-default btn-lg center-block">メニュー２</button>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-default btn-lg center-block">メニュー３</button>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        
        <script type="text/javascript">
            
        </script>
    </body>
</html>
