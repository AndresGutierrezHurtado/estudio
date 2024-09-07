<?php

class User extends Orm
{
    public function __construct(PDO $conn)
    {
        parent::__construct('usuario_id', 'usuarios', $conn);
    }

    public function auth($data)
    {
        $sql = "SELECT * FROM $this->table WHERE usuario_correo = :email";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $data['usuario_correo']);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (COUNT($user) > 0) {
            if ($data["usuario_contra"] === $user["usuario_contra"]) {
                $_SESSION["usuario_id"] = $user["usuario_id"];

                return ['success' => true, 'message' => 'La autenticación se realizó correctamente'];
            } else {
                return ['success' => false, 'error' => 'La contraseña no coincide'];
            }
        } else {
            return ['success' => false, 'error' => 'No se encuentra el correo.'];
        }
    }
}
