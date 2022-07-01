const filters = Array.from(document.querySelectorAll('.catalog-filters__filter-item'))

filters.map(filter =>{
    const title = filter.querySelector('a')
    const hiddenMenu =  filter.querySelector('.catalog-filters__filter-values')

    title.onclick = (e) =>{
        e.currentTarget.classList.toggle('catalog-filters__title_active')
        hiddenMenu.classList.toggle('hide')
        
    } 
})
