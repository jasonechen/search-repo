<?php
$model=  User::model()->findAll();
$count= User::model()->count();
?>
<table>
    <tr>
        <td><b>Total Users :</td><td><?php echo $count;?></b></td>
     </tr>   
     <tr>
         <td colspan="2"><hr/></td>
     </tr> 
     <tr >
         <th>In the Year Of <?php echo date('Y');?><br/>Months</th>
         <th>User Type B</th>
         <th>User Type S</th>
     </tr>
      <?php 
      for($i=1;$i<=12;$i++)
      {
          $day1 = '01';
          $month=strlen($i)==1?'0'.$i:$i;
          $year = date('Y');
          $day2 = cal_days_in_month(CAL_GREGORIAN, $month, $year);
          $S1 = $year.'-'.$month.'-'.$day1;
          $S2= $year.'-'.$month.'-'.$day2;
          
          ?>
     <tr>
         <td><?php echo  date("F", mktime(0, 0, 0, ($i )));?></td>
         <td><?php echo User::model()->count("transType='B' and (create_time BETWEEN '".$S1."' AND '".$S2."')");?></td>
         <td><?php  echo User::model()->count("transType='S' and (create_time BETWEEN '".$S1."' AND '".$S2."')");?></td>
     </tr>
          <?php
      }
      ?>
</table>    