<?php 
class Calculator{
private $a;
private $b;
public function __construct($a,$b){
$this->a = $a;
$this->b = $b;
}
public function add(){
 return $this->a + $this->b;
}
public function subtract(){
 return $this->a - $this->b;
}
public function multiply(){
 return $this->a * $this->b;
}
public function divide(){
 if ($this->b == 0){
   return "Error: Cannot divide by zero.";
}
return $this->a / $this->b;
}
}
?>
<!DOCTYPE html>
<html lang = "en">
<head>
   <title>Calculator</title>
</head>
<body>
<h2>Calculator</h2>
<form method="POST">
Enter A: <input type="number" name="a" step="any" required value="<?= htmlspecialchars($_POST['a'] ?? '') ?>"><br><br>
Enter B: <input type="number" name="b" step="any" required value="<?= htmlspecialchars($_POST['b'] ?? '') ?>"><br><br>
Operation:
<select name="operation" required>
<option value="+" <?= (($_POST['operation'] ?? '') == '+') ? 'selected' : '' ?>>Add (+)</option>
<option value="-" <?= (($_POST['operation'] ?? '') == '-') ? 'selected' : '' ?>>Subtract (-)</option>
<option value="*" <?= (($_POST['operation'] ?? '') == '*') ? 'selected' : '' ?>>Multiply (*)</option>
<option value="/" <?= (($_POST['operation'] ?? '') == '/') ? 'selected' : '' ?>> Divide (/)</option>
</select><br><br>
<input type="submit" name="submit" value="Calculate">
<a href ="<?= $_SERVER['PHP_SELF'] ?>"><button type="button">Reset</button></a>  
</form>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
$a = (float) $_POST['a'];
$b =(float) $_POST['b'];
$operation = $_POST['operation'];
$calc = new Calculator($a , $b);
echo "<h3> Result: ";
switch ($operation){
case '+':
 echo $calc->add();
 break;
case '-':
 echo $calc->subtract();
break;
case '*':
echo $calc->multiply();
break;
case '/':
echo $calc->divide();
break;
default:
echo "Invalid operation.";
}
echo "</h3>";
}
?>
</body>
</html>
