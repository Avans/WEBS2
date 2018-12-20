<html>
<head>
    <title>Hello world!</title>
</head>
<body>
<?php include __DIR__ . DIRECTORY_SEPARATOR . 'form-' . strtolower($_SERVER['REQUEST_METHOD']) . '.php';  ?>
</body>
</html>