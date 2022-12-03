

<?php
error_reporting(0);
include "konv.php";
if($_POST['rumus'] == '1'){
    $hasil_enkrip = "";
    $str = $_POST['text'];
    $jumlah_geser = 3; // geser 3
    for($i=0;$i<strlen($str);$i++){
    	$a = strtoupper($str[$i]);
        echo 'text awal = ',$a.'<br>';
        if(($a >= "A") && ($a <= 'Z')) {
	    	if(ord($a) + $jumlah_geser > ord("Z")){
                echo $a.'<br>';  
	    		$hasil_enkrip .= chr(ord($a) + $jumlah_geser - 26);
	    	}else{
	    		$hasil_enkrip .= chr(ord($a) + $jumlah_geser);
                echo '=='.$hasil_enkrip.'<br>';

		    }
		}else{
			$hasil_enkrip .= " ";
	    }
    }
	echo $str.'<br>';
    echo $hasil_enkrip;
}elseif($_POST['rumus'] == '2'){
	$hasil_enkrip = "";
    $str = $_POST['text'];

    for($i=0;$i<strlen($str);$i++){
    	$b = strtoupper($str[$i]);
        echo $b.'<br>';
    	$a = ord($b)-65;
        
    	$d = 3*$a % 26;
        echo 'urutan = '.$d.'<br>';
    	if(($b >= "A") && ($b <= 'Z')) {
	    	$hasil_enkrip .= chr($d+65);
		}else{
			$hasil_enkrip .= " ";
	    }
    }
	echo $str.'<br>';
    echo $hasil_enkrip;
}elseif($_POST['rumus'] == '3'){ 

$key=$_POST['plantext'];
			//$plantext=$_POST['text'];
			$plantext=str_replace(' ','',$_POST['text']);
			//echo $plantext;
			$len_key=strlen($key);
			$len_plantext=strlen($plantext);
			$split_key=str_split($key);
			$split_plantext=str_split($plantext);
			
			//echo '<textarea rows="4" id="result" cols="33" onclick="SelectAll(\'result\')" >';
			$data = array();
			if($len_key < $len_plantext){
				echo 'jumlah text = '.$len_plantext.'| jumlah key = '.$len_key.' | key = ';
				for($r=0; $r<$len_key;$r++){
					//for($s=0;$s<)
					echo $key[$r].'';
				array_push($data,$key[$r]);
				
					
				}
				echo ' |';
				$hasil = $len_plantext - $len_key;
				$hsl = $hasil - $len_key;
				// echo 'text - key = '.$hasil.'| ';
				// echo 'hasil - key = '.$hsl.' ';
			
				
				
				if($hasil < $len_key || $hasil == $len_key ){
				//	echo ' || ';
					for($r=0; $r<$hasil;$r++){
					//for($s=0;$s<)
					//echo $key[$r].' ';
					array_push($data,$key[$r]);
				}
				}else{
					
				
				//echo 'key = '.$hasil.' ';
				//echo 'hasil next = '.$hsl.' ';
				$result = $hasil - $hsl;
				for($k=0; $k<$result;$k++){
					//for($s=0;$s<)
					//echo $key[$k].' ';
				array_push($data,$key[$k]);
					
				}
				for($q=0; $q<$hsl;$q++){
					//for($s=0;$s<)
					//echo $key[$q].' ';
				array_push($data,$key[$q]);
					
				}
				
				
				}
				echo ' -hasil key = ';
				for($j=0;$j<$len_plantext;$j++){
					
					//echo $data[$j];
				}
				
				//echo '- |-';							
				
				
				
			}else if($len_plantext < $len_key){
				echo 'jumlah text = '.$len_plantext.'| jumlah key awal = '.$len_key.' | ';
				//echo $len_plantext - $len_key.'|';
				for($r=0; $r<$len_key;$r++){
					//for($s=0;$s<)
				//	echo $key[$r].'';
				array_push($data,$key[$r]);
									
				}
				echo ' -hasil key = ';
				for($j=0;$j<$len_plantext;$j++){
					
					//echo $data[$j];
				}
				
				//echo '- -';							
				
			}else{
				
			}
			
						
			$i=0;
			for($j=0;$j<$len_plantext;$j++){
			
				if ($i==$len_key){
					$i=0;
				}
				$split_key2[$j]=$split_key[$i];
				echo $split_key2[$j];
				$i++;
			}
			echo '| hasil encript = ';
			for($k=0;$k<$len_plantext;$k++){
				$a=char_to_dec($split_key2[$k]);
				$b=char_to_dec($split_plantext[$k]);
				//echo 'tes = '.$a.'= tes';
				if ($k%5 == 0) {
					echo " ";
				}

				if (($a && $b)!=null){
					echo (tabel_vigenere_encrypt($a, $b));
				} else {
					echo $split_plantext[$k];
				}
			}
			echo '</textarea><br/>';
		} 


?>