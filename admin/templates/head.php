<!DOCTYPE html>
<html lang="ru">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Administrator Panel</title>

  <link href="<?php echo $admin_templates; ?>assets/css/sb-admin.css" rel="stylesheet">
  <link href="<?php echo $admin_templates; ?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo $admin_templates; ?>assets/css/admin.css" rel="stylesheet">
  <script src="<?php echo $admin_templates; ?>assets/scripts/jquery.js"></script>
        <!--script src="templates/scripts/form.js"></script-->
  <script src="<?php echo $admin_templates; ?>assets/scripts/popper.js"></script>
  <script src="<?php echo $admin_templates; ?>assets/scripts/bootstrap.js"></script>
  <script src="<?php echo $admin_templates; ?>assets/scripts/core.js"></script>

</head>
<body class="fixed-nav sticky-footer bg-dark">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
                <a class="navbar-brand" href="/admin/"><?php echo "$a_head"?></a>

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                      <li class="nav-item">
                        <a class="nav-link" href="user.php">
                            <i class="fa fa-user-circle-o"></i>
                            <span class="nav-link-text"><?php echo $_SESSION['userName']; ?></a></span>
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=add">
                            <i class="fa fa-fw fa-plus"></i>
                            <span class="nav-link-text">Add a publication</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                            <i class="fa fa-sign-out"></i>
                            <span class="nav-link-text">Exit</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
         <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>&copy; WEB Open Source CMS 2020</small>
                    </div>
                </div>
            </footer>

    </body>
</html>
