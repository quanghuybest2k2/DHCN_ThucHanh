<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <?php
  echo "Tên máy tính: " . gethostbyaddr($_SERVER['REMOTE_ADDR']);
  echo "<br/>";
  echo $_SERVER['PHP_SELF'];
  echo "<br>";
  echo "Tên miền: " . $_SERVER['SERVER_NAME'];
  echo "<br>";
  echo "HTTP_HOST có cổng đằng sau còn server name chỉ là cái tên: " . $_SERVER['HTTP_HOST'];
  echo "<br>";
  if (isset($_SERVER['HTTP_REFERER'])) {
    echo $_SERVER['HTTP_REFERER'];
  }
  echo "<br>";
  echo $_SERVER['HTTP_USER_AGENT'];
  echo "<br>";
  echo $_SERVER['SCRIPT_NAME'];
  echo "<hr/>";
  echo 'Current script owner: ' . get_current_user();
  echo "<hr/>";
  $url = 'https://www.w3resource.com/php-exercises/php-basic-exercises.php';

  $url = parse_url($url);

  echo 'Scheme : ' . $url['scheme'] . "\n";

  echo 'Host : ' . $url['host'] . "\n";

  echo 'Path : ' . $url['path'] . "\n";
  ?>
</body>

</html>