<div class="top">
    <i class="uil uil-bars sidebar-toggle"></i>

    <div class="search-box">
        <i class="uil uil-search"></i>
        <input type="text" placeholder="Search here...">
    </div>
    <div class="iocn-link">
        <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="avt" src="/build/images/{{ Auth::user()->image }}" alt="">
            <i class="uil uil-angle-down arrow "></i>
        </button>

        <ul class="dropdown-menu dropdown-menu-dark">
            <li> <img class="avt" src="/build/images/{{ Auth::user()->image }}" alt=""> <span
                    class="link-name">{{ Auth::user()->email }}</span></li>
        </ul>
    </div>
</div>
