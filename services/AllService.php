<?php
    require_once('./configs/DBConnection.php');
    class AllService{
        public function addAutoPrimaryKey($my_table,$column_id_key){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "ALTER TABLE $my_table MODIFY COLUMN $column_id_key INT AUTO_INCREMENT";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
        public function delAutoPrimaryKey($my_table,$column_id_key){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "ALTER TABLE $my_table MODIFY COLUMN $column_id_key INT";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
        public function addForeiginKey($parent_table ,$parent_column,$child_table ,$child_column,$foreign_key_name ){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "ALTER TABLE $parent_table ADD  CONSTRAINT $foreign_key_name FOREIGN KEY ($parent_column) REFERENCES $child_table($child_column) ON DELETE RESTRICT ON UPDATE RESTRICT";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
        public function delForeiginKey($table_name,$foreign_key_name){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();
            $sql = "ALTER TABLE $table_name DROP FOREIGN KEY $foreign_key_name";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
    }
    $allService = new AllService();
?>