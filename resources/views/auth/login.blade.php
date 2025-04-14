<x-layout>
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
  <section class="auth-container">
    <form action="{{ route('login') }}" method="POST" class="auth-form">
      @csrf

      <h2 class="form-title">Log In to Your Account</h2>

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

      <button type="submit" class="btn-primary">Log In</button>

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
