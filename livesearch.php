
<style>
.lin {position:relative;
      width:240px;
      height:20px;
      border:0px;
      padding:0px;
      font-family:Verdana;
      font-size:12px; 
      color:#000;
      background:transparent;
      overflow:hidden;
}
.lin input[type=button]{
      width:240px;
      height:20px;
      border:0px;
      padding:0px;
      font-family:Verdana;
      font-size:12px; 
      color:#000;
      background:transparent;
      overflow:hidden;
}
</style>
<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("autocomplete.xml");
$x = $xmlDoc->getElementsByTagName('link');
$d=9; // número máximo de leituras no xml == pode ser obtido do php que monta este xml
$q = $_GET["q"];
if ($d > 0) {
	$hint = "";

	for($i = 0; $i<$d; $i++) {

		$y = $x->item($i)->getElementsByTagName('title');
		$z = $x->item($i)->getElementsByTagName('url');

 
		if ($y->item(0)->nodeType == 1) {
			if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
				
				if ($hint == "") {
             	 			$hint = "<div class='lin'><input id='" . $z->item(0)->childNodes->item(0)->nodeValue . "' type='button' value='" . $y->item(0)->childNodes->item(0)->nodeValue . "' name='button' onclick='showsel(" . $z->item(0)->childNodes->item(0)->nodeValue . ")'></div>";
     	       	 		}else {
                			$hint = $hint . "<div class='lin'><input id='" . $z->item(0)->childNodes->item(0)->nodeValue . "' type='button' name='button' value='" . $y->item(0)->childNodes->item(0)->nodeValue . "' name='button' onclick='showsel(" . $z->item(0)->childNodes->item(0)->nodeValue . ")'></div>";
      	       	 		}
			}
		}
	}
}
	
if ($hint == "") {
      $response = "Please enter a valid name";
}else {
      $response = $hint;
}
echo $response;
?>