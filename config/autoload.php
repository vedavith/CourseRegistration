<?php
spl_autoload_register('render_view');
spl_autoload_register('url');

//URL Configuration
function url()
{
       return $link = "http://localhost/CourseRegistration/";
}

function render_view($folder,$page, $data=null)
{
    $_SESSION['getData'] = $data;
    $path = '../view/'.$folder.'/'.$page.'.php';
    if(file_exists($path))
    {
        require '../view/'.$folder.'/'.$page.'.php';
    }
    else
    {
        echo "<div class='container-fluid'> <h4 style='color:red'> CourseRegistration:".$path." - FILE DOESN'T EXISTS </h4> </div>";
    }

}

function redirect_page($page,$data)
{
    echo "<script> window.location.href='".url()."src/".$page.".php?db=".$data."' </script>";
}