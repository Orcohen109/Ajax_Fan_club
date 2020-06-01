<style>
    main{
       background-color: #FFEFD5;
    }
 label, legend, #register{font-family: sans-serif;}
</style>
<main>
<div id="mainWrraper">

<p id="error"></p>

    <?php echo form_open('Login_controller/save'); ?>
        <fieldset>
        <legend>Login User:</legend>
        <div class="inputWrapper"><label>First name: </label><input id="First_name" class="formInput" type="text" name="First_name"></div>
        <div class="inputWrapper"><label>Last name: </label><input id="Last_name" class="formInput" type="text"  name="Last_name"></div>
        <div class="inputWrapper"><label>ID: </label><input id="id"  class="formInput" type="text" name="id"  maxlength="9"></div>
        <div class="inputWrapper"><label>Email: </label><input id="Email" class="formInput" type="text"  name="Email"></div>
        <div class="inputWrapper"><label>User name: </label><input id="User_name"  class="formInput" type="text"  name="User_name"></div>
        <div class="inputWrapper"><label>Password: </label><input id="Password" class="formInput" type="password"  name="Password"></div>
        <div class="inputWrapper"><label>Confirm Password: </label><input id="Confirm_password" class="formInput" type="password"  name="Confirm_password"></div>
        <div class="inputWrapper"><input id="register" type="button"  value="register" name="submit">         
  </fieldset> 

</form>

</div>
        
        <div id="mainWrraper">

<p id="error"></p>

    <?php echo form_open('Login_controller/saveProduct'); ?>
        <fieldset>
        <legend>הוסף מוצר</legend>
        <div class="inputWrapper"><label>קוד מוצר: </label><input id="product_code" class="formInput" type="text" name="product_code"></div>
        <div class="inputWrapper"><label>סוג מוצר: </label><input id="product_type" class="formInput" type="text"  name="product_type"></div>
        <div class="inputWrapper"><label>דגם: </label><input id="model"  class="formInput" type="text" name="model"  maxlength="9"></div>
        <div class="inputWrapper"><label>חברה:</label><input id="company" class="formInput" type="text"  name="company"></div>
        <div class="inputWrapper"><label>שם הספק:</label><input id="supplier"  class="formInput" type="text"  name="supplier"></div>
        <div class="inputWrapper"><label>מחיר ליחידה:</label><input id="price_per_unit" class="formInput" type="text"  name="price_per_unit"></div>
        <div class="inputWrapper"><label>מספר יחידות </label><input id="number_of_units_in_stock" class="formInput" type="text"  name="number_of_units_in_stock"></div>
        <div class="inputWrapper"><label>מחיר לצרכן:</label><input id="retail_Price" class="formInput" type="text"  name="retail_Price"></div>
        <div class="inputWrapper"><input id="Productregister" type="button"  value="register" name="submit">         
  </fieldset> 

</form>
    
</div>
</main>

<script>
    $("#Productregister").click(function (){
                var product_code = $("#product_code").val();
                var product_type = $("#product_type").val();
                var model = $("#model").val();
                var company = $("#company").val();
       		var supplier = $("#supplier").val();
                var price_per_unit = $("#price_per_unit").val();
                var number_of_units_in_stock = $("#number_of_units_in_stock").val();
                var retail_Price = $("#retail_Price").val();
          
                $.ajax({
                type: 'POST',
                url: "<?php echo site_url(); ?>"+"/Login_controller/saveProduct",
                data: {product_code: product_code, product_type: product_type, model: model, company: company,
                supplier: supplier, price_per_unit: price_per_unit, number_of_units_in_stock: number_of_units_in_stock
                ,retail_Price: retail_Price},
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    if(data==="1"){
                        alert("Registration succedded");
                        window.location.href="<?php echo site_url('Login_controller/login');?>";
                    }
                    else{
                        $("#error").html(data);
                    }
                    
                }
                
        });
        
     });
</script>




