<div class="menu-top d-flex">
    <p><a class="{{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}"
          href="@if((request()->segment(2) == 'dashboard'))javascript:void(0)@else{{route('users.dashboard.showDashboard',[auth()->user()->id])}}@endif">Thành
            viên</a></p>
    @if(auth()->user()->host)
        @if(auth()->user()->host->status)
            <p>
                <a class="{{ (request()->segment(2) == 'host') ? 'active' : ''}}"
                   href="@if((request()->segment(2) == 'host'))javascript:void(0) @else{{route('users.host.showDashboard',[auth()->user()->host->id])}}@endif">Host</a>
            </p>
        @else
            <p>
                <a href="javascript:void(0)" id="btn-host">Host</a>
            </p>
        @endif
    @else
        <p>
            <a class="{{(request()->segment(2) == 'register-host') ? 'active' : '' }}"
               href="@if((request()->segment(2) == 'register-host'))javascript:void(0) @else {{route('users.host',[auth()->user()->id])}} @endif">Host</a>
        </p>
    @endif
</div>
