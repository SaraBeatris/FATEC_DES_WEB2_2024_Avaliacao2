<?php

class Cadastro {
   private $pdo;
   public function __construct() {
       try {
           $this->pdo = new PDO('mysql:host=localhost;dbname=vagas', 'root', '');
           $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       } catch (PDOException $e) {
           echo "Erro na conexão: " . $e->getMessage();
       }
   }
   public function __destruct() {
       $this->pdo = null;
   }
   public function cadastrarVaga($nomeEmpresa, $numeroWhatsapp, $emailContato, $descritivoVaga, $curso) {
       $sql = "INSERT INTO vagas (nome_empresa, numero_whatsapp, email_contato, descritivo_vaga, curso) VALUES (?, ?, ?, ?, ?)";
       $stmt = $this->pdo->prepare($sql);
       $stmt->execute([$nomeEmpresa, $numeroWhatsapp, $emailContato, $descritivoVaga, $curso]);
   }
   public function removerVaga($id) {
       $sql = "DELETE FROM vagas WHERE id = ?";
       $stmt = $this->pdo->prepare($sql);
       $stmt->execute([$id]);
   }
   public function listarVagas() {
       $sql = "SELECT * FROM vagas";
       $stmt = $this->pdo->query($sql);
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
}
?>


