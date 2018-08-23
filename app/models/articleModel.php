<?php
class articleModel extends Database {

    public $table = 'article';

    public $conn;

    public  function  __construct()
    {
        parent::__construct();
        $this->conn = self::$connection;

    }

    public  function getInsertLastId(){
        return $this->conn->insert_id;
    }

    public function getRow($id){
        $sql = "SELECT * FROM " . $this->table . " WHERE id=" . (int) $id;
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row;
            }
        }
        return array();
    }

    public function getRows(){
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }

        return array();
    }

    public  function  store($data){

        $id = isset($data['id']) ? $data['id'] : 0;
        if ($id > 0){
            $data_default = array('title' => '', 'article_content' => '', 'status' => 0);
            $data = array_merge($data_default, $data);

            $update = '';
            foreach ($data as $field => $value){
                if (is_numeric($value)){
                    $update .= $field . " = " . (int)$value;
                } else {
                    $update .= $field . " = " . mysqli_real_escape_string($value) . "'";

                }
            }

            //update
            $sql = "UPDATE " . $this->table." SET ".$update. " WHERE id=".(int)$id;

            if ($this->conn->query($sql) === TRUE) {
                return true;
            }
             else {
                 return false;
             }
        } else {
            //insert
            $data_default = array('title' => '', 'article_content' => '', 'status' => 0);
            $data = array_merge($data_default, $data);

            $field = array();
            $field[] = 'title';
            $field[] = 'article_content';
            $field[] = 'status';

            $value = array();
            $value[] = " ' ".mysqli_real_escape_string($data['title'])." ' ";
            $value[] = " ' ".mysqli_real_escape_string($data['article_content'])." ' ";
            $value[] = $data['status'];

            $sql = "INSERT INTO" . $this->table." (".implode(',', $field).")VALUE (".implode(',', $value).")";
            if ($this->conn->query($sql) === TRUE){
                return true;
            } else {
                return false;
            }
        }
    }
    public function detele($id){

        $sql = "DELETE * FROM " . $this->table . " WHERE id=" . (int) $id;
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row;
            }
        }else{
            if(empty(trim($_GET["id"]))){
                header("location: " . URL);
                exit();

        }return array();
}


}