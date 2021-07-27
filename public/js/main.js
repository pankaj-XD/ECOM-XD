const navToggleBtn = document.querySelector('.toggleBtn');
const mobNav= document.querySelector('#mobile .nav__mobile_list');

navToggleBtn.addEventListener('click', e => {
    mobNav.classList.toggle('active');
} );




const dropBtn = document.querySelector('.drop-down');
const dropIcon = document.querySelector('.drop-down i.bx');
const dropmenu = document.querySelector('.drop-menu');

dropBtn.addEventListener('click', e => {
    if(e.target.classList.contains('drop')){
        dropmenu.classList.toggle('hide');
    
        if(dropIcon.classList.contains('bx-chevron-up')){
            dropIcon.classList.remove('bx-chevron-up');
             dropIcon.classList.add('bx-chevron-down');
        }else{
            dropBtn.classList.remove('bx-chevron-down');
             dropIcon.classList.add('bx-chevron-up');
        }
     
    }
} );

