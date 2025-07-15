<?php

// menampilkan info donatur
$nama = "Chelsea Juara";
$umur = 25;
$pekerjaan = "Programmer";

function cetak_informasi($nama, $umur, $pekerjaan)
{
    echo "Nama : " . $nama . "<br>";
    echo "Umur : " . $umur . "<br>";
    echo "Pekerjaan : " . $pekerjaan . "<br>";
}

cetak_informasi($nama, $umur, $pekerjaan);
