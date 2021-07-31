<?php


class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;


    // class constructor
    public function __construct(
        $dbname = "crud_php",
        $tablename = "sanpham",
        $servername = "localhost",
        $username = "root",
        $password = ""
    ) {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con) {
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if (mysqli_query($this->con, $sql)) {

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (MaSanPham INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             TenSanPham VARCHAR (25) NOT NULL,
                             Gia int,
                             MaLoaiSp INT,
                             mota text
                            );";

            if (!mysqli_query($this->con, $sql)) {
                echo "Error creating table : " . mysqli_error($this->con);
            }
        } else {
            return false;
        }
    }

    // get product from the database
    public function getData()
    {
        $sql = "SELECT MaSanPham, TenSanPham, Gia FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
}