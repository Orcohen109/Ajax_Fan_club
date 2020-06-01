<head> 
 <img id="ajax" src= "<?php echo base_url();?>assets/images/backgroundAjax.jpg"/>
</head>
<style>
    main{
       background-color: #FFEFD5; 
    }
    label, legend, #submit, #register{font-family: sans-serif;}
    #ajax{
        width:10%;
        height:110px;
        margin-left: 45%;
    }
</style>

<main>
<div id="mainWrraper">

<p id="error"><?php if (isset($error)){echo $error['message'];}?></p>
    <?php echo form_open('Login_controller/auth'); ?>
        <fieldset>
        <legend>Login User:</legend>
        <div class="inputWrapper"><label>User: </label><input class="formInput" type="text" name="user"></div>
        <div class="inputWrapper"><label>Password: </label><input class="formInput" type="password" name="password"></div>
        <div class="inputWrapper"><input id="submit" type="submit" value="login" name="submit">
            <input  id="register" type="button" value="register" name="register"  onclick="window.location='<?php echo site_url(); ?>/Login_controller/register'"</div>
  </fieldset>

</form>

</div>
</main>
