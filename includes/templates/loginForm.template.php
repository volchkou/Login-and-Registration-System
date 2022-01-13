<noscript>
    <h1 class="content__header">Please, enable JavaScript</h1>
</noscript>

<div class='forms'>
    <div class='forms__item hidden'>
        <form id='loginForm'>
            <div class='forms__header'>Log In</div>

            <label>
                <input type='text' name='username' placeholder='Username' required>
            </label>
            <span class="mistake-message login-username-mistake"></span>

            <label>
                <input type='password' name='password' placeholder='Password' required>
            </label>
            <span class="mistake-message login-password-mistake"></span>

            <label>
                <input type="hidden" name="request" value="xmlhttprequest">
            </label>

            <button type='submit' name='submit'>Log In</button>
        </form>
    </div>
</div>