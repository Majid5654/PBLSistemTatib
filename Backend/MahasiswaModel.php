<?php
class MahasiswaModel {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function getMahasiswaById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM PelanggaranMahasiswa WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getListPelanggaran() {
        $stmt = $this->conn->prepare("SELECT NO, Pelanggaran, Tingkat FROM TingkatPelanggaran");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteMahasiswa($id) {
        $stmt = $this->conn->prepare("DELETE FROM PelanggaranMahasiswa WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updateMahasiswa($data) {
        $stmt = $this->conn->prepare("UPDATE PelanggaranMahasiswa SET Nama = :nama, NIM = :nim, Jurusan = :jurusan, Prodi = :prodi, Semester = :semester, Jenis_Pelanggaran = :jenis_pelanggaran WHERE ID = :id");
        $stmt->execute($data);
        return $stmt->rowCount();
    }
}
?>
