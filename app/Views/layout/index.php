
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <Style>
        html, body
        {
            height:100%;
            width:100%;
            background:#27374D;
        }
        .container-fluid
        {
            justify-items:center;
        }
        .container-fluid p
        {
            display:flex;
            justify-items: center;
            font-size: 24px;
            color: white;
        }
</Style>
    <div class="container">
        <?= $this->renderSection('body')?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
