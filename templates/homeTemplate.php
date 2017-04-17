<div id="AnonymousMenu">
  <div class="home left col-md-6">
    <h1>Pas encore membre ?</h1>
    <a class="hvr-float-shadow btn lienMenu" id="boutG" href="index.php?action=inscription">Inscris-toi !</a>
  </div>
  <div class="home right col-md-6">
    <h1>Tu as déjà un compte ?</h1>
    <a class="hvr-float-shadow btn lienMenu boutD" href="index.php?action=connexion">Connecte-toi !</a>
  </div>
  <div class="plein">
    <a id="vache" class="shake" href="#" ><img src="img/vache.png" /></a>
    <h3>Cliquez sur le logo pour accéder au jeu !</h3>
  </div>
  <script>
  var inter1 = null;
  var inter = null;
  var j = -100;
  var i = -100;
  $('#vache').on('click', function func(){
        inter = window.setInterval(function(){
          i+=20;
          if(i<=1){
            $('.right').css({transform: 'translateY(' + i +'%)'});
          }
          else {
            clearInterval(inter);
          }
        }, 10);
        setTimeout( function(){
            inter1 = window.setInterval(function(){
              j+=20;
              if(j<=1){
                $('.left').css({transform: 'translateY(' + j +'%)'});
              }
              else {
                clearInterval(inter1);
              }
            }, 10);
      }  , 100);

  });



  </script>
</div>
