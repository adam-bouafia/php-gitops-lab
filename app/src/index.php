<?php
declare(strict_types=1);

$pod = getenv('HOSTNAME') ?: php_uname('n');
$version = getenv('APP_VERSION') ?: 'dev';
$now = (new DateTimeImmutable())->format(DateTimeInterface::ATOM);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>php-gitops-lab</title>
</head>
<body>
    <h1>php-gitops-lab</h1>
    <p>Served by pod: <strong><?= htmlspecialchars($pod) ?></strong></p>
    <p>App version: <strong><?= htmlspecialchars($version) ?></strong></p>
    <p>Server time: <?= htmlspecialchars($now) ?></p>
</body>
</html>
