<?php 
	$mysql = mysqli_connect("localhost","root","minecraft12345","torn");

	$result = $mysql->query("SELECT * FROM GYMS");

	if(!$result) die("Opsss! Something wrong...");

	// Temporary
	$row = $result->fetch_assoc();
	$gym_name = $row['name'];

	$mysql->close();
	$energy = 0;//$row["energy"];
	$maxenergy = 100;//$row["maxenergy"];
?>
<div class="main header">Gym</div>
<hr>
<div class="content-box">
	<div class="subtitle light"><i class="icon bulb"></i>Gym Tutorial</div>
	<div class="content">Training your stats in Torn is imperative. They strongly influence your success during attacking, and a player with higher stats is more feared. To unlock new gyms all you have to do is train. You'll slowly gain gym EXP which will allow you to access new and better gyms. The next gym will be available for you to join once you have the required gym EXP.</div>
</div>
<hr>
<div id="Gym" class="whitebg">
	<span class="description"><b id="gym-name"><?php echo $gym_name; ?></b><br><span id="gym-energy"></span></span>
	<img src="icons/gym/5.png"></img>
</div>
<script type="text/javascript">
	function updateEnergy(){
		getInfo(<?php echo $SESSION['userid']; ?>).then(info=>{
			return Promise.all([info.energy,info.maxenergy]);
		}).then(([energy,maxenergy])=>{
			document.querySelector("span#gym-energy").innerText = `${energy}/${maxenergy}`;
		}).then(()=>setTimeout(updateEnergy,1000));
	}
	updateEnergy();
</script>
<hr>
<div id="train-type">
	<div id="strength">
		<div class="header subtitle dark"><i class="icon strength"></i>Strength<font class="aright">0.00</font></div> <!-- Fix Later -->
		<div class="content">
			<span class="details">Something</span>
			<form method="POST">
				<div class="inc-button">
					<button>&#x25c0;</button>
					<input type="hidden" name="type" value="strength">
					<input type="text" name="value" value="1">
					<button>&#x25b6;</button>
				</div>
				<input type="submit" name="submit" value="TRAIN">
			</form>
		</div>
	</div>
	<div id="defense">
		<div class="header subtitle dark"><i class="icon defense"></i>Defense<font class="aright">0.00</font></div> <!-- Fix Later -->
		<div class="content">
			<span class="details">Something</span>
			<form method="POST">
				<div class="inc-button">
					<button>&#x25c0;</button>
					<input type="hidden" name="type" value="defense">
					<input type="text" name="value" value="1">
					<button>&#x25b6;</button>
				</div>
				<input type="submit" name="submit" value="TRAIN">
			</form>
		</div>
	</div>
	<div id="speed">
		<div class="header subtitle dark"><i class="icon speed"></i>Speed<font class="aright">0.00</font></div> <!-- Fix Later -->
		<div class="content">
			<span class="details">Something</span>
			<form method="POST">
				<div class="inc-button">
					<button>&#x25c0;</button>
					<input type="hidden" name="type" value="speed">
					<input type="text" name="value" value="1">
					<button>&#x25b6;</button>
				</div>
				<input type="submit" name="submit" value="TRAIN">
			</form>
		</div>
	</div>
	<div id="dexterity">
		<div class="header subtitle dark"><i class="icon dexterity"></i>Dexterity<font class="aright">0.00</font></div> <!-- Fix Later -->
		<div class="content">
			<span class="details">Something</span>
			<form method="POST">
				<div class="inc-button">
					<button>&#x25c0;</button>
					<input type="hidden" name="type" value="dexterity">
					<input type="text" name="value" value="1">
					<button>&#x25b6;</button>
				</div>
				<input type="submit" name="submit" value="TRAIN">
			</form>
		</div>
	</div>
	<script type="text/javascript">
		["strength","defense","speed","dexterity"].forEach(type=>{
			document.querySelectorAll(`#${type} .inc-button > button`).forEach((arr,i)=>{
				arr.addEventListener("click",(i === 0) ? 
				function(arr){return function(e){
					let elem = document.querySelector(`#${type} .inc-button > input`);
					let value = parseInt(elem.value);
					if(value - 1 >= 1){
						elem.value = value - 1;
					}
				}}(arr):
				function(arr){return function(e){
					let elem = document.querySelector(`#${type} .inc-button > input`);
					let value = parseInt(elem.value);
					if(value + 1 >= 1){
						elem.value = value + 1;
					}
				}}(arr));
			});
		});
	</script>
</div>