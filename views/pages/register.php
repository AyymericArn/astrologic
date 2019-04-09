<img src="public/img/astrologic.png"  alt="Astrologic logo"/>
<div class="astrologic">Astrologic</div>
<div id="createAccount">Create your account</div>

<form action="./controller/register.php" method="post">
    
    <input type="text" id="username" name="username" placeholder="Username">

    <input type="email" id="email" name="email" placeholder="E-mail">

    
    <input type="password" id="password" name="password" placeholder="Password">

    <input type="password" id="confirm" name="confirm" placeholder="Confirm password">

    <label for="zodiac">Your Zodiac sign</label>

    <select name="zodiac" id="zodiac">
        <option value="aries">Aries</option>
        <option value="taurus">Taurus</option>
        <option value="gemini">Gemini</option>
        <option value="cancer">Cancer</option>
        <option value="leo">Leo</option>
        <option value="virgo">Virgo</option>
        <option value="libra">Libra</option>
        <option value="scorpio">Scorpio</option>
        <option value="sagittarius">Sagittarius</option>
        <option value="capricorn">Capricorn</option>
        <option value="aquarius">Aquarius</option>
        <option value="pisces">Pisces</option>
    </select>
    
    <label for="newsletter_sub">I want to receive daily emails from Astrologic<input id="newsletter_sub" type="checkbox" name="newsletter_sub" value="1"></label>
    

    <input type="submit" id="newAccount" value="Create account">

</form>