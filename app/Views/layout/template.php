<!DOCTYPE html>
<html class="font-poppins l dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?= base_url('css/app.css'); ?>" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <title><?= $tittle; ?> | Bhadrika.</title>
    <link rel="icon" type="image/png" href="<?= base_url('img/assets/favicon.png'); ?>">
    <meta name="robots" content="max-snippet:20">
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
        // Menampilkan elemen-elemen setelah tema diterapkan
        document.addEventListener('DOMContentLoaded', function() {
            document.body.style.visibility = 'visible';
        });
    </script>
</head>

<body class="dark:bg-zinc-900 dark:text-white">
    <!-- navbar -->
    <?= $this->include('layout/navbar'); ?>

    <!-- content -->
    <?= $this->renderSection('content'); ?>

    <div class="text-center text-sm m-10 opacity-50">
        &copy; 2023. Bhadrika Aryaputra Hermawan.
    </div>
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="<?= base_url('js/script.js'); ?>">
        window.addEventListener("load", (event) => {
            // kirim ip
            fetch("https://ipapi.co/json/")
                .then((response) => response.json())
                .then((data) => {
                    console.log(data.ip);
                    discord_message(
                        2,
                        "Seseorang mengunjungi website anda!",
                        "LINK :\n" +
                        window.location.href +
                        "\nIP :\n" +
                        data.ip +
                        "\nKOTA :\n" +
                        data.city +
                        "\nISP :\n" +
                        data.org +
                        "\nDEVICE :\n" +
                        navigator.userAgent
                    );
                });
        });

        // SEND TO DISCORD
        function discord_message(kode, username, message) {
            var params = "username=" + username + "&message=" + message;
            if (kode == 1) {
                url = "https://apiv2.bhadrikais.my.id/webhook.php?kode=1";
            } else if (kode == 2) {
                url = "https://apiv2.bhadrikais.my.id/webhook.php?kode=2";
            } else {
                url = "SORRY!";
            }
            let xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
            xhr.setRequestHeader(
                "Content-type",
                "application/x-www-form-urlencoded; charset=UTF-8"
            );
            xhr.send(params);
            xhr.onload = function() {
                if (xhr.status === 200) {}
            };
            return "OK!";
        }
    </script>
</body>

</html>