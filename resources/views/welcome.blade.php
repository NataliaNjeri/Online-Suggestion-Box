<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Suggestion Box | University Portal</title>
  <meta name="description" content="Send anonymous suggestions to the right university department and follow their progress.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Public+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  
  @vite('resources/css/main.css')
</head>
<body>
 
  <header class="site-header">
    <div class="wrap header-inner">
      <a class="brand" href="#top" aria-label="Suggestion Box home">
        <svg class="brand-mark" viewBox="0 0 32 32" aria-hidden="true">
          <rect x="2" y="9" width="28" height="19" rx="3" fill="currentColor"/>
          <rect x="9" y="12" width="14" height="3" rx="1.5" fill="#fff"/>
          <path d="M16 2v8M12.5 6.5 16 10l3.5-3.5" stroke="#F2A93B" stroke-width="2.4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span>Suggestion Box</span>
      </a>
      <nav class="main-nav" aria-label="Main">
        <a href="#how">How it works</a>
        <a href="#who">Who uses it</a>
        <a class="nav-cta" href="#access">Log in</a>
      </nav>
    </div>
  </header>
 
  <main id="top">
 
    <!-- HERO -->
    <section class="hero">
      <div class="wrap hero-grid">
 
        <div class="hero-copy">
          <h1>Tell the right department what needs to change.</h1>
          <p class="lead">
            Choose a department, write your suggestion, and send it. Staff read it
            without ever seeing your name, and you can follow it from pending to resolved.
          </p>
          <ul class="assurances">
            <li>Suggestions are anonymous to staff</li>
            <li>Sent straight to the department you pick</li>
            <li>Status updates on every suggestion you submit</li>
          </ul>
        </div>
 
        <!-- AUTH CARD (CSS-only tabs) -->
        <div class="auth" id="access">
          <input type="radio" name="mode" id="mode-login" checked>
          <input type="radio" name="mode" id="mode-register">
 
          <div class="auth-tabs" role="tablist">
            <label for="mode-login">Log in</label>
            <label for="mode-register">Create account</label>
          </div>
 
          <!-- LOG IN -->
          <form class="panel panel-login" method="POST" action="/login">
            
            <h2>Welcome back</h2>
            <p class="panel-note">Students, staff and admins all log in here.</p>
 
            <label class="field">
              <span>University email</span>
              <input type="email" name="email" placeholder="name@university.ac.ke" autocomplete="email" required>
            </label>
 
            <label class="field">
              <span>Password</span>
              <input type="password" name="password" autocomplete="current-password" required>
            </label>
 
            <div class="row">
              <label class="check"><input type="checkbox" name="remember"> Keep me logged in</label>
              <a href="/forgot-password">Forgot password?</a>
            </div>
 
            <button type="submit" class="btn">Log in</button>
          </form>
 
          <!-- REGISTER -->
          <form class="panel panel-register" method="POST" action="/register">
            <!-- Laravel: @csrf -->
            <h2>Create your account</h2>
            <p class="panel-note">Choose your role first. The form adjusts to match.</p>
 
            <fieldset class="roles-pick">
              <legend>I am a</legend>
              <label class="role-opt">
                <input type="radio" name="role" id="role-student" value="student" checked>
                <span>Student</span>
              </label>
              <label class="role-opt">
                <input type="radio" name="role" id="role-staff" value="staff">
                <span>Staff</span>
              </label>
              <label class="role-opt">
                <input type="radio" name="role" id="role-admin" value="admin">
                <span>Admin</span>
              </label>
            </fieldset>
 
            <label class="field">
              <span>Full name</span>
              <input type="text" name="name" autocomplete="name" required>
            </label>
 
            <label class="field">
              <span>University email</span>
              <input type="email" name="email" placeholder="name@university.ac.ke" autocomplete="email" required>
            </label>
 
            <!-- Staff only -->
            <div class="role-field f-staff">
              <label class="field">
                <span>Staff number</span>
                <input type="text" name="staff_number">
              </label>
              <label class="field">
                <span>Your department</span>
                <select name="department_id">
                  <option value="">Select a department</option>
                  
                  <option value="1">Academic Registry</option>
                  <option value="2">Finance</option>
                  <option value="3">Library</option>
                  <option value="4">ICT Services</option>
                  <option value="5">Student Welfare</option>
                </select>
              </label>
            </div>
 
            <!-- Admin only -->
            <label class="field role-field f-admin">
              <span>Admin staff number</span>
              <input type="text" name="admin_number">
            </label>
 
            <div class="two-col">
              <label class="field">
                <span>Password</span>
                <input type="password" name="password" autocomplete="new-password" minlength="8" required>
              </label>
              <label class="field">
                <span>Confirm password</span>
                <input type="password" name="password_confirmation" autocomplete="new-password" minlength="8" required>
              </label>
            </div>
 
            <p class="verify-note">Staff and admin accounts are checked by the university before they are activated.</p>
 
            <button type="submit" class="btn">Create account</button>
          </form>
 
          <p class="privacy-note">Your name is used to log in only. It is never shown with your suggestions.</p>
        </div>
 
      </div>
    </section>
 
    <!-- STATUS TRACK -->
    <section class="section how" id="how">
      <div class="wrap">
        <h2 class="section-title">Follow every suggestion from sent to settled</h2>
        <p class="section-lead">Each suggestion carries a status, so you always know where it stands.</p>
 
        <ol class="track">
          <li class="stage s-pending">
            <span class="dot"></span>
            <h3>Pending</h3>
            <p>You submitted it. The department has not opened it yet.</p>
          </li>
          <li class="stage s-review">
            <span class="dot"></span>
            <h3>Under review</h3>
            <p>A staff member in the department has opened and is looking into it.</p>
          </li>
          <li class="stage s-end">
            <span class="dot"></span>
            <h3>Resolved or rejected</h3>
            <p>The department either found a solution, or could not act on it.</p>
          </li>
        </ol>
      </div>
    </section>
 
    <!-- ROLES -->
    <section class="section who" id="who">
      <div class="wrap">
        <h2 class="section-title">What you can see depends on your role</h2>
 
        <div class="roles">
          <article class="role">
            <h3>Students</h3>
            <p>Pick a department, write your suggestion and submit it. You can view the suggestions you have sent and their current status.</p>
          </article>
          <article class="role">
            <h3>Staff</h3>
            <p>Teaching and non-teaching staff see the suggestions sent to their own department, and update each one as they work on it.</p>
          </article>
          <article class="role">
            <h3>Admins</h3>
            <p>See suggestions across every department in any status, and step in to fix problems when something goes wrong.</p>
          </article>
        </div>
      </div>
    </section>
 
  </main>
 
  <footer class="site-footer">
    <div class="wrap footer-inner">
      <p>&copy; <span id="year">2026</span> University Student Suggestion Box</p>
      <p>Replaces the physical suggestion boxes around campus.</p>
    </div>
  </footer>
 
  <script>document.getElementById('year').textContent = new Date().getFullYear();</script>
</body>
</html