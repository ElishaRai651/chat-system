
<?php

include('database_connection.php');

session_start();

$message = '';
?>
<div class="container">
  <h2 align="center">Chat Society</h2>
  <br>
  <div class="group">
    <form method="post">
    <nav class="navbar">
        <ul>
            <li><a href="home.php">SearchUsers</a></li>
            <li><a href="database.php">UsersStatus..</a></li>
           <li><a href= "logout.php">LogOut</a></li>
        

        </ul>
    </nav>
    <br></br><br<br>

<h3 align="center">Welcome Admin</br>To the
<br>ChatSociety </h3>
<br>
</br>
</div>
<br>
<br>
</div>
</form>
        
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #f7f7f7;
  padding: 0 10px;
}
.container{
  background: #fff;
  max-width: 450px;
  width: 100%;
  border-radius: 25px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}

.form{
  padding: 25px 30px;
}
.group{
  font-size: 12px;
  font-weight: 600;
  padding-bottom: 10px;
  border-bottom: 1px solid #e6e6e6;
}

.navbar{
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5);
    position: sticky;
    top: 0;

}
.navbar ul{
    display: flex;
    list-style: none;
    margin: 10px 0px;
}
.navbar ul li{
    font-family: century;
    font-size: 15px;
    font-weight: bold;
}
.navbar ul li a{
    text-decoration: none;
    color: white;
    padding: 8px 15px;
    transition: all .5s ease;
}
.navbar ul li a:hover{
    background-color: white;
    box-shadow: 0 0 8px white;
}
h3{
  color: rgba(0, 0, 0, 0.5);
  font-size: 1.5rem;
  font-family: 'Times New Roman', Times, serif;

}

</style>
