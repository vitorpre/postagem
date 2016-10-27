<?php

class PostCRUD {

   
    public function __construct() {
        include_once "Post.php";
        include_once "Comentario.php";
        include_once "ComentarioCRUD.php";;
    }

    public function buscar($codigo, $conexao) {

        $sql = mysqli_query($conexao, "SELECT titulo, data, conteudo, login, foto FROM post, user WHERE post.id_post = '" . $codigo . "' AND post.id_user = user.id_user");

        $post = new Post();



        if (isset($sql)) {

            while ($row = mysqli_fetch_array($sql)) {

                $post->setTitulo($row['titulo']);
                $data = date('d/m/Y', strtotime($row['data']));
                $post->setData($data);
                $post->setConteudo($row['conteudo']);
                $post->setLogin($row['login']);
                $post->setFoto($row['foto']);
            }

            $crud = new ComentarioCRUD;

            $comentarios = $crud->buscarTodos($codigo);

            $post->setComentarios($comentarios);

            return $post;
        }


        return null;
    }

    public function remover($codigo) {

        $post = $this->buscar($codigo);


        if (isset($post)) {



            $a2 = mysql_query("DELETE FROM post WHERE codigo = '" . $codigo . "' ");


            if ($a2) {

                return true;
            }
        }

        return false;
    }
    
    public function salvar($post){
        
        $sql = mysql_query("INSERT INTO post (titulo, conteudo, data, fk_login_usuario) VALUES ('" . $post->getTitulo() . "','" . $post->getConteudo() . "','" . $post->getData() . "','" . $post->getLogin() . "')");
        
        return $sql;
    }

}
