const btnDropdown = document.querySelector('.catalog-to-open')

btnDropdown.onclick = (e) =>{
    e.currentTarget.classList.toggle('catalog-to-open__opened')
}
