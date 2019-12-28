<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "function.php"; ?>
<?php $pisahin  = explode(":", file_get_contents('data/cdokumen7.txt'));?>
<div class="container">
  <h5 class="mt-4">Data TF-IDF Dokumen 7</h5>
  <div class="row mt-4">
    <div class="col-md-4">
      <fieldset class="scheduler-border">
        <legend class="scheduler-border">Input Data</legend>
        <form action="" method="post">
          <?php 
          if($_POST['kalimat']){
           $namafile = "data/dokumen7.txt";  
           $isi      = trim($_POST['kalimat']);  
           $file = fopen($namafile,"w");  
           fwrite($file,$isi);  
           fclose($file);
           $cnamafile = "data/cdokumen7.txt";  
           $datanya      = $_POST["c1"].":".$_POST["c2"];
           $cfile = fopen($cnamafile,"w");  
           fwrite($cfile,$datanya);
           fclose($cfile); 
         }
         ?>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Centroid 1</label>
              <input name="c1" class="form-control" value="<?=$pisahin[0];?>">
            </div>
            <div class="form-group col-md-6">
              <label>Centroid 2</label>
              <input name="c2" class="form-control" value="<?=$pisahin[1];?>">
            </div>
          </div>
          <div class="form-group">
            <label>Kalimat</label>
            <textarea class="form-control" name="kalimat" rows="8"><?php $array = explode("\n", file_get_contents('data/dokumen7.txt'));
          foreach ($array as $row) { echo $row;}?></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-dark" style="width: 100%">Submit</button>
        </form>
      </fieldset>
    </div>
    <!-- <div class="row mt-3"> -->
    <div class="col-md-3">
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
        $row = 0;
        $array = explode("\n", file_get_contents('data/dokumen7.txt'));
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
    <div class="col-md-3">
      <?php
      //Cluster Awal
    $cc1 = $pisahin[0];
    $cc2 = $pisahin[1];
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
  </div>
  <?php include "tampilan.php"; ?>
  <?php
    //potong
    foreach ($clust as $key => $value) {
      $s = $s+1;
      if($clust[$key]['k' . $s]=="C2"){
        $potong2 .= 'k' . $s.' ';
      }else{
        $potong1 .= 'k' . $s.' ';
      }
    }
    //pengecekan
    if ($hasil[$x - 1]['clust'] == $clust) {
      echo "<div class='container'>
              <div class='alert alert-success' role='alert'>
                Ternyata setelah dikelompokan clusternya sama dengan yang sebelumnya, maka iterasinya dapat diberhentikan sehingga kalimat yang termasuk pada cluster 1 yaitu $potong1, cluster 2 yaitu $potong2.
              </div>
            </div>";
    } else {
      echo "<div class='alert alert-danger' role='alert'>
      Lanjut lagi gan
      </div>";
    } ?>
</div>
<?php include 'footer.php'; ?>