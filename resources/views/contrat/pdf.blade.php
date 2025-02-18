<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contrat de location</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            padding: 40px;
            line-height: 1.6;
            color: #333;
            max-width: 210mm; /* Format A4 */
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }

        .header h1 {
            margin: 0 0 15px 0;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .header p {
            margin: 0;
            font-size: 16px;
            color: #666;
        }

        .content {
            text-align: justify;
        }

        .content h2 {
            margin-top: 30px;
            margin-bottom: 15px;
            font-size: 18px;
            color: #222;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .content h3 {
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #444;
        }

        .content p {
            margin: 10px 0;
            font-size: 14px;
        }

        @page {
            size: A4;
            margin: 2cm;
        }

        @media print {
            body {
                padding: 0;
            }
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Contrat de location</h1>
    <p>N° {{ $contrat->id }}</p>
</div>

<div class="content">
    @foreach($content['blocks'] as $block)
        @if($block['type'] === 'paragraph')
            <p>{!! $block['data']['text'] !!}</p>
        @endif
        @if($block['type'] === 'header')
            <h{{ $block['data']['level'] }}>{!! $block['data']['text'] !!}</h{{ $block['data']['level'] }}>
        @endif
    @endforeach
</div>
</body>
</html>
