$(document).ready(function () {
  $(".popularConsuyltancyFilter").select2();
  $(".testPreparation").select2();
  
  $(".testimonals-slider").slick({
    slidesToShow: 3,
    slidesToScroll: 2,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          rows: 1,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".business-partners-slider").slick({
    slidesToShow: 4,
    slidesToScroll: 2,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    infinite: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          rows: 1,
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 576,
        settings: {
          rows: 1,
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".consultancy-slider").slick({
    slidesToShow: 4,
    slidesToScroll: 2,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    infinite: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          rows: 1,
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 576,
        settings: {
          rows: 1,
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".sideNavOpen").click(function (e) {
    var sideNavTarget = $(this).data("side-nav-target");
    e.preventDefault();
    if (typeof sideNavTarget !== "undefined" && sideNavTarget) {
      showSideMenu(sideNavTarget);
    }
  });
  $(".sideNavClose").click(function (e) {
    e.preventDefault();
    var sideNavTarget = $(this).data("side-nav-target");
    if (typeof sideNavTarget !== "undefined" && sideNavTarget) {
      hideSideMenu(sideNavTarget);
    }
  });
  $(".content-toggle-btn").click(function (e) {
    var ContentTarget = $(this).data("content-target");
    e.preventDefault();
    if (typeof ContentTarget !== "undefined" && ContentTarget) {
      $(ContentTarget).toggleClass("show-All");
      if ($(ContentTarget).hasClass("show-All")) {
        $(this).text("Read Less");
      } else {
        $(this).text("Read More");
      }
    }
  });
});
$(window).scroll(function () {
  if ($(window).scrollTop() >= 200) {
    $("#consultancy-profile-page").addClass("sticky-top");
  } else {
    $("#consultancy-profile-page").removeClass("sticky-top");
  }
});
var tablesInDescription = document.querySelectorAll(
  ".text-document-content table"
);
tablesInDescription.forEach(function (table) {
  var parentDiv = document.createElement("div");
  parentDiv.classList.add("table-wrapper");
  table.parentNode.insertBefore(parentDiv, table);
  parentDiv.appendChild(table);
});
var duration = 500;
$(window).scroll(function () {
  if ($(this).scrollTop() > 200) {
    $(".to-top").fadeIn(duration);
  } else {
    $(".to-top").fadeOut(duration);
  }
});
$(".to-top").click(function (event) {
  event.preventDefault();
  $("html").animate({ scrollTop: 0 }, duration);
  return false;
});
function closefooterad() {
  document.querySelector(".footer-advertisement").style.display = "none";
}
function showSideMenu(sideNavTarget) {
  $(sideNavTarget).addClass("open");
  $("body").addClass("open-opacity");
  $("header").addClass("dimheader");
}
function hideSideMenu(sideNavTarget) {
  $(sideNavTarget).removeClass("open");
  $("body").removeClass("open-opacity");
  $("header").removeClass("dimheader");
}
const $sideNavMenu = $("#mySideNav");
$(document).mouseup((e) => {
  e.preventDefault();
  if (!$sideNavMenu.is(e.target) && $sideNavMenu.has(e.target).length === 0) {
    $sideNavMenu.removeClass("open");
    $("body").removeClass("open-opacity");
    $("header").removeClass("dimheader");
  }
});
