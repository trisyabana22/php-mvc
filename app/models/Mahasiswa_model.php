<?php


class Mahasiswa_model
{

    // private $mhs = [
    //     [
    //         "nama" => "Tri Syabana",
    //         "nrp" => "0402123130",
    //         "email" => "trisyabana@gmail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Febyan Nabila",
    //         "nrp" => "8213098123",
    //         "email" => "febyan@gmail.com",
    //         "jurusan" => "Teknik Informatika"

    //     ],
    //     [
    //         "nama" => "Imam Taufiqurahman",
    //         "nrp" => "2133213213",
    //         "email" => "imam@gmail.com",
    //         "jurusan" => "Teknik Informatika"

    //     ]
    // ];

    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM '  . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa
        VALUES
        ('', :nama, :nrp, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
