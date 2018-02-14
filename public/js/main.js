/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 118);
/******/ })
/************************************************************************/
/******/ ({

/***/ 118:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(119);


/***/ }),

/***/ 119:
/***/ (function(module, exports) {

// function mouseOut(){
//       document.getElementById("skill-list").style.display = "none";
// }
$(document).ready(function () {

    // $('#minimize').on('click', function(e) {
    //     e.preventDefault();
    //     $('#chatstart').css({ 'bottom': '-325px', 'z-index': '1' })
    // });


    // $('#maximize').on('click', function(e) {
    //     e.preventDefault();
    //     $('#chatstart').css({ 'bottom': '0', 'z-index': '1' })
    // });

    // $('#close').on('click', function(e) {
    //     e.preventDefault();
    //     $('#chatstart').css('display', 'none')
    // });

    // $('#chat').on('click', function(e) {
    //     e.preventDefault();
    //     console.log("abc");
    //     $('#chatstart').css('display', 'block')
    // });

    $('#send_chat').keyup(function () {
        var ln = $('#send_chat').val().length;
        // console.log(ln);
        if (ln == 43) {
            $('#chat_body').css("height", "250px");
            $('#send_chat').css('height', "40px");
            // console.log('waleed');
        } else if (ln <= 43) {
            $('#chat_body').css("height", "262px");
            $('#send_chat').css('height', "28px");
        }
        if (ln >= 86) {
            $('#chat_body').css("height", "230px");
            $('#send_chat').css('height', "60px");
        } else if (ln >= 43 && ln <= 86) {
            $('#chat_body').css("height", "250px");
            $('#send_chat').css('height', "40px");
        }
    });

    $("#bid-hide").hide();
    $("#bid").click(function () {
        $("#bid-hide").show(1000);
    });

    $("#Capa_1").hover(function () {
        $("#Capa_1").toggleClass('animated flash');
    });

    $(".video").hover(function () {
        $(".video").toggleClass('animated bounceOutUp');
    });

    $(".editing").hover(function () {
        $(".editing").toggleClass('animated hinge');
    });

    $(".designing").hover(function () {
        $(".designing").toggleClass('animated bounce');
    });

    $(".rubberband").hover(function () {
        $(".rubberband").toggleClass('animated flipOutY');
    });

    $(".flipouty").hover(function () {
        $(".flipouty").toggleClass('animated flipOutY');
    });

    $(".slidinright").hover(function () {
        $(".slidinright").toggleClass('animated flipOutY');
    });

    $(".zoomoutup").hover(function () {
        $(".zoomoutup").toggleClass('animated flipOutY');
    });

    // modwidth= 768;

    //Preloader
    $(window).on('load', function () {
        preloaderFadeOutTime = 500;
        function hidePreloader() {
            var preloader = $('.spinner-wrapper');
            preloader.fadeOut(preloaderFadeOutTime);
        }
        hidePreloader();
    });
});

// function display()
// {
//     $('#chatstart').css('display','block')
// }
function display(id) {
    var disp = $(id).data('id');
    console.log('From main.js');
    console.log(disp);
    $('#' + disp).css('display', 'block');
}

function minimize(id) {
    var dataid = $(id).parents('.chatbox').attr('id');
    $('#' + dataid).css({ 'bottom': '-325px', 'z-index': '1!important' });
}

function maximize(id) {
    var dataid = $(id).parents('.chatbox').attr('id');
    $('#' + dataid).css({ 'bottom': '0', 'z-index': '1!important' });
}

function closewindow(id) {
    var dataid = $(id).parents('.chatbox').attr('id');
    $('#' + dataid).css('display', 'none');
}
(function ($) {
    $.fn.extend({
        hideMaxListItems: function hideMaxListItems(options) {
            // OPTIONS
            var defaults = {
                max: 3,
                speed: 1000,
                moreText: '<i class="fa fa-plus" aria-hidden="true"></i> Show More',
                lessText: '<i class="fa fa-minus" aria-hidden="true"></i> Show Less',
                moreHTML: '<p class="maxlist-more"><a href="#" class="show-more"></a></p>' // requires class and child <a>
            };
            var options = $.extend(defaults, options);

            // FOR EACH MATCHED ELEMENT
            return this.each(function () {
                var $thisList = $(this);
                var op = options;
                var totalListItems = $thisList.children("li").length;
                var speedPerLI;

                // Get animation speed per LI; Divide the total speed by num of LIs.
                // Avoid dividing by 0 and make it at least 1 for small numbers.
                if (totalListItems > 0 && op.speed > 0) {
                    speedPerLI = Math.round(op.speed / totalListItems);
                    if (speedPerLI < 1) {
                        speedPerLI = 1;
                    }
                } else {
                    speedPerLI = 0;
                }

                // If list has more than the "max" option
                if (totalListItems > 0 && totalListItems > op.max) {
                    // Initial Page Load: Hide each LI element over the max
                    $thisList.children("li").each(function (index) {
                        if (index + 1 > op.max) {
                            $(this).hide(0);
                        } else {
                            $(this).show(0);
                        }
                    });

                    // Replace [COUNT] in "moreText" or "lessText" with number of items beyond max
                    var howManyMore = totalListItems - op.max;
                    var newMoreText = op.moreText;
                    var newLessText = op.lessText;

                    if (howManyMore > 0) {
                        newMoreText = newMoreText.replace("[COUNT]", howManyMore);
                        newLessText = newLessText.replace("[COUNT]", howManyMore);
                    }

                    // Add "Read More" button, or unhide it if it already exists
                    if ($thisList.next(".maxlist-more").length > 0) {
                        $thisList.next(".maxlist-more").show();
                    } else {
                        $thisList.after(op.moreHTML);
                    }

                    // READ MORE - add text within button, register click event that slides the items up and down
                    $thisList.next(".maxlist-more").children("a").html(newMoreText).off('click').on("click", function (e) {
                        var $theLink = $(this);

                        // Get array of children past the maximum option
                        var listElements = $theLink.parent().prev("ul, ol").children("li");
                        listElements = listElements.slice(op.max);

                        // Sequentially slideToggle the list items
                        // For more info on this awesome function: http://goo.gl/dW0nM
                        if ($theLink.html() == newMoreText) {
                            $(this).html(newLessText);
                            var i = 0;
                            (function () {
                                $(listElements[i++] || []).slideToggle(speedPerLI, arguments.callee);
                            })();
                        } else {
                            $theLink.html(newMoreText);
                            var i = listElements.length - 1;
                            (function () {
                                $(listElements[i--] || []).slideToggle(speedPerLI, arguments.callee);
                            })();
                        }

                        // Prevent Default Click Behavior (Scrolling)
                        e.preventDefault();
                    });
                } else {
                    // LIST HAS LESS THAN THE MAX
                    // Hide "Read More" button if it's there
                    if ($thisList.next(".maxlist-more").length > 0) {
                        $thisList.next(".maxlist-more").hide();
                    }
                    // Show all list items that may have been hidden
                    $thisList.children("li").each(function (index) {
                        $(this).show(0);
                    });
                }
            });
        }
    });
})(jQuery); // End jQuery Plugin

$(window).resize(function () {
    if ($(window).width() < 768) {
        $("h4.hdds").show();
        $("div#collapseOne").removeClass("show");
        $("h4.hddd").hide();
    } else {
        $("div#collapseOne").addClass("show");
        $("h4.hdds").hide();
        $("h4.hddd").show();
    }
});

if ($(window).width() > 768) {
    $("h4.hdds").hide();
} else {
    $("div#collapseOne").removeClass("show");
    $("h4.hdds").show();
    $("h4.hddd").hide();
}

$(document).ready(function () {
    // EXAMPLE USAGE ON 3 LISTS
    $('#content ol').hideMaxListItems();
    $('ul.first').hideMaxListItems({ 'max': 2, 'speed': 500, 'moreText': '<i class="fa fa-plus" aria-hidden="true"></i> Show More ([COUNT])' });
    $('#content ul.second').hideMaxListItems({
        'max': 6,
        'speed': 2000,
        'moreText': 'MORE OF THEM',
        'lessText': 'READ LESS <em>Can Use HTML</em>',
        'moreHTML': '<div class="maxlist-more"><a href="#"></a></div>'
    });
});

/***/ })

/******/ });