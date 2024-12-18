@include('userLayouts.head')
<header>

    <div class="row">
    
        <div class="logoBox">
            <div itemscope itemtype="http://schema.org/Organization" id="logo"><a itemprop="url" href="{{route('home')}}" title="the asian lottery"><img itemprop="logo" src="../assets1/images/logo1.jpg" alt="The Asian Lottery"></a></div>
        </div>
        
        <div class="navButton" onclick="navToggle();"><span></span></div>
        <div class="navBox">
        
            <div class="toggle">
            
                <div class="row navLinks">
                
                    <nav>
                        <ul>
                            
                            <li><a href="{{route('play')}}" title="Play">Play Online</a></li>
                            <li><a href="{{route('result')}}" title="Results">Results</a></li>
                            <li class="sub"><a href="#" title="Lotto India Information">Information</a><span class="expand" onclick="navToggleAlt();">+</span>
                                <div class="subNav">
                                    <div class="innerNav">
                                        <ul>
                                            <li><a href="{{route('how')}}" title="How to Play Lotto India">How to Play</a></li>
                                            <li><a href="{{route('about')}}" title="Prizes">About Us</a></li>								
                                            <li><a href="{{route('contact')}}" title="Frequently Asked Questions">Contact</a></li>												
                                            <li><a href="{{route('rules')}}" title="Lotto India Rules">Rules</a></li>					
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @if(session()->has('logged'))
                            <li><a href="{{route('history')}}" title="Lotto India Bumper Draws">My History</a></li>
                            @endif
                        </ul>
                    </nav>
                    
                    <div class="tabs">
                        @if(session()->has('logged'))
                            <a href="{{route('userProfile')}}" title="Play Lotto India" class="loginTab"><span>Profile</span></a>
                            <a href="{{route('logout')}}" title="" class="loginTab"><span>Logout</span></a>
                        @else
                            <a href="{{route('login')}}" title="Play Lotto India" class="loginTab"><span>Login</span></a>
                            <a href="{{route('register')}}" title="Register a free account" class="loginTab"><span>Register</span></a>
                        @endif
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</header>
@include('sweetalert::alert')

<div class="container">
    

    <div class="genBox mBottom fx -bt">
        <h1>{{$scheme->title}}</h1><br>
    </div>
    <div class="genBox mBottom fx -bt">
        <p>Please send the money to the below number. And also input the last 4 digit while buying the lottery.</p>  
    </div>
    <div class="genBox mBottom fx -bt">
        <h3><strong>Bkash:{{$info->bkash}}</strong></h3>   
        <h3><strong>Nagad:{{$info->nagad}}</strong></h3>   
    </div>

    <!-- Add the ball container here -->
    <div id="ballContainer" class="ball-container" style="display: flex; flex-wrap: wrap; justify-content: center; margin-bottom: 20px;"></div>

    <!-- Form for number submission -->
    <form id="numberForm" method="POST" action="{{route('buyLottery')}}">
        {{@csrf_field()}}
        <!-- Label and TextField to show selected number -->
        <div style="text-align: center; margin-top: 20px;">
            <label for="selectedNumberField" style="font-size: 18px; font-weight: bold; margin-right: 10px;">Selected Number: </label>
            <input type="text" required id="selectedNumberField" name="picked_number" value="" readonly style="font-weight: bold; padding: 12px 20px; width: 120px; text-align: center; border-radius: 8px; border: 2px solid #ffcc00; background-color: #fff3e0; font-size: 18px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
        </div>

        <!-- Bkash Last 4 Digit Field -->
        <div style="text-align: center; margin-top: 20px;">
            <label for="selectedNumber" style="font-size: 18px; font-weight: bold; margin-right: 10px;">Bkash/Nagad Last 4 Digit: </label>
            <input type="text" required id="selectedNumber" name="bkash"  style="font-weight: bold; padding: 12px 20px; width: 120px; text-align: center; border-radius: 8px; border: 2px solid #ffcc00; background-color: #fff3e0; font-size: 18px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <label for="paymentMethod" style="font-size: 18px; font-weight: bold; margin-right: 10px;">Payment Method: </label>
            <select id="paymentMethod" name="paymentMethod" required style="font-weight: bold; padding: 12px 20px; width: 180px; text-align: center; border-radius: 8px; border: 2px solid #ffcc00; background-color: #fff3e0; font-size: 18px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                <option value="bkash">Bkash</option>
                <option value="nagad">Nagad</option>
            </select>
        </div>
        <input type="hidden" name="scheme_id" value="{{$scheme->scheme_id}}">
        <!-- Submit Button -->
        <div style="text-align: center; margin-top: 20px;">
            <button type="submit" style="padding: 12px 30px; font-size: 18px; background: linear-gradient(145deg, #ffcc00, #ff9933); color: white; border: none; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;">
                Submit
            </button>
        </div>
    </form>

    <div class="genBox mBottom fx -bt">
        <p>Please note: The results of this checker do not act as proof that you have won a The Asian Lottery prize. You must have a valid entry for the draw in question to be able to claim any prizes. </p>
    </div>

    <script src="../assets2/js/multi-checker-gridf425?v=0pMEZt8kWS-V7aLU-kuGysJwD0TRF-iGwF8DsR8JclA1"></script>

    <script>
        // Generate balls with numbers from 1 to 100
        const ballContainer = document.getElementById("ballContainer");

        for (let i = 1; i < 100; i++) {
            const ball = document.createElement("div");
            ball.classList.add("ball");
            ball.textContent = i;

            // Set styles for the balls dynamically
            ball.style.width = "50px";
            ball.style.height = "50px";
            ball.style.margin = "5px";
            ball.style.display = "flex";
            ball.style.alignItems = "center";
            ball.style.justifyContent = "center";
            ball.style.backgroundColor = "#ffcc00";
            ball.style.borderRadius = "50%";
            ball.style.cursor = "pointer";
            ball.style.fontSize = "18px";
            ball.style.fontWeight = "bold";
            ball.style.transition = "background-color 0.3s ease";

            ball.addEventListener("click", () => selectNumber(i, ball));

            ballContainer.appendChild(ball);
        }

        // Function to handle ball selection
        function selectNumber(number, ball) {
            // Clear previous selection
            const selectedBall = document.querySelector(".ball.selected");
            if (selectedBall) {
                selectedBall.classList.remove("selected");
            }

            // Mark this ball as selected
            ball.classList.add("selected");

            // Update the selected number in the text field for selected number
            const selectedNumberField = document.getElementById("selectedNumberField");
            selectedNumberField.value = number;

            // The Bkash field should NOT be updated by this selection
        }

        // Handle form submission with confirmation
        document.getElementById("numberForm").addEventListener("submit", function(event) {
            const selectedNumber = document.getElementById("selectedNumberField").value;
            if (!selectedNumber) {
                alert("Please select a number before submitting!");
                event.preventDefault();  // Prevent form submission if no number is selected
                return;
            }

            // Show confirmation dialog before submitting the form
            const confirmSubmit = confirm("Are you sure you want to submit your selected number?");
            if (!confirmSubmit) {
                event.preventDefault(); // Prevent form submission if user cancels
            }
        });
    </script>
</div>

@include('userLayouts.footer')
