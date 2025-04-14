const up = document.querySelector('#up')
const down = document.querySelector('#down')
const guests = document.querySelector('#guests')


up.addEventListener('click', (e) => {
    guests.value = parseInt(guests.value) + 1
})
down.addEventListener('click', (e) => {
    let val = guests.value
    if (val > 0) {
        guests.value = parseInt(guests.value) - 1
    }

})