<?php
$roll=$_POST['roll'];
$name=$_POST['name'];
$marks=$_POST['marks'];
$_conn=mysqli_connect("localhost","root","","register");
if(!$_conn)
{
    die("connection failed:".mysqli_connect_error());
}
$sql="INSERT INTO tb(roll,name,marks) VALUES ('$roll','$name','$marks')";
if(mysqli_query($_conn,$sql))
{
    echo "Record inserted successfully";
}
$resultAll=mysqli_query($_conn,"SELECT*FROM tb");
if(!$resultAll)
{
    die(mysqli_error($_conn));
}
?>

<html>
    <body>
    STUDENT DETAILS
    <table border="2">
        <tr>
            <th>Roll no. </th>
            <th>name </th>
            <th> marks </th>
        </tr>
        <?php
        while($res=mysqli_fetch_array($resultAll))
        {
            echo "<tr>";
            echo "<td> $res[0]</td>";
            echo "<td> $res[1]</td>";
            echo "<td> $res[2]</td>";
            echo "</tr>";
        }
        ?>
        </table>
        <from metod="POST" action="register.html">
        <input type="submit" value="Home">
    </body>
</html>