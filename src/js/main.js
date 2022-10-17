let body = document.body
let navWrapper = document.querySelector('.nav-menu-wrapper');
let toggler = document.querySelector('.nav-toggler');
let navToggler = document.querySelector('.nav-toggler__row');

function show() {
    navWrapper.classList.toggle('active')
    navToggler.classList.toggle('active')
    body.classList.toggle('active')
}

toggler.addEventListener('click', show)

let navMenuItem = document.querySelectorAll('.nav-menu__item')

navMenuItem.forEach(function (item) {
    item.addEventListener('mouseover', (event) => {
        for (let elem of event.currentTarget.children) {
            if (elem.classList.contains('sub-menu') === true) {
                elem.classList.add('active')
            }
        }
    })

    item.addEventListener('mouseout', (event) => {
        for (let elem of event.currentTarget.children) {
            if (elem.classList.contains('sub-menu') === true) {
                elem.classList.remove('active')
            }
        }
    })
})

let col = document.querySelectorAll('.col-posts')

for (i = 0; i < col.length; i++) {
    col[i].classList.add('col-style')
    col[i].setAttribute('id', i + 1)
}

const navSearch = document.querySelector('.nav-search')
const search = document.querySelector('.search')
const searchClose = document.querySelector('.search-close')

function openSearch() {
    search.classList.add('active')
}

function closeSearch() {
    search.classList.remove('active')
}

navSearch.addEventListener('click', openSearch)
searchClose.addEventListener('click', closeSearch)