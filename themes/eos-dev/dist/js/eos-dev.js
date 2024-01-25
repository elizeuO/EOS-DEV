window.onscroll = function () {
  toggleActiveLink();
  runCounters();

  function toggleActiveLink() {
    // Get all the links with an ID that starts with 'section'
    const links = document.querySelectorAll('header nav a[href^="/#"]');
    if (null === links) {
      return;
    }

    // Loop through all the links
    for (let i = 0; i < links.length; i++) {
      const link = links[i];

      // Get the section that the link points to
      const section = document.querySelector(link.hash);
      if (null === section) {
        return;
      }

      // If the section is in the viewport, add an 'active' class to the link
      if (isInViewport(section)) {
        link.classList.add("active");
      } else {
        link.classList.remove("active");
      }
    }
  }

  //Check if is viewport
  function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  //Run counters if is the viewport
  function runCounters() {
    const section = document.querySelector(".js-activate-counters");

    if (null === section) {
      return;
    }

    if (isInViewport(section)) {
      const counters = document.querySelectorAll(".js-counter");
      if (0 === counters.length) {
        return;
      }

      counters.forEach((counter) => {
        let count = 0;
        const maxValue = parseInt(counter.getAttribute("count"));
        const countSpeed = maxValue < 100 ? 120 : 10;

        if (!counter.hasAttribute("counter-on")) {
          setInterval(() => {
            if (count < maxValue && !counter.hasAttribute("counted")) {
              count++;
              counter.innerHTML = count;
              counter.setAttribute("counter-on", "");
            } else {
              counter.setAttribute("counted", "");
            }
          }, countSpeed);
        }
      });
    }
  }
};

document.addEventListener("DOMContentLoaded", () => {
  //Run hero typing animation
  new TypeIt(".js-hero-typing", {
    speed: 50,
    waitUntilVisible: true,
  })
    .type(" inovadoras", { delay: 300 })
    .delete(10)
    .type(" criativas", { delay: 1000 })
    .delete(30)
    .type("E com um design atraente", { delay: 1000 })
    .delete(25)
    .type("Tenha mais sucesso na internet", { delay: 1000 })
    .delete(30)
    .type("_Vamos começar!", { delay: 500 })
    .go();

  handleHorizontalScroll();
});

//Handle tabs
document.addEventListener("click", (ev) => {
  let button = ev.target.closest(".js-tabs .js-tab-link[tab-id]");
  if (null === button) {
    return;
  }

  let tabs = button.closest(".js-tabs");
  let link = button.getAttribute("tab-id");
  let content = tabs.querySelector('.js-tab-content[tab-id="' + link + '"]');

  clearSelections(tabs);
  button.classList.add("active");
  content.classList.add("active");
});

function clearSelections(tabs) {
  let links = tabs.querySelectorAll(".js-tab-link[tab-id].active");
  let contents = tabs.querySelectorAll(".js-tab-content[tab-id].active");
  if (null === links || null === contents) {
    return;
  }

  links.forEach((link) => {
    link.classList.remove("active");
  });

  contents.forEach((content) => {
    content.classList.remove("active");
  });
}

//Horizontal scroll
function handleHorizontalScroll() {
  const scrollContainers = document.querySelectorAll(".js-horizontal-scroll");
  if (scrollContainers.length === 0) {
    return;
  }

  scrollContainers.forEach((scrollContainer) => {
    scrollContainer.addEventListener("wheel", function (event) {
      event.preventDefault();
      const delta = Math.max(
        -1,
        Math.min(1, event.wheelDelta || -event.detail)
      );
      scrollContainer.scrollLeft -= delta * 40;
    });
  });
}
