<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="{{ asset('/build/images/organicfarmhome.svg') }}" alt="">
        </div>

        <span class="logo_name">Livestock farms</span>
    </div>

    <div class="menu-items sidebar ">
        <ul class="nav-links">
            <li><a href="{{ Route('admins.index') }}">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
            <li><a href="{{ Route('pets.index') }}">
                    <i class="fa fa-paw" aria-hidden="true"></i>
                    <span class="link-name">Vật Nuôi</span>
                </a></li>
            <li><a href="{{ Route('jobs.index') }}">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span class="link-name">Công Việc</span>
                </a></li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Kho Hàng</span>
                    </a>
                    {{-- <i class='bx bxs-chevron-down arrow'></i> --}}
                    <i class="uil uil-angle-down arrow "></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Kho Hàng</a></li>
                    <li><a href="{{Route('products.index')}}">
                        <i class="fa fa-cube" aria-hidden="true"></i>
                        <span class="link-name">Sản Phẩm</span>
                    </a></li>
                    <li><a href="{{ Route('vacxins.index') }}">
                            <i class="uil uil-syringe"></i>
                            <span class="link-name">Vacxin</span>
                        </a></li>
                    <li><a href="{{ Route('foods.index') }}">
                            <i class="uil uil-utensils"></i>
                            <span class="link-name">Thức ăn</span>
                        </a></li>
                </ul>
            </li>

            <li><a href="#">
                    <i class="uil uil-receipt-alt"></i>
                    <span class="link-name">Nhập hàng</span>
                </a></li>


            <li><a href="users">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Người dùng</span>
                </a></li>
        </ul>

        <ul class="logout-mode">
            <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>

</nav>
