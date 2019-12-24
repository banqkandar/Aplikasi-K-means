<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "function.php"; ?>
<div class="container">
  <h5 class="mt-4">Data TF-IDF Dokumen 5</h5>
  <div class="row mt-3">
    <div class="col-md-3">
      <?php
      //Cluster Awal
      $cc1 = 4.16;
      $cc2 = 12.87;
      ?>
      <table class="table shadow">
        <tbody>
          <tr>
            <td>K = 2</td>
          </tr>
          <tr>
            <td>Centroid 1 = <?= $cc1; ?></td>
          </tr>
          <tr>
            <td>Centroid 2 = <?= $cc2; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-4">
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Kalimat</th>
            <th>TF-IDF</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $array = explode("\n", file_get_contents('dokumen5.txt'));
          foreach ($array as $row) {
            $kalimats[] =  $row; ?>
            <tr>
              <td>K<?= $i++; ?></td>
              <td><?= $row; ?></td>
            </tr>
        </tbody>
      <?php } ?>
      </table>
    </div>
  </div>
  <?php include "tampilan.php"; ?>
    <?php
    //pengecekan
    if ($hasil[$x - 1]['clust'] == $clust) {
      $sip = false;
      echo "<div class='alert alert-success' role='alert'>
      Ternyata setelah dikelompokan clusternya sama dengan yang sebelumnya, maka iterasinya dapat diberhentikan sehingga kalimat yang termasuk pada cluster 1 yaitu k1, k2, k8 cluster 2 yaitu k3, k4, k5, k6, k7.</div>";
    } else {
      echo "<div class='alert alert-danger' role='alert'>
      Lanjut lagi gan
        </div>";
    } ?>
</div>
<?php include 'footer.php'; ?>