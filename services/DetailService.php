<?php
    class DetailService{
        public function getDetailArticle($ma_bviet=null){
            require_once("ArticleService.php");
            $article = new ArticleService();
            $array = [];
            foreach($article->getAllArticle('single','ma_bviet',$ma_bviet) as $vaule){
                $array = [
                    'tieude'=>$vaule['tieude'],
                    'ten_bhat'=>$vaule['ten_bhat'],
                    'tomtat'=>$vaule['tomtat'],
                    'noidung'=>$vaule['noidung'],
                    'hinhanh'=>$vaule['hinhanh'],
                ];
            }
            return $array;
        }
        public function getDetaileAuthor($ma_tgia = null){
            require_once("AuthorService.php");
            $author = new AuthorService();
            $array = [];    
            foreach($author->getAllAuthor('single','ma_tgia',$ma_tgia) as $value){
                $array = ['ten_tgia' => $value['ten_tgia']];
            }
            return $array;
        }
        public function getDetailCategory($ma_tloai){
            require_once("CategoryService.php");
            $category = new CategoryService();
            $array = [];
            foreach($category->getAllCategory('single','ma_tloai',$ma_tloai) as $value){
                $array = ['ten_tloai'=> $value['ten_tloai']];
            }
            return $array;
        }
    }
    $detail = new DetailService();

    $resultArticle = $resultAuthor = $resultCategory = [];
    $ma_bviet = $ma_tgia = $ma_tloai ='';
    if(isset($_GET['ma_bviet']) && $_GET['ma_tgia'] && $_GET['ma_tloai']){
        $ma_bviet = $_GET['ma_bviet'];
        $ma_tgia = $_GET['ma_tgia'];
        $ma_tloai = $_GET['ma_tloai'];
        
        $resultArticle=$detail->getDetailArticle($ma_bviet);
        $resultAuthor=$detail->getDetaileAuthor($ma_tgia);
        $resultCategory=$detail->getDetailCategory($ma_tloai);
    }

    $detailTitle = $resultArticle['ten_bhat'];
    $img = $resultArticle['hinhanh'] ? $resultArticle['hinhanh'] : './assets/images/author/default.jpg';
?>