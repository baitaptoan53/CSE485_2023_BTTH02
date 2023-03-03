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
    }
    $allService = new AllService();
?>