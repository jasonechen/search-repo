<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'SAT II'; ?></th>
        <th><?php echo 'Test/Section         '; ?></th>
        <th><?php echo 'Score'; ?></th>
    </tr>    
    <?php  foreach ($sat2ProfileArray as $sat2Profile): ?>    
    <tr>
        <td><?php echo '' ?></td>
        <td><?php echo $sat2Profile->sat2->subject; ?></td>
        <td><?php echo $sat2Profile->score; ?></td>
    </tr>
    <?php endforeach; ?>    
</table>

