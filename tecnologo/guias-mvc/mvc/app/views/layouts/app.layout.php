<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'cargando' ?> | Modelo Vista Controlador</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/eb36e646d1.js" crossorigin="anonymous"></script>
</head>

<body class="flex flex-col min-h-[100dvh]">
    <?php require_once(__DIR__ . "/header.php") ?>

    <main class="flex-grow">
        <?php require_once($content) ?>
    </main>

    <?php require_once(__DIR__ . "/footer.php") ?>

    <script>
        const forms = document.querySelectorAll('.fetch-form');
        const themeController = document.querySelector('.theme-controller');

        forms.forEach(form => {
            form.addEventListener('submit', event => {
                event.preventDefault();

                const data = new FormData(form);

                fetch(form.action, {
                        method: form.method,
                        body: data
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            if (form.dataset.redirect !== undefined) {
                                window.location.href = form.dataset.redirect;
                            } else {
                                window.location.reload();
                            }
                        } else {
                            alert('Error: ' + data.error);
                        }
                    })
            })
        })

        function cambiarValor(checkbox) {
            if (checkbox.checked) {
                checkbox.value = "light"; 
            } else {
                checkbox.value = "dark"; 
            }
        }

        themeController.addEventListener('change', event => {
            const data = new FormData();

            data.append('theme', event.target.value);

            fetch('/page/changeTheme', {
                    method: 'POST',
                    body: data
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log(`Info: ${data.message}`);
                    } else {
                        console.info('El error es: '.data.error);
                    }
                });
        })
    </script>
</body>

</html>