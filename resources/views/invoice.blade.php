<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Angel Shopping - Generate Invoice</title>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <img src="img\logo.png" height="35px;" width="35px;">
                <strong> Invoice:</strong>
                @if ($order_master)
                <span>{{$order_master->order_date}}</span>
                @endif
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-10" style="padding-top:40px;">
                        <div>
                            @if ($order_master)
                                <span><strong>OrderID: </strong>#{{$order_master->orderid}}</span><br>
                                <span><strong>Email: </strong>{{$order_master->email}}</span><br>
                                <span><strong>Mobile Number: </strong>{{$order_master->mobile_no}}</span><br>
                                <span><strong>Customer Name: </strong>{{ $order_master->firstname }} {{ $order_master->lastname }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6" style="padding-left:50%; padding-top:40px;">
                        <h6 class="mb-3">To:</h6>
                        @if ($order_master)
                            <div>{{ $order_master->house_no }} {{ $order_master->street }}</div>
                            <div> {{ $order_master->city }},{{ $order_master->district }}</div>
                            <div> {{ $order_master->state }} {{ $order_master->pincode }}</div>
                        @endif
                    </div>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th class="right">Unit Cost</th>
                                <th class="center">Qty</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($order_detail as $od)
                                    @foreach ($products as $item)
                                        @if ($od->itemid == $item->p_id)
                                            <tr>
                                                <td class="center">1</td>
                                                <td class="left strong">
                                                    <span>{{$item->p_name}}</span><br>
                                                </td>
                                                <td class="left">{{$item->p_desc}}</td>
                                                <td class="right">{{$item->p_listprice}}</td>
                                                <td class="center">{{ $od->itemqtys }}</td>
                                                <td class="right">{{ $od->itemprice * $od->itemqtys }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">

                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    @if ($order_master)
                                        <td class="right">
                                            <strong>{{ $order_master->ordertotalprice }}</strong>
                                        </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>