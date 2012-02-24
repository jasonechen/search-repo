<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Grades'; ?></th>
        <th><?php echo '     '; ?></th>
    </tr>    
    <tr>
        <td><?php echo 'Unweighted GPA'; ?></td>
        <td><?php echo empty($academicProfile->GPA_unweight) ? '' : $numberFormatter->format("0.00",$academicProfile->GPA_unweight); ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Weighted GPA'; ?></td>
        <td><?php echo empty($academicProfile->GPA_weight) ? '' : $numberFormatter->format("0.00",$academicProfile->GPA_weight); ?> </td>
    </tr>
    <?php if (!empty($academicProfile->class_rank_num)): ?>
    <tr>
        <td><?php echo 'Class Rank'; ?></td>
        <td><?php echo $academicProfile->class_rank_num; ?> </td>
    </tr>
    <?php endif; ?>    
    <?php if (!empty($academicProfile->class_rank_percent)): ?>
    <tr>
        <td><?php echo 'Class Rank Percentile'; ?></td>
        <td><?php echo AcademicProfile::$ClassRankArray[$academicProfile->class_rank_percent] ?> </td>
    </tr>
    <?php endif; ?>    
    <tr>
        <td><?php echo 'Class Size'; ?></td>
        <td><?php echo $academicProfile->class_size; ?> </td>
    </tr>
</table>
