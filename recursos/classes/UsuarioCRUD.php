<?php

class UsuarioCRUD {

    public function UsuarioCRUD() {

        include_once "Usuario.php";
    }

    public function verificarLogin($login) {

        $sql = mysql_query("SELECT * FROM user WHERE login = '" . $login . "' ");
        $count = mysql_num_rows($sql);


        if ($count == 1) {

            return true;
        } else {

            return false;
        }
    }

    public function salvar($usuario, $foto) {

        $verificar = $this->verificarLogin($usuario->getLogin());

        if ($verificar == true) {

            echo "<script language='javaScript'>

			alert('Nome de login já existe!');

		</script>";

            return false;
        }

        $data_nasc = date('Y-m-d', strtotime($usuario->getDataNasc()));

        if (!empty($foto["name"])) {

            $largura = 10000;
            $altura = 10000;
            $tamanho = 1000000;

            if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
                $error[1] = "Isso não é uma imagem.";
            }

            $dimensoes = getimagesize($foto["tmp_name"]);

            if ($dimensoes[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar " . $largura . " pixels";
            }

            if ($dimensoes[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
            }

            if ($foto["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
            }

            if (!isset($error)) {


                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

                $caminho_imagem = $_SERVER['DOCUMENT_ROOT'] . "/Site/recursos/imagens/users/" . $nome_imagem;


                move_uploaded_file($foto["tmp_name"], $caminho_imagem);

                if (($dimensoes[0] > 400) || ($dimensoes[1] > 400)) {

                    WideImage::load($caminho_imagem)->resize(400, 400, 'inside')->saveToFile($caminho_imagem);
                }

                $usuario->setFoto($nome_imagem);


                $sql = mysql_query("INSERT INTO user (nome, sobrenome, data_nasc, email, login, senha, foto, tipo) VALUES ('" . $usuario->getNome() . "','" . $usuario->getSobrenome() . "','" . $usuario->getDataNasc() . "','" . $usuario->getEmail() . "','" . $usuario->getLogin() . "','" . $usuario->getSenha() . "','" . $usuario->getFoto() . "', '" . $usuario->getTipo() . "')");


                if ($sql) {


                    return $nome_imagem;
                }
            }

            if (isset($error)) {
                if (count($error) != 0) {
                    foreach ($error as $erro) {

                        echo "<script language='javaScript'>

					alert('" . $erro . "');

				</script>";
                    }
                }
            }

            return false;
        }
    }

    public function buscar($login) {

        $sql = mysql_query("SELECT * FROM user, tp_user WHERE tipo = cd_tp_user AND login = '" . $login . "'");

        $usuario = new Usuario();




        if (isset($sql)) {

            while ($row = mysql_fetch_array($sql)) {

                $usuario->setNome($row['nome']);
                $usuario->setSobrenome($row['sobrenome']);

                $data_nasc = date('d/m/Y', strtotime($row['data_nasc']));
                $usuario->setDataNasc($data_nasc);
                $usuario->setEmail($row['email']);
                $usuario->setLogin($row['login']);
                $usuario->setSenha($row['senha']);
                $usuario->setFoto($row['foto']);
                $usuario->setTipo($row['tipo']);
                $usuario->setNomeTipo($row['NM_TP_USER']);
            }


            return $usuario;
        }


        return null;
    }

    public function remover($login) {

        $usuario = $this->buscar($login);


        if (isset($usuario)) {

            $sql = mysql_query("SELECT * FROM user WHERE login = '" . $login . "'");

            mysql_query("BEGIN");




            $a2 = mysql_query("DELETE FROM user WHERE login = '" . $usuario->getLogin() . "' ");

            $old = getcwd(); // Save the current directory
            chdir($_SERVER['DOCUMENT_ROOT'] . "/Site/recursos/imagens/users");
            $a1 = unlink($usuario->getFoto());
            chdir($old); // Restore the old working directory 


            if ($a1 and $a2) {
                mysql_query("COMMIT");
                return true;
            } else {
                mysql_query("ROLLBACK");
            }
        }

        return false;
    }

    public function alterarTipo($login, $tipo) {


        $sql = mysql_query("UPDATE user SET tipo=" . $tipo . " WHERE login='" . $login . "'");
    }

    public function confirmarConta($login, $conta) {


        $sql = mysql_query("UPDATE user SET conta='" . $conta . "' WHERE login='" . $login . "'");
    }

}

?>