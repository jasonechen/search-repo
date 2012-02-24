<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Sports'; ?></th>
    </tr>
    <tr>
        <th><?php echo 'Name'; ?></th>
        <th><?php echo 'From'; ?></th>
        <th><?php echo 'To'; ?></th>
        <th><?php echo 'Level'; ?></th>
        <th><?php echo 'Leadership'; ?></th>
        <th><?php echo 'Individual'; ?></th>
        <th><?php echo 'Team'; ?></th>
        <th><?php echo 'Other Recognitions'; ?></th>
        <th><?php echo 'Notes'; ?></th>
        
    </tr>    
    <?php  foreach ($sportProfileArray as $sportProfile): ?>    
    <tr>
        <td><?php echo ($sportProfile->sport_id !== '' && $sportProfile->sport_id !== NULL) 
                    ? $sportProfile->sport->name : ''; ?> </td>
        <td><?php echo SportProfile::convertYears($sportProfile->year_begin); ?> </td>
        <td><?php echo SportProfile::convertYears($sportProfile->year_end); ?> </td>
        <td><?php echo SportProfile::convertLevel($sportProfile->level); ?> </td>
        <td><?php echo SportProfile::convertLeader($sportProfile->leadership); ?> </td>
        <td><?php echo SportProfile::convertIndivRank($sportProfile->indiv_rank); ?> </td>
        <td><?php echo SportProfile::convertTeamRank($sportProfile->team_rank); ?> </td>
        <td><?php echo SportProfile::convertOtherRecog($sportProfile->other_recog); ?> </td>       
        <td><?php echo $sportProfile->comments; ?> </td>
    </tr>
    <?php endforeach; ?>    
</table>
