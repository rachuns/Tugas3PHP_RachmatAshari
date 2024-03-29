<?php
    $theader = ['No','NIM','Nama','Nilai','Keterangan','Grade','Predikat'];
    $datamhs = [
        ['NIM' => '20210120030', 'Nama' => 'Rachmat Ashari', 'Nilai' => '95'],
        ['NIM' => '20210120031', 'Nama' => 'Rudi Tabudi', 'Nilai' => '85'],
        ['NIM' => '20210120032', 'Nama' => 'Rasyid Muhadjir', 'Nilai' => '75'],
        ['NIM' => '20210120033', 'Nama' => 'Riandri Artha', 'Nilai' => '65'],
        ['NIM' => '20210120034', 'Nama' => 'Rara Timothy', 'Nilai' => '55'],
        ['NIM' => '20210120035', 'Nama' => 'Caca Marica', 'Nilai' => '79'],
        ['NIM' => '20210120036', 'Nama' => 'Kirani', 'Nilai' => '80'],
        ['NIM' => '20210120037', 'Nama' => 'Ronaldo Wati', 'Nilai' => '43'],
        ['NIM' => '20210120038', 'Nama' => 'Renaldi', 'Nilai' => '90'],
        ['NIM' => '20210120039', 'Nama' => 'Suci Lestari', 'Nilai' => '98'],
        ['NIM' => '20210120040', 'Nama' => 'Muhammad Hasan', 'Nilai' => '90'],
        ['NIM' => '20210120041', 'Nama' => 'Kevin', 'Nilai' => '85'],
        ['NIM' => '20210120042', 'Nama' => 'Ben Whittaker', 'Nilai' => '100'],
        ['NIM' => '20210120043', 'Nama' => 'Riana Dewi', 'Nilai' => '65'],
        ['NIM' => '20210120044', 'Nama' => 'Roni', 'Nilai' => '75'],
        ['NIM' => '20210120045', 'Nama' => 'Muklis', 'Nilai' => '50'],
    ];

    $jml_nilai = array_column($datamhs,'Nilai');
    $nilai_tertinggi = max($jml_nilai);
    $nilai_terendah = min($jml_nilai);
    $jml_mhs = count($datamhs);
    $nilai_total = array_sum($jml_nilai);
    $nilai_rata = $nilai_total / $jml_mhs;

    $ket = [
        'Nilai Tertinggi        : '. $nilai_tertinggi,
        'Nilai Terendah         : '. $nilai_terendah,
        'Nilai Rata-Rata        : '. $nilai_rata,
        'Jumlah Mahasiswa       : '. $jml_mhs,
        'Jumlah Total Nilai     : '. $nilai_total,
    ];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3 PHP Rachmat Ashari</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css" />
</head>

<body>
    <h1 align="center">Data Mahasiswa</h1>
    <div class="card" style="margin-top: 20px;margin-right: 20px;margin-left:20px">
        <div class="card-body">
            <table id="example" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <?php foreach($theader as $judul){ ?>
                        <th><?= $judul ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($datamhs as $mhs) {
                        $keterangan = ($mhs['Nilai'] >= 65) ? "Lulus" : "Tidak Lulus";

                        if($mhs['Nilai'] >=80 && $mhs['Nilai'] <=100){
                            $grade = "A";
                        }elseif($mhs['Nilai'] >=70 && $mhs['Nilai']<=79){
                            $grade = "B";
                        }elseif($mhs['Nilai'] >=60 && $mhs['Nilai'] <=69){
                            $grade = "C";
                        }elseif($mhs['Nilai'] >= 50 && $mhs['Nilai']  <=59){
                            $grade = "D";
                        }elseif($mhs['Nilai'] >=0 && $mhs['Nilai'] <=49){
                            $grade = "E";
                        }else{
                            $grade = "Anda Gagal";
                        }

                        switch($grade){
                            case "A":
                                $predikat = "Memuaskan";
                                break;
                            case "B":
                                $predikat = "Baik";
                                break;
                            case "C":
                                $predikat = "Cukup";
                                break;
                            case "D":
                                $predikat = "Kurang";
                                break;
                            case "E":
                                $predikat = "Buruk";
                                break;
                            default:
                                $predikat = "Anda Gagal";
                        }
                    ?>
                    <tr>
                        <td> <?= $no++ ?></td>
                        <td><?= $mhs['NIM'] ?></td>
                        <td><?= $mhs['Nama'] ?></td>
                        <td><?= $mhs['Nilai'] ?></td>
                        <td><?= $keterangan ?></td>
                        <td><?= $grade ?></td>
                        <td><?= $predikat ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                        <?php 
                foreach($ket as $hasil){ ?>
                    <tr>
                        <th class="px-6 py-4 text-right" colspan="4"><?= $hasil ?></th>
                    </tr>
                    <?php } ?>
                </tfoot>
            </table>
            <p align="center">&copy; Rachmat Ashari - 20210120030</p>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
<script>
    new DataTable("#example");
</script>

</html>