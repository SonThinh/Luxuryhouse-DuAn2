<div class="menu-top d-flex">
    <p><a class="{{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}"
          href="@if((request()->segment(2) == 'dashboard'))javascript:void(0)@else{{route('users.dashboard.showDashboard',[auth()->user()->id])}}@endif">Thành
            viên</a></p>
    <p><a class="{{ (request()->segment(2) == 'host') ? 'active' : '' }}"
          href="@if((request()->segment(2) == 'host'))javascript:void(0) @else{{isset(auth()->user()->host) ? route('users.host.showDashboard',[auth()->user()->host->id]) : route('users.host',[auth()->user()->id])}}@endif">Host</a></p>
</div>
