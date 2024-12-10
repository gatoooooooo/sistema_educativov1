<div class="user-profile pull-right">
    <img class="avatar user-thumb" src="{{ asset('backend/assets/images/img/avatar.jpeg') }}" alt="avatar" style="border-radius: 50%; width: 40px; height: 40px; margin-right: 10px;">
    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
        {{ Auth::guard('admin')->user()->name }}
        <i class="fa fa-angle-down"></i>
    </h4>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('admin.logout.submit') }}"
        onclick="event.preventDefault();
                    document.getElementById('admin-logout-form').submit();">Log Out</a>
    </div>

    <form id="admin-logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>