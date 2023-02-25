<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/">Backpack</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/">Back</a>
    </div>
    <ul class="sidebar-menu"> 
      <li class="menu-header">Forum</li>
        <li>
            <a class="nav-link" href="{{route('admin.home')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
        </li>      
        <li>
            <a class="nav-link" href="{{route('user')}}"><i class="fas fa-user"></i> <span>User</span></a>
        </li>           
        <li class="nav-item">
            <a href="{{route('v1.qa.qa.index_quest')}}" class="nav-link"><i class="fa fa-comment"></i> <span>Data Quest</span></a>
        </li>
        <li class="nav-item">
          <a href="{{route('v1.ga.ga.index_ga')}}" class="nav-link"><i class="fa fa-comment"></i> <span>Data Galeri</span></a>
        </li>
        
      </ul>
</aside>