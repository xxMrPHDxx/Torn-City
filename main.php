<?php
	if(isset($_POST['page']) && isset($_POST['title'])){
		$page = $_POST['page'];
		$title = $_POST['title'];
	}else{
		if(isset($_POST['submit']) && isset($_POST['type']) && isset($_POST['value'])){
			$submit = $_POST['submit'];
			if($submit == "TRAIN"){ // TODO: Train stats based on type
				$type = $_POST['type'];
				$value = $_POST['value'];
				$page = "gym";
				$title = "Torn | Gym";
			}
		}else{
			$page = 'home';
			$title = "Torn | Home";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<script type="text/javascript">
		function select(page){
			document.querySelector("#Navigate_"+page).submit();
		}
		function setInfo(){
			let [energy,nerve,happy,life] = [document.querySelector("#energy"),
											document.querySelector("#nerve"),
											document.querySelector("#happy"),
											document.querySelector("#life")];
			let [maxenergy,maxnerve,maxhappy,maxlife] = [document.querySelector("#maxenergy"),
											document.querySelector("#maxnerve"),
											document.querySelector("#maxhappy"),
											document.querySelector("#maxlife")];
			energy.innerText = "<?php echo $_SESSION['energy']; ?>";
			maxenergy.innerText = "<?php echo $_SESSION['maxenergy']; ?>";
			nerve.innerText = "<?php echo $_SESSION['nerve']; ?>";
			maxnerve.innerText = "<?php echo $_SESSION['maxnerve']; ?>";
			happy.innerText = "<?php echo $_SESSION['happy']; ?>";
			maxhappy.innerText = "<?php echo $_SESSION['maxhappy']; ?>";
			life.innerText = "<?php echo $_SESSION['life']; ?>";
			maxlife.innerText = "<?php echo $_SESSION['maxlife']; ?>";
		}
	</script>
	<script type="text/javascript" src="scripts/script1.js"></script>
</head>
<body>
	<div class="wrapper">
		<div id="grid_main">
			<div id="header">
				<ul class="header menu">
					<li><a href="">Help</a></li>
					<li><a href="">Forum</a></li>
					<li><a href="">Staff</a></li>
					<li><a href="">Credit</a></li>
					<li><a href="logout.php">Logout</a></li> <!-- Temporary -->
				</ul>
			</div>
			<div id="sidebar">
				<div id="info">
					<h3 class="title">Information</h3>
					<div id="info-bar">
						<ul id="status-icon">
							<li class="status-icon gender male"><a></a></li>
							<li class="status-icon bank investment"><a></a></li>
							<li class="status-icon job employed"><a></a></li>
							<li class="status-icon education"><a></a></li>
						</ul>
					</div>
					<hr>
					<ul class="info">
						<li id="name">Name: <?php echo "<a href='#' id='name-link'>".$_SESSION['name']."</a>"; ?></li>
						<li id="money">Money: <?php echo "<span id='money-value'>$".$_SESSION['money']."</span>"; ?></li>
						<li id="level">Level: <?php echo $_SESSION['level']; ?></li>
						<li id="points">Points: <?php echo $_SESSION['points']; ?></li>
						<?php if($_SESSION['merits'] > 0) echo "<li id=\"merits\">Merits: ".$_SESSION['merits']."</li>"; ?>
					</ul>
					<hr>
					<div id="stats-area">
						<div>Energy: <span id="energy">25</span>/<span id="maxenergy">100</span><span id="timer-energy" class="time float right">02:15</span>
							<div class="progressbar back">
								<div class="progressbar middle"></div>
								<div id="bar-energy" style="width: 25%;" class="progressbar front"></div>
							</div>
						</div>
						<div>Nerve: <span id="nerve">25</span>/<span id="maxnerve">100</span><span id="timer-nerve" class="time float right">02:15</span>
							<div class="progressbar back">
								<div class="progressbar middle"></div>
								<div id="bar-nerve" style="width: 50%;" class="progressbar front"></div>
							</div>
						</div>
						<div>Happy: <span id="happy">25</span>/<span id="maxhappy">100</span><span id="timer-happy" class="time float right">02:15</span>
							<div class="progressbar back">
								<div class="progressbar middle"></div>
								<div id="bar-happy" style="width: 75%;" class="progressbar front"></div>
							</div>
						</div>
						<div>Life: <span id="life">25</span>/<span id="maxlife">100</span><span id="timer-life" class="time float right">FULL</span>
							<div class="progressbar back">
								<div class="progressbar middle"></div>
								<div id="bar-life" style="width: 100%;" class="progressbar front"></div>
							</div>
						</div>
					</div>
				</div>
				<div id="areas">
					<h3 class="title">Areas</h3>
					<ul class="areas">
						<?php 
							$pages = ["home","items","city","job","gym","properties","education","crimes","missions","newspaper","jail","hospital","casino","forums","halloffame","factions","recruitcitizens","rules","elimination"];
							$titles = ["Home","Items","City","Job","Gym","Properties","Education","Crimes","Missions","Newspaper","Jail","Hospital","Casino","Forums","Hall of Fame","Factions","Recruit Citizens","Rules","Elimination"];
							for ($i=0;$i<sizeof($pages);$i++) {
								$cpage = $pages[$i];
								$title = $titles[$i];
								echo "<li onclick=select(\"".$cpage."\") ".($page==$cpage ? "class=\"selected\"":"")."><form id=\"Navigate_".$cpage."\" action=\"index.php\" method=\"POST\">".
									"<input type=\"hidden\" name=\"page\" value=\"".$cpage."\">".
									"<input type=\"hidden\" name=\"title\" value=\"Torn | ".$title."\">".
									"<div style=\"display: flex;\"><i class=\"areas icon ".$cpage."\"></i>".$title."</div></form></li>";
							}
						?>
					</ul>
					<hr>
				</div>
			</div>
			<div id="main">
				<?php 
					if($page == 'home') include "areas/home.php";
					elseif ($page == 'items') include "areas/items.php";
					elseif ($page == 'gym') include "areas/gym.php";
					elseif ($page == 'crimes') include "areas/crimes.php";
					else echo "Unknown page ".$page;
				?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		<?php 
			echo "UpdateFactory(".$_SESSION['userid'].")();";
			echo "setInterval(UpdateFactory(".$_SESSION['userid']."),1000)"; 
		?>
	</script>
</body>
</html>