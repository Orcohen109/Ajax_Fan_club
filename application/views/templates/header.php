<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        
   	<title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/header_footer.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/form.css"/>
        <style>
            #register{
            float:left;
            width:30%;
            margin-left:2%;
        }
        .logout{
            display: inline-block; 
            width:20%;
            margin-left:570px; 
            font-size:17px; 
            font-family: sans-serif;    
        }
        .out{
            position: absolute;
            right: -85px;
        }
        li{
            display: inline-block;
        }
       
   li a:hover {
       font-weight: bold;
       text-shadow:inherit;

    }
  
    #headerimg{
    border-style: solid;
  
    }
    .allnav{
        background-color:#FFEFD5;
        margin-bottom: 2%;
        
    }
    a{font-family: sans-serif;}
    #headerimg{border-style: none;}

        </style>
        
</head>
<body>
  
   <header id="wrapper">
	<img id="headerimg" src= "<?php echo base_url();?>assets/images/header.jpg"/>
        <nav class="allnav">
            <ul>
                 <li>
                    <a id="about" href="<?php echo site_url();?>/Pages_controller/about_us">About us</a>
                </li>
                 <li id="hom">
                    <a id="home" href="<?php echo site_url();?>/Pages_controller/home">Home</a>
                </li>
                <li id="member">
                    <a id="home" href="<?php echo site_url();?>/Pages_controller/become_member">Become a member</a>
                </li>
                <li id="ticket">
                    <a id="home" href="<?php echo site_url();?>/Pages_controller/order_tickets">Order tickets</a>
                </li>
                <li id="stud">
                    <a id="student" href="<?php echo site_url();?>/Pages_controller/Board_games">games board</a>
                </li>
                   <li id="manager">
                   <?php if ($user['user']['0']['Manager']!=NULL){echo '<a href="'.site_url().'/Pages_controller/manager"> Manager page</a>';}?>
                </li>
                <li class="out">
                   <?php if ($user!=NULL){echo '<a id="logout" href="'.site_url().'/Login_controller/logout"> Logout</a>';}?>
                </li>               
            </ul>	
	</nav>
        <div class="logout"> <?php if ($user!=NULL){echo 'Hello '.$user['User_name'];} ?></div>
</header>

<script>
    <?php if ($user==NULL){$val=0;}?>
    var user = "<?=$val?>";
    user=parseInt(user);
   if (user===0){
       document.getElementById('about').style.display= 'none'; 
       document.getElementById('stud').style.display= 'none'; 
       document.getElementById('hom').style.display= 'none'; 
       document.getElementById('member').style.display= 'none'; 
       document.getElementById('ticket').style.display= 'none'; 
       document.getElementById('manager').style.display= 'none'; 
   }
   else{       
       document.getElementById('about').style.display= 'inline-block'; 
       document.getElementById('stud').style.display= 'inline-block'; 
       document.getElementById('hom').style.display= 'inline-block';
       document.getElementById('member').style.display= 'inline-block'; 
       document.getElementById('ticket').style.display= 'inline-block'; 
       document.getElementById('manager').style.display= 'inline-block'; 
   } 
</script>


  