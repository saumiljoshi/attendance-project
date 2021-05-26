<?php 

?>
<div class="container" style="margin:20 px;">
<a class="btn btn-primary" href="index.php?action= student-add">add student</a>
<div class="table responsive">
<table class="table">
   <tr>
   <th><strong>roll number</strong></th>
   <th><strong>Name</strong></th>
   <th><strong>class</strong></th>
   </tr>
   <tbody>
      <?php
        if (!empty($result)) {

         foreach ($result as $k => $v){

         }  
        }
        
      ?>
      <tr>
      <td><?php echo $result [$k]["roll_number"]?></td>
      <td><?php echo $result [$k]["name"]?></td>
      <td><?php echo $result [$k]["class"]?></td>
      <td><a class = "btn-edit-action" href = "index.php?action=student-edit&id = <?php echo $result [$k]["id"];?>">edit</a></td>
      <td><a class = "btn-delete-action" href = "index.php?action=student-delete&id = <?php echo $result [$k]["id"];?>" onclick="return del();">delete</a></td>
      </tr>
   </tbody>
</table>
</div>
</div>