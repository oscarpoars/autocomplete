<html>
   <head>
      <style>
         div {
            width:240px;
            color:green;
         }
      </style>
        <script type="text/javascript">
         function showsel(strsel) {
		document.getElementById("inputmeu").value = document.getElementById(strsel).value;
                document.getElementById("livesearch").innerHTML = "";
                document.getElementById("livesearch").style.border = "0px";
	 }
	</script>
	<script type="text/javascript">
         function showResult(str) {
			
            if (str.length == 0) {
               document.getElementById("livesearch").innerHTML = "";
               document.getElementById("livesearch").style.border = "0px";
 
               return;
            }
            
            if (window.XMLHttpRequest) {
               xmlhttp = new XMLHttpRequest();
            }else {
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp.onreadystatechange = function() {
				
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
                  document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
             	  document.getElementById("livesearch").style.width = "240px";
             	  document.getElementById("livesearch").style.overflow = "hidden";

               }
            }
            
            xmlhttp.open("GET","livesearch.php?q="+str,true);
            xmlhttp.send();
         }
      </script>
      
   </head>
   <body>
      
      <form name"fichaa">
         <input id="inputmeu" type = "text" size = "30" name="curso" onkeyup = "showResult(this.value)">
         <div id = "livesearch"></div>
      </form>
      
   </body>
</html>