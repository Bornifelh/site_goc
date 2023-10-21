<link rel="stylesheet" href="media/css/style-card.scss">


<main>
	<div id="gallery">
        <figure>
			<img src="media/images/innovation-icon.svg" alt=" " title="">
			<figcaption>INNOVATION</figcaption>
		</figure>
		<figure>
			<img src="media/images/hand-thumbs-up-fill.svg" alt="" title="">
            
			<figcaption>QUALITÉ</figcaption>
		</figure>
		<figure>
			<img src="media/images/award-badge-svgrepo-com.svg" alt="" title="">
			
			<figcaption>EXPÉRIENCE</figcaption>
		</figure>
		
		<figure>
			<img src="media/images/network-svgrepo-com.svg" alt=" " title="">
			<figcaption>SÉCURITÉ</figcaption>
		</figure>
	</div>
</main>

  <script>
  
"use strict";
(function () {
	window.onload = () => {
		const obj = document.querySelector("#gallery");
		const time = 10000;
		function animStart() {
			if (obj.classList.contains("active") == false) {
				obj.classList.add("active");
				setTimeout(() => {
					animEnd();
				}, time);
			}
		}
		function animEnd() {
			obj.classList.remove("active");
			obj.offsetWidth;
		}
		document.addEventListener("scroll", function () {
			// scroll or scrollend
			animStart();
		});
		window.addEventListener("resize", animStart);
		animStart();
	};
})();

  </script>
  