<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Summer Activities'; ?></th>
    </tr>
    <tr>
        <th><?php echo 'Name'; ?></th>
        <th><?php echo 'Type'; ?></th>
        <th><?php echo 'Year'; ?></th>
        <th><?php echo 'Notes'; ?></th>
        
    </tr>    
    <?php  foreach ($summerProfileArray as $summerProfile): ?>    
    <tr>
        <td><?php echo $summerProfile->name; ?> </td>
        <td><?php echo SummerProfile::convertSummer($summerProfile->summer_id); ?> </td>
        <td><?php echo SummerProfile::convertSummerDate($summerProfile->summer_date); ?> </td>
        <td><?php echo $summerProfile->comments; ?> </td>
    </tr>
    <?php endforeach; ?>    
</table>
