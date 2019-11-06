
<?php
   echo "<pre>"; 
   echo realpath($_FILES); 
   echo "</pre>"; 
   ?> 
<form action="" method="post" enctype="multipart/form-data"> 
   <input type="file" name="file"> 
   <input type="submit" value="Upload Image"> 
</form> 
