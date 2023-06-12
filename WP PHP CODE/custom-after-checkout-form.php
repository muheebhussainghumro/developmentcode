<?php /* Template Name: After Checkout Form */ ?>
<?php get_header(); ?>

<div class="col-md-12">

    <div class="custom-challege-form-wrapper">
        <div class="container">
            <div class="custom-challenge-form-inner">

                <form action="/action_page.php">
                    <div class="row cf-field">
                        <div class="col-md-6">
                            <input type="text" name="name" class="field" placeholder="Name">
                        </div>
                        <div class="col-md-6">
                            <input type="Age" name="age" class="field" placeholder="Age">
                        </div>
                        <div class="col-md-6">
                            <select name="gender" class="dropdown-field">
                                <option value="gender">Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="weight" name="weight" class="field" placeholder="Weight">
                        </div>
                        <div class="col-md-6">
                            <select name="goal" class="dropdown-field">
                                <option value="goal">Goal</option>
                                <option value="lose-weight">Lose Weight</option>
                                <option value="tone-and-sculp">Tone & Sculpt</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="fitness_level" class="dropdown-field">
                                <option value="fitness-level">Fitness Level</option>
                                <option value="beginner">Beginner</option>
                                <option value="advanced">Advanced</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="diet_restrictions" class="dropdown-field">
                                <option value="diet-restrictions">Diet Restrictions</option>
                                <option value="vegan">vegan</option>
                                <option value="no-diet-restrictions">No Diet Restrictions</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="workout_music" class="dropdown-field">
                                <option value="workout-music">Favorite kind of Workout Music?</option>
                                <option value="pop">Pop</option>
                                <option value="hip-hop">Hip Hop</option>
                                <option value="dancehall-or-raggae">dancehall / Raggae</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="favorite_cuisine" class="dropdown-field">
                                <option value="workout-music">Favorite kind of Workout Music?</option>
                                <option value="indian">indian</option>
                                <option value="mediterranean">Mediterranean</option>
                                <option value="japanese">Japanese</option>
                                <option value="italian">Italian</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="favorite_workout" class="dropdown-field">
                                <option value="workout-music">Favorite kind of Workout?</option>
                                <option value="hiit">HIIT</option>
                                <option value="yoga">Yoga</option>
                                <option value="pilates">Pilates</option>
                                <option value="cardio">Cardio</option>
                                <option value="strength-training">Strength Training</option>
                            </select>
                        </div>
                        <div class="col-md-12 submit-btn-wrapper">
                            <input type="submit" class="submit-btn" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>