<?php
if(isset($_POST['no'])){
     $no=$_POST['no'];
     echo $no.'<br><br>';
     if(empty($no))
	{
		echo "alert('fill the number of columns')";
		header('Location: createtable.php');
	}
	else{
		
	}
}
?>
<?php
if(isset($_POST['n1']) && isset($_POST['n2']) && isset($_POST['n3']) && isset($_POST['n4']) && isset($_POST['v1']) && isset($_POST['v2']) && isset($_POST['v3']) && isset($_POST['v4'])){
n=array();
for ($i=1; $i<=$no; $i++){
	var $n_'[$i]'=$_POST["n'$i'"];
	var $v_'[$i]'=$_POST["n'$i'"];
	}
}
?>
Enter the Attributes names and their types:<br><br>
<?php
//echo $no;
echo "<form action='table.php' method='post'>";
for ($i=1; $i<=$no; $i++){
	echo "Name <input type='text' name='n$i'>"."&nbsp;&nbsp;";
	echo "  Type <input type='text' name='v$i'>"."<br><br>";
}
echo "<input type='submit' value='submit'>";
?>
