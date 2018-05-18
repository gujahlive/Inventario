<?php
require_once("templateEmail.php");

// Criando classe
class Usuario {

	  /*
	   * Atributo para conexão com o banco de dados
	   */
	  private $pdo = null;

	  /*
	   * Atributo estático para instância da própria classe
	   */
	  private static $usuario = null;

	  private function __construct($conexao){
				$this->pdo = $conexao;
	  }

	  /*
	  * Método estático para retornar um objeto usuario
	  * Verifica se já existe uma instância desse objeto
	  */
	  public static function getInstance($conexao){
    	  if (!isset(self::$usuario)){
    		    self::$usuario = new Usuario($conexao);
    	  }
    	  return self::$usuario;
	  }

		public function listar(){
		   try{
				  $sql = "SELECT * FROM usuario";
				  $stm = $this->pdo->prepare($sql);
				  $stm->execute();
				  $dados = $stm->fetchAll(PDO::FETCH_OBJ);
				  return $dados;
			 }catch(PDOException $erro){
				 header("location: ../../paginas/utils/error500.php");
			 }
	  }

		public function pegarDados($id_usuario){
			 try{
				$sql = "SELECT * FROM usuario WHERE id_usuario=?";
				$stm = $this->pdo->prepare($sql);
				$stm->bindValue(1, $id_usuario);
				$stm->execute();
				$dados = $stm->fetchAll(PDO::FETCH_OBJ);

				return $dados[0];
			 }catch(PDOException $erro){
				header("location: ../../paginas/utils/error500.php");
			 }
		}

		public function buscarEmail($email){
			 try{
				$sql = "SELECT * FROM usuario WHERE email=?";
				$stm = $this->pdo->prepare($sql);
				$stm->bindValue(1, $email);
				$stm->execute();
				$dados = $stm->fetchAll(PDO::FETCH_OBJ);

				return $dados[0];
			 }catch(PDOException $erro){
				header("location: ../../paginas/utils/error500.php");
			 }
		}

		public function sair(){
			session_start();
			session_unset();
			session_destroy();
			header("Location: ../../paginas/home/home.php");
		}

		public function verificaSessao(){
			session_start();
			if(empty($_SESSION) || $_SESSION["tipo_usuario"] == "padrao"){
				return false;
			}

			return true;
		}

		public function atualizar($email, $senha, $id_usuario, $imagemUpload){
 		  try{
 				$sql = "UPDATE usuario SET email=? WHERE id_usuario=?";
 				$stm = $this->pdo->prepare($sql);
 				$stm->bindValue(1, $email);
 				$stm->bindValue(2, $id_usuario);
 				$stm->execute();

				echo json_encode($imagemUpload);

				if(!empty($imagemUpload)){
					self::uploadImagem($imagemUpload, $id_usuario);
				}

				if(!empty($senha)){
					self::atualizarSenha($senha, $id_usuario);
				}

				header("location: ../../paginas/usuario/perfil.php?status=true");

 		  } catch(PDOException $erro){
				header("location: ../../paginas/usuario/perfil.php?status");
 		  }
 		}

		public function atualizarSenha($senha, $id_usuario){
			$senha = password_hash($senha, PASSWORD_DEFAULT);
			try{
				$sql = "UPDATE usuario SET senha=? WHERE id_usuario=?";
				$stm = $this->pdo->prepare($sql);
				$stm->bindValue(1, $senha);
				$stm->bindValue(2, $id_usuario);
				$stm->execute();

			} catch(PDOException $erro){
				header("location: ../../paginas/usuario/perfil.php?status");
			}
 		}

		public function atualizarFoto($caminho_da_imagem, $id_usuario){
			try{
				$sql = "UPDATE usuario SET foto=? WHERE id_usuario=?";
				$stm = $this->pdo->prepare($sql);
				$stm->bindValue(1, $caminho_da_imagem);
				$stm->bindValue(2, $id_usuario);
				$stm->execute();

			} catch(PDOException $erro){
				header("location: ../../paginas/utils/error500.php");
			}
 		}

    public function login($email, $senha, $redirect){
			if(!isset($_SESSION)) session_start();

		  try{
					$sql = "SELECT * FROM usuario WHERE email=?";
					$stm = $this->pdo->prepare($sql);
					$stm->bindValue(1, $email);
					$stm->execute();
					$dados = $stm->fetchAll(PDO::FETCH_OBJ);

					if(empty($dados)) return 	header("location: ../../paginas/autentificacao/login.php?error=true");
					if(!password_verify($senha, $dados[0]->senha) == $senha) return header("location: ../../paginas/autentificacao/login.php?error=true");

					$_SESSION['email'] = $dados[0]->email;
					$_SESSION['id_usuario'] = $dados[0]->id_usuario;
					$_SESSION['tipo_usuario'] = $dados[0]->tipo_usuario;
					if($dados[0]->tipo_usuario == 'padrao'){
						self::setSessionIdCliente($dados[0]->id_usuario);
						if(!empty($redirect)){
							echo true;
							return;
						}
						header("location: ../../paginas/index.php");
					} else if($dados[0]->tipo_usuario == 'administrador') {
						header("location: ../../paginas/home/homeAdmin.php");
					}
		  } catch(PDOException $erro){
			  header("location: ../../paginas/utils/error500.php");
		  }
		}

		public function setSessionIdCliente($id_usuario){
			try{
					$sql = "SELECT * FROM cliente WHERE fk_usuario=?";
					$stm = $this->pdo->prepare($sql);
					$stm->bindValue(1, $id_usuario);
					$stm->execute();
					$dados = $stm->fetchAll(PDO::FETCH_OBJ);

					if(!empty($dados)){
						$_SESSION['id_cliente'] = $dados[0]->id_cliente;
						$_SESSION['nome_cliente'] = $dados[0]->nome_cliente;
					}

			} catch(PDOException $erro){
				header("location: ../../paginas/utils/error500.php");
			}
		}

		public function deletar($id_usuario){
			 try{
					$sql = "DELETE FROM usuario WHERE id_usuario = ?";
					$stm = $this->pdo->prepare($sql);
					$stm->bindValue(1, $id_usuario);
					$stm->execute();

					header("location: ../../paginas/usuario/home.php");

			 }catch(PDOException $erro){
				header("location: ../../paginas/utils/error500.php");
			 }
		}

	  public function cadastro($email, $senha, $tipo_usuario){
  			try{
    			  $sql = "INSERT INTO usuario (email, senha, tipo_usuario) VALUES (?, ?, ?)";
    			  $stm = $this->pdo->prepare($sql);
    			  $stm->bindValue(1, $email);
    			  $stm->bindValue(2, $senha);
    			  $stm->bindValue(3, $tipo_usuario);
    			  $stm->execute();

						$id_usuario = $this->pdo->lastInsertId();

						$html =  gerarHtml("", "Obrigado por se cadastrar.", "Estamos aqui para agradecer o seu cadastro!, isto será importante para que as solicitações de serviços sejam realizadas com sucesso!");
						$assunto = 'Cadastro HPS';
						self::enviarEmail($email, $html, $assunto);

						return $id_usuario;

  			 } catch(PDOException $erro){
  			    header("location: ../../paginas/utils/error500.php");
  			}
	  }

		public function enviarEmail($email, $html, $assunto){
			session_start();
			//4 – agora inserimos as codificações corretas e  tudo mais.
		  $headers =  "Content-Type:text/html; charset=UTF-8\n";
		  $headers .= "From:  contato@hpsservicos.com\n"; //Vai ser mostrado que o email partiu deste email e seguido do nome
		  $headers .= "X-Sender:  <contato@hpsservicos.com>\n"; //email do servidor que enviou
		  $headers .= "X-Mailer: PHP  v".phpversion()."\n";
		  $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
		  $headers .= "Return-Path:  <contato@hpsservicos.com>\n"; //caso a msg //seja respondida vai para  este email.
		  $headers .= "MIME-Version: 1.0\n";

			mail($email, $assunto, $html, $headers);  //função que faz o envio do email.
    }

		public function uploadImagem($imagemUpload, $id_usuario){
			// Numero de campos de upload
			$numeroCampos = 5;
			// Tamanho máximo do arquivo (em bytes)
			$tamanhoMaximo = 1000000;
			// Extensões aceitas
			$extensoes = array(".jpg", ".png", ".gif", ".jpeg");
			// Caminho para onde o arquivo será enviado
			$caminho = dirname("../../imagens");

    	// Substituir arquivo já existente (true = sim; false = nao)
			$substituir = true;


			if(isset($imagemUpload["foto"]["name"])){
				// Informações do arquivo enviado
				$nomeArquivo = $imagemUpload["foto"]["name"];
				$tamanhoArquivo = $imagemUpload["foto"]["size"];
				$nomeTemporario = $imagemUpload["foto"]["tmp_name"];

				// Verifica se o arquivo foi colocado no campo
				if (!empty($nomeArquivo)) {

					$erro = false;

					// Verifica se o tamanho do arquivo é maior que o permitido
					if ($tamanhoArquivo > $tamanhoMaximo) {
						$erro = "O arquivo " . $nomeArquivo . " não deve ultrapassar " . $tamanhoMaximo. " bytes";
					}
					// Verifica se a extensão está entre as aceitas
					elseif (!in_array(strrchr($nomeArquivo, "."), $extensoes)) {
						$erro = "A extensão do arquivo <b>" . $nomeArquivo . "</b> não é válida";
					}

					// Diretorio onde será armazenado
					$diretorio = $caminho . "/imagens" . "/usuario-id-". $id_usuario . "/";

					if(!is_dir($diretorio)){
						mkdir($diretorio, 0777, true);
					}

					// Verifica se o arquivo existe e se é para substituir
					else if (file_exists($diretorio. $nomeArquivo) and !$substituir) {
						$erro = "O arquivo <b>" . $nomeArquivo . "</b> já existe";
					}

					// Se não houver erro
					if (!$erro) {
						// Move o arquivo para o caminho definido
						move_uploaded_file($nomeTemporario, ($diretorio . $nomeArquivo));
						// Chama o metodo para salvar no banco
						self::atualizarFoto($diretorio . $nomeArquivo, $id_usuario);
					}
					// Se houver erro
					else {
						// Mensagem de erro
						echo $erro . "<br />";
					}
				}
			}

	  }
}
