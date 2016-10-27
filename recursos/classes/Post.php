<?php

class Post {

    private $titulo;
    private $data;
    private $conteudo;
    private $login;
    private $foto;
    private $comentarios;

    public function constructSalvar($data, $titulo, $conteudo, $login){
        
        $this->setData($data);
        $this->setTitulo($titulo);
        $this->setConteudo($conteudo);
        $this->setLogin($login);
        
    }
    
    public function Post() {

        include_once "ArrayList.php";
    }

    public function getTitulo() {

        return $this->titulo;
    }

    public function setTitulo($titulo) {

        if ($titulo != "") {

            $this->titulo = $titulo;
            return true;
        } else {

            return false;
        }
    }

    public function getData() {

        return $this->data;
    }

    public function setData($data) {

        if ($data != "") {

            $this->data = $data;
            return true;
        } else {

            return false;
        }
    }

    public function getConteudo() {

        return $this->conteudo;
    }

    public function setConteudo($conteudo) {

        if ($conteudo != "") {

            $this->conteudo = $conteudo;
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

    public function getFoto() {

        return $this->foto;
    }

    public function setFoto($foto) {

        if ($foto != "") {

            $this->foto = $foto;
            return true;
        } else {

            return false;
        }
    }

    public function getComentarios() {

        return $this->comentarios;
    }

    public function setComentarios($comentarios) {

        if ($comentarios != "") {

            $this->comentarios = array();
            $this->comentarios = $comentarios;
            return true;
        } else {

            return false;
        }
    }

    function mostrarPost($codigo) {




        echo "<div class='conteudo'>

		<div class='cabecalho-conteudo'>

			<div class='foto-conteudo'  style='background-image: url(/Site/recursos/imagens/users/" . $this->getFoto() . ")'>

				<div class='label-user'>" . $this->getLogin() . "</div>



			</div>

			<div class='titulo-data-autor-conteudo'>

				<div class='titulo-conteudo'>
					" . $this->getTitulo() . "
				</div>

				<div class='data-autor-conteudo'>


					<div class='data-conteudo'>



						" . $this->getData() . "
					</div>
					<div class='autor-conteudo'>
						" . $this->getLogin() . "
					</div>


				</div>
			</div>
		</div>






		<div class='texto-conteudo'>
			" . $this->getConteudo() . "

		<br>
                </div>";

        $this->mostrarComentarios($codigo);

        echo "</div>";
    }

    function mostrarComentarios($codigo) {

        echo"<br>
                <div class='texto-conteudo'>";


        echo "Adicionar Comentário:";
        echo "<form id='form-comentario' action='adicionar-comentario.php' method='post' enctype='multipart/form-data'>
                <textarea id='addcomentario' minlenght=5 maxlenght=500 name='comentario' required aria-required='true'></textarea>
                <input type='hidden' name='codigo_post' value='" . $codigo . "'>
                 <input type='submit' value='Enviar'>   </form>";



        $coment = $this->getComentarios();

        foreach ($coment as &$value) {

            echo "<div class='comentario'>
                  
                         <div class='foto-comentario'>
                            <img class='foto-comentario' src='/Site/recursos/imagens/users/" . $value->getFoto() . "' stretch/> 
        
        
               
                         </div>
                          
                    <div class='conteudo-login-comentario'>
                    <div class='login-comentario'>
                            " . $value->getUsuario() . " <spam class='data'>" . $value->getData() . " </spam>
                         </div>  
                    <div class='conteudo-comentario'>
                        " . $value->getConteudo() . "
        
                    </div>
                    
                    </div>
                  </div>";
        }

        echo "</div>";
    }

}

?>