const caption = document.querySelector('#caption')
const bg = document.querySelector('#background')

console.log(document.documentElement.clientHeight) // Window Height
console.log(bg.naturalHeight) // Image Natural height (raw height)


// document.addEventListener('mousemove', (e) => {
//     let y = e.clientY
//     let half = document.documentElement.clientHeight / 2
//     if (y > half) {
//         document.documentElement.style.setProperty('--float', `-${(y - half) / 45}px`)
//     }
// })