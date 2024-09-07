<?php
class PageController extends Controller
{

    public function __construct(PDO $conn)
    {
        parent::__construct($conn);
    }

    public function home()
    {
        $title = "Inicio";
        $content = __DIR__ . "/../views/pages/home.view.php";

        require_once(__DIR__ . "/../views/layouts/app.layout.php");
    }

    public function products() {
        $title = "";
        $content = __DIR__ . "/../views/pages/products.view.php";

        require_once(__DIR__ . "/../views/layouts/app.layout.php");
    }

    public function login()
    {

        $title = "Inicia Sesión";
        $content = __DIR__ . "/../views/pages/auth/login.view.php";

        require_once(__DIR__ . "/../views/layouts/guest.layout.php");
    }

    public function register()
    {

        $title = "Regístrate";
        $content = __DIR__ . "/../views/pages/auth/register.view.php";

        require_once(__DIR__ . "/../views/layouts/guest.layout.php");
    }

    public function profile()
    {
        $user = isset($_GET['usuario']) 
        ? $this->userModel->getById($_GET['usuario'], "*", "INNER JOIN roles ON roles.rol_id = usuarios.usuario_id") 
        : $_SESSION['usuario'];

        $title = "Perfil de " . $user['usuario_nombre'];

        $content = __DIR__ . "/../views/pages/profile.view.php";

        require_once(__DIR__ . "/../views/layouts/app.layout.php");
    }
}
