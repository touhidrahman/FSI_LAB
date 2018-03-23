<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
?>
</div>
        </div>
      </div>
<?php 
}
?>