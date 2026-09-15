<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $campaign->subject }}</title>
</head>

<body style="
    margin: 0;
    padding: 0;
    background: #f4f4f5;
    font-family: Arial, Helvetica, sans-serif;
">

    <div style="
        max-width: 640px;
        margin: 40px auto;
        background: #ffffff;
        border-radius: 10px;
        overflow: hidden;
    ">

        <div style="
            padding: 24px;
            text-align: center;
            background: #06840b;
        ">
            <strong style="
                color: #ffffff;
                font-size: 24px;
            ">
                Jaloot.org
            </strong>
        </div>

        <div style="
            padding: 32px;
            color: #333333;
        ">

            {!! $campaign->content !!}

        </div>

        <div style="
            padding: 20px;
            text-align: center;
            background: #f4f4f5;
            color: #777777;
            font-size: 13px;
        ">
            © {{ date('Y') }} Jaloot.org
        </div>

    </div>

</body>
</html>