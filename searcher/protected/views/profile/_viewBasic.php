





<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'College'; ?></th>
        <th><?php echo '     '; ?></th>
    </tr>    
    <tr>
        <td><?php echo 'Current University'; ?></td>
        <td><?php echo $basicProfile->getCurrUniversityName(); ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Expected Graduation Year'; ?></td>
        <td><?php echo ''?> </td>
    </tr>
    <tr>
        <td><?php echo 'First University'; ?></td>
        <td><?php echo $basicProfile->getFirstUniversityName(); ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Legacy Connections'; ?></td>
        <td><?php echo $personalProfile->getLegacyConnections(); ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Current Major'; ?></td>
        <td><?php echo ($personalProfile->current_major !== '' && $personalProfile->current_major !== NULL) ? $personalProfile->major->name : ''; ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Other Schools Admitted To'; ?></td>
        <td><?php echo PersonalProfile::getOtherAdmits($otherSchoolAdmitProfileArray); ?> </td>
    </tr>
</table>
</br>
</br>

<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'High School'; ?></th>
        <th><?php echo '     '; ?></th>
    </tr>    
    <tr>
        <td><?php echo 'State'; ?></td>
        <td><?php echo (!empty($personalProfile->state)) ? $personalProfile->states->name : ''; ?> </td>
    </tr>
    <tr>
        <td><?php echo 'High School Type'; ?></td>
        <td><?php echo (!empty($basicProfile->highSchoolType)) ? BasicProfile::$HighSchoolTypeArray["$basicProfile->highSchoolType"] : ''; ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Expected Graduation Year'; ?></td>
        <td><?php echo $personalProfile->hs_grad_year; ?> </td>
    </tr>


</table>
</br>
</br>

<table class="dataGrid" style="border: 1px grey solid;">
    <tr>
        <th><?php echo 'Personal'; ?></th>
        <th><?php echo '     '; ?></th>
    </tr>    
    <tr>
        <td><?php echo 'Birth Year'; ?></td>
        <td><?php echo ($personalProfile->date_of_birth == '0000-00-00') ? '' :date('Y',strtotime($personalProfile->date_of_birth)); ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Gender'; ?></td>
        <td><?php echo $basicProfile->gender=='M' ? 'Male':'Female'; ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Race'; ?></td>
        <td><?php echo ($basicProfile->race_id !== '' && $basicProfile->race_id !== NULL) ? $basicProfile->race->name : ''; ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Ethnicity'; ?></td>
        <td><?php echo ($personalProfile->ethnic_origin !== '' && $personalProfile->ethnic_origin !== NULL) ? $personalProfile->ethnicity->name : ''; ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Citizenship'; ?></td>
        <td><?php echo ($personalProfile->citizenship !== '' && $personalProfile->citizenship !== NULL) ? $personalProfile->citizen->name : ''; ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Parental Status'; ?></td>
        <td><?php echo (!empty($personalProfile->parental_status)) ? PersonalProfile::$ParentalStatusArray["$personalProfile->parental_status"] : ''; ?> </td>
    </tr>
    <tr>
        <td><?php echo 'Family Income Bracket'; ?></td>
        <td><?php echo (!empty($personalProfile->income_bracket)) ? PersonalProfile::$IncomeBracketArray["$personalProfile->income_bracket"] : ''; ?> </td>
    </tr
    <tr>
        <td><?php echo 'Languages Spoken'; ?></td>
        <td><?php echo PersonalProfile::getLanguages($languageProfileArray); ?> </td>
    </tr>
</table>

