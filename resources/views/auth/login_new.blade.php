@include('userLayouts.head')
@include('userLayouts.navbar')

<div class="container">
    <div id="mainPromo" class="altBg">
        <div class="inner centred">
            <h1>Register to play in our amazing FREE draw!</h1>
            <p style="max-width: 800px; margin: auto;">Register now for the Lotto India. Submit your details right here to sign up in a matter of seconds. You’ll then be able to enter our twice-weekly draws, get your tickets checked and maybe win up to ₹1 Lakh! It’s completely free to register and play.</p>

            <div class="formBox">
                <h2>Enter your login credentials below:</h2>

                @if (\Session::has('message'))
                    <div class="alert alert-danger">
                        {{\Session::get('message')}}
                    </div>
                @endif
                
                <form action="{{route('login.submit')}}" name="form" method="post" onSubmit="return checkDetails();">
                    {{@csrf_field()}}
                    <div class="fx-sm">
                        <div>
                            <input id="phone" name="phone" placeholder="Enter Your Phone" class="textBox" tabindex="3" type="email" maxlength="255">
                            @error('phone')
                                <span class="text-danger" style="color: #dc3545;font-size: 0.9rem; margin-top: 5px; display: block;">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div>
                            <input id="Password" name="password" placeholder="Enter Your Password" class="textBox" tabindex="6" type="password" maxlength="255">
                            @error('password')
                                <span class="text-danger" style="color: #dc3545;font-size: 0.9rem; margin-top: 5px; display: block;">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <input id="submit_form" class="button" type="submit" tabindex="10" value="Login">

                    <p class="smallTxt centred" style="padding-top: 10px;"><span class="redTxt">*</span> All form fields are required</p><br>

                    <p>New to this site? <a href="{{route('register')}}">Click here to Join</a></p>
                </form>
            </div>

            <div class="inner centred">
                <div class="regPromo weekly">
                    <div class="floatLeft">
                        <div class="jackpot"><strong>1 Lakh</strong> Jackpot!</div>
                    </div>
                </div>
                <p class="promoTxt">What are you waiting for? <strong>Join and play for FREE today!</strong></p>
            </div>
        </div>
    </div>
</div>

@include('userLayouts.footer')
