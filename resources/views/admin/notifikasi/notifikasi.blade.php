<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
        class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Notifications
            {{-- <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div> --}}
        </div>
        <div class="dropdown-list-content dropdown-list-icons">
            @foreach ($kerjasamaArray as $item)
                <a href="#" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                        @if ($item['status'] == 'Berakhir')
                            <i class="fa-solid fa-stopwatch"></i>
                        @else
                            <i class="fas fa-bell"></i>
                        @endif
                    </div>
                    <div class="dropdown-item-desc">
                        Kerjasama Dengan Nomor MOU {{ $item['nomor_mou'] }}
                        @if ($item['status'] == 'Berakhir')
                            <div class="time text-primary">Telah Berakhir Pada {{ $item['tgl_berakhir'] }}</div>
                        @else
                            <div class="time text-primary">Akan Berakhir Pada {{ $item['tgl_berakhir'] }}</div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
        <div class="dropdown-footer text-center">
            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</li>