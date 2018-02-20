jQuery(document).ready(function($) {


$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
        $("#nav").addClass("nav-white");
        $("#logo-top").addClass("logo-red").removeClass("logo");
    } else {
        $("#nav").removeClass("nav-white");
        $("#logo-top").addClass("logo").removeClass("logo-red");
    }
});



$('.mobile-menu-btn').on('click', function() {
	if($(this).hasClass('active')) {
		$('.mobile-menu-btn').removeClass('active');
	} else {
		$('.mobile-menu-btn').addClass('active');
	}
});

});


jQuery(document).ready(function(e) {
 {
  function i(e) {
    a.removeClass("active"), n.removeClass("active")
  }
  var c = e(".nav-toggle"),
    o = e(".menu li a"),
    t = e(".top-navigation"),
    a = e(".accordion"),
    s = e(".accordion-trigger"),
    n = e(".accordion-item"),
    l = e(".accordion-overlay");
  c.on("click", function() {
    e(this).toggleClass("is-active"), t.toggleClass("is-opened")
  }), o.on("click", function() {
    c.removeClass("is-active"), t.removeClass("is-opened"), c.attr("checked", !1)
  }), s.on("click", function(c) {
    e(c.target).is(".active") ? i() : (a.toggleClass("active"), e(this).closest(".accordion-item").toggleClass("active"))
  }), l.on("click", i)
}

});
