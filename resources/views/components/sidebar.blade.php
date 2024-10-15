<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if (Auth::user()->type != 'student')
      <li class="nav-item">
        <a class="nav-link " href="{{ route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link " href="{{ route('users.index') }}">
            <i class="bi bi-people-fill"></i>
         Students

        </a>
      </li>
      <!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ route('courses.index') }}">
            <i class="bi bi-stack"></i>
         courses

        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ route('rounds.index') }}">
            <i class="bi bi-table"></i>
         rounds

        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{ route('courserounds.index') }}">
            <i class="bi bi-puzzle-fill"></i>
        Course rounds

        </a>
      </li><!-- End Dashboard Nav -->
      @endif
      @if (Auth::user()->type=='admin')
      <li class="nav-item">
        <a class="nav-link " href="{{ route('instructors.index') }}">
            <i class="bi bi-person-lines-fill"></i>
        Instructors

        </a>
      </li><!-- End Dashboard Nav -->
      @endif
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ route('projects.index') }}">
            <i class="bi bi-layout-text-window-reverse"></i>
        Projects

        </a>
      </li>
      <!-- End Dashboard Nav -->
      @if(Auth::user()->type=='admin')
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admins.index') }}">
            <i class="bi bi-shield-lock-fill"></i>
        Admins

        </a>
      </li><!-- End Dashboard Nav -->
      @endif
      @if (Auth::user()->type == 'student')
      <li class="nav-item">
        <a class="nav-link " href="{{ route('replies.index') }}">
            <i class="bi bi-patch-plus-fill"></i>
        Replies
        </a>
      </li><!-- End Dashboard Nav -->
     @endif




      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('users.profile') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <!-- End Register Page Nav -->





    </ul>

  </aside><!-- End Sidebar-->
