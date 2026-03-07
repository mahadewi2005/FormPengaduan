<?php

class Pengaduan {

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    // mengambil semua data pengaduan
    public function tampil(){

        $sql = "SELECT * FROM pengaduan ORDER BY created_at DESC";
        return $this->conn->query($sql);

    }

    // menghapus data pengaduan
    public function hapus($id){

        $stmt = $this->conn->prepare("DELETE FROM pengaduan WHERE id=?");
        $stmt->bind_param("i",$id);
        return $stmt->execute();

    }

}