<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="/css/bulma.css">
    <link rel="stylesheet" href="/css/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
</head>
<body>
<div class="wrapper">
    <?php $this->insert('parts/header') ?>

    <?=$this->section('content')?>

    <?php $this->insert('parts/footer') ?>
</div>
</body>
</html>