<?php
function make_comp_id($table, $tag)
{
    $str_table = (string) $table;
    $str_tag = (string) $tag;
    
    if (strlen($str_table) <= 1)
    {
        $str_table = '0' . $str_table;
    }
    
    if (strlen($str_tag) == 3)
    {
        $str_tag = '0' . $str_tag;
    } 
    else if (strlen($str_tag) == 2)
    {
        $str_tag = '00' . $str_tag;
    }
    else if (strlen($str_tag) == 1)
    {
        $str_tag = '000' . $str_tag;
    }
    
    return $str_table.$str_tag;
}