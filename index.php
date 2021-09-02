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
$html = file_get_contents($url);
// $html = tidy_repair_string($html, ['indent' => true], 'utf8');

$out = preg_match_all('/<img.*?src=(["\'])(.+?)\1.*?>/i', $html, $images);
foreach ($images as $image_url) {
  // var_dump($image_url[1]);
  foreach ($image_url as $key=>$val) {
    if (!empty($val)) {
      echo $val."\n";
      $data = file_get_contents($val);

      if (!empty($data)) {
        $filename = mt_rand(1111,9999).".jpg";
        file_put_contents('./download/'.$filename,$data);
        sleep(1);
      }
    }
  }
}



// var_dump($images);


// var_dump($html);

/**
 * 
 * useしなくてもよい
 * url: https://packagist.org/packages/electrolinux/phpquery
 */

// $html_object = phpQuery::newDocument(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
// $targets = $html_object['body'];
// var_dump($targets);
// foreach($targets as $val) {
//   // pq()メソッドでオブジェクトとして再設定しつつさらに下ってhrefを取得
//   // echo pq($val)->find('a')->attr('href').PHP_EOL;
//   // echo pq($val);
//   echo pq($val)
//     ->find('div');
// }
// var_dump($h2s);

// echo PhpQuery::newDocument($html)->find("h1")->text();
// $get =  phpQuery::newDocument(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'))
//           ->find('.article')
//           ->find('a')
//           ->trait_exists();

// foreach($get as $item) {
//   var_dump($item);
// }
// var_dump($get);




