
const links = document.querySelectorAll('.middle_link');

// add a click event listener to each link
links.forEach(link => {
  link.addEventListener('click', e => {
    // remove the border from any other link that currently has a border
    links.forEach(otherLink => {
      otherLink.classList.remove('active');
    });
    // add the border to the clicked link
    link.classList.add('active');

    // prevent the link from performing its default action

  });

  // check if the link matches the current URL and add the border if it does
  if (link.href === window.location.href) {
    link.classList.add('active');
  }
});
