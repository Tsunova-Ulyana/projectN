const form = document.querySelector('.catalog-filters__list')

form.addEventListener('submit', (e) =>{
    e.preventDefault();
    const priceFrom = document.querySelector('.price-from') ?   Number(document.querySelector('.price-from').value) : null
    const priceTo= document.querySelector('.price-to') ?  Number(document.querySelector('.price-to').value): null

    
    
    let res = '';

    form.querySelectorAll('.radio-value').forEach(element =>{
        if (element.checked){
            res += element.value;
        }

    })


    location.replace(
        `./catalog.php?filters=${JSON.stringify(Array.from(res))}
        & ${priceFrom ? 'minPrice='+priceFrom : ''}
        & ${priceTo ? 'maxPrice='+priceTo : ''}
        `);
})
