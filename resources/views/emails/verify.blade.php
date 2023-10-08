<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>仮登録完了のお知らせ</title>
</head>
<body>
    <h1>お世話になっております。 {{ $name }}様</h1>
    <p>{{url('new_account/verify/'.$token)}}</p>
    <!-- more content -->
</body>
</html>