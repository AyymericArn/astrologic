const $vignette = document.querySelectorAll('.vignette')
const $button = document.querySelectorAll('.button')
const $infos = document.querySelectorAll('.infos')

// calendar
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

const $horoscope = document.querySelector('.horoscope')
const $button_horoscope = document.querySelector('.button_horoscope')
const $more_horoscope = document.querySelector('.horoscope_more')
const $cocktail_recipe = document.querySelector('.your_cocktail')
const $meal_recipe = document.querySelector('.your_recipe')
const $movie = document.querySelector('.your_movie')
// horoscope
$button_horoscope.addEventListener('click', () => {
  $horoscope.classList.toggle('horoscope-display')
  if(!$horoscope.classList.contains('horoscope-display')){
    $button_horoscope.innerHTML = "+"
    $more_horoscope.style.display = "none"
    $cocktail_recipe.style.display = "none"
    $meal_recipe.style.display = "none"
    $movie.style.display = "none"
  } else {
    $button_horoscope.innerHTML = "-"
    $more_horoscope.style.display = "block"
    $cocktail_recipe.style.display = "flex"
    $meal_recipe.style.display = "flex"
    $movie.style.display = "flex"
  }
})


const $see_recipe = document.querySelector('.see_recipe')
const $hidden_recipe = document.querySelector('.hidden_recipe')

// recipe cocktail
$see_recipe.addEventListener('click', () => {
  $see_recipe.classList.toggle('recipe-display')
  if(!$see_recipe.classList.contains('recipe-display')){
    $see_recipe.innerHTML = "+"
    $hidden_recipe.style.display = "none"
  } else {
    $see_recipe.innerHTML = "-"
    $hidden_recipe.style.display = "block"
  }
})