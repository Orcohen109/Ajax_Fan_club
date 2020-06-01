
<main id="main_member">
    
    <?php
  date_default_timezone_set('Asia/Calcutta');
           $today=date("Y-m-d");
           $expiry_date = date('Y-m-d', strtotime("$today +1 years"));   
           $registeration_date=$today;
          ?> 
    
    
<h2 id="firstH2"><?php echo $title; ?></h2>


<h2 style="font-size: bold; color: red;"><?php if ($info!=NULL){print_r($info['message']);}?></h2>
<?php $attributes = array('name' => 'myform');
echo form_open ('Pages_controller/insert_member',$attributes );  ?>
    <p>
    <label>id</label>
    <input type="text" name="id" value="<?php print_r($user['user']['0']['id']);?>" readonly  required/><br />
    <label>first name</label>
    <input type="text" name="first_name" value="<?php print_r($user['user']['0']['First_Name']);?>" readonly required /><br>
    <label>last name</label>
    <input type="text" name="last_name" value="<?php print_r($user['user']['0']['Last_Name']);?>" readonly  required/><br>
    <label>gate</label>
    <input type="text" name="gate" maxlength="1" required /><br>
     <label>seat</label>
    <input type="text" name="seat" maxlength="2" required /><br>
    <label>registeration date</label>
    <input type="text" name=registeration_date value="<?php echo $registeration_date?>" readonly  /><br>
    <label>expiry date</label>
    <input type="text" name="expiry_date" value="<?php echo $expiry_date?>" readonly  /><br>
    <label>member's type</label>
    <select id="membertype1" name="typeOption" onchange="membertype.call(this, event)">
        <option value="Standard">Standard</option> 
        <option value="Premium">Premium</option>
        <option value="VIP ">VIP</option>     
    </select><br>   
    <br>    
    <hr> 
    <br>
<h2><?php echo $title2; ?></h2>
<h3 id='membertype2'>the price for a standard membership is: 500 &#8362;</h3>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form>

        <div class="row">
          <div class="col-50">
              <h3>Billing Address</h3><br><br><br>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input class="pay"type="text" id="fname" name="firstname" value="<?php print_r($user['user']['0']['First_Name']).print_r($user['user']['0']['Last_Name']);?>">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input class="pay" type="text" id="email" name="email" value="<?php print_r($user['user']['0']['Email']);?>">
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
            if ( this.options[this.selectedIndex].text === "Standard"){
                document.getElementById('membertype2').innerHTML='the price for a standard membership is: 500 &#8362';
            }
            if ( this.options[this.selectedIndex].text === "Premium"){
                document.getElementById('membertype2').innerHTML='the price for a premium membership is: 700 &#8362 ';
            }
            if ( this.options[this.selectedIndex].text === "VIP"){
                document.getElementById('membertype2').innerHTML='the price for a VIP membership is: 1000 &#8362';
            }         
    }
    
 
</script>
</main>
