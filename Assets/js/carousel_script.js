 $(document).ready(function(){
/////////////************Home page banner carousel**********///////////////////////////
    $("#bannerCarousel").mouseover(function(){
      $(".left,.right").css({"opacity":"1.5",
        "background-image":"linear-gradient(to right,rgba(0, 0, 0, 0) 0,rgba(0,0,0,.0001) 100%)"
      });
    });
    $("#bannerCarousel").mouseout(function(){
      $(".left,.right").css({"opacity":"0",
        "background-image":"linear-gradient(to right,rgba(0, 0, 0, 0) 0,rgba(0,0,0,.0001) 100%)"
      });
    });


/////////////************All department carousel**********///////////////////////////
    $("#myCarousel").mouseover(function(){
      $(".left,.right").css({"opacity":"1.5",
        "background-image":"linear-gradient(to right,rgba(0, 0, 0, 0) 0,rgba(0,0,0,.0001) 100%)"
      });
    });
    $("#myCarousel").mouseout(function(){
      $(".left,.right").css({"opacity":"0",
        "background-image":"linear-gradient(to right,rgba(0, 0, 0, 0) 0,rgba(0,0,0,.0001) 100%)"
      });
    });
});