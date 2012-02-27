<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Subjects Studied'; ?></th>
    </tr>
    <tr>
        <th><?php echo 'Subject'; ?></th>
        <th><?php echo 'Honors/AP'; ?></th>
        <th><?php echo 'Year Taken         '; ?></th>
    </tr>    
    <?php  foreach ($subjectProfileArray as $subjectProfile): ?>    
    <tr>
        <td><?php echo $subjectProfile->subject->name; ?> </td>
        <td><?php echo SubjectProfile::ConvertHonors($subjectProfile->honors_or_AP); ?> </td>
        <td><?php echo SubjectProfile::ConvertYear($subjectProfile->year_taken); ?> </td>
    </tr>
    <?php endforeach; ?>    
</table>

