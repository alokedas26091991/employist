<!DOCTYPE HTML>
<html>
<head>
<title> Admin Panel | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<?= $this->Html->css(['/admin_template/css/bootstrap.min', '/admin_template/style', '/admin_template/css/responsive', '/admin_template/css/colors', '/admin_template/css/bootstrap-select', '/admin_template/css/perfect-scrollbar', "/admin_template/css/custom"]); ?>
<?=$this->fetch('scriptTop');?>
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->

<!-- //lined-icons -->

<!--clock init-->
</head> 
<body>
								<!--/login-->
								
									
									<?= $this->Flash->render() ?>
								
									<?= $this->fetch('content') ?>
									
									   
						
										 
									<!--footer section end-->
									<!--/404-->
<!--js -->
<?= $this->Html->script(['/admin_template/js/jquery.min', '/admin_template/js/popper.min', '/admin_template/js/bootstrap.min', '/admin_template/js/animate', '/admin_template/js/bootstrap-select', '/admin_template/js/owl.carousel', '/admin_template/js/Chart.min', '/admin_template/js/Chart.bundle.min', '/admin_template/js/utils', '/admin_template/js/analyser', '/admin_template/js/perfect-scrollbar.min', '/admin_template/js/custom']); ?>
<?=$this->fetch('scriptBottom');?>
</body>
</html>