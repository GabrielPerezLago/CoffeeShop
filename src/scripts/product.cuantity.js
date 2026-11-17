const products = document.querySelectorAll(`.product-container`)

products.forEach( card => {
    const plus = card.querySelector(`.plus_btn`)
    const less = card.querySelector(`.less_btn`)
    const input = card.querySelector(`.cuantity`)

    plus.addEventListener('click', () =>{
        if (parseInt(input.value) >= 0)
            input.value = parseInt(input.value) + 1
    })

    less.addEventListener('click', () =>{
        if (parseInt(input.value) > 0)
            input.value = parseInt(input.value) - 1
    })
})

const btnAdd = document.querySelector(`btn-add`)


