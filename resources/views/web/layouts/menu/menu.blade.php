<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontend.home') }}">Căn hộ CHO THUÊ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Danh mục
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('frontend.home') }}" class="nav-item nav-link">Trang chủ</a></li>
                <li class="nav-item"><a href="{{ route('web_rooms.index') }}" class="nav-item nav-link">Danh sách Căn hộ</a></li>
{{--                <li class="nav-item"><a href="{{route('frontend.about')}}" class="nav-link">Về chúng tôi</a></li>--}}
{{--                <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-item nav-link">Liên hệ</a></li>--}}
{{--                <li class="nav-item"><a href="{{route('search_booking')}}" class="nav-item nav-link">Tra cứu đặt--}}
{{--                        Căn hộ</a></li>--}}
            </ul>
        </div>
    </div>
</nav>

