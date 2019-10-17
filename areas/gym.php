<?php 
	include_once 'misc/opendb.php';

	$result = $mysql->query("SELECT * FROM GYMS");

	if(!$result) die("Opsss! Something wrong...");

	// Temporary
	$row = $result->fetch_assoc();
	$gym_name = $row['name'];
?>
<link rel="stylesheet" type="text/css" href="styles/gym.css">
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
		getInfo(<?php echo $_SESSION['userid']; ?>).then(info=>{
			return Promise.all([info.energy,info.maxenergy]);
		}).then(([energy,maxenergy])=>{
			const elem = document.querySelector("span#gym-energy");
			elem.innerHTML = `You have <span>${energy}/${maxenergy}</span> energy`;
			elem.querySelector("span").style.color = (energy >= 5) ? "#668c00" : "red";
		}).then(()=>setTimeout(updateEnergy,1000));
	}
	updateEnergy();
</script>
<hr>
<div id="train-type">
	<div id="strength">
		<div class="header subtitle dark"><i class="icon strength"></i>Strength<font class="aright">0.00</font></div> <!-- Fix Later -->
		<div class="content">
			<span class="details">Damage you make on impact<br><span class="light-gray">5 energy per train</span></span>
			<form method="POST">
				<div class="inc-button">
					<button type="button">&#x25c0;</button>
					<input type="hidden" name="type" value="strength">
					<input type="text" name="value" value="1">
					<button type="button">&#x25b6;</button>
				</div>
				<input type="submit" name="submit" value="TRAIN">
			</form>
		</div>
	</div>
	<div id="defense">
		<div class="header subtitle dark"><i class="icon defense"></i>Defense<font class="aright">0.00</font></div> <!-- Fix Later -->
		<div class="content">
			<span class="details">Ability to withstand damage<br><span class="light-gray">5 energy per train</span></span>
			<form method="POST">
				<div class="inc-button">
					<button type="button">&#x25c0;</button>
					<input type="hidden" name="type" value="defense">
					<input type="text" name="value" value="1">
					<button type="button">&#x25b6;</button>
				</div>
				<input type="submit" name="submit" value="TRAIN">
			</form>
		</div>
	</div>
	<div id="speed">
		<div class="header subtitle dark"><i class="icon speed"></i>Speed<font class="aright">0.00</font></div> <!-- Fix Later -->
		<div class="content">
			<span class="details">Chance of hitting opponent<br><span class="light-gray">5 energy per train</span></span>
			<form method="POST">
				<div class="inc-button">
					<button type="button">&#x25c0;</button>
					<input type="hidden" name="type" value="speed">
					<input type="text" name="value" value="1">
					<button type="button">&#x25b6;</button>
				</div>
				<input type="submit" name="submit" value="TRAIN">
			</form>
		</div>
	</div>
	<div id="dexterity">
		<div class="header subtitle dark"><i class="icon dexterity"></i>Dexterity<font class="aright">0.00</font></div> <!-- Fix Later -->
		<div class="content">
			<span class="details">Ability to evade an attack<br><span class="light-gray">5 energy per train</span></span>
			<form method="POST">
				<div class="inc-button">
					<button type="button">&#x25c0;</button>
					<input type="hidden" name="type" value="dexterity">
					<input type="text" name="value" value="1">
					<button type="button">&#x25b6;</button>
				</div>
				<input type="submit" name="submit" value="TRAIN">
			</form>
		</div>
	</div>
	<script type="text/javascript">
		["strength","defense","speed","dexterity"].forEach(type=>{
			document.querySelectorAll(`#${type} .inc-button > button`).forEach((arr,i)=>{
				arr.addEventListener("click",(i === 0) ? 
				function(e){
					let elem = document.querySelector(`#${type} .inc-button > input[type=text]`);
					let value = parseInt(elem.value);
					if(value - 1 >= 1){
						elem.value = value - 1;
					}
				}:
				function(e){
					let elem = document.querySelector(`#${type} .inc-button > input[type=text]`);
					let value = parseInt(elem.value);
					if(value + 1 >= 1){
						elem.value = value + 1;
					}
				});
			});
		});
	</script>
</div>
<div id="GymOutput" class="whitebg">
</div>
<ul id="Gyms">
	<?php 
		$result = $mysql->query("SELECT selected_gym FROM USERS WHERE userid=".$_SESSION['userid'].";");
		$selected_gym = null;
		if($result)
			$selected_gym = $result->fetch_assoc()['selected_gym'];

		$result = $mysql->query("SELECT id FROM GYMS;");

		if($result){
			// while(($row = $result->fetch_assoc()) != null){
				// $type = $row['id'];
			for ($i=1;$i<=32;$i++) { 
				echo '<li class="gyms icon';
				if($i == $selected_gym) echo ' selected ';
				echo '"><div class="gyms icon icon'.$i;
				if($i == $selected_gym) echo ' selected ';
				echo '"></div></li>';
			}
		}

		$mysql->close();
	?>
</ul>