<?php
    Class Admin{

        // public function __construct()
        // {
        //     include "db.php";
        // }

        function login(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                try {
                    include "db.php";
                    $sql = "select * from User where Email=? and Password=?";
                    $sth = $conn->prepare($sql);
                    $sth->execute(array($_POST['Email'], $_POST['password']));
                    $sth->setFetchMode(PDO::FETCH_ASSOC);
                    if ($sth->rowCount() > 0) {
                        $row = $sth->fetch(); {
                            $_SESSION['login_'.$key] = $row['ID_User'];
                        }
                        return "Successful";
                    } else {
                        return $_POST['password']."Wrong Email or password";
                    }
                } catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            };
        }
}
    
?>