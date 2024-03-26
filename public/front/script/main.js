// slider sản phẩm trang home
const swiperHome = new Swiper(".swiper-product-home", {
  // Các thuộc tính cho slider
  // vòng lặp
  loop: false,
  // Phân trang
  pagination: {
    el: ".swiper-pagination",
  },
  // Khoảng cách giữa các sản phẩm
  spaceBetween: 8,
  // số lượng sản phẩm được hiển thị
  slidesPerView: 6.5,
  // responsive
  breakpoints: {
    320: {
      slidesPerView: 2.2,
    },
    768: {
      slidesPerView: 4.2,
    },
    1024: {
      slidesPerView: 6.5,
    },
  },
  // các nút next và prev
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // scrollbar nếu màn hình không đủ
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});

// slider sản phẩm tương tự
const swiper = new Swiper(".swiper-product", {
  // Optional parameters
  loop: false,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  slidesPerView: 4.2,
  breakpoints: {
    320: {
      slidesPerView: 1.2,
    },
    768: {
      slidesPerView: 2.2,
    },
    1024: {
      slidesPerView: 4.2,
    },
  },
  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});
// slider sản phẩm bán chạy
const swiperBestseller = new Swiper(".swiper-product-bestseller", {
  // Optional parameters
  loop: false,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  slidesPerView: 4.2,
  breakpoints: {
    320: {
      slidesPerView: 1.2,
    },
    768: {
      slidesPerView: 3.2,
    },
    1024: {
      slidesPerView: 4.2,
    },
  },
  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});

// slider hình ảnh trang sản phẩm
const productSlide = new Swiper(".product-slide", {
  // Optional parameters
  loop: false,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  slidesPerView: 1,

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});

// đóng submenu của header
// check xem chuột đang được click vào phần nào
// NẾU KHÔNG CLICK VAO CLASS ".megamenu.active" VÀ CLICK VÀO CLASS ".btn-close-megamenu" THÌ ĐÓNG MEGAMENU
$(document).mouseup(function (e) {
  var container = $(".megamenu.active");
  var btnCloseMegamenu = $(".btn-close-megamenu");
  if (
    (!container.is(e.target) && container.has(e.target).length === 0) ||
    btnCloseMegamenu.is(e.target)
  ) {
    // THÊM HOẶC BỎ CÁC CLASS KHI THOẢ MÃN ĐIỀU KIỆN
    container.toggleClass(["active", "overflow-hidden"]);
    $(".mega-overlay").hide();
    $("body").removeClass("overflow-hidden");
    $("header").removeClass("z-50");
  }
});

// đóng/mở submenu của header
$(".megamenu-parent").click(function () {
  // Holds the product ID of the clicked element
  var childrenId = $(this).attr("link");

  $(childrenId).toggleClass(["active", "overflow-hidden"]);
  $(".mega-overlay").show();
  $("body").addClass("overflow-hidden");
  $("header").addClass("z-50");
});

// mở giỏ hàng
$(".header-cart").click(function () {
  $(".mini-cart").addClass("is-open");
  $("body").addClass("overflow-hidden");
});
// CHECK CHUỘT CLICK VÀO ĐÂU ĐỂ ĐÓNG GIỎ HÀNG
$(document).mouseup(function (e) {
  var container = $(".mini-cart-content");
  var btnRemove = $(".mini-cart-remove");
  if (
    (!container.is(e.target) && container.has(e.target).length === 0) ||
    btnRemove.is(e.target)
  ) {
    $(".mini-cart").removeClass("is-open");
    $("body").removeClass("overflow-hidden");
  }
});
// mở menu mobile
$(".menu-bars").click(function () {
  $(".menu-mobile").addClass("is-open");
  $("body").addClass("overflow-hidden");
});
// đóng menu mobile
$(".btn-close-menu").click(function () {
  $(".menu-mobile").removeClass("is-open");
  $("body").removeClass("overflow-hidden");
});

// tab nhóm sản phẩm ở menu sản phẩm mobile
function openTabs(evt, tabName) {
  var i, tabcontent, tablinks;
  // tìm các phần tử có class "tab-content"
  tabcontent = document.getElementsByClassName("tab-content");
  // dùng vòng lặp để thêm thuộc tính ẩn các phần tử có class vừa tìm được
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  // tìm các phần tử có class là "mega-item"
  tablinks = document.getElementsByClassName("mega-item");
  // dùng vòng lặp để bỏ class "active" khỏi các phần tử vừa tìm được
  // class active dùng để hiển thị phần được chọn lên
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  // sau khi ẩn hết các tab thì hiển thị 1 tab có id là tham số truyền vào tabName
  document.getElementById(tabName).style.display = "block";
  // sau khi ẩn hếwt các class active thì add class active vào event được click vào
  evt.currentTarget.className += " active";
}
// khi vừa mở web thì tự động click vào đúng tab sản phẩm mặc định
document.getElementById("defaultOpenTab").click();

// jQuery cho nút về đầu trang
$(window).scroll(function () {
  // nếu scroll màn hình về đầu trang thì ẩn nút về đầu trang
  // nếu không thì hieejn nút
  if ($(this).scrollTop()) {
    $("#toTop").fadeIn();
  } else {
    $("#toTop").fadeOut();
  }
});
//  click vào nút về đầu trang thì scroll về đầu màn hình
$("#toTop").click(function () {
  $("html, body").animate({ scrollTop: 0 }, 1000);
});

function openCollapse() {
  var viewMoreContent = $(".view-more-content");
  viewMoreContent.toggleClass("active");
  $(".view-more-icon").toggleClass("role-icon");
  if (viewMoreContent.hasClass("active")) {
    $(".view-more-text").text("Ẩn bớt");
  } else {
    $(".view-more-text").text("Xem thêm");
  }
}
