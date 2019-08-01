<div class="main header">Items</div>
<hr>
<div class="content-box">
	<div class="subtitle light"><i class="icon bulb"></i>Items Tutorial</div>
	<div class="content">Here you can view all of the items you own. You can look up information about the items, use them or send them to people. If one of your items is a weapon or armor, you can equip it by clicking the relevant icon next to it. You can use up to four different types of weapons when attacking, Primary (A rifle or big gun), Secondary (A pistol, smaller gun or specialist launcher), Melee (A hand-to-hand weapon) and Temporary (Throwable or Utility item).</div>
</div>
<div class="content-box">
	<div class="subtitle dark">Equipped Weapon</div>
	<div class="content"></div>
</div>
<div class="content-box">
	<div class="subtitle dark">Equipped Armor</div>
	<div class="content"></div>
</div>
<div class="content-box">
	<div class="subtitle dark">Your Items - All</div>
	<ul id="Inventory" class="items type">
		<?php
			$sql = "SELECT * FROM ITEM_TYPE;"; // id, name, type
			$result = $mysql->query($sql);
			if($result){
				while(($row = $result->fetch_assoc()) != null){
					$type = strtolower($row['type']);
					echo "<a class=\"item-type $type\" type=\"$type\"></a>";
				}
			}
		?>
		<!--
			<li class="item-type all"></li>
			<li class="item-type primary"></li>
			<li class="item-type secondary"></li>
			<li class="item-type melee"></li>
			<li class="item-type armor"></li>
			<li class="item-type medical"></li>
			<li class="item-type candy"></li>
			<li class="item-type electrical"></li>
			<li class="item-type jewelry"></li>
			<li class="item-type off temporary"></li>
			<li class="item-type off clothing"></li>
			<li class="item-type off drugs"></li>
			<li class="item-type off energy-drink"></li>
			<li class="item-type off alcohol"></li>
			<li class="item-type off boosters"></li>
			<li class="item-type off enhancer"></li>
			<li class="item-type off supply-packs"></li>
			<li class="item-type off flowers"></li>
			<li class="item-type off plushies"></li>
			<li class="item-type off cars"></li>
			<li class="item-type off viruses"></li>
			<li class="item-type off artifacts"></li>
			<li class="item-type off books"></li>
			<li class="item-type off special"></li>
			<li class="item-type off collectibles"></li>
			<li class="item-type off misc"></li>
		-->
	</ul>
	<div class="content">
		<script type="text/javascript">
			document.querySelectorAll(".item-type")
			.forEach(elem => {
				elem.onclick = () => {
					let type = elem.getAttribute('type');
					let post_data = new FormData();
					post_data.append("userid", "1");
					post_data.append("type", type);
					fetch(
						// Should use apis here
						"apis/inventory.php",
						{
							method: 'POST',
							body: post_data
						}
					)
					.then(res => res.json())
					.then(console.log);
				}
			});
		</script>
		<?php
			// echo $_GET;

			$sql = "SELECT * FROM ITEMS";
			if(isset($_GET['type'])){
				$type = $mysql->real_escape_string($_GET['type']);
				$sql = "$sql WHERE type_id=(SELECT id FROM ITEM_TYPE WHERE type=$type);";
			}

			$result = $mysql->query($sql);
			if($result){
				while(($row = $result->fetch_assoc()) != null){
					$name = $row['name'];
					echo "<li class='item-list'><img src='./images/items/katana.png'></img><div>$name</div></li>";
				}
			}
		?>
	</div>
</div>

<!-- <table id="Items">
<?php 
	// if(isset($SESSION['name'])){
	// 	$mysql = mysqli_connect("localhost","root","minecraft12345","torn");
	// 	$result = $mysql->query("SELECT * FROM ITEMS;");

	// 	if(!$result) die("Oppsss!");

	// 	$ishead = true;
	// 	while(($row = $result->fetch_assoc()) != null){
	// 		echo "<tr>";
	// 		foreach ($row as $prop => $value) {
	// 			if($prop === "id") continue;
	// 			if($ishead){
	// 				echo "<td>".$prop."</td>";
	// 			}
	// 		}
	// 		$ishead = false;
	// 		echo "</tr>";
	// 		echo "<tr>";
	// 		foreach ($row as $prop => $value) {
	// 			if($prop === "id") continue;
	// 			echo "<td>".$value."</td>";
	// 		}
	// 		echo "</tr>";
	// 	}
	// }else{
	// 	header("Location: index.php");
	// }
?>
</table> -->