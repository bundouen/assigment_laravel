<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice</title>

    <style>
        .text-right {
            text-align: right;
        }

        .table {
            width: 100%;
            justify-content: space-between;
            /* background-color: rgb(254, 249, 249); */
            text-align: center;
        }

        .table>thead>tr>th {
            font-size: 24px;
        }
    </style>

</head>

<body class="login-page" style="background: white">

    <div>
        <div class="row">
            <div class="col-xs-7">
                <h4>From:</h4>
                <strong>E SHOP</strong><br>
                {{-- 123 Company Ave. <br>
                Toronto, Ontario - L2R 5A4<br> --}}
                P: (+855) 123-4567 <br>
                E: eshop@gmail.com <br>
                <br>
            </div>

            <div class="col-xs-4">
                <h2 style="text-align: center;">Invoice</h2>
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-6">
                {{-- <h4>To:</h4>
                <address>
                    <strong>{{$orders->fname }}</strong><br>
                    <strong>{{$orders->phone }}</strong><br>
                    <span>{{ $orders->email }}</span> <br>
                    <span>{{ $orders->address1 }}</span><br>
                    <span>{{ $orders->address2 }}</span>
                </address> --}}
            </div>

            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>

                        <td>
                            <h4>To:</h4>

                            <strong>{{$orders->fname }}</strong><br>
                            <strong>{{$orders->phone }}</strong><br>
                            <span>{{ $orders->email }}</span> <br>
                            <span>{{ $orders->address1 }}</span><br>
                            <span>{{ $orders->address2 }}</span>

                        </td>
                        <td>
                            <div class="text-right">
                                <span>Invoice Num: {{ $orders->tracking }}</span><br>
                                <span>Invoice Date: {{ $orders->created_at->toDateTimeString()}}</span>
                            </div>

                        </td>

                    </tbody>
                </table>

                <div style="margin-bottom: 0px">&nbsp;</div>

            </div>
        </div>

        <table class="table">
            <thead style="background: #F5F5F5; margin-bottom: 5px">
                <tr>
                    <th class="header">Description</th>
                    <th>QTY</th>
                    <th>Price</th>

                    <th class="text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders->orderItems as $item)
                <tr>
                    <td>
                        <div><strong>{{ $item->products->name }}</strong></div>
                    </td>
                    <td><strong>{{ $item->qty }}</strong></td>
                    <td><strong>{{ $item->products->selling_price }}</strong></td>
                    <td class="text-right">${{ $item->products->selling_price *
                        $item->qty}}</td>
                </tr>
                @endforeach
                {{-- <tr>
                    <td>
                        <div><strong>Service</strong></div>
                        <p>Description here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt maiores
                            placeat similique nisi. Nisi ratione, molestias exercitationem illo reiciendis cumque?</p>
                    </td>
                    <td></td>
                    <td class="text-right">$600</td>
                </tr> --}}
            </tbody>
        </table>
        <hr />
        <div class="row">
            <div class="col-xs-6"></div>
            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr class="well" style="padding: 5px">
                            <th style="padding: 5px">
                                <div> Total Amount </div>
                            </th>
                            <td style="padding: 5px" class="text-right"><strong> ${{ $orders->total}} </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-8 invbody-terms">
                Thank you for your business. <br>
                <br>
                {{-- <h4>Payment Terms</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eius quia, aut doloremque, voluptatibus
                    quam ipsa sit sed enim nam dicta. Soluta eaque rem necessitatibus commodi, autem facilis iusto
                    impedit!</p> --}}
            </div>
        </div>
    </div>

</body>

</html>