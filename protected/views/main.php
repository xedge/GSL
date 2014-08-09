<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        
        -->
        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
        <!-- whitelabel CSS framework! -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/whitelabel/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/whitelabel/css/light/theme.css"/>
        
        <!-- some basic functions -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/functions.js"></script>
		
	<!-- all Third Party Plugins and Whitelabel Plugins -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/plugins.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/editor.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/calendar.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/flot.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/elfinder.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/datatables.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Alert.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Autocomplete.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Breadcrumb.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Calendar.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Chart.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Color.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Date.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Editor.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_File.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Fileexplorer.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Form.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Gallery.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Multiselect.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Number.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Password.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Slider.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Store.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Time.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Valid.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/wl_Widget.js"></script>
	
	<!-- configuration to overwrite settings -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/config.js"></script>
		
	<!-- the script which handles all the access to plugins etc... -->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	
		
	<!-- header -->
        <header>
            <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
            <div id="header">
            <ul id="headernav">
                <li>
                    <ul>
                        <li><?php echo CHtml::link('Home',array('site/index'))?></li>
                        <li><?php echo CHtml::link('Login',array('site/login'))?></li>
                    </ul>
                </li>
            </ul>
            </div>
            <!-- mainmenu -->
        </header>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
