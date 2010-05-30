/*!
 * MGC.main
 * http://matthewcobbs.com/
 *
 * Main site class
 *
 * Copyright (c) 2010 Matthew Cobbs
 *
 */
/*global window, document, jQuery, $, MGC */
MGC = window.MGC || {};

(function (MGC, $) {

    MGC.main = function (options) {

        var self = this, // used in jQuery scope
            option; // used to loop through options
        this.curSlide = 0;
        this.maxSlide = $('#stage .slide').length - 1;

        if (options) {
            for (option in options) {
                if (this.hasOwnProperty(option)) {
                    this[option] = options[option];
                }
            }
        }

        /**
        * init
        *
        * random page formatting stuff
        *
        * @return VOID
        **/
        this.init = function () {
            // scrolling
            if (typeof $.localScroll !== 'undefined') {
                $.localScroll();
            }

            // slideshow navigation
            $('#plus').click(function () {
                self.slideAnimate('forward');
                return false;
            });
            $('#minus').click(function () {
                self.slideAnimate('reverse');
                return false;
            });

            // tabs navigation
            $('.tabsPanel .tabs a').click(function () {
                var parent = $(this).parents('.tabsPanel'),
                    idx = $('.tabs a', parent).index(this);

                $('.tabs li', parent).removeClass('selected').eq(idx).addClass('selected');
                self.tabAnimate(idx + 1, parent);
                return false;
            })

            // breakout captions
            $('.breakout a span').fadeTo('fast', 0.75);
            $('.breakout a').hover(
                    function () {
                        $('span', this).fadeTo('fast', 1);
                    }, function () {
                        $('span', this).fadeTo('fast', 0.75);
                    }
                );
        };

        /*
         * setupForms
         *
         * initialize form validation, triggers, etc.
         *
         * @return VOID
         */
        this.setupForms = function () {
            // add US phone validation
            jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
                phone_number = phone_number.replace(/\s+/g, "");
                    return this.optional(element) || phone_number.length > 9 &&
                            phone_number.match(/^(1-?)?\(?\d{3}\)?[-\.\s]*\d{3}[-\.\s]*\d{4}$/);
            }, "Please specify a valid phone number");

            // default values
            $('input:text, textarea')
                .focus(function () {
                    if ($(this).val() == $(this)[0].defaultValue)
                        $(this).val('');
                })
                .blur(function () {
                    if ($(this).val() === '')
                        $(this).val($(this)[0].defaultValue);
                });

            // validation
            $('form.search, form.wpcf7-form').submit(function () {
                $('input:text, textarea', this).each(function () {
                    if ($(this).val() == $(this)[0].defaultValue)
                        $(this).val('');
                });
            });

            function valid_submitHandler (form) {
                form.submit();
            }
            function valid_success (label) {
                label.html('OK!').addClass('valid');
            }
            function valid_invalidHandler (form, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) {
                    $('input:text, textarea', form).each(function () {
                        if ($(this).val() === '')
                            $(this).val($(this)[0].defaultValue);
                    });
                }
            }

            $('form.search').each(function () {
                $(this).validate({
                    rules: {
                        s: {
                            required: true
                        }
                    },
                    messages: {
                        s: {
                            required: "Please enter a search query."
                        }
                    },
                    submitHandler: valid_submitHandler,
                    success: valid_success,
                    invalidHandler: valid_invalidHandler
                });
            });
            $('form.wpcf7-form').each(function () {
                $(this).validate({
                    rules: {
                        fullname: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        phone: {
                            phoneUS: true
                        },
                        message: {
                            required: true
                        }
                    },
                    messages: {
                        fullname: {
                            required: "Please enter your full name."
                        },
                        email: {
                            required: "Please enter your email address.",
                            email: "Please enter a valid email address."
                        },
                        phone: {
                            phoneUS: "Please enter a valid phone number."
                        },
                        message: {
                            required: "Please enter your message."
                        }
                    },
                    submitHandler: valid_submitHandler,
                    success: valid_success,
                    invalidHandler: valid_invalidHandler
                });
            });
        };

        /*
         * slideAnimate
         * 
         * animate the stage slideshow
         *
         * @param STRING direction - forward | reverse
         *
         * @return VOID
         */
        this.slideAnimate = function (direction) {
            var nextSlide = self.curSlide,
                slide = null;

            // if next slide is over the bounds,
            // remove a slide from the proper
            // end and append to the opposite end
            if (direction == 'reverse') {
                nextSlide--;
                if (nextSlide < 0) {
                    slide = $('#stage .slide').eq(self.maxSlide).detach();
                    slide.prependTo('#stage .slides');
                    self.curSlide =  0;
                    $('#stage .slides').css('top', '-320px');
                } else {
                    self.curSlide = nextSlide;
                }

            } else if (direction == 'forward') {
                nextSlide++;
                if (nextSlide > self.maxSlide) {
                    slide = $('#stage .slide').eq(0).detach();
                    $('#stage .slides').css('top', '-'+((self.maxSlide - 1)*320)+'px');
                    slide.appendTo('#stage .slides');
                    self.curSlide =  self.maxSlide;
                } else {
                    self.curSlide = nextSlide;
                }

            }

            // animate to the current slide
            $('#stage .slides').animate({
                    top: '-'+(self.curSlide * 320)
                }, 400);
        };

        /*
         * tabAnimate
         *
         * animate the content tabbed panels
         *
         * @param INT tab - the tab index
         * @param OBJECT context - the jquery context object
         *
         * @return VOID
         */
        this.tabAnimate = function (tab, context) {
            // animate the panels wrap to the left to the offset of the tab
            $('.panelsWrap', context).animate({
                    left: '-'+((tab - 1) * 620)
                }, 400);
        };

    };

}(MGC, jQuery));