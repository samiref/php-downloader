<?php 
define('UNZIP' , false);

$remoteUrl = 'https://wordpress.org/latest.zip';

$filename = basename($remoteUrl);

$ext = end(explode('.', $filename));
$size = file_put_contents($filename , fopen($remoteUrl,'r'));

echo 'FileName : ' . $filename . PHP_EOL;
echo 'Ext : ' . $ext . PHP_EOL;
echo $size . ' Bytes Read' . PHP_EOL;

if(defined('UNZIP') && UNZIP == true && strtolower($ext) === 'zip')
{
  $zip = new ZipArchive;
  $res = $zip->open($filename);
  if ($res === TRUE) 
  {
    $zip->extractTo('.');
    $zip->close();
    echo 'Unzip SUCCESS' . PHP_EOL;
  } 
  else 
  {
    echo 'Unzip ERROR' . PHP_EOL;
  }
}
