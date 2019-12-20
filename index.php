<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<div class="container">
  <div class="my-3 p-3 bg-white rounded shadow">
    <div class="row">
      <div class="col-md-12">
        <h6 class="font-weight-bold">Kasus Peringkasan Dokumen</h6>
        <p class="font-font-weight-light">Seringkali pembaca enggan untuk mempelajari sebuah dokumen yang terlalu
          panjang. Maka dibutuhkan sistem peringkasan yang mengolah dokumen berupa data teks menjadi data numerik
          disebut proses ekstraksi fitur. Salah satu cara ekstraksi fitur adalah Tf-Idf. Nilai hasil Tf-Idf tersebut
          digunakan sebagai masukan algoritma KMEANS. Perhitungannya dapat diklik di bawah ini:</p>
      </div>
    </div>
  </div>
  <div class="p-4 bg-white rounded shadow">
    <h4 class="border-bottom border-dark pb-3 mb-0">Komponen Dokumen</h4>
    <?php for ($i = 1; $i <= 9; $i++) {?>
    <div class="col-md-1 d-inline-flex">
      <a href="dokumen<?= $i ?>.php" style="text-decoration: none">
        <div class="my-3 card text-dark bg-white shadow rounded">
          <div class="card-body hover">
          <strong class="d-block text-gray-dark">Dokumen <?= $i ?></strong>
          </div>
        </div>
      </a>
    </div>
    <?php } ?>
  </div>

</div>
<?php include 'footer.php'; ?>