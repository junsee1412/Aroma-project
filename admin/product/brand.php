<?php 
$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql = "SELECT * FROM brand";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
?>
<li>
	<i class="pepp ti-pencil" onclick="editbrand(<?echo $row['id'];?>)"></i>
	<div class="form-check form-check-flat">
		<label class="form-check-label">
			<?echo $row['name'];?>
		</label>
	</div>
	<i class="remove ti-trash" onclick="delbrand(<?echo $row['id'];?>)"></i>
</li>
<?
}
?>
<script src="../js/products-event.js"></script>