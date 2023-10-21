
<link rel="stylesheet" href="media/css/style2.css">

<div class="body">
<div class="scroller" data-direction="left" data-speed="medium">
  <div class="scroller__inner">
    <img src="media/images/Gabon-Oil-Comp_01.gif" alt="" />
    <img src="media/images/Gabon-Oil-Comp_02.gif" alt="" />
    <img src="media/images/Gabon-Oil-Comp_03.gif" alt="" />
    <img src="media/images/Gabon-Oil-Comp_04.gif" alt="" />
  </div>
</div>
</div>

<script>
	const scrollers = document.querySelectorAll(".scroller");

// If a user hasn't opted in for recuded motion, then we add the animation
if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
  addAnimation();
}

function addAnimation() {
  scrollers.forEach((scroller) => {
    // add data-animated="true" to every `.scroller` on the page
    scroller.setAttribute("data-animated", true);

    // Make an array from the elements within `.scroller-inner`
    const scrollerInner = scroller.querySelector(".scroller__inner");
    const scrollerContent = Array.from(scrollerInner.children);

    // For each item in the array, clone it
    // add aria-hidden to it
    // add it into the `.scroller-inner`
    scrollerContent.forEach((item) => {
      const duplicatedItem = item.cloneNode(true);
      duplicatedItem.setAttribute("aria-hidden", true);
      scrollerInner.appendChild(duplicatedItem);
    });
  });
}

</script>