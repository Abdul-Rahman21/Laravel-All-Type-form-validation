<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Validation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

</head>

<body>
    <div class="container">
        <div style="color: green !important;text-align:center;font-size:25px">
            {{ Session::get('message') }}
        </div>
        <nav style="padding: 10px">
            <a href="{{ url('/') }}">Validation One</a> |
            <a href="{{ route('home_two') }}">Validation Two</a> |
            <a href="{{ route('home_three') }}" style="color: green">Validation Three</a>
        </nav>
        <div class="text">
            Form Validation 3rd Method
        </div>
        
        {{-- display all error messages --}}

        {{-- @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif --}}

        <form action="{{ route('register_three') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="first_name" class="@error('first_name') is-invalid @enderror"  value="{{ old('first_name') }}">
                    <div class="underline"></div>
                    <label for="">First Name</label>
                    @error('first_name')
                        <br><div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-data">
                    <input type="text" name="last_name"  value="{{ old('last_name') }}">
                    <div class="underline"></div>
                    <label for="">Last Name</label>
                    @error('last_name')
                        <br><div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="email"  value="{{ old('email') }}">
                    <div class="underline"></div>
                    <label for="">Email Address</label>
                    @error('email')
                        <br><div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-data">
                    <input type="text" name="phone"  value="{{ old('phone') }}">
                    <div class="underline"></div>
                    <label for="">Phone Number</label>
                    @error('phone')
                        <br><div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="password" name="password"  value="{{ old('password') }}">
                    <div class="underline"></div>
                    <label for="">Password</label>
                    @error('password')
                        <br><div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-data">
                    <input type="password" name="password_confirmation"  value="{{ old('password_confirmation') }}">
                    <div class="underline"></div>
                    <label for="">Password Confirmation</label>
                    @error('password_confirmation')
                        <br><div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="input-data textarea">
                    <textarea rows="8" cols="80" name="messages">{{ old('messages') }}</textarea>
                    <br />
                    <div class="underline"></div>
                    <label for="">Write about yourself</label>
                    @error('messages')
                        <br><div style="color: red">{{ $message }}</div>
                    @enderror
                    <br />
                    <div class="form-row submit-btn">
                        <div class="input-data">
                            <div class="inner"></div>
                            <input type="submit" value="submit">
                        </div>
                    </div>
        </form>
    </div>
    <!-- partial -->

</body>

</html>
