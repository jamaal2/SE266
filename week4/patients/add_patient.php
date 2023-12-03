            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // get form data and call the addPatient method from model
                    // redirect back to 'view_patients.php' after adding the patient
                }
            ?>

            <!-- patient details -->
            <form method="POST" action="">
                <!-- input fields for patient details -->
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required><br>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required><br>

                <label for="married">Marital Status:</label>
                <select id="married" name="married" required>   
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                </select><br>

                <label for="birthDate">Birth Date:</label>
                <input type="date" id="birthDate" name="birthDate" required><br>

                <button type="submit">Add Patient</button>
                <!-- link to cancel and return to view_patients.php -->
                <a href="view_patients.php">Cancel</a>
            </form>
                                                    