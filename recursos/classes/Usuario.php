<?php

class Usuario {

    private $nome;
    private $sobrenome;
    private $data_nasc;
    private $email;
    private $login;
    private $senha;
    private $foto;
    private $tipo;
    private $nm_tipo;

    public function getNome() {

        return $this->nome;
    }

    public function setNome($nome) {

        if ($nome != "") {

            $this->nome = $nome;
            return true;
        } else {

            return false;
        }
    }

    public function getSobrenome() {

        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome) {

        $this->sobrenome = $sobrenome;
    }

    public function getDataNasc() {

        return $this->data_nasc;
    }

    public function setDataNasc($data_nasc) {

        if ($data_nasc != "") {

            $this->data_nasc = $data_nasc;
            return true;
        } else {

            return false;
        }
    }

    public function getEmail() {

        return $this->email;
    }

    public function setEmail($email) {

        if ($email != "") {

            $this->email = $email;
            return true;
        } else {

            return false;
        }
    }

    public function getLogin() {

        return $this->login;
    }

    public function setLogin($login) {

        if ($login != "") {

            $this->login = $login;
            return true;
        } else {

            return false;
        }
    }

    public function getSenha() {

        return $this->senha;
    }

    public function setSenha($senha) {

        if ($senha != "") {

            $this->senha = $senha;
            return true;
        } else {

            return false;
        }
    }

    public function getFoto() {

        return $this->foto;
    }

    public function setFoto($foto) {

        $this->foto = $foto;
    }

    public function getTipo() {

        return $this->tipo;
    }

    public function setTipo($tipo) {

        if ($tipo != "") {

            $this->tipo = $tipo;
            return true;
        } else {

            return false;
        }
    }

    public function getNomeTipo() {

        return $this->nm_tipo;
    }

    public function setNomeTipo($nm_tipo) {

        if ($nm_tipo != "") {

            $this->nm_tipo = $nm_tipo;
            return true;
        } else {

            return false;
        }
    }

}
?>