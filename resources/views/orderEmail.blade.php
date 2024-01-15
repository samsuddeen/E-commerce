Dear {{ auth()->user()->name }}

<p>Thanks for your order</p>
<p>Your order no is : {{ $order->ordernumber}} </p>
<p> User id is : {{ $order->user_id}} </p>
<p>Your Product id is : {{ $order->product_id}} </p>