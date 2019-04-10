

<div class="profile_image">
    <img class="avatar" src="public/img/avatar.jpg" alt="">
    <img class="close_profile" src="public/img/x.svg" alt="arrow">
</div>

<div class="profile_name">
    <p>Gaetan Dupont</p>
    <button>Edit</button>
</div>


<div class="account">
    <div class="account_edit">
        <p>My Account</p>
        <img class="open_account" src="public/img/arrow-right.svg" alt="arrow">
    </div>
    
    <div class="account_form">
        <form action="./controller/register.php" method="post">
        
            <label for="username_edit" id="username_edit">Username</label>
            <input class="account_input" type="text" id="username" name="username" placeholder="Username">

            <label for="email_edit">Email</label>
            <input class="account_input" type="email" id="email" name="email" placeholder="E-mail">

            <label for="password_edit">Password</label>
            <input class="account_input" type="password" id="password" name="password" placeholder="Password">

            <input class="account_input" type="password" id="confirm" name="confirm" placeholder="Confirm password">

            <label id="zodiac_edit" for="zodiac">Zodiac sign</label>

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
        </form>
    </div>
</div>
<div class="account_">
    <p>Settings</p>
    <img src="public/img/arrow-right.svg" alt="arrow">
</div>
<div class="account_">
    <p>Share with friends</p>
    <img src="public/img/arrow-right.svg" alt="arrow">
</div>
<div class="account_">
    <p>Logout</p>
    <img src="public/img/arrow-right.svg" alt="arrow">
</div>
<div class="account_">
    <p>Contact Us</p>
    <img src="public/img/arrow-right.svg" alt="arrow">
</div>