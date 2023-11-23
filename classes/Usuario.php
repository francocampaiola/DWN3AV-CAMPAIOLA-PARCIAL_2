<?php 
    class Usuario {
        private $id;
        private $email;
        private $nombre_completo;
        private $nombre_usuario;
        private $password;
        private $rol;

        /** 
         * Encuentra un usuario por su username
         * @param string $username El nombre de usuario a buscar
         */
        public function usuario_x_username(string $username): ?Usuario {
            $conexion = Conexion::getConexion();
            $query = "SELECT * FROM usuarios WHERE nombre_usuario = ?";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute([$username]);

            $result = $PDOStatement->fetch();

            if (!$result) {
                return null;
            }

            return $result;
        }

        /** Getters **/

        public function getId(): int {
            return $this->id;
        }

        public function getEmail(): string {
            return $this->email;
        }

        public function getNombre_completo(): string {
            return $this->nombre_completo;
        }

        public function getNombre_usuario(): string {
            return $this->nombre_usuario;
        }

        public function getPassword(): string {
            return $this->password;
        }

        public function getRol(): string {
            return $this->rol;
        }
    }
?>