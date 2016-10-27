<?php
include_once "../../recursos/classes/Usuario.php";
include_once "../../recursos/classes/UsuarioCRUD.php";

function listarUsuarios() {

    conectaBd();

    $sql = mysql_query("SELECT user.nome, user.sobrenome, user.foto, user.data_nasc, user.email, user.login, tp_user.nm_tp_user FROM user, tp_user WHERE user.tipo = tp_user.cd_tp_user");

    while ($row = mysql_fetch_array($sql)) {



        echo "<a href='detalhes-usuario.php?login=" . $row['login'] . "'><div class='usuario'> 

		<div class='foto-usuario'><img class='img-usuario' src='/Site/recursos/imagens/users/" . $row['foto'] . "' ></div>

		<div class='nome-login-tipo-usuario'>

			<div class='nome-usuario'>" . $row['nome'] . " " . $row['sobrenome'] . "</div>

			<div class='login-tipo-usuario'>

				<div class='login-usuario'>" . $row['login'] . " </div>

				<div class='tipo-usuario'> " . $row['nm_tp_user'] . "</div>

			</div>


		</div>


	</div></a>";
    }

    fechaBd();
}

function datalhesUsuario($login) {

    conectaBd();


    $usuarioCrud = new UsuarioCRUD();
    $usuario = $usuarioCrud->buscar($login);





    echo "<div id='bloco'>
		<form id='formulario-tipo' method='post' action='recebe-alterar-tipo.php'>
		<img src='/Site/recursos/imagens/users/" . $usuario->getFoto() . "' align=left width='100px' height='100px' style='border-radius: 4px'>
		<label class='detalhes-user'>Nome:</label> " . $usuario->getNome() . " " . $usuario->getSobrenome() . " <br>
		<label class='detalhes-user'>Login:</label> " . $usuario->getLogin() . " <br>
		<label class='detalhes-user'>Email:</label> " . $usuario->getEmail() . " <br>
		<label class='detalhes-user'>Data de Nascimento:</label> " . $usuario->getDataNasc() . " <br>
		<label class='detalhes-user'>Tipo de usuário:</label> <label id='tipo'>" . $usuario->getNomeTipo() . "</label> <a href='#1' ><img class='editar' src='/Site/recursos/imagens/editar-1.png'></a> <br>
		<input type='text' name='login' value='" . $usuario->getLogin() . "' hidden>
		<br></form></div>
		";











    fechaBd();
}
?>