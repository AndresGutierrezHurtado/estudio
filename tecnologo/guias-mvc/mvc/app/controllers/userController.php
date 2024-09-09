<?php
class userController extends Controller
{

    public function __construct(PDO $conn)
    {
        parent::__construct($conn);
    }

    public function auth()
    {
        $data = [
            'usuario_correo' => $_POST['usuario_correo'],
            'usuario_contra' => md5($_POST['usuario_contra']),
        ];

        $result = $this->userModel->auth($data);

        echo json_encode($result);
    }

    public function create()
    {
        $data = [
            'usuario_nombre' => $_POST['usuario_nombre'],
            'usuario_apellido' => $_POST['usuario_apellido'],
            'usuario_correo' => $_POST['usuario_correo'],
            'usuario_contra' => md5($_POST['usuario_contra']),
        ];

        $result = $this->userModel->insert($data);

        $id = $result['last_id'];

        if ($_FILES['usuario_imagen']['size'] > 0) {
            if (move_uploaded_file($_FILES['usuario_imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/images/users/' . $id . '.jpg')) {
                $data['usuario_imagen_url'] = '/public/images/users/' . $id . '.jpg';

                $result = $this->userModel->updateById($id, $data, 'INNER JOIN roles ON usuarios.rol_id = roles.rol_id');
            }
        }

        echo json_encode($result);
    }

    public function update()
    {
        $_POST['usuario_telefono'] = $_POST['usuario_telefono'] == '' ? null : $_POST['usuario_telefono'];
        $_POST['usuario_direccion'] = $_POST['usuario_direccion'] == '' ? null : $_POST['usuario_direccion'];

        try {
            if ($_FILES['usuario_imagen']['size'] > 0) {
                if (move_uploaded_file($_FILES['usuario_imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/public/images/users/' . $_POST['usuario_id'] . '.jpg')) {
                    $_POST['usuario_imagen_url'] = '/public/images/users/' . $_POST['usuario_id'] . '.jpg';
                }
                unset($_POST['usuario_imagen']);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        $result = $this->userModel->updateById($_POST['usuario_id'], $_POST);

        echo json_encode($result);
    }

    public function delete()
    {

        if (md5($_POST['usuario_contra']) == $_POST['contra_referencia'] || $_SESSION['usuario']['rol_id'] == 2 && $_SESSION['usuario_id'] != $_POST['usuario_id']) {
            if ($_POST['usuario_id'] == $_SESSION['usuario_id']) {
                session_destroy();
            }
            $result = $this->userModel->deleteById($_POST['usuario_id']);
        } else {
            $result = ['success' => false, 'error' => 'Contraseña incorrecta'];
        }

        echo json_encode($result);
    }

    public function logout()
    {
        session_destroy();

        echo json_encode(['success' => true, 'message' => 'Cerró sesión correctamente.']);
    }
}
