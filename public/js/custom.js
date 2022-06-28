// Toggle Menu Start
let state = { closed: true }

const toggler = document.getElementById('menu-toggler'),
    menu = document.getElementById('offcanvas-menu');

let render = () => {
    if (state.closed) {
        menu.classList.remove('active');
        toggler.classList.remove('active')
    } else {
        menu.classList.add('active');
        toggler.classList.add('active')
    }
}

toggler.addEventListener('click', () => {
    state.closed ? state.closed = false : state.closed = true;
    render();
})

render();
// Toggle Menu End
