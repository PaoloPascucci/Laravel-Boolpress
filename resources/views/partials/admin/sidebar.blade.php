<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('admin.index')}}">
            <span data-feather="home"></span>
            <i class="fas fa-tachometer-alt"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.products.index')}}">
            <span data-feather="shopping-cart"></span>
            <i class="fas fa-shopping-cart"></i>
            Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.posts.index')}}">
            <span data-feather="thumbtack"></span>
            <i class="fas fa-thumbtack"></i>
            Post
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.categories.index')}}">
              <span data-feather="shopping-cart"></span>
              <i class="fas fa-bookmark"></i>
                Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.tags.index')}}">
              <span data-feather="shopping-cart"></span>
              <i class="fas fa-tags"></i>
                Tags
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.contacts.index')}}">
              <span data-feather="shopping-cart"></span>
              <i class="fas fa-envelope"></i>
                Messages
            </a>
          </li>
      </ul> 
    </div>
  </nav>