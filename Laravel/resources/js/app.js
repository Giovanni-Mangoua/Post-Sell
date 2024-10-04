import './bootstrap';


/* Js du systeme d'onglet */
/* Quand on clique sur un lien (onglet)
   1- On desactive l'onglet qui est en cours en retirant le active
   2- On active l'onglet sur lequel on a clique 
*/

var tabs = document.querySelectorAll('.tabs a');
for (let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', (e) => {

        var li = tabs[i].parentNode
        var div = tabs[i].parentNode.parentNode.parentNode
        div.querySelector('.tabs .active').classList.remove('active')
        li.firstElementChild.classList.toggle('active')

        var content = document.querySelectorAll('.tab-content') 
        //on retire le active1 sur le bloc 
        for (let j = 0; j < content.length; j++) {
            if (content[i].id == li.firstElementChild.id) {
                //console.log(content[i])
                document.querySelector('.tabs-content .active1').classList.remove('active1')
                content[i].classList.toggle('active1')
            }   
        }
    })
}


//Qd on clique sur le menu
document.getElementById('openSidebar').addEventListener('click', () => {
    document.querySelector('.main-sidebar').style.left = '0px';
})