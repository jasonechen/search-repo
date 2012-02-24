<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Competitions'; ?></th>
    </tr>
    <tr>
        <th><?php echo 'Name'; ?></th>
        <th><?php echo 'Region'; ?></th>
        <th><?php echo 'Year'; ?></th>
        <th><?php echo 'Rank'; ?></th>
        <th><?php echo '# of Competitors'; ?></th>
        <th><?php echo 'Notes'; ?></th>
    </tr>    
    <?php  foreach ($competitionProfileArray as $competitionProfile): ?>    
    <tr>
        <td><?php echo $competitionProfile->name_of_competition; ?> </td>
        <td><?php echo ($competitionProfile->region !== '' && $competitionProfile->region !== NULL) 
                    ? AwardProfile::$RegionArray[$competitionProfile->region] : ''; ?> </td>
        <td><?php echo ($competitionProfile->year !== '' && $competitionProfile->year !== NULL) 
                    ? AwardProfile::$AwardDateArray[$competitionProfile->year] : ''; ?> </td>
        <td><?php echo $competitionProfile->rank_or_score; ?> </td>
        <td><?php echo $competitionProfile->num_competitors; ?> </td>
        <td><?php echo $competitionProfile->notes; ?> </td>
    </tr>
    <?php endforeach; ?>    
</table>

