<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Task Manager | Stay Organized</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Helvetica Neue', sans-serif;
      background-color: #f9f9f9;
      color: #1a1a1a;
      line-height: 1.6;
    }

    header {
      background: linear-gradient(120deg, #4f46e5, #3b82f6);
      color: white;
      padding: 80px 20px;
      text-align: center;
    }

    header h1 {
      font-size: 3rem;
      margin-bottom: 20px;
    }

    header p {
      font-size: 1.25rem;
      max-width: 600px;
      margin: 0 auto 30px;
    }

    .cta-button {
      background-color: white;
      color: #3b82f6;
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
    }

    .cta-button:hover {
      background-color: #e0e7ff;
    }

    section {
      padding: 60px 20px;
      max-width: 1000px;
      margin: 0 auto;
    }

    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 40px;
      margin-top: 40px;
    }

    .feature {
      background: white;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      padding: 30px;
      transition: transform 0.3s ease;
    }

    .feature:hover {
      transform: translateY(-5px);
    }

    .feature h3 {
      margin-bottom: 10px;
      color: #4f46e5;
    }

    footer {
      text-align: center;
      padding: 40px 20px;
      background: #f1f1f1;
      color: #666;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

  <header>
    <h1>Welcome to Task Manager</h1>
    <p>Organize your day, manage your time, and stay on track with our sleek, real-time task tracking app.</p>
    <a href="{{ route('tasks.home') }}"><button class="cta-button">Get Started</button></a>
  </header>

  <section id="features">
    <h2 style="text-align: center;">Why You'll Love It</h2>
    <div class="features">
      <div class="feature">
        <h3>Live Timers</h3>
        <p>Each task runs its own timer, helping you stay aware of how long things are taking in real time.</p>
      </div>
      <div class="feature">
        <h3>Auto-Typing Input</h3>
        <p>Not sure what to do? Get inspired by our animated placeholder suggestions.</p>
      </div>
      <div class="feature">
        <h3>Dark Mode Toggle</h3>
        <p>Switch between light and dark themes effortlessly to match your workflow or mood.</p>
      </div>
    </div>
  </section>

  <!-- Add this just before the <footer> tag -->
<section style="padding: 60px 20px; text-align: center; background-color: #ffffff;">
    <h2 style="font-size: 2rem; color: #1a1a1a; margin-bottom: 20px;">See Theme Switching in Action</h2>
    <p style="font-size: 1.1rem; color: #555; max-width: 700px; margin: 0 auto 30px;">
      Experience a smooth transition between light and dark modes, crafted for comfort and focus — day or night.
    </p>
    <img 
      src="https://res.cloudinary.com/diexihgfp/image/upload/v1744606231/static/qudvlkknvqj7cxby95dm.png" 
      alt="Theme Mode Preview - Light and Dark" 
      style="width: 100%; max-width: 900px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-top: 30px;"
    />
  </section>

  <section style="padding: 60px 20px; background-color: #f9fafb; text-align: center;">
    <h2 style="font-size: 2rem; color: #1a1a1a; margin-bottom: 20px;">Task Manager in Motion</h2>
    <p style="font-size: 1.1rem; color: #555; max-width: 700px; margin: 0 auto 30px;">
      Watch how easily you can manage your day — from adding tasks and tracking time to toggling dark mode.
    </p>
  
    <div style="max-width: 960px; margin: 0 auto; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
      <video 
        src="https://res.cloudinary.com/diexihgfp/video/upload/v1744611986/static/hpvcbtg9jl7g6yenwtm8.mp4" 
        autoplay 
        muted 
        loop 
        playsinline 
        style="width: 100%; height: auto; display: block;">
      </video>
    </div>
  </section>
  
  <section style="padding: 60px 20px; background-color: #ffffff; text-align: center;">
    <h2 style="font-size: 2rem; color: #1a1a1a; margin-bottom: 20px;">How It Works</h2>
    <p style="font-size: 1.1rem; color: #555; max-width: 700px; margin: 0 auto 40px;">
      Get started in seconds. Here’s how Task Manager keeps you productive every step of the way.
    </p>
  
    <div style="
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      max-width: 1000px;
      margin: 0 auto;
      text-align: left;
    ">
      <div style="background-color: #f3f4f6; border-radius: 12px; padding: 30px;">
        <h3 style="color: #4f46e5; margin-bottom: 10px;">1. Add Your Tasks</h3>
        <p>Quickly jot down what you need to get done — our animated input makes it feel effortless.</p>
      </div>
      <div style="background-color: #f3f4f6; border-radius: 12px; padding: 30px;">
        <h3 style="color: #4f46e5; margin-bottom: 10px;">2. Track Your Time</h3>
        <p>Each task has a live timer, helping you stay aware of how long you're spending and stay focused.</p>
      </div>
      <div style="background-color: #f3f4f6; border-radius: 12px; padding: 30px;">
        <h3 style="color: #4f46e5; margin-bottom: 10px;">3. Switch Your Mode</h3>
        <p>Choose between light and dark mode to match your mood, lighting, or productivity style.</p>
      </div>
    </div>
  </section>
  

  <footer>
    &copy; 2025 Task Manager. All rights reserved. <br>
    Developed By: <a href="https://www.linkedin.com/in/abdulazim-awad-kh" target="_blank" style="color: #4f46e5; text-decoration: underline;"><strong style="">Abdulazim Awad Khalifa</strong></a>
  </footer>


  <script>
    function scrollToFeatures() {
      document.getElementById('features').scrollIntoView({ behavior: 'smooth' });
    }
  </script>
</body>
</html>
