<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Music'; ?></th>
    </tr>
    <tr>
        <th><?php echo 'Name'; ?></th>
        <th><?php echo 'From'; ?></th>
        <th><?php echo 'To'; ?></th>
        <th><?php echo 'School Participation'; ?></th>
        <th><?php echo 'School Position'; ?></th>
        <th><?php echo 'External Participation'; ?></th>
        <th><?php echo 'External Position'; ?></th>
        <th><?php echo 'Notes'; ?></th>
        
    </tr>    
    <?php  foreach ($musicProfileArray as $musicProfile): ?>    
    <tr>
        <td><?php echo MusicProfile::convertMusic($musicProfile->music); ?> </td>
        <td><?php echo MusicProfile::convertYears($musicProfile->year_begin); ?> </td>
        <td><?php echo MusicProfile::convertYears($musicProfile->year_end); ?> </td>
        <td><?php echo MusicProfile::convertSchoolMusic($musicProfile->school_orchband); ?> </td>
        <td><?php echo MusicProfile::convertSchoolLevel($musicProfile->school_leader); ?> </td>
        <td><?php echo MusicProfile::convertExtMusic($musicProfile->ext_orchband); ?> </td>
        <td><?php echo MusicProfile::convertSchoolLevel($musicProfile->ext_leader); ?> </td>
        <td><?php echo $musicProfile->comments; ?> </td>
    </tr>
    <?php endforeach; ?>    
</table>
