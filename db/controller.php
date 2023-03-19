<?php
class Controller{
    private $db;

    function __construct($con){
        $this->db=$con;
    }

    function getBook(){
        try{
            $sql = "SELECT * FROM book";
            $result=$this->db->query($sql);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getMembers(){
        try{
            $sql = "SELECT * FROM members a INNER JOIN book b ON a.book_id = b.book_id ORDER By a.mem_id";
            $result=$this->db->query($sql);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }  
    }
    
    function insert($name,$sname,$email,$book_id){
        try{
            $sql="INSERT INTO members(name,sname,email,book_id) VALUES (:name,:sname,:email,:book_id)";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":name",$name);
            $stmt->bindParam(":sname",$sname);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":book_id",$book_id);   
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }
    function delete($id){
        try{
            $sql="DELETE FROM members WHERE mem_id=:id ";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getMemberDetail($id){
        try{
            $sql="SELECT * FROM members a 
            INNER JOIN book b
            ON a.book_id = b.book_id WHERE mem_id =:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function update($fname,$sname,$email,$book_id,$mem_id){
        try{
            $sql="UPDATE members 
            SET name=:name, sname=:sname, email=:email, book_id=:book_id 
            WHERE mem_id = :mem_id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":name",$fname);
            $stmt->bindParam(":sname",$sname);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":book_id",$book_id);
            $stmt->bindParam(":mem_id",$mem_id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}




?>