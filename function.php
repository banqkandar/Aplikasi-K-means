<?php 
//menghitungjarak
function hitung_jarak(&$kalimat, $c1, $c2, $jumlah){
	for ($j=0; $j < $jumlah ; $j++) { 
		$c11 = pow(sqrt(abs($kalimat[$j]-$c1)),2);
		$c22 = pow(sqrt(abs($kalimat[$j]-$c2)),2);
		$hasil = array();
		$hasil['c1'] = $c11;
		$hasil['c2'] = $c22;
		$fin[] = $hasil;
	}
	return $fin;
}

//pengelompokan
function cluster(&$data, $jumlah){
	$clus = array();
	for ($x=0; $x < $jumlah ; $x++) { 
		$a = $x+1;
		$cluster = min($data[$x]['c1'],$data[$x]['c2']);
		if($cluster==$data[$x]['c1']){
			$clus[]['k'.$a] = "C1";
		}else{
			$clus[]['k'.$a] = "C2";
		}
	}
	return $clus;
}

//caric1&c2
function cariC1(&$kalimat, &$data, $jumlah){
	$clus = array();
	for ($s=0; $s < $jumlah ; $s++) { 
		$a = $s+1;
		if($data[$s]['k'.$a]=="C1"){
			array_push($clus,$kalimat[$s]);
		}else{
			//array_push($clus,$kalimat[$s]);
		}
	}
	return $clus;
}
function cariC2(&$kalimat, &$data, $jumlah){
	$clus = array();
	for ($s=0; $s < $jumlah ; $s++) { 
		$a = $s+1;
		if($data[$s]['k'.$a]=="C2"){
			array_push($clus,$kalimat[$s]);
		}else{
			//array_push($clus,$kalimat[$s]);
		}
	}
	return $clus;
}
?>