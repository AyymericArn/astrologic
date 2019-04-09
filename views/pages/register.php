<div>register</div>

<form action="./controller/register.php" method="post">
    <label for="username">username</label>
    <input type="text" id="username" name="username">

    <label for="email">email</label>
    <input type="email" id="email" name="email">

    <label for="password">password</label>
    <input type="password" id="password" name="password">

    <label for="confirm">confirm password</label>
    <input type="password" id="confirm" name="confirm">

    <label for="zodiac">Your Zodiac sign</label>

    <select name="zodiac" id="zodiac">
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="hamster">Hamster</option>
        <option value="parrot">Parrot</option>
        <option value="spider">Spider</option>
        <option value="goldfish">Goldfish</option>
    </select>

    <label for="newsletter_sub">I want to receive daily emails from Astrologic</label>
    <input id="newsletter_sub" type="checkbox" name="newsletter_sub" value="1">

    <input type="submit" value="validate">

</form>