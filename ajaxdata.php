<select class="form-control" name="lga" id="lga-dropdown">
<?php
require_once "db.php";
$state_id = $_POST["state_id"];
$result = mysqli_query($conn,"SELECT * FROM lga where state_id = $state_id");
?>
<option value="">Select LGA</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["lga_id"];?>"><?php echo $row["lga_name"];?></option>
<?php
}
?>
?>

