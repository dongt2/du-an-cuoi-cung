<div class="auth auth--home">
    @if (\Illuminate\Support\Facades\Auth::check())
    <div class="auth__show">
        <a href="#" class="btn btn--sign">
            {{ \Illuminate\Support\Facades\Auth::user()->username }}
        </a>
    </div>


    @else
        <a href="{{ route('auth.login') }}">Sign In</a>
    @endif

</div>
<a href="{{ route('booking') }}" class="btn btn-md btn--warning btn--book btn-control--home">Book a
    ticket</a>
