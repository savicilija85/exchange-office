<h1>Order details:</h1>
<hr>
@component('mail::table')
    | Order ID      | Currency      | Exchange Rate | Surcharge Percentage | Surcharge Amount | Discount Percentage | Discount Amount | Amount Purchased | Amount Paid | Date Created  |
    | :------------ |:--------------|:--------------|:---------------------|:-----------------|:--------------------|:----------------|:-----------------|:------------| :-------------|
    | {{ $order->id }} | {{ $order->code }} | {{ $order->rate }} | {{ $order->surcharge_percentage }} | {{ $order->surcharge_amount }} | {{ $order->discount_percentage }} | {{ $order->discount_amount }} | {{ $order->amount_purchased }} | {{ $order->amount_paid }} | {{ $order->created_at }} |
@endcomponent

