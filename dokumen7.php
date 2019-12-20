<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "function.php"; ?>
<div class="container">
  <h5 class="mt-4">Data TF-IDF Dokumen 7</h5>
  <div class="row mt-3">
    <div class="col-md-3">
      <?php
      //Cluster Awal
      $cc1 = 3.36;
      $cc2 = 18.68;
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
          $array = explode("\n", file_get_contents('dokumen7.txt'));
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
  <?php
  $pernyataan = true;
  $clus = array();
  $x = 0;
  while ($pernyataan) {
    $jumlah = count(array_filter($kalimats)); //menghitungjumlahdatakalimat
    $data = hitung_jarak($kalimats, $cc1, $cc2, $jumlah); //hasilmenghitungjarak
    $hasil[$x]['jumlah'] = $jumlah;
    $hasil[$x]['data'] = $data;
    $clust = cluster($data, $hasil[$x]['jumlah']); //cari minimum/cluster
    $hasil[$x]['clust'] = $clust;
    $caric1 = cariC1($kalimats, $clust, $jumlah); ///caric1
    $caric2 = cariC2($kalimats, $clust, $jumlah); ///caric2
    $c1baru = array_sum($caric1) / count(array_filter($caric1));
    $c2baru = array_sum($caric2) / count(array_filter($caric2));
    $hasil[$x]['c1'] = $caric1;
    $hasil[$x]['c2'] = $caric2;
    $hasil[$x]['c1baru'] = round($c1baru, 3);
    $hasil[$x]['c2baru'] = round($c2baru, 3);
    $cc1 = $c1baru;
    $cc2 = $c2baru;
    $clust = $clust;
    if ($hasil[$x - 1]['clust'] == $clust) {
      $pernyataan = false;
    }
    $x++;
    ?>
    <?php for ($i = 0; $i < count($data); $i++) { ?>
      <div class="row">
        <div class="col-md-7">
          <h5>Hitung jarak iterasi-<?= $x ?></h5>
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Kalimat</th>
                <th scope="col">C1</th>
                <th scope="col">C2</th>
                <th scope="col">Min</th>
                <th scope="col">cluster</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php for ($i = 0; $i < count($data); $i++) {
                      $a = $i + 1;
                      $min_cluster = min($data[$i]['c1'], $data[$i]['c2']);
                      $c1 = $data[$i]['c1'];
                      $c2 = $data[$i]['c2'];
                      ?>
                  <td>K<?= $a ?></td>
                  <td><?= round($c1, 3) ?></td>
                  <td><?= round($c2, 3) ?></td>
                  <td><?= round($min_cluster, 3) ?></td>
                  <td><?= $clust[$i]['k' . $a] ?></td>
              </tr>
            <?php } ?>
          </table>
        </div>

        <div class="col-md-3">
          <table class="table mt-5">
            <tbody>
              <tr>
                <td><b>Centroid baru</b></td>
                <td></td>
              </tr>
              <tr>
                <td>Cluster 1/c1</td>
                <td><?= round($c1baru, 3) ?></td>
              </tr>
              <tr>
                <td>Cluster 2/c2</td>
                <td><?= round($c2baru, 3) ?></td>
              </tr>
            </tbody>
          </table>

        </div>
      <?php } ?>
      </div>
    <?php }  ?>
    <?php
    //pengecekan
    if ($hasil[$x - 1]['clust'] == $clust) {
      $sip = false;
      echo "<div class='alert alert-success' role='alert'>
      Ternyata setelah dikelompokan clusternya sama dengan yang sebelumnya, maka iterasinya dapat diberhentikan sehingga kalimat yang termasuk pada cluster 1 yaitu k2, k3, k4 dan cluster 2 yaitu k1, k5, k6, k7.</div>";
    } else {
      echo "<div class='alert alert-danger' role='alert'>
      Lanjut lagi gan
        </div>";
    } ?>
</div>
<?php include 'footer.php'; ?>