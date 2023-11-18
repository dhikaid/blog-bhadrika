<!DOCTYPE html>
<html class="font-poppins dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?= base_url('css/app.css'); ?>" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <title><?= $tittle; ?> | Bhadrika.</title>
</head>

<body class="dark:bg-zinc-900 dark:text-white">

    <!-- content -->
    <?= $this->renderSection('contentAdmin'); ?>

    <div class="text-center text-sm m-10 opacity-50">
        &copy; 2023. Bhadrika Aryaputra Hermawan.
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>