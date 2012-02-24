<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Other Activities'; ?></th>
    </tr>
    <tr>
        <th><?php echo 'Name'; ?></th>
        <th><?php echo 'From'; ?></th>
        <th><?php echo 'To'; ?></th>
        <th><?php echo 'Description'; ?></th>
        
    </tr>    
    <?php  foreach ($otherProfileArray as $otherProfile): ?>    
    <tr>
        <td><?php echo $otherProfile->name; ?> </td>
        <td><?php echo OtherProfile::convertYears($otherProfile->year_begin); ?> </td>
        <td><?php echo OtherProfile::convertYears($otherProfile->year_end); ?> </td>
        <td><?php echo $otherProfile->comments; ?> </td>
    </tr>
    <?php endforeach; ?>    
</table>
