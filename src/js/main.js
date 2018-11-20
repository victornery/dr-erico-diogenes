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
  const especialidades = '.especialidades-carrosel';
  const convenios = '.convenios-carrosel';

  if (document.querySelector(highlight)) {
    new Glide(highlight, {
      type: 'carousel',
      startAt: 0,
      perView: 1,
      autoplay: 3000,
      keyboard: true,
    }).mount();
  }

  if (document.querySelector(especialidades)) {
    new Glide(especialidades, {
      type: 'carousel',
      startAt: 0,
      perView: 4,
      autoplay: 3000,
      keyboard: true,
      breakpoints: {
        991: {
          perView: 2
        },
        551: {
          perView: 1
        }
      }
    }).mount();
  }

  if (document.querySelector(convenios)) {
    new Glide(convenios, {
      type: 'carousel',
      startAt: 0,
      perView: 4,
      autoplay: 3000,
      keyboard: true,
      breakpoints: {
        991: {
          perView: 2
        },
        551: {
          perView: 1
        }
      }
    }).mount();
  }
};

handleSliders();

const handleList = () => {
  const items = document.querySelectorAll('.patologias__lista li');

  items.forEach(e => {
    e.addEventListener('click', () => {
      e.classList.toggle('active');
    });
  });
}

handleList();
