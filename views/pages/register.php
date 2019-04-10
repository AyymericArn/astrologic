<div class="title_astro">
    <img src="public/img/astrologic.png" alt="Astrologic logo"/>
    <h1>Astrologic</h1>
</div>

<form action="./controller/select.php" method="post">
    <div class="choose_title">
        <p>Choose your zodiac sign*</p>
    </div>
    
    <div class="choose_zodiac_button">
        <div class="choice">
            <input checked type="radio" id="Aries" value="aries" name="selector">
            <label for="Aries">Aries</label>
        </div>
        <div class="choice">
            <input type="radio" id="Taurus" value="taurus" name="selector">
            <label for="Taurus">Taurus</label>
        </div>
        <div class="choice">
            <input type="radio" id="Gemini" value="gemini" name="selector">
            <label for="Gemini">Gemini</label>
        </div>
        <div class="choice">
            <input type="radio" id="Cancer" value="cancer" name="selector">
            <label for="Cancer">Cancer</label>
        </div>
    </div>
    <div class="choose_zodiac_button">
        <div class="choice">
            <input type="radio" id="Leo" value="leo" name="selector">
            <label for="Leo">Leo</label>
        </div>
        <div class="choice">
            <input type="radio" id="Libra" value="libra" name="selector">
            <label for="Libra">Libra</label>
        </div>
        <div class="choice">
            <input type="radio" id="Pisces" value="pisces" name="selector">
            <label for="Pisces">Pisces</label>
        </div>
        <div class="choice">
            <input type="radio" id="Aquarius" value="aquarius" name="selector">
            <label for="Aquarius">Aquarius</label>
        </div>
    </div>
    <div class="choose_zodiac_button">
        <div class="choice">
            <input type="radio" id="Scorpio" value="scorpio" name="selector">
            <label for="Scorpio">Scorpio</label>
        </div>
        <div class="choice">
            <input type="radio" id="Capricorn" value="capricorn" name="selector">
            <label for="Capricorn">Capricorn</label>
        </div>
        <div class="choice">
            <input type="radio" id="Sagittarius" value="sagittarius" name="selector">
            <label for="Sagittarius">Sagittarius</label>
        </div>
        <div class="choice">
            <input type="radio" id="Virgo" value="virgo" name="selector">
            <label for="Virgo">Virgo</label>
        </div>
    </div>
    
    <div class="news_subscribe">
        <label for="newsletter_sub" id="newsletter">Want to receive your daily horoscope ?</label>
        <input name="mail" type="email" id="newsletter_sub" placeholder="email@mail.com">
    </div>

    <div class="next">
        <img src="public/img/arrow-right.svg" alt="arrow next">
        <input type="submit" value="">
    </div>
    
</form>

