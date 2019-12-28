<?php include_once 'function.php'; ?>
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
      <table class="table mt-5 shadow">
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