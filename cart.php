<?php
ob_start();
require_once("koneksi.php");
require_once("header.php");
                $jumlah = $_POST['jumlah'];
     
    if (isset($_GET['act']) && isset($_GET['ref'])) {
        $act = $_GET['act'];
        $ref = $_GET['ref'];
             
        if ($act == "add") {
            if (isset($_GET['barang_id'])) {
                $barang_id = $_GET['barang_id'];
                if (isset($_SESSION['items'][$barang_id])) {
                    $_SESSION['items'][$barang_id] += $jumlah;
                } else {
                    $_SESSION['items'][$barang_id] = $jumlah; 
                }
            }
        } elseif ($act == "plus") {
            if (isset($_GET['barang_id'])) {
                $barang_id = $_GET['barang_id'];
                if (isset($_SESSION['items'][$barang_id])) {
                    $_SESSION['items'][$barang_id] += 1;
                }
            }
        } elseif ($act == "min") {
            if (isset($_GET['barang_id'])) {
                $barang_id = $_GET['barang_id'];
                if (isset($_SESSION['items'][$barang_id])) {
                    if($_SESSION['items'] >= 0){
                    $_SESSION['items'][$barang_id] -= 1;
                    }else{
                        $_SESSION['items'][$barang_id] = 0;
                    }
                }
            }
        } elseif ($act == "del") {
            if (isset($_GET['barang_id'])) {
                $barang_id = $_GET['barang_id'];
                if (isset($_SESSION['items'][$barang_id])) {
                    unset($_SESSION['items'][$barang_id]);
                }
            }
        } elseif ($act == "clear") {
            if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key => $val) {
                    unset($_SESSION['items'][$key]);
                }
                unset($_SESSION['items']);
            }
        } 
         
        header ("location:" . $ref);
    }
?>