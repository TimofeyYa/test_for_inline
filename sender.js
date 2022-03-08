'use strict'

window.addEventListener('DOMContentLoaded', ()=>{
    const form = document.querySelector('.content__search form');
    const content = document.querySelector('.content__result')

    form.addEventListener('submit', async (e)=>{
        e.preventDefault();
        document.querySelectorAll('.content__block').forEach(item=>{
            item.remove();
        })
        let txt = document.querySelector('.content__search input').value;

        let data = await fetch(`./finder.php?txt=${txt}`);

        const posts = await data.json();
        console.log(posts);

        posts.forEach(item =>{
            if (item){
                let block = document.createElement('div');
                block.classList.add('content__block');
                block.innerHTML = `
                        <h2>${item.title}</h2>
                        <p>${item.body}</p>

            `;
            content.append(block);
            }
        }) 
        
    })
})