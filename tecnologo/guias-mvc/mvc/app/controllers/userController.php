<?php
class userController extends Controller
{

    public function __construct(PDO $conn)
    {
        parent::__construct($conn);
    }

    public function create() {
        $data = [
            'usuario_nombre' => $_POST['usuario_nombre'],
            'usuario_apellido' => $_POST['usuario_apellido'],
            'usuario_correo' => $_POST['usuario_correo'],
            'usuario_contra' => md5($_POST['usuario_contra']),
        ];

        $result = $this->userModel->insert($data);

        echo json_encode($result);
    }

    public function updateById() {

    }

    public function auth() {
        $data = [
            'usuario_correo' => $_POST['usuario_correo'],
            'usuario_contra' => md5($_POST['usuario_contra']),
        ];

        $result = $this->userModel->auth($data);

        echo json_encode($result);
    }
}
