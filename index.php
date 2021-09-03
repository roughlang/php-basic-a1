<?php
require 'vendor/autoload.php';

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;


// ロガー作成
$logger = new Logger('sample');
$logger->pushHandler(new StreamHandler('logs/sample.log', Logger::INFO));
$logger->info('information log');

// スクレイピング
$url = "http://adult-gazou.me/sm%E3%83%97%E3%83%AC%E3%82%A4/25274";
$url = "https://www.google.com/search?q=%E7%B7%8A%E7%B8%9B%20SM%20%E9%9E%AD&tbm=isch&tbs=isz:l&hl=ja&sa=X&ved=0CAIQpwVqFwoTCICuxNTo4PICFQAAAAAdAAAAABAJ&biw=1440&bih=763#imgrc=KWF7ZjWgU8g1bM";
$url = "https://tv.rakuten.co.jp/adult/content/200921/";
$url = "http://adult-gazou.me/sm%e3%83%97%e3%83%ac%e3%82%a4/27755";
$url = "http://adult-gazou.me/sm%e3%83%97%e3%83%ac%e3%82%a4/27198";
$url = "http://adult-gazou.me/sm%e3%83%97%e3%83%ac%e3%82%a4/26924";
$url = "http://adult-gazou.me/%e3%82%bb%e3%83%83%e3%82%af%e3%82%b9/22713";
$url = "http://adult-gazou.me/%e3%82%bb%e3%83%83%e3%82%af%e3%82%b9/22380";

$html = file_get_contents($url);
// $html = tidy_repair_string($html, ['indent' => true], 'utf8');

$out = preg_match_all('/<img.*?src=(["\'])(.+?)\1.*?>/i', $html, $images);
foreach ($images as $image_url) {
  // var_dump($image_url[1]);
  foreach ($image_url as $key=>$val) {
    if (!empty($val)) {
      
      $data = @file_get_contents($val);
      

      if (!empty($data)) {
        $filename = mt_rand(1111,9999).uniqid().".jpg";
        file_put_contents('./download/'.$filename,$data);
        echo $val."\n";
        sleep(1);
        // 
        $imagesize = getimagesize("./download/".$filename);
        echo $imagesize[0]."\n";
        echo $imagesize[1]."\n";
        if ($imagesize[0] < 680 || $imagesize[1] < 680) {
          unlink("./download/".$filename);
        }
      }
    }
  }
}




