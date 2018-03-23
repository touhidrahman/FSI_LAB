<!DOCTYPE html>
<html lang="en">

    
<head>
        <title>FSI LAB</title>
        <meta name="author" content="Touhidur Rahman">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico');?>">
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/css_flyoutverticalmenu.css');?>">
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.2.min.js');?>"></script>

        <script type="text/javascript">
        	$(document).ready(function() {
        		$("#menuwrapper ul li").mouseover(function(e) {$(this).addClass(" iehover ");});
        		$("#menuwrapper ul li").mouseout(function(e) {$(this).removeClass(" iehover ");});
        	});
        </script>
        <style type="text/css">
        .nav { border: 0px; border-collapse: collapse;}
        .nav tr { padding: 2px;}
        .nav td { padding: 2px 5px;}
        .nav td:hover { background-color: #f9b9a9;}
        
        .table_style { border: solid 1px; border-collapse: collapse; }
        .table_style tr, .table_style td { border: solid 1px; padding: 5px 7px; }
        </style>
</head>

<body>

<table>
<tr>
    <td valign="middle"><img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="FSI BAF Logo" height="50"></td>
    <td valign="middle"><h1>FSI LAB</h1></td>
</tr>
</table>

<table class="nav">
    <tr>
        <td><?php echo anchor('components', ' HOME '); ?></td>
        <td><?php echo anchor('components/find', ' FIND '); ?></td>
        <td><?php echo anchor('maincats', ' TRADES '); ?></td>
        <td><?php echo anchor('majorcats', ' CATEGORIES '); ?></td>
        <td><?php echo anchor('users/logout', ' LOGOUT '); ?></td>
    </tr>
</table>
            <div>
                
                <?php
                if (! isset($module)) {
                    $module = $this->uri->segment(1);
                }
                if (! isset($view_file)) {
                    $view_file = "";
                }
                
                if (($view_file != "") && ($module != "")) {
                    $path = $module . '/' . $view_file;
                    echo $this->load->view($path);
                } else {
                	redirect(base_url());
                }
                ?>
            
            
        </div>

</body>


</html>