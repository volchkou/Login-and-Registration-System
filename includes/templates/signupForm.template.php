<noscript>
    <h1 class="content__header">Please, enable JavaScript</h1>
</noscript>

<div class='forms'>
    <div class='forms__item hidden'>
        <form id='signupForm'>
            <div class='forms__header'>Sign Up</div>

            <label>
                <input type='text' name='username' placeholder='Username' required>
            </label>
            <span class="mistake-message signup-username-mistake"></span>

            <label>
                <input type='password' name='password' placeholder='Password' required>
            </label>
            <span class="mistake-message signup-password-mistake"></span>

            <label>
                <input type='password' name='passwordRepeat' placeholder='Repeat password' required>
            </label>
            <span class="mistake-message signup-passwordRepeat-mistake"></span>

            <label>
                <input type='email' name='email' placeholder='Email' required>
            </label>
            <span class="mistake-message signup-email-mistake"></span>

            <label>
                <input type='text' name='name' placeholder='Name' required>
            </label>
            <span class="mistake-message signup-name-mistake"></span>

            <label>
                <input type="hidden" name="request" value="xmlhttprequest">
            </label>

            <button type='submit' name='submit'>Sign Up</button>
        </form>
    </div>
</div>