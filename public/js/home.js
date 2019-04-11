const $vignette = document.querySelectorAll('.vignette')
const $button = document.querySelectorAll('.button')
const $infos = document.querySelectorAll('.infos')

for(let i = 0; i<$vignette.length; i++){
  $button[i].addEventListener('click', () => {
    $vignette[i].classList.toggle('vignette-display')
    if(!$vignette[i].classList.contains('vignette-display')){
      $button[i].innerHTML = "+"
      $infos[i].style.display = "none"
    } else {
      $button[i].innerHTML = "-"
      $infos[i].style.display = "flex"
    }
  })
}
