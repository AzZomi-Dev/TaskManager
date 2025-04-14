<x-layout>
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

  <section class="auth-container">
    <form action="{{ route('register') }}" method="POST" class="auth-form">
      @csrf

      <h2 class="form-title">Create Your Account</h2>

      <div class="form-group">
        <label for="name">Name</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          value="{{ old('name') }}" 
          required 
        >
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          value="{{ old('email') }}" 
          required 
        >
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          required 
        >
      </div>

      <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input 
          type="password" 
          id="password_confirmation" 
          name="password_confirmation" 
          required 
        >
      </div>

      <button type="submit" class="btn-primary">Register</button>

      @if ($errors->any())
        <ul class="error-list">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif

    </form>
  </section>
</x-layout>
