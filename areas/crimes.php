<link rel="stylesheet" type="text/css" href="styles/crimes.css">
<div class="main header">Crimes</div>
<hr>
<div class="content-box">
	<div class="subtitle light"><i class="icon bulb"></i>Crimes Tutorial</div>
	<div class="content">Doing crimes can earn you money and items. The more crimes you do, the more experience you will gain, making it easier for you to do harder crimes. Make sure you understand that being caught for your crimes could greatly reduce your crime experience, making it even harder to do crimes. As you advance, you will be able to do even more crimes, earning you big money.</div>
</div>
<hr>
<div class="info-box">
	<i class="icon info"></i>
	<div class="content">So, you're in need of some quick cash? You sit down and begin thinking of ways you could get a little richer.
The more crimes you do, the easier you will be able to do them. The crimes are listed in order from easy to hard.
Don't try the hard ones too quickly or you could find yourself in jail!</div>
</div>
<hr>
<div class="content-box">
	<div class="subtitle dark">Crime</div>
	<div id="Crimes" class="crimes table-list">
	<?php 
		$letters = str_split("abcdefghijklmnopq");
		$temp = ["Search for cash","Sell copied media","Shoplift","Pickpocket someone","Larceny","Armed Robberies","Transport drugs","Plant a computer virus","Assassination","Arson","Grand Theft Auto","Pawn Shop","Counterfeiting","Kidnapping","Arms Trafficking","Bombings","Hacking"];
		for($i=0;$i<sizeof($temp);$i++) {
		 	echo "<div class='row'><img src='icons/crimes/".$letters[$i].".png'></img><font>".$temp[$i]."</font><span>".(2+$i)." Nerve</span><div class='center'><input type='radio'></div></div>";
		}
	?>
	<div class="footer"><button id="Next">Next Step</button></div>
	</div>
	<script type="text/javascript">
		document.querySelectorAll("#Crimes > .row").forEach(elem=>{
			elem.addEventListener('mouseover',(e)=>{
				elem.querySelectorAll(".row > *").forEach(child => {
					child.style.background = "white";
				});
			});
			elem.addEventListener('mouseout',(e)=>{
				elem.querySelectorAll(".row > *").forEach(child => {
					child.style.background = " #f2f2f2";
				});
			});
		});
	</script>
</div>