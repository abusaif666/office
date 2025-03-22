@include('inc.style')
<div class="login_wrapper">
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                @error('email') <small style="color:red;font-size:12px;" class="form_input_error"> {{ $message }} </small> @enderror
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" value="{{ old('password') }}" placeholder="Enter your password">
                @error('password') <small style="color:red;font-size:12px;" class="form_input_error"> {{ $message }} </small> @enderror
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</div>
@include('inc.script')
