<?php
    $username=$_POST['username'];
    include 'config.php';
    $sql="SELECT msg,username FROM msgs";
    $res="";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $res=$res.'<div class="container">';
            $res=$res." <p>".$row['msg'];
            $res=$res."<br>-by ".$row['username'].'</div>';
        }
    }
    echo $res;
?>