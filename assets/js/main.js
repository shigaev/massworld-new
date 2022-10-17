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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJtYWluLmpzIl0sInNvdXJjZXNDb250ZW50IjpbImxldCBib2R5ID0gZG9jdW1lbnQuYm9keVxyXG5sZXQgbmF2V3JhcHBlciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5uYXYtbWVudS13cmFwcGVyJyk7XHJcbmxldCB0b2dnbGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLm5hdi10b2dnbGVyJyk7XHJcbmxldCBuYXZUb2dnbGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLm5hdi10b2dnbGVyX19yb3cnKTtcclxuXHJcbmZ1bmN0aW9uIHNob3coKSB7XHJcbiAgICBuYXZXcmFwcGVyLmNsYXNzTGlzdC50b2dnbGUoJ2FjdGl2ZScpXHJcbiAgICBuYXZUb2dnbGVyLmNsYXNzTGlzdC50b2dnbGUoJ2FjdGl2ZScpXHJcbiAgICBib2R5LmNsYXNzTGlzdC50b2dnbGUoJ2FjdGl2ZScpXHJcbn1cclxuXHJcbnRvZ2dsZXIuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBzaG93KVxyXG5cclxubGV0IG5hdk1lbnVJdGVtID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLm5hdi1tZW51X19pdGVtJylcclxuXHJcbm5hdk1lbnVJdGVtLmZvckVhY2goZnVuY3Rpb24gKGl0ZW0pIHtcclxuICAgIGl0ZW0uYWRkRXZlbnRMaXN0ZW5lcignbW91c2VvdmVyJywgKGV2ZW50KSA9PiB7XHJcbiAgICAgICAgZm9yIChsZXQgZWxlbSBvZiBldmVudC5jdXJyZW50VGFyZ2V0LmNoaWxkcmVuKSB7XHJcbiAgICAgICAgICAgIGlmIChlbGVtLmNsYXNzTGlzdC5jb250YWlucygnc3ViLW1lbnUnKSA9PT0gdHJ1ZSkge1xyXG4gICAgICAgICAgICAgICAgZWxlbS5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfSlcclxuXHJcbiAgICBpdGVtLmFkZEV2ZW50TGlzdGVuZXIoJ21vdXNlb3V0JywgKGV2ZW50KSA9PiB7XHJcbiAgICAgICAgZm9yIChsZXQgZWxlbSBvZiBldmVudC5jdXJyZW50VGFyZ2V0LmNoaWxkcmVuKSB7XHJcbiAgICAgICAgICAgIGlmIChlbGVtLmNsYXNzTGlzdC5jb250YWlucygnc3ViLW1lbnUnKSA9PT0gdHJ1ZSkge1xyXG4gICAgICAgICAgICAgICAgZWxlbS5jbGFzc0xpc3QucmVtb3ZlKCdhY3RpdmUnKVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfSlcclxufSlcclxuXHJcbmxldCBjb2wgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuY29sLXBvc3RzJylcclxuXHJcbmZvciAoaSA9IDA7IGkgPCBjb2wubGVuZ3RoOyBpKyspIHtcclxuICAgIGNvbFtpXS5jbGFzc0xpc3QuYWRkKCdjb2wtc3R5bGUnKVxyXG4gICAgY29sW2ldLnNldEF0dHJpYnV0ZSgnaWQnLCBpICsgMSlcclxufVxyXG5cclxuY29uc3QgbmF2U2VhcmNoID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLm5hdi1zZWFyY2gnKVxyXG5jb25zdCBzZWFyY2ggPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuc2VhcmNoJylcclxuY29uc3Qgc2VhcmNoQ2xvc2UgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuc2VhcmNoLWNsb3NlJylcclxuXHJcbmZ1bmN0aW9uIG9wZW5TZWFyY2goKSB7XHJcbiAgICBzZWFyY2guY2xhc3NMaXN0LmFkZCgnYWN0aXZlJylcclxufVxyXG5cclxuZnVuY3Rpb24gY2xvc2VTZWFyY2goKSB7XHJcbiAgICBzZWFyY2guY2xhc3NMaXN0LnJlbW92ZSgnYWN0aXZlJylcclxufVxyXG5cclxubmF2U2VhcmNoLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgb3BlblNlYXJjaClcclxuc2VhcmNoQ2xvc2UuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBjbG9zZVNlYXJjaCkiXSwiZmlsZSI6Im1haW4uanMifQ==
