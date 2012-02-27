

<table border="1" width="300" height="150" cellspacing="10">
    <thead style="background-color: #f5f3e5;font-size: 13px; font-weight: normal; color: black">
        <tr><td>SAT I</td>  <td>Test/Section</td>  <td style="text-align:center">Score</td> </tr></thead>
    <tbody style="font-size:12px">
        <tr><td> </td><td style="text-align:left">Math</td>  <td style="text-align:center"><?php echo $scoreProfile->SAT_Math ?></td> </tr>
        <tr><td> </td><td style="text-align:left">Critical Reading</td>  <td style="text-align:center"><?php echo $scoreProfile->SAT_Critical_Read ?></td> </tr>
        <tr><td> </td><td style="text-align:left">Writing</td>  <td style="text-align:center"><?php echo $scoreProfile->SAT_Writing ?></td> </tr>
        <tr><td> </td><td style="text-align:left">Essay</td>  <td style="text-align:center"><?php echo $scoreProfile->SAT_Essay ?></td> </tr>
        <tr><td> </td><td style="text-align:left">Total</td>  <td style="text-align:center"><?php echo $scoreProfile->totalSAT ?></td> </tr>
    </tbody>
</table>
<br/>
<table border="1" width="300" height="150" cellspacing="10">
    <thead style="background-color: #f5f3e5;font-size: 13px; font-weight: normal; color: black">
        <tr><td>PSAT</td>  <td>Test/Section</td>  <td style="text-align:center">Score</td> </tr></thead>
    <tbody style="font-size:12px">
        <tr><td> </td><td style="text-align:left">Math</td>  <td style="text-align:center"><?php echo $scoreProfile->PSAT_Math ?></td> </tr>
        <tr><td> </td><td style="text-align:left">Verbal</td>  <td style="text-align:center"><?php echo $scoreProfile->PSAT_Verbal ?></td> </tr>
        <tr><td> </td><td style="text-align:left">Writing</td>  <td style="text-align:center"><?php echo $scoreProfile->PSAT_Writing ?></td> </tr>     
    </tbody>
</table>
<br/>

<table border="1" width="300" height="150" cellspacing="10">
    <thead style="background-color: #f5f3e5;font-size: 13px; font-weight: normal; color: black">
        <tr><td>ACT</td>  <td>Test/Section</td>  <td style="text-align:center">Score</td> </tr></thead>
    <tbody style="font-size:12px">
        <tr><td> </td><td style="text-align:left">English</td>  <td style="text-align:center"><?php echo $scoreProfile->ACT_English ?></td> </tr>
        <tr><td> </td><td style="text-align:left">Math</td>  <td style="text-align:center"><?php echo $scoreProfile->ACT_Math ?></td> </tr>
        <tr><td> </td><td style="text-align:left">Reading</td>  <td style="text-align:center"><?php echo $scoreProfile->ACT_Reading ?></td> </tr>
        <tr><td> </td><td style="text-align:left">Science</td>  <td style="text-align:center"><?php echo $scoreProfile->ACT_Science ?></td> </tr>
        <tr><td> </td><td style="text-align:left">Writing</td>  <td style="text-align:center"><?php echo $scoreProfile->ACT_Writing ?></td> </tr>
            <tr><td> </td><td style="text-align:left">Composite</td>  <td style="text-align:center"><?php echo $scoreProfile->ACT_Composite ?></td> </tr>
    </tbody>
</table>
<br/>
