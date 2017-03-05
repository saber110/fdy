<!-- Path to Framework7 Library JS-->
    <script type="text/javascript" src="js/framework7.min.js"></script>
    <!-- Path to your app js-->
    <script type="text/javascript" src="js/my-app.js"></script>
</body>
    <script>
      var myApp = new Framework7({
        animateNavBackIcon:true
      }); 
      var mainView = myApp.addView('.view-main', {
        dynamicNavbar: true,
      });
    </script>
</html>