<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mahasiswa extends Controller
{
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
