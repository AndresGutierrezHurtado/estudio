<!DOCTYPE html>
<html lang="es" data-theme="<?= isset($_SESSION['theme']) && $_SESSION['theme'] == 'light' ? 'light' : 'dark' ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'cargando' ?> | Modelo Vista Controlador</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/eb36e646d1.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <?php require_once($content) ?>
    </main>

    <script>
        const forms = document.querySelectorAll('.fetch-form');

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
                            console.log(form.dataset.redirect);
                            alert(data.message);
                            if (form.dataset.redirect !== undefined) {
                                window.location.href = form.dataset.redirect;
                            } else {
                                window.location.reload();
                            }
                        } else {
                            alert('El error es: '.data.error);
                        }
                    })
            })
        })
    </script>
</body>

</html>