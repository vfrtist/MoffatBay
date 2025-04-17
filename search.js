const checkin = document.querySelector('#checkin')
const checkout = document.querySelector('#checkout')
const guests = document.querySelector('#guests')
const forms = document.querySelectorAll('.roomForm')

console.log(checkin)
console.log(checkout)

forms.forEach((form) => {
    form.addEventListener('submit', (e) => {
        form.elements.checkin.value = checkin.value
        form.elements.checkout.value = checkout.value
        form.elements.guests.value = guests.value
    })
})