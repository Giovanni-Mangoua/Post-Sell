 //header Scrolling
 window.addEventListener('scroll' , () => {
    document.querySelector('header').classList.toggle('scroll', window.scrollY > 0)
})

//Scroll
window.onscroll = function () {
    document.querySelector('.navbar').classList.remove('active')
}
