<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Work/Jobs'; ?></th>
    </tr>
    <tr>
        <th><?php echo 'Name'; ?></th>
        <th><?php echo 'Type'; ?></th>
        <th><?php echo 'From'; ?></th>
        <th><?php echo 'To'; ?></th>
        <th><?php echo 'Position Title'; ?></th>
        <th><?php echo 'Hours Per Week'; ?></th>
        <th><?php echo 'Notes'; ?></th>
        
    </tr>    
    <?php  foreach ($workProfileArray as $workProfile): ?>    
    <tr>
        <td><?php echo $workProfile->name; ?> </td>
        <td><?php echo WorkProfile::convertWork($workProfile->work_type); ?> </td>
        <td><?php echo WorkProfile::convertYears($workProfile->year_begin); ?> </td>
        <td><?php echo WorkProfile::convertYears($workProfile->year_end); ?> </td>
        <td><?php echo WorkProfile::convertTitle($workProfile->title); ?> </td>
        <td><?php echo WorkProfile::convertHours($workProfile->hours); ?> </td>
        <td><?php echo $workProfile->comments; ?> </td>
    </tr>
    <?php endforeach; ?>    
</table>
