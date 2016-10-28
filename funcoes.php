<?php

require_once 'recursos/classes/Post.php';
require_once 'recursos/classes/PostCRUD.php';

function mostrar($min) {

    $minimo = 0;
    

    if (isset($min)) {
        $minimo = $min;
        
    }


    $con = conectaBd();


    date_default_timezone_set("America/Sao_Paulo");

    $sql = mysqli_query($con, "SELECT post.id_post,titulo,data,conteudo,login,foto FROM post, user where post.id_user = user.id_user order by data desc limit " . $minimo . " , 5");

    if (isset($sql)) {

        while ($row = mysqli_fetch_array($sql)) {


            echo "<div class='conteudo'>

			<div class='cabecalho-conteudo'>

				<div class='foto-conteudo'  style='background-image: url(/Site/recursos/imagens/users/" . $row['foto'] . ")'>

					<div class='label-user'>" . $row['login'] . "</div>



				</div>

				<div class='titulo-data-autor-conteudo'>

					<div class='titulo-conteudo'>
						<a class='link' href='/Site/postagens/mostrar-post.php?post=" . $row['id_post'] . "' >" . $row['titulo'] . "</a>
					</div>

					<div class='data-autor-conteudo'>


						<div class='data-conteudo'>



							" . date('d/m/Y', strtotime($row['data'])) . "
						</div>
						<div class='autor-conteudo'>
							" . $row['login'] . "
						</div>


					</div>
				</div>
			</div>






			<div class='texto-conteudo'>
				" . $row['conteudo'] . "


			</div>
		</div>     ";
        }

        $sql = mysqli_query($con, "SELECT count(*) FROM post");

        while ($row = mysqli_fetch_array($sql)) {

            $posts = $row['count(*)'];
        }
        $paginas = $posts / 5;
        $numpagina = 1;

        $minlimit = 0;
        

        echo "<div class='paginas-posts'>";
        while ($paginas > 0) {





            echo "<div class='borda-botao-pagina'>
		<a href='index.php?minlimit=" . $minlimit . "'><div class='botao-pagina'>" . $numpagina . "</div></a>
	</div>";

            $paginas--;
            $numpagina++;
            $minlimit+=5;
            
        }

        echo "</div>";

        fechaBd($con);
    }
}
?>


