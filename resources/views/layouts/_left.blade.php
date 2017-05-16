<aside class="app-sidebar" id="sidebar">
    <div class="sidebar-header">
        <a class="sidebar-brand" href="#"><span class="highlight">Admin</span> JY</a>
        <button type="button" class="sidebar-toggle">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <div class="sidebar-menu">
        <ul class="sidebar-nav">
            <li class="active">
                <a href="#">
                    <div class="icon">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                    </div>
                    <div class="title">首页</div>
                </a>
            </li>
            <li class="@@menu.messaging">
                <a href="#">
                    <div class="icon">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                    </div>
                    <div class="title">Messaging</div>
                </a>
            </li>
            <li class="dropdown ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="icon">
                        <i class="fa fa-cube" aria-hidden="true"></i>
                    </div>
                    <div class="title">UI Kits</div>
                </a>
                <div class="dropdown-menu">
                    <ul>
                        <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> UI Kits</li>
                        <li><a href="#">Customize</a></li>
                        <li><a href="#">Components</a></li>
                        <li><a href="#">Card</a></li>
                        <li><a href="#">Form</a></li>
                        <li><a href="#">Table</a></li>
                        <li><a href="#">Icons</a></li>
                        <li class="line"></li>
                        <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Advanced Components</li>
                        <li><a href="./uikits/pricing-table.html">Pricing Table</a></li>
                        <!-- <li><a href="./uikits/timeline.html">Timeline</a></li> -->
                        <li><a href="./uikits/chart.html">Chart</a></li>
                    </ul>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="icon">
                        <i class="fa fa-group" aria-hidden="true"></i>
                    </div>
                    <div class="title">权限管理</div>
                </a>
                <div class="dropdown-menu">
                    <ul>
                        <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> 权限管理</li>
                        <li><a href="{{ URL::route('user.index') }}">用户帐号</a></li>
                        <li><a href="{{ URL::route('role.index') }}">角色管理</a></li>
                        <li><a href="{{ URL::route('permission.index') }}">权限分配</a></li>
                        <li class="line"></li>
                        <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> 菜单分配</li>
                        <!-- <li><a href="./pages/landing.html">Landing</a></li> -->
                        <li><a href="#">菜单管理</a></li>
                        <li><a href="#">菜单权限</a></li>
                        <!-- <li><a href="./pages/404.html">404</a></li> -->
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="sidebar-footer">
        <ul class="menu">
            <li>
                <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                </a>
            </li>
            <li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>
        </ul>
    </div>
</aside>