<?php
//timezone
date_default_timezone_set('America/Sao_Paulo');

// conexão com o banco de dados
define('BD_SERVIDOR','localhost');
define('BD_USUARIO','root');
define('BD_SENHA','usbw');
define('BD_BANCO','bd_agendamento');
    
class Banco{
    protected $mysqli;
    public function __construct(){
        $this->conexao();
    }
    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
    }
    public function setAgendamentos($nome, $telefone, $origem, $data_contato, $observacao){
        $stmt = $this->mysqli->prepare("insert into agendamentos (`nome`, `telefone`, `origem`, `data_contato`, `observacao`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $nome, $telefone, $origem, $data_contato, $observacao);
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
    }
    public function getAgendamentos($id) {
        try {
            if(isset($id) && $id > 0){
                $stmt = $this->mysqli->query("select * from agendamentos WHERE id = '" . $id . "';");
            }else{
                $stmt = $this->mysqli->query("select * from agendamentos;");
            }
            
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['nome'] = $l['nome'];
                $f_lista[$i]['telefone'] = $l['telefone'];
                $f_lista[$i]['origem'] = $l['origem'];
                $f_lista[$i]['data_contato'] = $l['data_contato'];
                $f_lista[$i]['observacao'] = $l['observacao'];
                $i++;
            }
            return $f_lista;
        } catch (Exception $e) {
            echo "Erro:" . $e;
        }
    }
    public function updateAgendamentos($id, $nome, $telefone, $origem, $data_contato, $observacao){
       $stmt = $this->mysqli->query("update agendamentos set `nome` = '" . $nome . "', `telefone` =  '" . $telefone . "', `origem` =  '" . $origem . "', `data_contato` =  '" . $data_contato . "', `observacao` =   '" . $observacao . "' WHERE `id` =  '" . $id . "';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }
    public function deleteAgendamentos($id){
        $stmt = $this->mysqli->query("delete from agendamentos WHERE `id` =  '" . $id . "';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }
}    
?>
