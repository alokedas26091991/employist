<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="1EKgFy0MVtcT7RbeNTLykDke83u1mRTdwLhAr9yyDPs" />
    <title>The Aryan Group</title>
    <link href="<?php echo $this->Url->image("assets/img/logo_ma1in.png", ['pathPrefix' => '']) ?>" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="icon" href="/assets/images/favicon.png">
 
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <?= $this->Html->css(['/admin_template/css/bootstrap.min', '/admin_template/style', '/admin_template/css/responsive', '/admin_template/css/colors', '/admin_template/css/bootstrap-select', '/admin_template/css/perfect-scrollbar', "/admin_template/css/custom"]); ?>
    <?= $this->fetch('scriptTop'); ?>
</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <?= $this->element('header') ?>
            <div id="content">
                <?= $this->element("topnav") ?>
                <div class="midde_cont">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
                <?= $this->element('footer') ?>
            </div>
        </div>
    </div>
</body>

<?= $this->Html->script(['/admin_template/js/jquery.min', '/admin_template/js/popper.min', '/admin_template/js/bootstrap.min', '/admin_template/js/animate', '/admin_template/js/bootstrap-select', '/admin_template/js/owl.carousel', '/admin_template/js/Chart.min', '/admin_template/js/Chart.bundle.min', '/admin_template/js/utils', '/admin_template/js/analyser', '/admin_template/js/perfect-scrollbar.min', '/admin_template/js/custom.min']); ?>
<?= $this->fetch('scriptBottom'); ?>

</html>
<script>
    var ps = new PerfectScrollbar('#sidebar');
</script>
<?= $this->Html->script(['/admin_template/js/chart_custom_style1', '/admin_template/js/activity.js', "/admin_template/js/custom"]) ?>