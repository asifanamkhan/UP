<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://demos.creative-tim.com/paper-bootstrap-wizard/assets/css/bootstrap.min.css">
    <style>
        .error {
            color: #EB5E28;
        }

        .success {
            color: #7AC29A;
        }
    </style>
</head>
<body>

<div class="col-md-10">

    <form action="" id="form">
        <input type="text" name="firstname" id="firstname" class="form-control">
        <input type="text" name="lastname" id="lastname" class="form-control">

        <button type="submit" class="btn btn-info">submit</button>
    </form>
</div>


<script src="https://demos.creative-tim.com/paper-bootstrap-wizard/assets/js/jquery-2.2.4.min.js"></script>



<script>
    $('#form').validate({
        rules: {
            firstname: {
                required: true,
                minlength: 3
            },
            lastname: {
                required: true,
                minlength: 3
            }

        }
    });
</script>
</body>
</html>
