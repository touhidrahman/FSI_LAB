<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>FSI Lab</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/css/signin.css">
        <script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
    </head>
    <body>
        
<div class="container">

      
    
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
    
    
    

        <script src="<?php base_url();?>/js/plugins.js"></script>
        <script src="<?php echo base_url();?>/js/main.js"></script>
    </body>
</html>
