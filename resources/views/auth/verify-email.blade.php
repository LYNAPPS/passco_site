<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="pt-3 mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div class="mt-3">
                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <form class="pt-3" method="POST" action="{{ route('logout') }}">
            @csrf

            <div class="mt-3">
                <button class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn">
                    {{ __('Log Out') }}
                </button>
            </div>

        </form>
    </div>
</x-guest-layout>
