
<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{ asset('images/faces/face1.jpg') }}" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">ADMIN</span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">
                <p>Website</p>
                  </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('system-setting.index') }}">
                <span class="menu-title">System Setting</span>
                <i class="mdi mdi-medical-bag menu-icon"></i>  
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#">
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>               
              </a>
              <div class="collapse-item">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('category') }}">Add Category</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.display') }}">Manage Category</a></li>
                </ul>
              </div>
            </li>


             
</li>

<li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#">
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>               
              </a>
              <div class="collapse-item">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('product.create')}}">Add Product</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('display.product')}}">Manage Product</a></li>
                </ul>
              </div>
            </li>


</nav>