<?php
class PageController extends Controller
{

    public function __construct(PDO $conn)
    {
        parent::__construct($conn);
    }

    public function home()
    {

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
            ],
            [
                'name' => 'Daniel Stiven Casallas Hernández',
                'description' => 'Velocidad, soy veloz',
                'initials' => 'DC',
                'github' => 'https://github.com/',
            ],
            [
                'name' => 'Santiago',
                'description' => 'Pa qué monda?',
                'initials' => 'S',
                'github' => 'https://github.com/',
            ],
            [
                'name' => 'Alejandro Suárez',
                'description' => 'El que se asusta, se quema',
                'initials' => 'AS',
                'github' => 'https://github.com/',
            ],
            [
                'name' => 'Diego Alejandro Paloma Díaz',
                'description' => 'A palabras recocheras, oidos parchados: Sócrates 2013',
                'initials' => 'AS',
                'github' => 'https://github.com/',
            ]
        ];

        $title = "Inicio";
        $content = __DIR__ . "/../views/pages/home.view.php";

        require_once(__DIR__ . "/../views/layouts/app.layout.php");
    }

    public function login()
    {
        if (isset($_SESSION["usuario_id"])) header('Location: /');

        $title = "Inicia Sesión";
        $content = __DIR__ . "/../views/pages/auth/login.view.php";

        require_once(__DIR__ . "/../views/layouts/guest.layout.php");
    }

    public function register()
    {
        if (isset($_SESSION["usuario_id"])) header('Location: /');

        $title = "Regístrate";
        $content = __DIR__ . "/../views/pages/auth/register.view.php";

        require_once(__DIR__ . "/../views/layouts/guest.layout.php");
    }

    public function profile()
    {
        $user = isset($_GET['usuario'])
            ? $this->userModel->getById($_GET['usuario'], "*", "INNER JOIN roles ON roles.rol_id = usuarios.rol_id")
            : $_SESSION['usuario'];

        if ($_SESSION['usuario']['rol_id'] != 2 && $_SESSION['usuario_id'] != $user['usuario_id'] || !isset($_SESSION['usuario_id'])) header('Location: /');

        $roles = $this->conn->query("SELECT * FROM roles")->fetchAll(PDO::FETCH_ASSOC);

        $title = "Perfil de " . $user['usuario_nombre'];
        $content = __DIR__ . "/../views/pages/profile.view.php";

        require_once(__DIR__ . "/../views/layouts/app.layout.php");
    }

    public function dashboard()
    {

        if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario']['rol_id'] != 2) header('Location: /');

        $search = isset($_GET['search']) ?
            'usuario_nombre LIKE "%' . $_GET['search'] . '%" 
            OR usuario_apellido LIKE "%' . $_GET['search'] . '%"
            OR usuario_correo LIKE "%' . $_GET['search'] . '%"
            OR roles.rol_nombre LIKE "%' . $_GET['search'] . '%"'
            : "";
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $sort = isset($_GET['sort']) ? $_GET['sort'] : "usuario_id";

        $users = $this->userModel->paginate(
            $page,
            5,
            "*",
            "INNER JOIN roles ON roles.rol_id = usuarios.rol_id",
            $search,
            "$sort ASC"
        );

        $title = "Panel de administrador";
        $content = __DIR__ . "/../views/pages/admin/dashboard.view.php";

        require_once(__DIR__ . "/../views/layouts/guest.layout.php");
    }

    public function changeTheme()
    {
        $_SESSION['theme'] = $_POST['theme'];

        echo json_encode([
            'success' => true,
            'message' => "Tema cambiado " . $_SESSION['theme']
        ]);
    }
}
