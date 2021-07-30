const navToggleBtn = document.querySelector('.toggleBtn');
const mobNav= document.querySelector('#mobile .nav__mobile_list');
navToggleBtn.addEventListener('click', e => {
    mobNav.classList.toggle('active');
} );

const dropBtn = document.querySelector('.drop-down');
const dropIcon = document.querySelector('.drop-down i.bx');
const dropmenu = document.querySelector('.drop-menu');

if(dropBtn){
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
}

//add to cart
const addToCartForm = document.querySelectorAll('.addToCartForm');
addToCartForm.forEach( form => form.addEventListener('submit', (e)=>{

    e.preventDefault();
    
    let data = new FormData(form);

    fetch('http://127.0.0.1:8000/add-to-cart',{
        method : 'post',
        body: data,
    }).then(response => response.json()).then(data => {
        console.log(data);
        if(data.success){
            alert("item added to cart");
        }
    })

}) );


// search product
const searchBar = document.querySelectorAll('.nav__search');
const searchInput = document.querySelectorAll('.nav__search input');
const searchResultBox = document.querySelectorAll('.search__results ');

searchInput.forEach(input => input.addEventListener('keyup',()=>{
    let term = input.value;
    searchResultBox.forEach(box => box.innerHTML="");

    if(term){
        fetch(`http://127.0.0.1:8000/api/f/${term}`)
            .then(res => res.json())
            .then(data => {
                let str = '';
                
                if(data.length > 0){
                    data.slice(0,6).forEach(item => {
                        let tempStr = `<a href="/product/${item.id}" class="search__span">${item.title}</a>`;
                        str+= tempStr;
                    });     
                }else{
                    str = "<a href='# class='search__span' style='color:#fff'>No Item found...</a>";
                }
               

                searchResultBox.forEach(box => box.innerHTML = str);

            });
    }

}));

