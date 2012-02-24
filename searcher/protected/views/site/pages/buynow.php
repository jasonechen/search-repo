<?php
$this->pageTitle=Yii::app()->name . ' - Pricing';
/*$this->breadcrumbs=array(
	'About',
);*/
?>
<h2>Buy Now</h2>



<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="jasonechen@gmail.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="10 Credits">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
<table>
<tr><td><input type="hidden" name="on0" value="Credit Bundles">Credit Bundles</td></tr><tr><td><select name="os0">
	<option value="10 Credits ($2.50/credit)">10 Credits ($2.50/credit) $25.00 USD</option>
	<option value="20 Credits ($2.25/credit)">20 Credits ($2.25/credit) $45.00 USD</option>
	<option value="50 Credits ($2.00/credit)">50 Credits ($2.00/credit) $100.00 USD</option>
	<option value="100 Credits ($1.75/credit)">100 Credits ($1.75/credit) $175.00 USD</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="option_select0" value="10 Credits ($2.50/credit)">
<input type="hidden" name="option_amount0" value="25.00">
<input type="hidden" name="option_select1" value="20 Credits ($2.25/credit)">
<input type="hidden" name="option_amount1" value="45.00">
<input type="hidden" name="option_select2" value="50 Credits ($2.00/credit)">
<input type="hidden" name="option_amount2" value="100.00">
<input type="hidden" name="option_select3" value="100 Credits ($1.75/credit)">
<input type="hidden" name="option_amount3" value="175.00">
<input type="hidden" name="option_index" value="0">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<br></br></br></br></br></br></br></br></br></br></br></br></br>
