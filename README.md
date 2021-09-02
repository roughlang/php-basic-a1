# php-basic-a1
PHP7 + composer basic develop environment.


## composer install

1. git clone
```
$ git clone https://github.com/roughlang/php-basic-a1
```

2. composer install
https://getcomposer.org/download/
```
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
$ php composer-setup.php
$ php -r "unlink('composer-setup.php');"
```

3. create composer.json
```
$ touch composer.json
```
Write down the most basic line as follows. This time monolog.
```
{
  "require": {
    "monolog/monolog": "1.0.*"
  }
}
```


4. composer install
```
$ php composer.phar install
```


## use package from composer

1. make a sample file of php.
```
$ touch index.php
$ echo "<?php" >> index.php
$ echo "require 'vendor/autoload.php';" >> index.php
```

2. use monolog
```
<?php
require 'vendor/autoload.php';

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

// ロガー作成
$logger = new Logger('sample');
$logger->pushHandler(new StreamHandler('logs/sample.log', Logger::INFO));
$logger->info('information log');
```

3. exec index.php and see "information log" on logs/sample.log with datetime. 
