async function getInfo(id){
	const form = new FormData();
	if(typeof id === "string" || typeof id === "number")
		form.append("userid",id)
	try{
		return fetch("info.php",{
			method: "post",
			body: form
		}).then(res => res.json());
	}catch(e){return Promise.resolve({error:404,message:"Invalid response"});}
}

function updateStatus(userid){
	getInfo(userid).then(info=>{
		if(info.status == 404){
			return;
		}
		["energy","maxenergy","nerve","maxnerve","happy","maxhappy","life","maxlife"].forEach(type=>{
			try{
				// Update value and maxvalue
				let elem = document.querySelector("#"+type);
				elem.innerText = info[type];
			}catch(e){console.error(e)}
		});

		// Update progress bar
		["energy","nerve","happy","life"].forEach(type=>{
			let elem = document.querySelector("#bar-"+type);
			let value = info[type];
			let maxvalue = info["max"+type];
			let percent = value * 100 / maxvalue;
			elem.style.width = percent+"%";
		});

		// Update timer
		["energy","nerve","happy","life"].forEach(type=>{
			let elem = document.querySelector("#timer-"+type);
			if(info[type] == info["max"+type]){
				elem.innerText = "FULL";
			}else{
				elem.innerText = "00:00"; // TODO: Fix later!!!
			}
		});
	})
}

function UpdateFactory(userid){
	return function(){
		updateStatus(userid);
	}
}