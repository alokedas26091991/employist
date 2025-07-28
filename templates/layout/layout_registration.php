<!DOCTYPE HTML>
<html>
<head>
<title> Admin Panel | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
 <!-- Bootstrap Core CSS -->
 <?=$this->Html->css(['/admin_template/vendors/bootstrap/dist/css/bootstrap.min','/admin_template/vendors/font-awesome/css/font-awesome.min','/admin_template/vendors/nprogress/nprogress','/admin_template/animate.css/animate.min','/admin_template/build/css/custom.min']);?>
<?=$this->fetch('scriptTop');?>
<!-- jQuery -->

<!-- lined-icons -->

<!-- //lined-icons -->

<!--clock init-->
</head> 
 <body class="login">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
     <?= $this->fetch('content') ?>					
<!--js -->

<?=$this->fetch('scriptBottom');?>
</body>
</html>