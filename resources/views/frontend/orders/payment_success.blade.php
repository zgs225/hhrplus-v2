<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>支付成功 - 合伙人+</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', '合伙人+网站,合伙人+官网')">
    <meta name="author" content="@yield('author', 'HHRPLUS Team')">
    {!! HTML::style(elixir('css/frontend.css')) !!}
    <style>

        * {
            line-height: 1.2;
            margin: 0;
        }

        html {
            color: #333;
            display: table;
            font-family: sans-serif;
            height: 100%;
            text-align: center;
            width: 100%;
        }

        body {
            display: table-cell;
            vertical-align: middle;
            margin: 2em auto;
            background-color: #d2d6de;
        }

        h1 {
            color: #555;
            font-size: 2em;
            font-weight: 400;
            margin-bottom: 15px;
        }

        p {
            margin: 0 auto;
            width: 280px;
        }

        @media only screen and (max-width: 280px) {

            body, p {
                width: 95%;
            }

            h1 {
                font-size: 1.5em;
                margin: 0 0 0.3em;
            }

        }

        .payment-success-container {
          background-color: #fff;
          width: 340px;
          margin-left: auto;
          margin-right: auto;
          padding-top: 40px;
          padding-bottom: 40px;
          box-shadow: 0 1px rgba(0, 0, 0, 0.2);
        }

        .payment-success-container .order-detail {
          background-color: #eee;
          color: #777;
          width: 270px;
          margin-left: auto;
          margin-right: auto;
          padding: 10px 0;
          margin-top: 20px;
        }

        .back-to-home {
          margin-top: 15px;
        }

    </style>
</head>
<body>
  <div class="payment-success-container text-center">
      <p class="text-primary"> <i class="fa fa-check-circle-o fa-5x"></i></p>
      <h4>支付成功</h4>
      <div class="order-detail">
        订单号: {{ $order->order_no }}
      </div>
  </div>

  <div class="text-center back-to-home">
    <a class="text-primary" href="/">回到首页</a>
  </div>
</body>
</html>
<!-- IE needs 512+ bytes: http://blogs.msdn.com/b/ieinternals/archive/2010/08/19/http-error-pages-in-internet-explorer.aspx -->

