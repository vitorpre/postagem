<?php

function nasaPrint($string)
    {
        echo "<div style='width: 80%; margin: 0 auto;background-color:white;color='black'>";
        echo "<pre>";
        print_r($string);
        echo "</pre>";
        echo "</div>";
    }

function conectaBd() {

    $con = new mysqli('localhost', 'root', '');
    $con->set_charset("utf8");

    $con->select_db('postagem') or die("Impossível Conectar");

    return $con;
}

function fechaBd($con) {

    mysqli_close();
}

Function widgetLogin() {
    ?>

    <div class="widget">


        <div class="texto-widget">

            <?php
            if (isset($_SESSION['vali'])) {

                if ($_SESSION['vali'] == "c4ca4238a0b923820dcc509a6f75849b") {


                    dadosUser($_SESSION['login'], $_SESSION['nome'], $_SESSION['sobrenome'], $_SESSION['foto']);




                    echo "<a href='/Site/adm/postar/postar.php'>Postar</a><br>
		<a href='/Site/adm/alterar_usuario/mostrar-usuarios.php'>Mostrar Usuários</a>";
                    echo "<br><input type='button' value='Deslogar' onclick='deslogar()'/>";
                    
                } else if ($_SESSION['vali'] == "c81e728d9d4c2f636f067f89cc14862c") {

                    dadosUser($_SESSION['login'], $_SESSION['nome'], $_SESSION['sobrenome'], $_SESSION['foto']);

    
                } else if ($_SESSION['vali'] == "eccbc87e4b5ce2fe28308fd9f2a7baf3") {

                    dadosUser($_SESSION['login'], $_SESSION['nome'], $_SESSION['sobrenome'], $_SESSION['foto']);
                    ?>																

                    <a href='/Site/adm/postar/postar.php'>Postar</a>
                    <br><input type='button' value='Deslogar' onclick='deslogar()'/>

                    <?php
                }
            } else {

                
                echo '<form action="/Site/logar.php" method="POST" >
                                     
                        

					<table>
						<tr><td>Login:</td><td><input type="text" name="login-user"></td></tr>
						<tr><td>Senha:</td><td><input type="password" name="senha-user"></td></tr>
					</table>
					<input type="submit" value="Logar">
					</form>';
            }
            ?>

        </div>


    </div>

    <?php
}

function dadosUser($username, $nome, $sobrenome, $foto) {




    echo "<div id='dados-user'>
									
									<div id='foto-user' style='background-image: url(/Site/recursos/imagens/users/" . $foto . ")'>

									

									<div class='label-user'>" . $username . "</div>
						

						
									</div>

									<div id='nome-login-user'>
										<div id='nome-user'>
										<label>" . $nome . " " . $sobrenome . " </label>
										</div>
										<div id='login-user'>
										<label>" . $username . "</label>

										</div>

									</div>



								</div>






	";
}
