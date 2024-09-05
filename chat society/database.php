<?php 
			

				//fetch_user.php
				
				include('database_connection.php');
				
				session_start();?>
				<div class="container">
                <h3 align=center>Chat Society</h3><br><br>
				<div class="group">
                
				<?php
				if(!isset($_SESSION['user_id']))
				{
					header("location:adminlogin.php");
				}
				
				$query = "
				SELECT * FROM login 
				WHERE user_id != '".$_SESSION['user_id']."' 
				";
				
				$statement = $connect->prepare($query);
				
				$statement->execute();
				
				$result = $statement->fetchAll();
				
				$output = '
				<table border="1",align="center">
					<tr>
						<th width="50%">Username</td>
						<th width=35%">Status</td>
					
					</tr>
				';
				
				foreach($result as $row)
				{
					$status = '';
					$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
					$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
					$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
					if($user_last_activity > $current_timestamp)
					{
						$status = '<span class="label label-success">Online</span>';
					}
					else
					{
						$status = '<span class="label label-danger">Offline</span>';
					}
					$output .= '
					<tr>
						<td>'.$row['username'].' </td>
						<td>'.$status.'</td>
						
					</tr>
					';
				}
				
				$output .= '</table>';
				
				echo $output;
				?>
				<br><br><br><br>
				</div>
				<div>
		
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

</style>
                <script>
                    $(document).ready(function(){

fetch_user();

setInterval(function(){
    update_last_activity();
    fetch_user();
    update_chat_history_data();
    fetch_group_chat_history();
}, 5000);

function fetch_user()
{
    $.ajax({
        url:"fetch_user.php",
        method:"POST",
        success:function(data){
            $('#user_details').html(data);
        }
    })
}

function update_last_activity()
{
    $.ajax({
        url:"update_last_activity.php",
        success:function()
        {

        }
    })
}

                </script>