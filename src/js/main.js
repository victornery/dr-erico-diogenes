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

const handleSliders = () => {
  const highlight = '.slide';
  if (document.querySelector(highlight)) {
    new Glide(highlight, {
      type: 'slider',
      startAt: 0,
      perView: 1,
      autoplay: 3000,
      keyboard: true,
    }).mount();
  }
};

handleSliders();
