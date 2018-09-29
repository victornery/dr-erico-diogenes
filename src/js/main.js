const handleNav = () => {

  const button = document.querySelector('.menu-icon');
  const body = document.querySelector('body');
  const open = 'nav-opened';

  button.addEventListener('click', () => {

    if (body.classList.contains(open)) {
      body.classList.remove(open);
    } else {
      body.classList.add(open);
    }

  });

}

handleNav();
