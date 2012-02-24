<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Research'; ?></th>
    </tr>
    <tr>
        <th><?php echo 'Subject'; ?></th>
        <th><?php echo 'Field'; ?></th>
        <th><?php echo 'From'; ?></th>
        <th><?php echo 'To'; ?></th>
        <th><?php echo 'Hours Per Week'; ?></th>
        <th><?php echo 'Notes'; ?></th>
        
    </tr>    
    <?php  foreach ($researchProfileArray as $researchProfile): ?>    
    <tr>
        <td><?php echo $researchProfile->subject; ?> </td>
        <td><?php echo ($researchProfile->field !== '' 
                    && $researchProfile->field !== NULL) 
                    ? $researchProfile->major->name : ''; ?> </td>
        <td><?php echo ResearchProfile::convertYears($researchProfile->year_begin); ?> </td>
        <td><?php echo ResearchProfile::convertYears($researchProfile->year_end); ?> </td>
        <td><?php echo ResearchProfile::convertHours($researchProfile->hours); ?> </td>
        <td><?php echo $researchProfile->comments; ?> </td>
    </tr>
    <?php endforeach; ?>    
</table>
