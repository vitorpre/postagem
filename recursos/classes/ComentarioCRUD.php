<?php

class ComentarioCRUD {

    public function __construct() {
        include_once "Comentario.php";
    }

    public function buscarTodos($codigo) {

        $conexao = conectaBd();
        
        $sql = mysqli_query($conexao, "SELECT comentarios.codigo, comentarios.conteudo, comentarios.data, user.login, user.foto FROM comentarios, post, user WHERE comentarios.fk_codigo_post = post.codigo AND comentarios.fk_login_usuario = user.login AND post.codigo = '" . $codigo . "' ORDER BY comentarios.data ");



        if (isset($sql)) {

            $comentarios = array();
            while ($row = mysqli_fetch_array($sql)) {

                $data = date('d/m/Y - H:m', strtotime($row['data']));
                $comentario = new Comentario();
                $comentario->construtorBuscar($row['codigo'], $row['conteudo'], $data, $row['login'], $row['foto']);


                $comentarios[] = $comentario;
            }





            return $comentarios;
        }
    }

    public function salvar($comentario) {


        $sql = "INSERT INTO comentarios (conteudo, data, fk_login_usuario, fk_codigo_post) VALUES('" . $comentario->getConteudo() . "','" . $comentario->getData() . "','" . $comentario->getUsuario() . "','" . $comentario->getCodigo_post() . "')";

        mysql_query($sql);
    }

}
