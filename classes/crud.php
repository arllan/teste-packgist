<?php
    namespace App;
    
    use App\Conexao;

class crud 
    {
        private function retornoDafuncao($valor) 
        {
            if($valor > 0)
            { $mensagemRetorno = TRUE ;}
            else
            { $mensagemRetorno = FALSE ;} 
            return $mensagemRetorno ;
        }

        public function insert($nome,$email) 
        {
            $sql = "insert into usuario (nome,email) value (:nome,:email)";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(':nome',$nome);
            $stmt->bindValue(':email',$email);
            $stmt->execute();
            return $this->retornoDafuncao($stmt->rowCount());
        }

        public function select()
        {
            $sql = "select nome, email from usuario order by id";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0)
            {
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            }
            else
            {
                return $this->retornoDafuncao($stmt->rowCount());
            }
        }

        public function update($nome, $email, $id) 
        {
            $sql = "update usuario set nome = :nome, email = :email where id = :id";

            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(':nome',$nome);
            $stmt->bindValue(':email',$email);
            $stmt->bindValue(':id',$id);
            $stmt->execute();
            return $this->retornoDafuncao($stmt->rowCount());
        }

        public function delete($id)
        {
            $sql = "delete from usuario where id = :id";

            $stmt = $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(':id',$id);
            $stmt->execute();
            return $this->retornoDafuncao($stmt->rowCount());
        }
    }
?>