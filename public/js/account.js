let close = document.querySelector('.close_profile')
let open = document.querySelector('.open_account')
let form = document.querySelector('.account_form')

close.addEventListener('click', () => {
    console.log('coucou')
  })

open.addEventListener('click', () => {
    open.style.transform = 'rotateZ(90deg)'
    form.style.display = 'block'
})