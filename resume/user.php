<?php 
   session_start();
   if(!isset($_SESSION['full-name'])){
    header("Location: inonefile.php");
   }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Logout</title>
   <style>
*{
   margin: 0;
   padding: 0;
    box-sizing: border-box;
}
html,body{
    width: 100%;
    height: 100vh;
    background-color: silver;
    /* background-color: rgb(255, 178, 178); */
    /* background-color: #f7ad40;   */
    background-image: url(img/front-view-young-male-red-shirt-black-wall.png);
    background-position: top;
   /* position: relative; */
}
  
.welcome{
    position: absolute;
    left: 17%;
    top: 17%;
    font-size: 35px;
    font-weight: 800;
    
}
.welcome-span{
    color: whitesmoke;
    font-size: 2em;
    font-weight: 800;
}


.text{
    position: absolute;
    margin-top: 16%;
    left: 17%;
    font-size: 4em;
    font-weight: 900;
    color: aliceblue;
    z-index: 6;
   
    
}
.banner{
    height: 100vh;
    overflow: hidden;
    position: relative;
}
.banner .product{
    /* background-color: rgb(182, 43, 43); */
    width: 500px;
    height: 500px;
    position: absolute;
    bottom: 150px;
    left: 80%;
    transform: translatex(-50%);
    z-index: 1;
    transition: 0.7s;
    --left:0px;
    display: flex;
}

.banner .product .soda {
    background:
   var(--url) var(--left),
    url(img/box-removebg-preview.png);
    background-size: auto 100%; 
    width: 500px;
    aspect-ratio: 2/2;
    background-blend-mode: multiply;
    mask-image: url(img/box-removebg-preview.png);
    mask-size: auto 100%;
    transition: 0.7s;
    position: absolute;
    left: 50%;
    transform: translatex(-50%);
}
.banner .product:hover {
    --left: -1000px;
    transform: translateX(-50%) translateY(-15%);

} 
.banner .product .soda:nth-child(2){
    opacity: 0;
}
.banner .product:hover .soda:nth-child(2){
    opacity: 1;
}
    /* Basic styles for the logout link */
    .logout {
    color: #ffffff; /* Text color */
    background-color: #007bff; /* Background color */
    padding: 10px 20px; /* Padding around the text */
    text-decoration: none; /* Remove underline */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Font size */
    display: inline-block; 
    transition: background-color 0.3s ease; /* Smooth transition for hover effect */
   position: absolute;
   top: 50%;
   left: 17%;
}
/* Change the background color on hover */
.logout:hover {
    background-color: #0056b3; /* Darker background color when hovered */
}

/* Optionally, add focus styles for accessibility */
.logout:focus {
    outline: 2px solid #0056b3; /* Focus outline color */
    outline-offset: 2px; /* Offset for the outline */
}
   </style>
</head>

<body>
<h1 class="welcome">Hello <span class="welcome-span"><?php echo htmlspecialchars($_SESSION['full-name']); ?>_ </span> Mr/Mr's,</h1>
    </h1>
    <div class="text">High-Protein Shake <span style="color: rgb(56, 160, 230);">- Recipe</span></div>
    <div class="banner">
        <div class="product">
            <div class="soda" style="--url: url(img/water.jpg)"> </div>
            <div class="soda" style="--url: url(img/lam.jpg)"> </div>
        </div>
        <a href="logout.php" class="logout">Logout</a>
    </div>

</body>
</html>
    

    
