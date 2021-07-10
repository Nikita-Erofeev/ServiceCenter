$(window).scroll(function(){
    if ($(window).scrollTop() > 15) {
        $('.move').addClass('scroll');
        $('.line').addClass('line_scroll');
    }
    else {
        $('.move').removeClass('scroll');
        $('.line').removeClass('line_scroll');
    }
});