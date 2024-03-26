<footer>
    <div
        class="footer-main max-w-screen-xl 2xl:max-w-screen-2xl mx-auto lg:px-8 px-4"
    >
        <div
            class="grid lg:grid-cols-5 gap-8 lg:py-16 py-8 border-t border-gray-300"
        >
            <div class="footer-col lg:col-span-2">
                <h3 class="text-5xl text-bold mb-8">Cozy</h3>
                <ul class="ft-menu-nav">
                    <li class="mb-4 text-gray-700">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <a href="http://maps.google.com/maps?q=<?= urlencode(get_settings()->site_address) ?>" target="_blank">
                            <span>{{ get_settings()->site_address }}</span>
                        </a>
                    </li>
                    <li class="text-gray-700 mb-4">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <a href="tel: {{ get_settings()->site_phone }}"> {{ get_settings()->site_phone }}</a>
                    </li>
                    <li class="text-gray-700">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:{{ get_settings()->site_email }}">{{ get_settings()->site_email }}</a>
                    </li>
                </ul>
                <div class="footer-social pt-2">
                    <a
                        href="{{ get_social_network()->facebook_url }}"
                        class="mr-2 inline-block transition hover:text-black text-gray-400">
                        <i class="fab text-xl fa-facebook-square"></i>
                    </a>
                    <a
                        href="{{ get_social_network()->instagram_url }}"
                        class="mr-2 inline-block transition hover:text-black text-gray-400">
                        <i class="fab text-xl fa-instagram"></i>
                    </a>
                    <a
                        href="{{ get_social_network()->twitter_url }}"
                        class="mr-2 inline-block transition hover:text-black text-gray-400">
                        <i class="fab text-xl fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="footer-col">
                <div class="footer-title uppercase text-gray-700 mb-4">
                    Hỗ trợ khách hàng
                </div>
                <ul class="ft-menu-nav">
                    <li>
                        <a href="/" class="menu-item mb-4">Hướng dẫn mua hàng</a>
                    </li>
                    <li>
                        <a href="/" class="menu-item mb-4">Kinh nghiệm mua hàng</a>
                    </li>
                    <li>
                        <a href="/" class="menu-item mb-4">Hình thức thanh toán</a>
                    </li>
                    <li>
                        <a href="/" class="menu-item mb-4">Chính sách đổi trả</a>
                    </li>
                </ul>
            </div>
            <div class="footer-col">
                <div class="footer-title uppercase text-gray-700 mb-4">
                    Liên kết nhanh
                </div>
                <ul class="ft-menu-nav no-bullets">
                    <li>
                        <a href="/" class="menu-item mb-4">Trang chủ</a>
                    </li>
                    <li>
                        <a class="menu-item mb-4" href="/product"
                        >Các sản phẩm</a
                        >
                    </li>
                    <li>
                        <a class="menu-item mb-4" href="/news"
                        >Tin tức</a
                        >
                    </li>
                    <li>
                        <a class="menu-item mb-4" href="#">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <div class="footer-col">
                <div class="footer-title uppercase text-gray-700 mb-4">Gallery</div>
                <div class="grid grid-cols-3 gap-2">
                    <img src="/front/images/gallery_1.webp" alt="" srcset="" />
                    <img src="/front/images/gallery_2.webp" alt="" srcset="" />
                    <img src="/front/images/gallery_3.webp" alt="" srcset="" />
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center p-4 bg-gray-100">
        Copyright by Hieu Dang
    </div>
</footer>
