<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Müdo | @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="../css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css" media="screen" title="no title" charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <style type="text/css" media="screen, print">
      @font-face {
        font-family: "Montserrat";
        src: url('../css/Montserrat-Regular.otf');
      }
      @font-face {
        font-family: "Roboto";
        src: url('../css/Roboto-Regular.ttf');
      }
    </style>
  </head>
  @yield('mainContent')
  <div id="body-black">
  </div>
  <script src="../js/script.js" type="text/javascript"></script>
</body>
</html>
