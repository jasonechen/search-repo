$('#viewProfileSubmit').click(submitFunction);

function submitFunction(){
    var theTotal = 0;
    $('#BuyProfileForm_l1Price').val();
    if ($('#BuyProfileForm_buyL1').prop('checked') && !($('#BuyProfileForm_buyL1').prop('disabled'))){
    }
    if ($('#BuyProfileForm_buyL2').prop('checked') && !($('#BuyProfileForm_buyL2').prop('disabled'))){
        theTotal += parseInt($('#BuyProfileForm_l2Price').val());
    }
    if ($('#BuyProfileForm_buyL3').prop('checked') && !($('#BuyProfileForm_buyL3').prop('disabled'))){
        theTotal += parseInt($('#BuyProfileForm_l3Price').val());
    }

    alert('Your total purchase will be: '+ theTotal +' credits.');
}    



