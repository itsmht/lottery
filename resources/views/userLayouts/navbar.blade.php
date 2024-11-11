<header>

    <div class="row">
    
        <div class="logoBox">
            <div itemscope itemtype="http://schema.org/Organization" id="logo"><a itemprop="url" href="{{route('home')}}" title="the asian lottery"><img itemprop="logo" src="assets1/images/logo1.jpg" alt="The Asian Lottery"></a></div>
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