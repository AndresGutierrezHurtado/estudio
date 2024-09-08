<?php
$team = [
    [
        'name' => 'Andrés Gutiérrez Hurtado',
        'description' => 'Me apasiona el desarrollo de software, espero ser un gran desarrollador en el futuro.',
        'initials' => 'AG',
        'github' => 'https://github.com/AndresGutierrezHurtado',
    ],
    [
        'name' => 'David Fernando Diaz Niausa',
        'description' => 'Me apasiona el desarrollo de software, espero ser un gran desarrollador en el futuro.',
        'initials' => 'DD',
        'github' => 'https://github.com/',
    ],
    [
        'name' => 'Juan Sebastián Bernal Gamboa',
        'description' => 'Aprendiz del sena, especializado en el desarrollo backend, además de los estilos.',
        'initials' => 'JB',
        'github' => 'https://github.com/',
    ],
    [
        'name' => 'Julián David Gonzáles Bayona',
        'description' => 'Camaron que se parcha se lo lleva la recocha',
        'initials' => 'JG',
        'github' => 'https://github.com/',
    ],
    [
        'name' => 'Kevin Meza',
        'description' => 'El único que puede hacer que \'Meza\' suene como una fiesta en lugar de una mesa.😜😜',
        'initials' => 'KM',
        'github' => 'https://github.com/',
    ],
    [
        'name' => 'Kevin Santiago Cordoba Daza',
        'description' => 'El que no recocha no come chocha, y el que se parcha con el rifle las engancha.👻',
        'initials' => 'KC',
        'github' => 'https://github.com/',
    ],
    [
        'name' => 'Jose David Parra Quiroga',
        'description' => '¿Comando estelar, adelante comando estelar? soy Buzz Lightyear',
        'initials' => 'JP',
        'github' => 'https://github.com/',
    ]
]
?>

<section
    class="hero"
    style="background-image: url(https://images.pexels.com/photos/2653362/pexels-photo-2653362.jpeg?cs=srgb&dl=pexels-harold-vasquez-853421-2653362.jpg&fm=jpg);">

    <div class="hero-overlay bg-black/40"></div>
    <div class="hero-content text-neutral-content text-center my-32 w-full max-w-[1200px] mx-auto ">
        <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">Bienvenido al modelo vista controlador</h1>
            <p class="mb-5">
                El patrón MVC es una arquitectura que organiza la estructura de las aplicaciones dividiendo responsabilidades en tres componentes principales: Modelo, Vista y Controlador, facilitando así el desarrollo y mantenimiento de software.
            </p>
            <button class="btn btn-primary">Ver más</button>
        </div>
    </div>
</section>

<section class="w-full">
    <div class="w-full max-w-[1200px] mx-auto flex gap-5 flex-col md:flex-row items-center justify-between py-12">
        <figure class="w-full max-w-[500px] h-[300px]">
            <img src="https://www.easyappcode.com/upload/post-792545902.jpg" alt="Imagen del modelo vista controlador" class="object-contain w-full h-full">
        </figure>
        <div class="text-center md:text-start grow text-balance space-y-4">
            <h1 class="text-3xl font-extrabold tracking-tight">¿Qué es el mvc?</h1>
            <div class="space-y-2">
                <p>
                    El Modelo Vista Controlador (MVC) es un patrón de diseño que se utiliza para estructurar aplicaciones de manera eficiente. Este patrón separa la lógica de negocio, la interfaz de usuario y las interacciones del usuario en tres componentes distintos, facilitando el desarrollo y mantenimiento.
                </p>
                <p>
                    Cada componente tiene un rol específico: el <strong>Modelo</strong> gestiona los datos y la lógica de negocio, la <strong>Vista</strong> se encarga de mostrar la información al usuario, y el <strong>Controlador</strong> conecta ambos, gestionando las interacciones y la comunicación.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="w-full">
    <div class="w-full max-w-[1200px] mx-auto py-12 space-y-5">
        <h1 class="text-3xl font-extrabold tracking-tight text-center">¿Qué es el modelo, vista y controlador?</h1>

        <ul class="timeline timeline-snap-icon max-md:timeline-compact timeline-vertical text-balance">
            <!-- Modelo -->
            <li>
                <div class="timeline-middle">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="h-5 w-5">
                        <path
                            fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-start mb-10 md:text-end">
                    <div class="text-xl font-black">Modelo</div>
                    <div class="space-y-3">
                        <p>
                            El modelo es la parte de la aplicación que gestiona los datos y la lógica de negocio.
                            Se encarga de acceder y manipular la información almacenada en la base de datos,
                            y de representar los datos de una manera que pueda ser utilizada por otras partes del sistema.
                        </p>
                        <p>
                            Por ejemplo, si una aplicación gestiona una lista de usuarios, el modelo sería el encargado de
                            realizar operaciones como añadir, editar o eliminar usuarios de la base de datos, así como
                            gestionar las reglas de validación y procesamiento de esos datos.
                        </p>
                    </div>
                </div>
                <hr />
            </li>

            <!-- vista -->
            <li>
                <hr />
                <div class="timeline-middle">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="h-5 w-5">
                        <path
                            fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-end mb-10">
                    <div class="text-xl font-black">Vista</div>
                    <div class="space-y-3">
                        <p>
                            La vista es la parte de la aplicación que se encarga de presentar los datos al usuario.
                            Es básicamente la interfaz de usuario, lo que el usuario ve y con lo que interactúa.
                        </p>
                        <p>
                            En una aplicación web, las vistas suelen estar compuestas por HTML, CSS y JavaScript, y son responsables
                            de mostrar los datos que provienen del modelo en un formato entendible y agradable al usuario.
                            Además, la vista también captura las interacciones del usuario, como clics o la introducción de datos
                            en formularios.
                        </p>
                    </div>
                </div>
                <hr />
            </li>

            <!-- controlador -->
            <li>
                <hr />
                <div class="timeline-middle">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="h-5 w-5">
                        <path
                            fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-start mb-10 md:text-end">
                    <div class="text-xl font-black">Controlador</div>
                    <div class="space-y-3">
                        <p>
                            El controlador es la parte de la aplicación que actúa como intermediario entre el modelo y la vista.
                            Su principal función es recibir las entradas del usuario desde la vista, procesarlas y decidir
                            qué acciones tomar, generalmente interactuando con el modelo para obtener o modificar datos.
                        </p>
                        <p>
                            Por ejemplo, cuando un usuario envía un formulario en una página web, el controlador interpreta
                            esa acción, valida los datos si es necesario y luego solicita al modelo que almacene la información
                            en la base de datos. Una vez hecho esto, puede redirigir al usuario a otra vista o actualizar la actual.
                        </p>
                    </div>
                </div>
                <hr />
            </li>
            <li>
                <hr />
                <div class="timeline-middle">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="h-5 w-5">
                        <path
                            fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="timeline-end mb-10">
                    <div class="text-xl font-black">Orm</div>
                    <div class="space-y-3">
                        <p>
                            Un ORM (Object-Relational Mapping) es una herramienta que permite interactuar con la base de datos
                            a través de objetos en lugar de consultas SQL directas. El ORM traduce los objetos de la aplicación
                            en tablas de bases de datos, permitiendo realizar operaciones como insertar, actualizar o eliminar
                            registros sin necesidad de escribir SQL manualmente.
                        </p>
                        <p>
                            Esto simplifica mucho el trabajo con bases de datos, ya que permite trabajar con las estructuras
                            de datos de la aplicación de forma más intuitiva y segura, reduciendo el riesgo de errores de SQL
                            y mejorando la productividad del desarrollo.
                        </p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>

<section id="who" class="w-full">
    <div class="w-full max-w-[1200px] mx-auto py-12 space-y-5">
        <h1 class="text-3xl font-extrabold tracking-tight text-center">Quienes somos</h1>
        <div class="carousel w-full">
            <?php foreach ($team as $index => $member) : ?>
                <div id="slide<?= $index + 1 ?>" class="carousel-item relative w-full">
                    <!-- Contendio del slide 1 -->
                    <div class="w-full flex items-center justify-evenly my-8">
                        <article class="text-center">
                            <div class="avatar placeholder">
                                <div class="bg-neutral text-neutral-content w-16 rounded-full">
                                    <span class="text-xl"><?= $member['initials'] ?></span>
                                </div>
                            </div>
                            <h1 class="text-lg font-bold tracking-tight"><?= $member['name'] ?></h1>
                            <p class="text-sm font-medium text-base-content/60">Aprendiz SENA</p>
                        </article>
                        <div class="card bg-base-100 w-96 shadow-lg ">
                            <div class="card-body">
                                <h2 class="card-title">Desarrollador de software</h2>
                                <p class="text-balance"><?= $member['description'] ?></p>
                                <div class="card-actions justify-start">
                                    <a href="<?= $member['github'] ?>" target="_blank" class="btn btn-primary btn-sm mt-2">
                                        <i class="fab fa-github text-md"></i> GitHub
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                        <a href="#slide<?= $index == 0 ? count($team) : $index ?>" class="btn btn-circle">❮</a>
                        <a href="#slide<?= $index == count($team) - 1 ? 1 : $index + 2 ?>" class="btn btn-circle">❯</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="pagination flex w-full justify-center gap-2 py-2">
            <?php foreach ($team as $index => $member) : ?>
                <!-- Si la url tiene #slider1, el botón tendrá la clase btn-active -->
                <a href="#slide<?= $index + 1 ?>" class="btn btn-xs"><?= $index + 1 ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        function handleHashChange() {
            var url = window.location.hash;

            document.querySelectorAll('.pagination > a').forEach(element => {
                element.classList.remove('btn-primary');
                if (element.getAttribute('href') === url) {
                    element.classList.add('btn-primary');
                }
            })
        }
        window.addEventListener('hashchange', handleHashChange);

        handleHashChange();
    });
</script>