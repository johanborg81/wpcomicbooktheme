// Footer background color
(function ($) {
    wp.customize('footer_bckg_color', function (value) {
        value.bind(function (newval) {
            $('footer').css('background', newval);
        });
    });
})(jQuery);

// Footer menu text color
(function ($) {
    wp.customize('footer_menu_color', function (value) {
        value.bind(function (newval) {
            $('.footer__left a').css('color', newval);
        });
    });
})(jQuery);

// Footer contact email color
(function ($) {
    wp.customize('footer_contact_email', function (value) {
        value.bind(function (newval) {
            $('.footer__middle a').css('color', newval);
        });
    });
})(jQuery);

// Footer social media color
(function ($) {
    wp.customize('footer_social_media_color', function (value) {
        value.bind(function (newval) {
            $('.footer__right a').css('color', newval);
        });
    });
})(jQuery);

// Footer copyright color
(function ($) {
    wp.customize('footer_copyright_color', function (value) {
        value.bind(function (newval) {
            $('.copyright p').css('color', newval);
        });
    });
})(jQuery);

// Navigation bar color on desktop
(function ($) {
    wp.customize('navbar_color', function (value) {
        value.bind(function (newval) {
            $('.navbar').css('background', newval);
        });
    });
})(jQuery);

// Navigation bar color on mobile
(function ($) {
    wp.customize('navbar_color', function (value) {
        value.bind(function (newval) {
            $('.side__nav').css('background', newval);
        });
    });
})(jQuery);

// Navigation bar text color, desktop
(function ($) {
    wp.customize('navbar_text_color', function (value) {
        value.bind(function (newval) {
            $('.navbar a').css('color', newval);
        });
    });
})(jQuery);

// Navigation bar text color, mobile
(function ($) {
    wp.customize('navbar_text_color', function (value) {
        value.bind(function (newval) {
            $('.side__nav a').css('color', newval);
        });
    });
})(jQuery);

// Header showcase text color
(function ($) {
    wp.customize('color_header_text', function (value) {
        value.bind(function (newval) {
            $('.showcase__inner h2').css('color', newval);
        });
    });
})(jQuery);

// CTA button 1 background color
(function ($) {
    wp.customize('cta_one_bckg_color', function (value) {
        value.bind(function (newval) {
            $('.custom__btn-one').css('background', newval);
        });
    });
})(jQuery);

// CTA button 1 text color
(function ($) {
    wp.customize('cta_one_btn_text_color', function (value) {
        value.bind(function (newval) {
            $('.custom__btn-one').css('color', newval);
        });
    });
})(jQuery);

// CTA button 2 background color
(function ($) {
    wp.customize('cta_two_bckg_color', function (value) {
        value.bind(function (newval) {
            $('.custom__btn-two').css('background', newval);
        });
    });
})(jQuery);

// CTA button 2 text color
(function ($) {
    wp.customize('cta_two_btn_text_color', function (value) {
        value.bind(function (newval) {
            $('.custom__btn-two').css('color', newval);
        });
    });
})(jQuery);

// CTA button 3 background color
(function ($) {
    wp.customize('cta_three_bckg_color', function (value) {
        value.bind(function (newval) {
            $('.custom__btn-three').css('background', newval);
        });
    });
})(jQuery);

// CTA button 3 text color
(function ($) {
    wp.customize('cta_three_btn_text_color', function (value) {
        value.bind(function (newval) {
            $('.custom__btn-three').css('color', newval);
        });
    });
})(jQuery);

// Promotion button color
(function ($) {
    wp.customize('promotion_btn_color', function (value) {
        value.bind(function (newval) {
            $('.custom__btn-promo').css('background', newval);
        });
    });
})(jQuery);

// Promotion button text color
(function ($) {
    wp.customize('promotion_btn_text_color', function (value) {
        value.bind(function (newval) {
            $('.custom__btn-promo').css('color', newval);
        });
    });
})(jQuery);

// Social media icon color on contact section on the home page
(function ($) {
    wp.customize('social_media_icon_1_color', function (value) {
        value.bind(function (newval) {
            $('.contact__color-social-one').css('color', newval);
        });
    });
})(jQuery);

(function ($) {
    wp.customize('social_media_icon_2_color', function (value) {
        value.bind(function (newval) {
            $('.contact__color-social-two').css('color', newval);
        });
    });
})(jQuery);

(function ($) {
    wp.customize('social_media_icon_3_color', function (value) {
        value.bind(function (newval) {
            $('.contact__color-social-three').css('color', newval);
        });
    });
})(jQuery);

(function ($) {
    wp.customize('social_media_icon_4_color', function (value) {
        value.bind(function (newval) {
            $('.contact__color-social-four').css('color', newval);
        });
    });
})(jQuery);

(function ($) {
    wp.customize('contact_email_color', function (value) {
        value.bind(function (newval) {
            $('.contact__email a').css('color', newval);
        });
    });
})(jQuery);

// Single comic page
// Social media icon section
(function ($) {
    wp.customize('archive_social_media_color_1', function (value) {
        value.bind(function (newval) {
            $('.comic_social_icon_one').css('color', newval);
        });
    });
})(jQuery);

(function ($) {
    wp.customize('archive_social_media_color_2', function (value) {
        value.bind(function (newval) {
            $('.comic_social_icon_two').css('color', newval);
        });
    });
})(jQuery);

(function ($) {
    wp.customize('archive_social_media_color_3', function (value) {
        value.bind(function (newval) {
            $('.comic_social_icon_three').css('color', newval);
        });
    });
})(jQuery);

(function ($) {
    wp.customize('archive_social_media_color_4', function (value) {
        value.bind(function (newval) {
            $('.comic_social_icon_four').css('color', newval);
        });
    });
})(jQuery);