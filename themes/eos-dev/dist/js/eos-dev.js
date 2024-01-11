window.onscroll = function () {

  toggleActiveLink();

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
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
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
});
