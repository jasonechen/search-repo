<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Volunteer Work'; ?></th>
    </tr>
    <tr>
        <th><?php echo 'Name'; ?></th>
        <th><?php echo 'Service Type'; ?></th>
        <th><?php echo 'From'; ?></th>
        <th><?php echo 'To'; ?></th>
        <th><?php echo 'Leadership'; ?></th>
        <th><?php echo 'Hours Per Week'; ?></th>
        <th><?php echo 'Notes'; ?></th>
        
    </tr>    
    <?php  foreach ($volunteerProfileArray as $volunteerProfile): ?>    
    <tr>
        <td><?php echo $volunteerProfile->name; ?> </td>
        <td><?php echo VolunteerProfile::convertVolunteer($volunteerProfile->volunteertype_id); ?> </td>
        <td><?php echo VolunteerProfile::convertYears($volunteerProfile->year_begin); ?> </td>
        <td><?php echo VolunteerProfile::convertYears($volunteerProfile->year_end); ?> </td>
        <td><?php echo VolunteerProfile::convertLeader($volunteerProfile->leadership); ?> </td>
        <td><?php echo VolunteerProfile::convertHours($volunteerProfile->hours); ?> </td>
        <td><?php echo $volunteerProfile->comments; ?> </td>
    </tr>
    <?php endforeach; ?>    
</table>
