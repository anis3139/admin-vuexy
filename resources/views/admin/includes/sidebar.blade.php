<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
  <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i data-feather="more-horizontal"></i>
  </li>
  <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('home') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
  </li>





  <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='book-open'></i></i><span class="menu-title text-truncate" data-i18n="Board">News</span></a>
    <ul class="menu-content">
      <li><a class="d-flex align-items-center" href="{{route('news.index')}}"><i data-feather="book-open"></i><span class="menu-item text-truncate" data-i18n="List">News</span></a>
      </li>
     
      <li><a class="d-flex align-items-center" href="{{route('category.index')}}"><i data-feather="layout"></i><span class="menu-item text-truncate" data-i18n="List">Category</span></a>
      </li>
      <li><a class="d-flex align-items-center" href="{{route('subcategory.index')}}"><i data-feather="trending-down"></i><span class="menu-item text-truncate" data-i18n="List">Sub Category</span></a>
      </li>
      <li><a class="d-flex align-items-center" href="{{route('tag.index')}}"><i data-feather="tag"></i><span class="menu-item text-truncate" data-i18n="List">Tag</span></a>
      </li>
      <li><a class="d-flex align-items-center" href="{{ route('comment.list') }}"><i data-feather="message-square"></i><span class="menu-item text-truncate" data-i18n="List">Comment</span></a>
      </li>
      <li><a class="d-flex align-items-center" href="{{ route('filter.view') }}"><i data-feather="filter"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>
      </li>
    </ul>
  </li>








  <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Board">User</span></a>
    <ul class="menu-content">
      <li><a class="d-flex align-items-center" href="{{ route('user.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>
      </li>
    </ul>
  </li>
  <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='settings'></i><span class="menu-title text-truncate" data-i18n="Board">Settings</span></a>
    <ul class="menu-content">
      <li><a class="d-flex align-items-center" href="{{ route('setting.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>
      </li>
    </ul>
  </li>
  <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='mail'></i><span class="menu-title text-truncate" data-i18n="Board">Contacts</span></a>
    <ul class="menu-content">
      <li><a class="d-flex align-items-center" href="{{ route('contact.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>
      </li>
    </ul>
  </li>


</ul>
