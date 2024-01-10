window.onscroll = function () {
  function toggleActiveLink() {
    // Get all the links with an ID that starts with 'section'
    const links = document.querySelectorAll('header nav a[href^="#"]');
    if (null === links) {
      return;
    }

    // Get the current scroll position of the window
    const currentScrollPos = window.scrollY + 100;

    // Loop through all the links
    for (let i = 0; i < links.length; i++) {
      const link = links[i];

      // Get the section that the link points to
      const section = document.querySelector(link.hash);

      // If the section is in the viewport, add an 'active' class to the link
      if (
        section.offsetTop <= currentScrollPos &&
        section.offsetTop + section.offsetHeight > currentScrollPos
      ) {
        link.classList.add("active");
      } else {
        link.classList.remove("active");
      }
    }
  }
};
