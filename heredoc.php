<html>
<head>
  <?php
  $number = 10;
  $text = 'This is a text';
  $bool = 'true';

  echo '<script>';
  echo <<<JS
        var obj = {
            number: {$number},
            text: "{$text}",
            bool: {$bool},
        };
JS;
  echo '</script>';
  ?>
</head>
</html>
