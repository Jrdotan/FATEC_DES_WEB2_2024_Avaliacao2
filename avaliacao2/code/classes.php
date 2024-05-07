<?php 
session_start();

 /*classe Login tem como função conectar o usuário ao banco
 **lendo, comparando e validando seu usuário para dar acesso
 ** ao site*/

class Login { 
	private $name = 'vestibular'; 
	private $password = 'fatec'; 
	 
	public function verificar_credenciais( $name, $password ) { 
        if ( $name == $this->name ) {
            if ( $password == $this->password ) {
                $_SESSION["logged_in"] = TRUE;
                return TRUE;
            }
        }
        return FALSE;
	} 

    public function verificar_logado() { 
        if ( $_SESSION["logged_in"]) {
            return TRUE;
        }
        $this->logout();
	} 

    public function logout() { 
        session_destroy();
        header("Location: index.php");
        exit();
	} 
} 

class Cadastro{
  
 /*classe Cadastro tem como função conectar o candidato ao banco
 **Além de cadastrar suas informações no banco de dados*/

 protected function connect() 
 {
    try {
        // Variaveis de banco
        $usernameDbh = "root";
        $passwordDbh = "";
        $database = new PDO('mysql:host=localhost;dbname=vestibular', $usernameDbh, $passwordDbh);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        // Log de erro no sistema
        error_log("Erro de conexão: " . $e->getMessage(), 0);
        // Avisa sobre o erro
        echo "Um erro ocorreu ao tentar acessar o banco";
        exit();
    }

    return $database;
}

protected function set_candidato($nomeCompleto, $Curso) //cadastra candidato no sistema
{
    $database = $this->connect();
    try {
        $comandosql = $database->prepare('INSERT INTO candidatos (nome, curso) VALUES (?, ?)');
        $comandosql->execute(array($nomeCompleto, $Curso));

        if ($comandosql->rowCount() > 0) {
            return true; // cadastro bem sucedido
            exit(1);
        } else {
           
            error_log("Erro na hora de ler colunas");
            return false;
        }
    } catch (PDOException $e) {
        error_log("Erro: " . $e->getMessage(), 0); //log de erro e informa erro
        echo "um erro ocorreu";
        return false;
    }
}
public function ler_candidatos()
{
    try {
        $database = $this->connect();
        $sql = "SELECT id, nome, curso FROM candidatos";
        $result = $database->query($sql);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $curso;

                if ($row['curso'] == 1) //Procura se candidato pertence ao curso 1 ou 2  
                {
                  $curso = "DSM";
                } else {
                  $curso = "GE";
                } 
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nome']}</td>
                    <td>$curso</td>
                </tr>
                ";
            }
        } else {
            echo "Nenhum candidato encontrado.";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
}

 /*classe Candidato tem como função servir para
 molde das instâncias para os dados dos Candidatos**/

class Candidato extends Cadastro {
private $nomeCompleto;
private $Curso;

public function __construct($nomeCompleto, $Curso) {
    $this->nomeCompleto = $nomeCompleto;
    $this->Curso = $Curso;
}

public function validar_cadastro_candidato() {
    $this->set_candidato($this->nomeCompleto, $this->Curso); //chamada para a função que executa a string de inserção de dados no banco
}
}



?>


