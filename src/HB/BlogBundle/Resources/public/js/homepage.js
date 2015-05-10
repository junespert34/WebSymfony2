$(function () {
//alert("coucou");
    /*
     $('h1')
     .mouseover(function () {
     $('h1').css('color', 'red');
     $('p').css('color', 'blue');
     
     })
     .mouseout(function () {
     $('h1').css('color', 'black');
     $('p').css('color', 'black');
     });*/

    $('article.article').css("border", "2px solid green");
    
    $("article.article").hover(
            function () {
                $(this).animate({                    
                    borderWidth: "10px",
                    backgroundColor: '#943D20'                    
                    
                }, 500);
            },
            function () {
                $(this).animate({
                    borderWidth: "1px",
                    backgroundColor: 'white'
                }, 500);
            });

});
