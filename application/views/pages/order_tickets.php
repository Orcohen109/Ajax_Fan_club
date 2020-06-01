<style>
    main{
        background-color: white;
    }
      tr:nth-child(even){background-color: #f2f2f2; font-family: sans-serif;}

        th {
        background-color:darkgray;
        color: black;
        font-family: sans-serif;}
        td{font-family: sans-serif;font-size: 15px;}
   
        h1{font-family: sans-serif;}
        #ticket{
            width:7%;
        }
        
</style>
<main> 
    

<h1><?php echo $title; ?> <img id="ticket" src= "<?php echo base_url();?>assets/images/tickets.jpg"/></h1>   
<div id="mainWrraper">
<div id="searchWrraper">
</form>
</div>
<table><tr><th>game date</th><th>ticket number</th><th>sales opening date</th><th>price</th><th>gate</th></tr>
<?php foreach ($ticket as $t): ?>

        <tr><td><?php echo $t['game_date'];?></td><td><?php echo $t['ticket_num']?></td>
        <td><?php echo $t['sales_open']?></td><td><?php echo $t['price']?></td>
        <td><?php echo $t['gate']?></td></tr>       
<?php endforeach; ?>
        </table>
</div>
<div id="button" >
    <input type="button" name="purchase" value="purchase ticket for the next match" onclick="showpay()"</td>
</div>
<div id="showpay">
    
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
            <input class="pay" type="text" id="expmonth" name="expmonth" placeholder="September">

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
        
          <input class="pay" type="button" value="purchase" class="btn" onclick="purchase()">
      </form>
    </div>
  </div>

  
</div>
</main>

<script>
    document.getElementById('showpay').style.display= 'none'; 

    function showpay()
    {
     document.getElementById('showpay').style.display= 'inline-block'; 
    }
    function purchase()
    {
        alert("purchase completed! congratulations");
       window.location.href="<?php echo site_url('Pages_controller/home');?>";

    }
   
    
</script>