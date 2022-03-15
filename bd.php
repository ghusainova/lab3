<html>
<body>

<table border='2'>
<?php
$link = mysqli_connect(localhost,'root','',task3);
$query = mysqli_query($link, "SELECT * FROM form");

while($dp = mysqli_fetch_array($query)){
$path = "Images/".$dp['image'];
?>
     <tr>
       <td align=center class = "number"><?php echo $dp['number']; ?></td>
       <td align=center class = "name"><?php echo $dp['name']; ?></td>
       <td align=center class = "sex"><?php echo $dp['sex']; ?></td>
       <td align=center class = "text"><?php echo $dp['text']; ?></td>
       <?php echo "<td align=center class = 'img'><img src=$path alt='альтернативный текст' width='50' height='50'></td>"; ?>
</tr>
<?php
   }
?>
</table>

</body></html>
