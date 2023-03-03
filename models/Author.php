<?php
    class Author{
        private $ma_tgia,$ten_tgia,$hinh_tgia;
        public function __construct($ma_tgia,$ten_tgia,$hinh_tgia){
            $this->ma_tgia = $ma_tgia;
            $this->ten_tgia = $ten_tgia;
            $this->hinh_tgia = $hinh_tgia;
        }
        public function getMa_tgia(){
            return $this->ma_tgia;
        }
        public function getTen_tgia(){
            return $this->ten_tgia;
        }
        public function getHinh_tgia(){
            return $this->hinh_tgia;
        }
        public function setMa_tgia($ma_tgia){
            $this->ma_tgia = $ma_tgia;
        }
        public function setTen_tgia($ten_tgia){
            $this->ten_tgia = $ten_tgia;
        }
        public function setHinh_tgia($hinh_tgia){
            $this->hinh_tgia = $hinh_tgia;
        }
    }
?>