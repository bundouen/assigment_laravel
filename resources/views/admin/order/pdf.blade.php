<! DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE = edge">
        <meta name="viewport" content="width = device-width, initial-scale = 1.0">
        <title>E Shop </title>
        <! - Bootstrap5 CSS ->
            {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
                crossorigin="anonymous"> --}}
            <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.min.css') }}">
            {{-- <link rel="stylesheet" type="text/css" href="{{ base_path().'/admin/css/bootstrap.min.css' }}"> --}}
                
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
            <style>
                body {
                    margin-top: 20px;
                    color: #484b51;
                }

                .text-secondary-d1 {
                    color: #728299 !important;
                }

                .page-header {
                    margin: 0 0 1rem;
                    padding-bottom: 1rem;
                    padding-top: .5rem;
                    border-bottom: 1px dotted #e2e2e2;
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-pack: justify;
                    justify-content: space-between;
                    -ms-flex-align: center;
                    align-items: center;
                }

                .page-title {
                    padding: 0;
                    margin: 0;
                    font-size: 1.75rem;
                    font-weight: 300;
                }

                .brc-default-l1 {
                    border-color: #dce9f0 !important;
                }

                .ml-n1,
                .mx-n1 {
                    margin-left: -.25rem !important;
                }

                .mr-n1,
                .mx-n1 {
                    margin-right: -.25rem !important;
                }

                .mb-4,
                .my-4 {
                    margin-bottom: 1.5rem !important;
                }

                hr {
                    margin-top: 1rem;
                    margin-bottom: 1rem;
                    border: 0;
                    border-top: 1px solid rgba(0, 0, 0, .1);
                }

                .text-grey-m2 {
                    color: #888a8d !important;
                }

                .text-success-m2 {
                    color: #86bd68 !important;
                }

                .font-bolder,
                .text-600 {
                    font-weight: 600 !important;
                }

                .text-110 {
                    font-size: 110% !important;
                }

                .text-blue {
                    color: #478fcc !important;
                }

                .pb-25,
                .py-25 {
                    padding-bottom: .75rem !important;
                }

                .pt-25,
                .py-25 {
                    padding-top: .75rem !important;
                }

                .bgc-default-tp1 {
                    background-color: rgba(121, 169, 197, .92) !important;
                }

                .bgc-default-l4,
                .bgc-h-default-l4:hover {
                    background-color: #f3f8fa !important;
                }

                .page-header .page-tools {
                    -ms-flex-item-align: end;
                    align-self: flex-end;
                }

                .btn-light {
                    color: #757984;
                    background-color: #f5f6f9;
                    border-color: #dddfe4;
                }

                .w-2 {
                    width: 1rem;
                }

                .text-120 {
                    font-size: 120% !important;
                }

                .text-primary-m1 {
                    color: #4087d4 !important;
                }

                .text-danger-m1 {
                    color: #dd4949 !important;
                }

                .text-blue-m2 {
                    color: #68a3d5 !important;
                }

                .text-150 {
                    font-size: 150% !important;
                }

                .text-60 {
                    font-size: 60% !important;
                }

                .text-grey-m1 {
                    color: #7b7d81 !important;
                }

                .align-bottom {
                    vertical-align: bottom !important;
                }
            </style>
    </head>

    <body>

        <div class="page-content container">
            <div class="page-header text-blue-d2">
                <h1 class="page-title text-secondary-d1">
                    Invoice
                    <small class="page-info">
                        <i class="fa fa-angle-double-right text-80"></i>
                        ID: {{ $orders->tracking }}
                    </small>
                </h1>

                <div class="page-tools">
                    <div class="action-buttons">
                        {{-- <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                            Print
                        </a> --}}
                        <a class="btn bg-white btn-light mx-1px text-95" href="{{ 'print-pdf/'.$orders->id }}" data-title="PDF">
                            <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                            Export
                        </a>
                    </div>
                </div>
            </div>

            <div class="container px-0">
                <div class="row mt-4">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center text-150">
                                    <i class="fa fa-shopping-cart fa-2x text-success-m2 mr-1"></i>
                                    <span class="text-default-d3">E-SHOP</span>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->

                        <hr class="row brc-default-l1 mx-n1 mb-4" />

                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <span class="text-sm text-grey-m2 align-middle">To:</span>
                                    <span class="text-600 text-110 text-blue align-middle">{{ $orders->fname }}</span>
                                </div>
                                <div class="text-grey-m2">
                                    <div class="my-1">
                                        {{ $orders->address1 }}
                                    </div>
                                    <div class="my-1">
                                        {{ $orders->address2 }}
                                    </div>
                                    <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                            class="text-600">{{ $orders->phone }}</b></div>
                                </div>
                            </div>
                            <!-- /.col -->

                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-grey-m2">
                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                        Invoice
                                    </div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                            class="text-600 text-90">ID:</span> {{ $orders->tracking }}</div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                            class="text-600 text-90">Issue Date:</span> {{
                                        $orders->created_at->toDateTimeString() }}</div>

                                    {{-- <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                            class="text-600 text-90">Status:</span> <span
                                            class="badge badge-warning badge-pill px-25">Unpaid</span>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="mt-4">
                            <div class="row text-600 text-white bgc-default-tp1 py-25">
                                <div class="d-none d-sm-block col-1">#</div>
                                <div class="col-9 col-sm-5">Description</div>
                                <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                                <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                                <div class="col-2">Amount</div>
                            </div>

                            <div class="text-95 text-secondary-d3">
                                @php
                                $k=1;
                                @endphp
                                @foreach ($orders->orderItems as $item )
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">{{ $k++ }}</div>
                                    <div class="col-9 col-sm-5">{{ $item->products->name }}</div>
                                    <div class="d-none d-sm-block col-2">{{ $item->qty }}</div>
                                    <div class="d-none d-sm-block col-2 text-95">${{ $item->products->selling_price }}
                                    </div>
                                    <div class="col-2 text-secondary-d2">${{ $item->products->selling_price *
                                        $item->qty}}</div>
                                </div>
                                @endforeach
                            </div>
                            <hr />
                            {{-- <div class="row border-b-2 brc-default-l2"></div> --}}

                            <div class="row mt-3">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                    Extra note such as company or payment information...
                                </div>

                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            SubTotal
                                        </div>
                                        <div class="col-5">
                                            <span class="text-120 text-secondary-d1">${{ $item->products->selling_price
                                                * $item->qty}}</span>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            Tax (10%)
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-secondary-d1">${{ $item->products->selling_price
                                                * $item->qty *0.1}}</span>
                                        </div>
                                    </div>

                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2">${{
                                                ($item->products->selling_price *
                                                $item->qty)+($item->products->selling_price * $item->qty *0.1)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div>
                                <span class="text-secondary-d1 text-105">Thank you for your purchasing</span>
                                {{-- <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a>
                                --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KinkN"
            crossorigin="anonymous"></script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"> </script>

    </body>

    </html>