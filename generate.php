<?php
	// I think that's all for today. See you guys later!
	if(isset($_GET['name']) and isset($_GET['selector'])){
		header("Content-Type", "text/txt");
		$name = $_GET['name'];
		$selector = urldecode($_GET['selector']);
		echo "function ToUpperCase(text){
			return text.toUpperCase();
		}
		function GenerateLetterImageArray(remains,start=[]){
			if(!(remains instanceof Array)) throw new Error('Invalid argument {1}: Expected array');
			const char = remains.splice(0,1)[0];
			return typeof char === 'undefined' ? start : fetch('letters/'+char+'.png')
			.then(res=>res.blob())
			.then(blob=>{
				const image = new Image();
				image.src = URL.createObjectURL(blob);
				return Promise.resolve(image);
			})
			.then(a=>{
				start.push(a);
				return typeof char === 'undefined' ? Promise.resolve(start) : GenerateLetterImageArray(remains,start);
			});
		}
		async function GenerateCanvas(str){
			const canvas = document.createElement('canvas');
			canvas.setAttribute('width', (str.length * 43) + 'px');
			canvas.setAttribute('height', '43px');
			const ctx = canvas.getContext('2d');
			const letters = await Promise.all(str.split(''))
				.then(GenerateLetterImageArray)
				.then(a=>Promise.all([canvas, ctx, a]))
				.then(([a, b, c])=>{
					c.forEach((d,e)=>{
						b.drawImage(d, 43 * e, 0); //image,x,y,w,h
					});
					return a;
				});
			return Promise.resolve(canvas);
		}
		(()=>{
			Promise.resolve('$name')
			.then(ToUpperCase)
			.then(GenerateCanvas)
			.then(canvas=>document.querySelector('$selector').append(canvas));
		})();";
	}
?>