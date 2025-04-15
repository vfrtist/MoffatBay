const up = document.querySelector('#up')
const down = document.querySelector('#down')
const guests = document.querySelector('#guests')


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