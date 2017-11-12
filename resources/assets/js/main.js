$(document).ready(function(){

    $("#bid-hide").hide();
    $("#bid").click(function(){
        $("#bid-hide").show(1000);

    });

    $("#Capa_1").hover(function(){
        $("#Capa_1").toggleClass('animated flash');
    });

    $(".video").hover(function(){
        $(".video").toggleClass('animated bounceOutUp');
    });

    $(".editing").hover(function(){
        $(".editing").toggleClass('animated hinge');
    });

    $(".designing").hover(function(){
        $(".designing").toggleClass('animated bounce');
    });

    $(".rubberband").hover(function(){
        $(".rubberband").toggleClass('animated flipOutY');
    });

    $(".flipouty").hover(function(){
        $(".flipouty").toggleClass('animated flipOutY');
    });


    $(".slidinright").hover(function(){
        $(".slidinright").toggleClass('animated flipOutY');
    });


    $(".zoomoutup").hover(function(){
        $(".zoomoutup").toggleClass('animated flipOutY');
    });

    // modwidth= 768;

    //Preloader
    $(window).on('load',function() {
        preloaderFadeOutTime = 500;
        function hidePreloader() {
            var preloader = $('.spinner-wrapper');
            preloader.fadeOut(preloaderFadeOutTime);
        }
        hidePreloader();
    });

});

(function($){
    $.fn.extend({
        hideMaxListItems: function(options)
        {
            // OPTIONS
            var defaults = {
                max: 3,
                speed: 1000,
                moreText:'<i class="fa fa-plus" aria-hidden="true"></i> Show More',
                lessText:'<i class="fa fa-minus" aria-hidden="true"></i> Show Less',
                moreHTML:'<p class="maxlist-more"><a href="#" class="show-more"></a></p>', // requires class and child <a>
            };
            var options =  $.extend(defaults, options);

            // FOR EACH MATCHED ELEMENT
            return this.each(function() {
                var $thisList = $(this);
                var op = options;
                var totalListItems = $thisList.children("li").length;
                var speedPerLI;

                // Get animation speed per LI; Divide the total speed by num of LIs.
                // Avoid dividing by 0 and make it at least 1 for small numbers.
                if ( totalListItems > 0 && op.speed > 0  ){
                    speedPerLI = Math.round( op.speed / totalListItems );
                    if ( speedPerLI < 1 ) { speedPerLI = 1; }
                } else {
                    speedPerLI = 0;
                }

                // If list has more than the "max" option
                if ( (totalListItems > 0) && (totalListItems > op.max) )
                {
                    // Initial Page Load: Hide each LI element over the max
                    $thisList.children("li").each(function(index){
                        if ( (index+1) > op.max ) {
                            $(this).hide(0);
                        } else {
                            $(this).show(0);
                        }
                    });

                    // Replace [COUNT] in "moreText" or "lessText" with number of items beyond max
                    var howManyMore = totalListItems - op.max;
                    var newMoreText = op.moreText;
                    var newLessText = op.lessText;

                    if ( howManyMore > 0 ){
                        newMoreText = newMoreText.replace("[COUNT]", howManyMore);
                        newLessText = newLessText.replace("[COUNT]", howManyMore);
                    }

                    // Add "Read More" button, or unhide it if it already exists
                    if ( $thisList.next(".maxlist-more").length > 0 ){
                        $thisList.next(".maxlist-more").show();
                    } else {
                        $thisList.after(op.moreHTML);
                    }

                    // READ MORE - add text within button, register click event that slides the items up and down
                    $thisList.next(".maxlist-more")
                        .children("a")
                        .html(newMoreText)
                        .off('click')
                        .on("click", function(e){
                            var $theLink = $(this);

                            // Get array of children past the maximum option
                            var listElements = $theLink.parent().prev("ul, ol").children("li");
                            listElements = listElements.slice(op.max);

                            // Sequentially slideToggle the list items
                            // For more info on this awesome function: http://goo.gl/dW0nM
                            if ( $theLink.html() == newMoreText ){
                                $(this).html(newLessText);
                                var i = 0;
                                (function() { $(listElements[i++] || []).slideToggle(speedPerLI,arguments.callee); })();
                            }
                            else {
                                $theLink.html(newMoreText);
                                var i = listElements.length - 1;
                                (function() { $(listElements[i--] || []).slideToggle(speedPerLI,arguments.callee); })();
                            }

                            // Prevent Default Click Behavior (Scrolling)
                            e.preventDefault();
                        });
                }
                else {
                    // LIST HAS LESS THAN THE MAX
                    // Hide "Read More" button if it's there
                    if ( $thisList.next(".maxlist-more").length > 0 ){
                        $thisList.next(".maxlist-more").hide();
                    }
                    // Show all list items that may have been hidden
                    $thisList.children("li").each(function(index){
                        $(this).show(0);
                    });
                }
            });
        }
    });
})(jQuery); // End jQuery Plugin

$( window ).resize(function() {
    if($(window).width() < 768){
        $("h4.hdds").show();
        $("div#collapseOne").removeClass("show");
        $("h4.hddd").hide();

    }else{
        $("div#collapseOne").addClass("show");
        $("h4.hdds").hide();
        $("h4.hddd").show();
    }
});

if($(window).width() >768){
    $("h4.hdds").hide();
}else{
    $("div#collapseOne").removeClass("show");
    $("h4.hdds").show();
    $("h4.hddd").hide();
}

$(document).ready(function() {
    // EXAMPLE USAGE ON 3 LISTS
    $('#content ol').hideMaxListItems();
    $('ul.first').hideMaxListItems({ 'max':2, 'speed':500, 'moreText':'<i class="fa fa-plus" aria-hidden="true"></i> Show More ([COUNT])' });
    $('#content ul.second').hideMaxListItems({
        'max':6,
        'speed':2000,
        'moreText':'MORE OF THEM',
        'lessText':'READ LESS <em>Can Use HTML</em>',
        'moreHTML': '<div class="maxlist-more"><a href="#"></a></div>'
    });
});