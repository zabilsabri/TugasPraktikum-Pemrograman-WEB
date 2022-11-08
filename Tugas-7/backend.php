<?php
session_start();

class Autentikasi{
    public function login(){
        if (isset($_POST['login'])){
    
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            if(!empty($email) && !empty($password)){
                $sql = mysqli_query(mysqli_connect("localhost", "root", "", "mahasiswa", 3308), "select std_id, Nama, Email, Password from account where Email = '$email' AND Password = '$password'");
        
                $row = mysqli_fetch_array($sql);
                
                if ($row['Email'] == $email && $password == $row['Password']){
                    $_SESSION['login'] = true; 
                    header('location: index.php?halaman=1');
                } else {
                    header('location: login.php?wrong');
                };
                
            } else {
                header('location: login.php?empty');
            };
            
        } else {
            header("location: login.php?notlogin");
        };
    }

    public function register(){
        if(isset($_POST['register'])){
            $nama = $_POST['username'];
            $password = password_hash($_POST['nis'], PASSWORD_DEFAULT);
                
            $sqlc = mysqli_query($conn, "select NAMA from student_info where NAMA = '$nama'");
            $row = mysqli_fetch_array($sqlc);
        
            
        
                if($row['NAMA'] != $nama){
                    $sql = "insert into student_info (NAMA, NIS) values ('$nama', '$password')";
                    if($conn->query($sql)){
                        header('location: login.php');
                    } else {
                        header('location: signUp.php?failed');
                    };
                } else {
                    header('location: signUp.php?exist');
                };
            
        } else {
            header('location: signUp.php?notLogin');
        };
    }
}

class mahasiswa{
    public function inputData(){
        if (isset($_POST['submit'])){
            $nim = $_POST['NIM'];
            $nama = $_POST['Nama'];
            $alamat = $_POST['Alamat'];
            $fakultas = $_POST['Fakultas'];
        
            $checkNIM = mysqli_query(mysqli_connect("localhost", "root", "", "mahasiswa", 3308), "select NIM from data where NIM = '$nim'");
            $row = mysqli_fetch_array($checkNIM);
        
            if(!isset($row['NIM'])){
                $sql = "INSERT INTO `data` VALUES ('$nim', '$nama', '$alamat', '$fakultas')";
                if(mysqli_connect("localhost", "root", "", "mahasiswa", 3308)->query($sql)){
                    header("location: index.php?success&halaman=1");
                } else {
                    header('location: index.php?failed&halaman=1');
                };
            } else {
                header('location: index.php?exist&halaman=1');
            }
        } else {
            header('location: index.php?keluar&halaman=1');
        }
    }

    public function hapusData(){
        if($_GET['nim']){
            $nim = $_GET['nim'];
            $deleteData = mysqli_query(mysqli_connect("localhost", "root", "", "mahasiswa", 3308), "delete from `data` where NIM = '$nim'");
            header('location: index.php?deleteSuccess&halaman=1');
        }
    }

    public function editData(){
        if(isset($_POST['edit']) && isset($_GET['nim'])){
            $nimDulu = $_GET['nim'];
            $nim = $_POST['NIM'];
            $nama = $_POST['Nama'];
            $alamat = $_POST['Alamat'];
            $fakultas = $_POST['Fakultas'];
        
            if($nimDulu == $nim){
                $sql = "update `data` set NIM = '$nim', Nama = '$nama', Alamat = '$alamat', Fakultas = '$fakultas' where NIM = '$nimDulu'";
                if(mysqli_connect("localhost", "root", "", "mahasiswa", 3308)->query($sql)){
                    header('location: index.php?editSuccess&halaman=1');
                } else {
                    header('location: index.php?failed&halaman=1');
                };
            } else {
                $checkNIM = mysqli_query(mysqli_connect("localhost", "root", "", "mahasiswa", 3308), "select NIM from `data` where NIM = '$nim'");
                $rowCheckNIM = mysqli_fetch_array($checkNIM);
        
                if(!isset($rowCheckNIM)){
                    $sql = "update `data` set NIM = '$nim', Nama = '$nama', Alamat = '$alamat', Fakultas = '$fakultas' where NIM = '$nimDulu'";
                    if(mysqli_connect("localhost", "root", "", "mahasiswa", 3308)->query($sql)){
                        header('location: index.php?editSuccess&halaman=1');
                    } else {
                        header('location: index.php?failed&halaman=1');
                    };
                } else {
                    header('location: index.php?exist&halaman=1');
                }
            }
        
        } else {
            header('location: index.php?keluar&halaman=1');
        }
    }

}

$mahasiswa = new mahasiswa();
$autentikasi = new Autentikasi();

if(isset($_GET['nim']) && isset($_GET['delete'])){
    $mahasiswa->hapusData();
}

if(isset($_GET['tambahDataMahasiswa'])){
    $mahasiswa->inputData();
}

if(isset($_GET['nim']) && isset($_GET['editDataMahasiswa'])){
    $mahasiswa->editData();
}

if(isset($_GET['login'])){
    $autentikasi->login();
}