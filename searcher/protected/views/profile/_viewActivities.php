<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Clubs'; ?></th>
    </tr>
    <tr>
        <th><?php echo 'Name'; ?></th>
        <th><?php echo 'Type'; ?></th>
        <th><?php echo 'Leadership'; ?></th>
        <th><?php echo 'Hours Per Week'; ?></th>
        <th><?php echo 'From'; ?></th>
        <th><?php echo 'To'; ?></th>
        <th><?php echo 'Notes'; ?></th>
        
    </tr>    
    <?php  foreach ($activityProfileArray as $activityProfile): ?>    
    <tr>
        <td><?php echo $activityProfile->name; ?> </td>
        <td><?php echo ($activityProfile->activity_type_id !== '' && $activityProfile->activity_type_id !== NULL) 
                    ? $activityProfile->activityType->name : ''; ?> </td>
        <td><?php echo ActivityProfile::convertLeadership($activityProfile->leadership); ?> </td>
        <td><?php echo ActivityProfile::convertHours($activityProfile->hours_per_week); ?> </td>
        <td><?php echo ActivityProfile::convertYears($activityProfile->year_participate_begin); ?> </td>
        <td><?php echo ActivityProfile::convertYears($activityProfile->year_participate_end); ?> </td>
        <td><?php echo $activityProfile->comments; ?> </td>
    </tr>
    <?php endforeach; ?>    
</table>
