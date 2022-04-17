 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     @php
         $user = Auth::user()->role;
     @endphp
     <!-- Brand Logo -->
     <a href="../../index3.html" class="brand-link">
         <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">TRIVELA GRAFIKA</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-1 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ Auth::user()->username }}</a>
                 <p class="text-white"><b>
                         @if (Auth::user()->role == 0)
                             Leader
                         @elseif (Auth::user()->role == 1)
                             Contentwriter
                         @else
                             Designer
                         @endif
                     </b></p>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 @if ($user == '0')
                     <li class="nav-item">
                         <a href="../../starter.html" class="nav-link">
                             <i class="fas fa-columns nav-icon"></i>
                             <p>Dashboard</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('leader.client') }}" class="nav-link">
                             <i class="fas fa-user-tie nav-icon"></i>
                             <p>Kelola Client</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('leader.Cw') }}" class="nav-link">
                             <i class="fas fa-user-alt nav-icon"></i>
                             <p>Kelola ContentWritter</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('leader.designer') }}" class="nav-link">
                             <i class="fas fa-user-friends nav-icon"></i>
                             <p>Kelola Designer</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('leader.client') }}" class="nav-link">
                             <i class="fas fa-bookmark nav-icon"></i>
                             <p>Data Konten</p>
                         </a>
                     </li>
                 @elseif ($user == '1')
                     <li class="nav-item">
                         <a href="{{ url('/') }}" class="nav-link">
                             <i class="fas fa-columns nav-icon"></i>
                             <p>Dashboard</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('cw.konten') }}" class="nav-link">
                             <i class="fas fa-bookmark nav-icon"></i>
                             <p>Kelola Konten</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('cw.agenda') }}" class="nav-link">
                             <i class="fas fa-calendar nav-icon"></i>
                             <p>Kelola Agenda Post</p>
                         </a>
                     </li>
                 @elseif ($user == '2')
                     <li class="nav-item">
                         <a href="{{ url('/') }}" class="nav-link">
                             <i class="fas fa-columns nav-icon"></i>
                             <p>Dashboard</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('designer.konten') }}" class="nav-link">
                             <i class="fas fa-bookmark nav-icon"></i>
                             <p>Konten</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('cw.agenda') }}" class="nav-link">
                             <i class="fas fa-calendar nav-icon"></i>
                             <p>Agenda Post</p>
                         </a>
                     </li>
                 @endif
                 <li class="nav-item">
                     <a href="" class="btn btn-block btn-primary " onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                         <span>
                             <i class="fas fa-sign-out-alt"></i>
                         </span>
                         Keluar
                     </a>
                 </li>
             </ul>
             </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
