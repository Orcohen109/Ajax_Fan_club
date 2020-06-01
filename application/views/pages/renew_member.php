


<h2><?php echo $title2; ?></h2>

<?php $attributes = array('name' => 'myform');
echo form_open('Pages_controller/insert_member', $attributes);
?>
<p>
    <label>id</label>
    <input type="text" name="id" value="<?php echo $lastmembership[0]['id']; ?>" readonly  required/><br />
    <label>first name</label>
    <input type="text" name="first_name" value="<?php echo $lastmembership[0]['first_name']; ?>" readonly required /><br>
    <label>last name</label>
    <input type="text" name="last_name" value="<?php echo $lastmembership[0]['last_name']; ?>" readonly  required/><br>
    <label>gate</label>
    <input type="text" name="gate" maxlength="1" value="<?php echo $lastmembership[0]['gate']; ?>" readonly required /><br>
    <label>seat</label>
    <input type="text" name="seat" maxlength="2" value="<?php echo $lastmembership[0]['seat']; ?>" readonly  required /><br>
    <label>registeration date</label>
    <input type="text" name=registeration_date value="<?php echo $lastmembership[0]['registeration_date'] ?>" readonly  /><br>
    <label>expiry date</label>
    <input type="text" name="expiry_date" value="<?php echo $lastmembership[0]['expiry_date'] ?>" readonly  /><br>
    <label>typeOption</label>
    <input type="text" name="typeOption" id="membertype1" value="<?php echo $lastmembership[0]['typeOption'] ?>" readonly >     
</select><br>   
<br>    
<hr> 
<br>
<h3 id='membertype2'>the price for a standard membership is: 500 &#8362;</h3>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form>

                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3><br><br><br>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input class="pay" type="text" id="fname" name="firstname" value="<?php echo $lastmembership[0]['first_name']." ". $lastmembership[0]['last_name']; ?>">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input class="pay" type="text" id="email" name="email" value="<?php echo $lastmembership[0]['email']; ?>">
                    </div>

                    <div class="col-50">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <label for="cname">Name on Card</label>
                        <input class="pay" type="text" id="cname" name="cardname">
                        <label for="ccnum">Credit card number</label>
                        <input class="pay" type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                        <label for="expmonth">Exp Month</label>
                        <input class="pay" type="text" id="expmonth" name="expmonth" placeholder="April">

                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Exp Year</label>
                                <input class="pay" type="text" id="expyear" name="expyear" placeholder="2018">
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input class="pay" type="text" id="cvv" name="cvv" placeholder="352">
                            </div>
                        </div>
                    </div>
                </div>
                <input id="button" type="submit" name="submit" value="Add member" />
                </p>
            </form>

<script>
    function membertype(){
            if ( document.getElementById('membertype1').value === "Standard"){
                document.getElementById('membertype2').innerHTML='the price for a standard membership is: 500 &#8362';
            }
            if ( document.getElementById('membertype1').value === "Premium"){
                document.getElementById('membertype2').innerHTML='the price for a premium membership is: 700 &#8362 ';
            }
            if ( document.getElementById('membertype1').value === "VIP"){
                document.getElementById('membertype2').innerHTML='the price for a VIP membership is: 1000 &#8362';
            }         
    }
    membertype();
 
</script>