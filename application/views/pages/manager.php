<main>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/form.css"/>

<h2><?php echo $title; ?></h2>


<h2 style="font-size: bold; color: red;"><?php if ($info!=NULL){print_r($info['message']);}?></h2>
<?php echo form_open('Pages_controller/insert_game'); ?>
    <p>
    <label>game date</label>
    <input type="date" name="game_date" required/><br />
    <label>beginning time</label>
    <input type="time" name="beginning_time" required /><br>
    <label>stadium</label>
    <input type="text" name="stadium"  required/><br>
    <label>opponent</label>
    <input type="text" name="opponent" required /><br>
     <label>refree</label>
    <input type="text" name="refree" required /><br>
    <label>competitions</label>
    <select name="competitions">
        <option value="League">League</option> 
        <option value="Cup">Cup</option>
        <option value="UEFA Champions League">UEFA Champions League</option>     
    </select><br>   
    <input type="submit" name="submit" value="Add game" />
    </p>
</form>

<div>
<h2><?php echo $title3; ?></h2>
<?php echo form_open('Pages_controller/insert_ticket'); ?>
    <p>
        <label>game date</label><br><select name="game_date" size="1">
        <?php
            foreach($games as $key=>$value)
            {
            echo '<option value="'.$value['game_date'].'">'.$value['game_date'].'</option>';
            }
        ?>  
        </select><br>     
    <label>tickets sales opening </label>
    <input type="date" name="sales_open" required /><br>
    <label>price</label>
    <input type="text" name="price"  required/><br>
    <label>gate</label>
    <input type="text" name="gate" required /><br>

    <input type="submit" name="submit" value="Add tickets" />
    </p>
</form>

</div>

<h2><?php echo $title2; ?></h2>   
<div id="mainWrraper">
<div id="searchWrraper">
</form>
</div>
<table><tr><th>member num</th><th>id</th><th>first name</th><th>last name</th><th>gate</th></tr>
<?php foreach ($member as $m): ?>

        <tr><td><?php echo $m['member_number'];?></td><td><?php echo $m['id']?></td>
        <td><?php echo $m['first_name']?></td><td><?php echo $m['last_name']?></td>
        <td><?php echo $m['gate']?></td></tr>
        
<?php endforeach; ?>
        </table>
</div>
    


</main>
