<?php 

require 'functions.php';

$site="https://www.kendrascott.com/jewelry/";
$html = curl($site);



$idom = new DOMDocument();
@$idom->loadHTML($html);
$ixpath = new DOMXPath($idom);

$imgs = $ixpath->evaluate('//*[@id="product-search-results"]/div[4]/div[3]/div[2]/div/div/div/div[1]/div[1]/a[1]/img');

$names = $ixpath->evaluate('//*[@id="product-search-results"]/div[4]/div[3]/div[2]/div/div/div/div[2]/div[2]/a');



$prices = $ixpath->evaluate('//*[@id="product-search-results"]/div[4]/div[3]/div[2]/div/div/div/div[2]/div[3]/div/span/span/span');


$data=array();

for($i=0;$i<$imgs->length;$i++){
    $ele=array();
    //$ab = array();
    $ele['name']=trim($names[$i]->textContent);
    $ele['img']=trim($imgs[$i]->getAttribute('src'));
    $ele['price']=trim($prices[$i]->textContent);
    array_push($data,$ele);
}
$array['jewlers']=$data;

header('Content-Type: application/json; charset=utf-8');
echo json_encode($array);

/*
$ids = $ixpath->evaluate('//*[@id="mw-content-text"]/div/table[1]/tbody/tr/td[1]');
$data=array();

foreach ($ids as $id) {
    $ele=array();
    $ele['code']=trim($id->textContent);
    array_push($data,$ele);
}
$array['ids']=$data;



$imgs = $ixpath->evaluate('//*[@id="mw-content-text"]/div/table[1]/tbody/tr/td[2]/a/img');

$data=array(); 

foreach($imgs as $img)
{
    $ele=array();
    $ele['img']=trim($img->getAttribute('src'));
    array_push($data,$ele);
}
$array['imgs']=$data;




$names = $ixpath->evaluate('//*[@id="mw-content-text"]/div/table[1]/tbody/tr/td[3]/a');

$data=array();
foreach($names as $name)
{
    $ele=array();
    $ele['name']=trim($name->textContent);
    array_push($data,$ele);
}
$array['names']=$data;




*/
// $data=array();
// foreach ($ids as $id) {
//     $ele=array();
//     $ele['code']=trim($id->textContent);
//     array_push($data,$ele);
// }
// $array['ids']=$data;


//nodeValue
// getAttribute('value')
/*
$array=array();
for ($i = 0; $i < $options->length; $i++) 
{
   
   $option=$options->item($i);
   $ele=array();
   $ele['code']=trim($option->getAttribute('value'));
   array_push($data,$ele);
}
$array['currencies']=$data;
*/
