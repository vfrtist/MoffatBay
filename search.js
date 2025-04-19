const checkin = document.querySelector('#checkin')
const checkout = document.querySelector('#checkout')
const guests = document.querySelector('#guests')
const forms = document.querySelectorAll('.roomForm')
const up = document.querySelector('#up')
const down = document.querySelector('#down')

if (forms) {
    forms.forEach((form) => {
        form.addEventListener('submit', (e) => {
            form.elements.checkin.value = checkin.value
            form.elements.checkout.value = checkout.value
            form.elements.guests.value = guests.value
        })
    })
}

function checkForOne() {
    if (guests.value < 1) {
        guests.value == 1
        down.disabled = true
    } else if (guests.value == 1) {
        down.disabled = true
    } else {
        down.disabled = false
    }
}

up.addEventListener('click', (e) => {
    guests.value = parseInt(guests.value) + 1
    checkForOne()
})
down.addEventListener('click', (e) => {
    let val = guests.value
    if (val > 1) {
        guests.value = parseInt(guests.value) - 1
    }
    checkForOne()
})

guests.addEventListener('change', checkForOne)