<?php?>
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
        <!-- whitelabel CSS framework! -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/whitelabel/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/whitelabel/css/light/theme.css" id="themestyle"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/redmond/jquery-ui-1.8.16.custom.css" id="themestyle"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/themes/lightcolor/blue/jtable.css" id="themestyle"/>
        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
        
        <!-- some basic functions -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/functions.js"></script>
		
	<!-- all Third Party Plugins and Whitelabel Plugins -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/plugins.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/editor.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/calendar.js"></script>
        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/gcal.js"></script>-->
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
        <!-- the script which handles all the access to plugins etc... 
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/whitelabel/js/script.js"></script>-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/jtable.2.4.0/jquery-ui-1.8.16.custom.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/jtable.2.4.0/jquery.jtable.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/currencyFormat.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
    <body>
        <div id="pageoptions">

        </div>
        
        <header>
            <div id="logo">
                logo here
            </div>
            
            <div id="header"> 
                <!--<ul id="headernav">
                    <li>
                        <ul class>
                            <li><?php /*echo CHtml::link('Home',array('user/index')) ?></li>
                            <?php if (Yii::app()->user->isGuest):
                                ?>
                            <li><?php echo CHtml::link('Login',array('user/login') )?></li>
                            <?php
                            else :
                            ?>
                            
                            <li><?php echo CHtml::link('Logout',array('user/logout'),array('display'=>!Yii::app()->user->isGuest)) ?></li>
                            <?php endif */?>
                        </ul>
                    </li>
                </ul>
            </div>-->
        </header>
        
        <nav>
            <ul id="nav">
                <?php if(Yii::app()->user->roles=='Super Admin'): ?>
                <li class="i_admin_user"><?php echo CHtml::link(CHtml::tag('span',array(),"Index"),array('user2/index')) ?></li>
                <li class="i_user"><?php echo CHtml::link(CHtml::tag('span',array(),"Create User"),array('user2/create')) ?></li>
                <li class="i_users"><?php echo CHtml::link(CHtml::tag('span',array(),"Manage User"),array('user2/manage')) ?></li>
                <?php elseif(Yii::app()->user->roles=='Marketing'):
                ?>
                <li class="i_user"><?php echo CHtml::link(CHtml::tag('span',array(),"Create Buyer"),array('buyer/create')) ?></li>
                <li class="i_user"><?php echo CHtml::link(CHtml::tag('span',array(),"Manage Buyer"),array('buyer/manage')) ?></li>
                <li class="i_create_write"><?php echo CHtml::link(CHtml::tag('span',array(),"Create Order"),array('sps/create')) ?></li>
                <li class="i_create_write"><?php echo CHtml::link(CHtml::tag('span',array(),"View Order"),array('sps/viewpayment')) ?></li>
                <li class="i_create_write"><?php echo CHtml::link(CHtml::tag('span',array(),"Create Customer"),array('exhibition/createcustomer')) ?></li>
                <li class="i_create_write"><?php echo CHtml::link(CHtml::tag('span',array(),"View Customer"),array('exhibition/viewcus')) ?></li>
                <?php elseif(Yii::app()->user->roles=='Admin'): ?>
                <li class="i_create_write"><?php echo CHtml::link(CHtml::tag('span',array(),"View Order"),array('sps/viewpayment')) ?></li>
                <li class="i_create_write"><?php echo CHtml::link(CHtml::tag('span',array(),"Send Notification"),array('blastemail/index')) ?></li>
                <?php elseif(Yii::app()->user->roles=='Marketing Manager'):?>
                <li class="i_create_write"><?php echo CHtml::link(CHtml::tag('span',array(),"View Order"),array('sps/viewpayment')) ?></li>
                    <?php 
                else: 
                    ?>
                <li class="i_house"><?php echo CHtml::link(CHtml::tag('span',array(),"Form SPS"),array('user/formsps')) ?></li>
                <li class="i_house"><?php echo CHtml::link(CHtml::tag('span',array(),"Report"),array('user/export')) ?></li>
                <li class="i_house"><?php echo CHtml::link(CHtml::tag('span',array(),"Create User"),array('user/create')) ?></li>
                <li class="i_house"><?php echo CHtml::link(CHtml::tag('span',array(),"Manage User"),array('user/admin')) ?></li>
                <?php endif;?>
                <li><?php echo CHtml::link(CHtml::tag('span',array(),'Master Stock'),array('masterstock/index'))?></li>
                <li><?php echo CHtml::link(CHtml::tag('span',array(),'Logout'),array('user/logout'))?></li>
            </ul>
        </nav>
        
        <section id="content">
            <?php echo $content; ?>
        </section>
        
        <footer></footer>
    </body>
</html>


