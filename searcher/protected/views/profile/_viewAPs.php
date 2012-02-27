<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'AP'; ?></th>
        <th><?php echo 'Test/Section         '; ?></th>
        <th><?php echo 'Score'; ?></th>
    </tr>    
    <?php  foreach ($apProfileArray as $apProfile): ?>    
    <tr>
        <td><?php echo '' ?></td>
        <td><?php echo $apProfile->ap->name; ?></td>
        <td><?php echo $apProfile->score; ?></td>
    </tr>
    <?php endforeach; ?>    
</table>