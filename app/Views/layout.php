<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello HTML - <?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('styles.css') ?>"/>
</head>

<body>

<?= $this->renderSection('content') ?>

</body>

</html>