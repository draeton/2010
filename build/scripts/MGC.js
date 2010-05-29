/*!
 * MGC
 * http://matthewcobbs.com/
 *
 * Main site execution control script
 *
 * Copyright (c) 2010 Matthew Cobbs
 *
 */
/*global window, document, jQuery, $, MGC */
MGC = window.MGC || {};

(function (MGC, $) {
    // cufon type replacement
    if (typeof Cufon !== 'undefined') {
        Cufon.replace('.title');
        Cufon.now();
    }

    $(document).ready(function () {

        if (MGC.hasOwnProperty('main')) {

            var main = new MGC.main();
            main.init();
            main.setupForms();

        }
        
    });
}(MGC, jQuery));