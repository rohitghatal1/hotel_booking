
    <!-- login/signup form  -->
    <div class="login-register-form" id="loginRegisterForm">
        <div class="form-content">
            <button class="close-button" id="closeLoginForm" onclick="closeLoginRegisterForm()">&times;</button>
            <form id="loginForm" action="../php/userLogin.php" method="post">
                <span class="form-heading"><i class="fas fa-user"></i>
                    <h3 class="heading-font">User Login</h3>
                </span>
                <label for="uername">Username:</label>
                <input type="text" name="username" id="lusername" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="lpassword" required>

                <span class="toggle-password-visibility" id="show-password" onclick="togglePasswordVisibility()"><input type="checkbox" class="text-font">Show Password </span><br><br>
                <button type="submit" class="button-inside-form">Login</button>
                <div class="switch-login-signup">
                    <p id="goToRegisterForm" class="text-font" onclick="openRegistrationForm()">New User? <span> Register Here!</span></p>
                </div>
            </form>

            <form id="registerForm" style="display: none;">
                <span class="form-heading"><i class="fas fa-user"></i>
                    <h3>Create Account</h3>
                </span>

                <label for="firstname">First Name:</label>
                <input type="text" name="fname" id="fname" required>
                <span id="fnameError" class="error-message"></span>

                <label for="lastname">Last Name:</label>
                <input type="text" name="lname" id="lname" required>
                <span id="lnameError" class="error-message"></span>

                <label for="gender">Gender</label>
                <select name="gender" id="gender" required>
                    <option value="" selected disabled hidden>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>

                <label for="address">Address:</label>
                <textarea name="address" id="address" required></textarea>

                <label for="contact">Contact Number</label>
                <input type="tel" name="contact" id="contact" required>
                <span id="contactError" class="error-message"></span>

                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" required>

                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <span id="passwordError" class="error-message"></span>

                <button type="submit" class="button-inside-form">Register</button>

                <div class="switch-login-signup">
                    <p id="goToLoginForm" class="text-font" onclick="openLoginForm()">
                        Already have an account? <span> Log in here.</span>
                    </p>
                </div>
            </form>
        </div>
    </div>
