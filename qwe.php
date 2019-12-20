<?php include "function.php"; ?>
<?php
error_reporting();
//clusterawal
$cc1 = 1.91;
$cc2 = 8.9;
$array = explode("\n", file_get_contents('dokumen2.txt'));
foreach ($array as $row){
	$kalimats[] =  $row;
}
$sip = true;
$clus = array();
$sit = 1;
while ($sip)
{
	$jumlah = count(array_filter($kalimats)); //menghitungjumlahdatakalimat
	$data = hitung_jarak($kalimats,$cc1,$cc2,$jumlah); //hasilmenghitungjarak
	$hasil[$sit]['jumlah'] = $jumlah;
	$hasil[$sit]['data'] = $data;
	$clust = cluster($data,$hasil[$sit]['jumlah']); //cari minimum/cluster
	$hasil[$sit]['clust'] = $clust;
	$caric1 = cariC1($kalimats, $clust,$jumlah) ; ///caric1
	$caric2 = cariC2($kalimats, $clust,$jumlah) ; ///caric2
	$c1baru = array_sum($caric1) / count(array_filter($caric1));
	$c2baru = array_sum($caric2) / count(array_filter($caric2));
	$hasil[$sit]['c1'] = $caric1;
	$hasil[$sit]['c2'] = $caric2;
	$hasil[$sit]['c1baru'] = $c1baru;
	$hasil[$sit]['c2baru'] = $c2baru;
	$cc1 = $c1baru;
	$cc2 = $c2baru;
	$clust = $clust;
	if($hasil[$sit-1]['clust']==$clust){
		$sip=false;
		echo "Sama!!!";
	}
	$sit++;
}

echo ('<pre>');
print_r($hasil);