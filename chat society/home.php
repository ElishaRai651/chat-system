<?php
// Include database connection
include ('database_connection.php');
session_start();  
   	?>		

<div class="container">


  
<h3 align=center>Chat Society</h3><br><br>
<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&times;</span>
  </button>


<p align=center>search users </p><br><br>
<?php
if(isset($_GET['query'])) {
    $query = $_GET['query'];

    // Prepare a SQL query to search for members

    $statement = $connect->prepare("SELECT * FROM  login  WHERE username LIKE :query");
    $statement->execute(array('query' => '%' . $query . '%'));

    // Check if any results were found
    if($statement->rowCount() > 0) {
        while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         
          
            
            echo " " . $row['username'] . "<br>"."<br>";
           
        }
    } else {
        echo "No results found.";
    }
}
?>
    
        
 <div class="group">
<form id="search-form">
    <input type="text" name="query" id="query" placeholder="Search members...">
    <input type="submit" id="btn" value="search">
    <br><br><br><br><br>
    <br><br>
</form>
 
 </div>
</div>

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
  border-radius: 18px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}

/* Login & Signup Form CSS Start */
.search-form{
  padding: 25px 30px;
  align-items: center;

}
.group{
  font-size: 12px;
  font-weight: 600;
  padding-bottom: 10px;
  border-bottom: 1px solid #e6e6e6;
}
.close-button{
    position:absolute;
    right: 0;
    align-items: center;
}

</style>


<script>
$(document).ready(function() {
    $('#btn').click(function() {
        // Get all checkboxes that are checked
        const checkboxes = $('#searchResults input[type="checkbox"]:checked');

        // Loop through each checked checkbox
        checkboxes.each(function() {
            // Get the user ID from the checkbox value
            const userId = $(this).val();

            // Call a function to add the user to the group
            addUserToGroup(userId);
        });
    });
});

function addUserToGroup(userId) {
    // Send a request to your server to add the user to the group
    // For example, using jQuery's AJAX method
    $.ajax({
        url: 'addUserToGroup.php',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ userId: userId }),
        success: function(response) {
            console.log('User added to group successfully');
        },
        error: function(xhr, status, error) {
            console.error('Failed to add user to group:', error);
        }
    });
}


</script>
