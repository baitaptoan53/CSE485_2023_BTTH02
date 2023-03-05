<?php
    require_once("./configs/DBConnection.php");
    require_once("./models/User.php");
    class UserService{
        public function getAllUsers($type = 'multi',$columnName=null,$condition = null){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            if($type == 'multi'){
                $sql = "SELECT * FROM users";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            }elseif($type == 'single' && $columnName != null){
                $sql = "SELECT * FROM users WHERE $columnName=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$condition]);
            }
            $newArray = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $array = [];
                $user = new User($row['user_id'],$row['email'],$row['usersname'],$row['password'],$row['level']);
                $array = [
                    'user_id'=>$user->getUser_id(),
                    'email'=>$user->getEmail(),
                    'usersname'=>$user->getUsersname(),
                    'password'=>$user->getPassword(),
                    'level'=>$user->getLevel(),
                ];

                array_push($newArray,$array);
            }
            return $newArray;
        }
        public function addUser($email,$usersname,$password,$level){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "INSERT INTO users(email,usersname,password,level) VALUES(?,?,?,?)";
            $stmt = $conn->prepare($sql);
            return $stmt->execute([$email,$usersname,$password,$level]);
        }
    }
    require_once('AllService.php');
    $user = new UserService();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $ischeck = false;

        // đăng kí
        if(isset($_POST['usersname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confPassword'])&& isset($_POST['seclectLogup']) && isset($_POST['submitLogup'])){
           $usersname = trim($_POST['usersname']);
           $email = trim($_POST['email']);
           $password = trim($_POST['password']);
           $confPassword = trim($_POST['confPassword']);
           $level = $_POST['seclectLogup'];
            
           if($allService->count('single','users','usersname',$usersname)>=1){
                $ischeck = false;
                echo'<script type="text/javascript">alert("Tên tài khoản đã tồn tại!!");window.location.href="./index.php?controller=logup"</script>';
                die();
           }else{
                $ischeck = true;
           }

           if($allService->count('single','users','email',$email)>=1){
                $ischeck = false;
                echo'<script type="text/javascript">alert("Email này đã tồn tại!!");window.location.href="./index.php?controller=logup"</script>';
                die();
           }else{
                $ischeck = true;
           }

           $password_hash="";
           if(strlen($password)<6){
                $ischeck = false;
                echo'<script type="text/javascript">alert("Mật khẩu lớn hơn 6 kí tự!!");window.location.href="./index.php?controller=logup"</script>';
                die();
           }else{
                if($password==$confPassword){
                    $ischeck = true;
                    $password_hash = password_hash($password,PASSWORD_DEFAULT);
                }else{
                    $ischeck = false;
                    echo'<script type="text/javascript">alert("Mật khẩu không trùng khớp!!");window.location.href="./index.php?controller=logup"</script>';
                    die();
                }
           }

           if($ischeck == true){
                if($user->addUser($email,$usersname,$password_hash,$level)){
                    echo'<script type="text/javascript">
                        var confirmMes = confirm("Bạn đăng kí thành công, bấm ok để chuyển trang đăng nhập");
                        if(confirmMes == true){
                            window.location.href="./index.php?controller=login";
                        }else{
                            window.location.href="./index.php?controller=logup";
                        }
                    </script>';
                };

           }
        }

        //Đăng nhập
        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['submitLogin'])){
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            
            $arrayUser = [];
            foreach($user->getAllUsers('single','email',$email) as $value){
                $arrayUser = [
                    'email' => $value['email'],
                    'password' => $value['password'],
                    'level'=>$value['level']
                ];
            }
            
            if($email == $arrayUser['email']){
                $ischeck = true;
            }else{
                $ischeck = false;
                echo'<script type="text/javascript">alert("Địa chỉ này chưa tồn tại!!");window.location.href="./index.php?controller=login"</script>';
                die();
            }
            if(password_verify($password,$arrayUser['password'])){
                $ischeck = true;
            }else{
                $ischeck = false;
                echo'<script type="text/javascript">alert("Nhập sai mật khẩu!!");window.location.href="./index.php?controller=login"</script>';
                die();
            }

            if($ischeck == true && $arrayUser['level']==0){
                echo'<script type="text/javascript">
                var confirmMes = confirm("Bạn đăng nhập thành công, bấm ok để chuyển trang người dùng");
                if(confirmMes == true){
                    window.location.href="./index.php?controller=login&action=user";
                }else{
                    window.location.href="./index.php?controller=login";
                }
                </script>';
                die();
            }elseif($ischeck == true && $arrayUser['level']==1){
                echo'<script type="text/javascript">
                var confirmMes = confirm("Bạn đăng nhập thành công, bấm ok để chuyển trang người đăng");
                if(confirmMes == true){
                    window.location.href="./index.php?controller=homeAdmin";
                }else{
                    window.location.href="./index.php?controller=login";
                }
                </script>';
                die();
            }
        }
    }


?>