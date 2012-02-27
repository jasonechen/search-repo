
<ul> University Info:
    <li> Current University: <?php echo $basicProfile->getCurrUniversityName(); ?></li>
     <li> First University: <?php echo $basicProfile->getFirstUniversityName(); ?></li>
</ul>

<p> Race: <?php echo $basicProfile->race->name; ?> </p>

<p> Gender: <?php echo $basicProfile->gender=='M' ? 'Male':'Female'; ?> </p>
