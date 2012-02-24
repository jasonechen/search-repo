<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Awards/Honors'; ?></th>
    </tr>
    <tr>
        <th><?php echo 'Name'; ?></th>
        <th><?php echo 'Region'; ?></th>
        <th><?php echo 'Year'; ?></th>
        <th><?php echo 'Notes/Comments'; ?></th>
    </tr>    
    <?php  foreach ($awardProfileArray as $awardProfile): ?>    
    <tr>
        <td><?php echo $awardProfile->award_name; ?> </td>
        <td><?php echo ($awardProfile->region !== '' && $awardProfile->region !== NULL) 
                    ? AwardProfile::$RegionArray[$awardProfile->region] : ''; ?> </td>
        <td><?php echo ($awardProfile->year !== '' && $awardProfile->year !== NULL) 
                    ? AwardProfile::$AwardDateArray[$awardProfile->year] : ''; ?> </td>
        <td><?php echo $awardProfile->comments; ?> </td>
    </tr>
    <?php endforeach; ?>    
</table>

