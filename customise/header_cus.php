<?php
$args = [
    'style'              => 'none',
    'hide_empty'         => 0,
    'exclude'            => 1,
    'separator'          => '',
];

ob_start();

wp_list_categories($args);

$customise_content_in_ob = ob_get_contents();

$arrayFromURI = explode('/', $_SERVER['REQUEST_URI']);

$search = $arrayFromURI[2];
$search = $search. '/"';

$replace = $search . ' ' ."style = 'border-bottom: 1px solid;'";

$b = str_replace('<a', '<a class="catalog_link"', $customise_content_in_ob);

ob_end_clean();

if(!empty($arrayFromURI[2])){
    echo  str_replace( $search, $replace, $b);
}else{
    echo $b;
}
?>